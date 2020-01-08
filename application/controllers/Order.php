<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
        $this->load->helper('url');
        $this->load->model("M_OrderDB");
        $this->load->model("M_AccountDB");
		$this->load->model("M_ProductDB");
	}

	public function uploadBukti(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!isset($_FILES['bukti_pembayaran']['name'])) {
				$errors[] = "File is not allow to null";
				echo "error".";".$errors[0];
				return;
			}

			$currentDir = getcwd();
			$baseURL = base_url();
			$errors = array();
			$path = "/Asset/uploads/order/bukti/";
			$extensions = array('jpg', 'jpeg', 'png', 'gif');

			//Image 1
			$file_name = time().$_FILES['bukti_pembayaran']['name'];
			$file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];
			$file_type = $_FILES['bukti_pembayaran']['type'];
			$file_size = $_FILES['bukti_pembayaran']['size'];
			$temp = explode('.', $file_name);
			$file_ext = strtolower(end($temp));

			$file_image = $path . $file_name;

			if (!in_array($file_ext, $extensions)) {
				$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
			}

			if ($file_size > 2097152) {
				$errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
			}

			if (empty($errors)) {
				move_uploaded_file($file_tmp, $currentDir.$file_image);
			}

			if ($errors) echo "error".";".$errors[0];
			else {
				echo $baseURL.$file_image;
			}

		}
	}

	public function updateBukti(){
		$order_id = $this->input->post('order_id') ;
		$image_bukti = $this->input->post('image_bukti');
		if (isset($_SESSION['email'])) {
			echo $this->M_OrderDB->updateBukti($_SESSION['email'], $order_id, $image_bukti);
		}
	}

	public function addToCart($type_id, $quantity)
	{
        if (!isset($_SESSION["email"])) {
            redirect(base_url('login'));
        } else {
            $data = array(
                'email' => $_SESSION["email"],
                'type_id' => $type_id,
                'quantity' => $quantity,
            );
            $this->M_OrderDB->addCart($data);
            redirect(base_url('cart'));
        }
	}

	public function cart(){
	    if (isset($_SESSION["email"])) {
            $data['data'] = $this->M_OrderDB->getCart($_SESSION["email"]);
			$datas["cat"] = $this->getCategory();
			$datas["suball"] = $this->getSubCategory();

			$this->load->view('V_header',$datas);
            $this->load->view('V_cart', $data);
            $this->load->view('V_footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function updateCart(){
        $type_id = $this->input->post('type_id') ;
        $quantity = $this->input->post('quantity');
        if (isset($_SESSION['email'])) {
            echo $this->M_OrderDB->updateCart($_SESSION['email'], $type_id, $quantity);
        }
    }

	public function removeFromCart()
	{
        $type_id = $this->input->post('type_id') ;
        $this->M_OrderDB->removeFromCart($type_id);
	}

    private function getTotalDiscount($data, $date){
		$totalDiscount = 0;
		foreach($data as $row){
			if ($this->validateDiscount($row->startDateDiscount, $row->lastDateDiscount, $date)) {
				$discountRate = $row->discount != null ? $row->discount : 0;
			} else {
				$discountRate = 0;
			}
			$totalDiscount += $row->quantity *  ($row->product_price * ($discountRate/100));
		}
		return $totalDiscount;
	}

	private function getPriceProduct(){

	}

    public function checkOrderActive(){
		$order_check = $this->M_OrderDB->getOrderNotFinished($_SESSION["email"]);
		if ($order_check == "0") echo "false";
		else echo "true";
	}

    public function changeAddress(){
        $address = $this->input->post('address') ;
        $telephone = $this->input->post('phone');
        $order_id = $this->input->post('order_id');
        $email = $_SESSION["email"];

        $this->M_OrderDB->changeAddress($order_id, $email, $address, $telephone);
    }

    public function getCategory(){
        $datas['data'] = $this->M_ProductDB->getCategory();
        return $datas;
    }

    public function getSubCategory(){
        $data['data'] = $this->M_ProductDB->getAllSubCategory();
        return $data;
    }

	public function moveToOrder(){
        $email = $_SESSION["email"];

	    $dataCart = $this->getItemCart($email);

        $this->createNewOrder($email, $dataCart);
        $order = ($this->M_OrderDB->getOrderNotConfirmBy($email));
        $this->addItemToOrder($email, $order["data_array"][0], $dataCart);

        redirect(base_url('order'));
    }

    private function validateDiscount($startDate, $lastDate, $currentDate){
		if ($startDate == null || $lastDate == null) return false;
		if (strtotime($currentDate) >= strtotime($startDate) && strtotime($currentDate) <= strtotime($lastDate)) return true;
		else return false;
	}

    public function getItemCart($email){
        $rawdata = $this->M_OrderDB->getCart($email);
        $discountRate = 0;
        $totalprice = 0;
        foreach ($rawdata["data_array"] as $row){

        	if ($this->validateDiscount($row->startDateDiscount, $row->lastDateDiscount, date("Y-m-d h:i:sa"))) {
        		$discountRate = $row->discount != null ? $row->discount : 0;
			} else {
				$discountRate = 0;
			}
            $totalprice += $row->quantity * ($row->product_price - ($row->product_price * ($discountRate/100)));
        }

        $data["data"] = $rawdata["data_array"];
        $data["total"] = $totalprice;
        return $data;
    }

    public function addItemToOrder($email, $dataOrder ,$data){
        foreach($data["data"] as $row){
            $this->M_OrderDB->addToOrder($dataOrder->order_id, $row->type_id, $row->quantity);
            $this->M_ProductDB->updateQuantity($row->type_id, $row->quantity);
        }
        $this->removeCart($email);
    }

    public function createNewOrder($email,$data){
        $unique_price = random_int(1,500);
        $user = ($this->getInfoUser($email))[0];
        $totalPrice = $data["total"];
        $dateOrder = date('Y-m-d');
	    $this->M_OrderDB->createNewOrder($email, $dateOrder, $totalPrice, $unique_price, $user->address, $user->phoneNumber);
    }

    public function getInfoUser($email){
	    return ($this->M_AccountDB->getAccount($email))->result();
    }

    public function removeCart($email)
    {
        $this->M_OrderDB->removeCart($email);
    }

	public function kirimBukti()
	{

	}

	public function removeOrder()
	{

	}

	public function backToCart()
	{

	}

	public function getTotalPrice()
	{

	}

	public function removeAll()
	{

	}

	public function order()
	{
		if (isset($_SESSION["email"])) {
			$order = $this->M_OrderDB->getOrder($_SESSION["email"]);

			if ($order["count"] > 0) {
				$data = ($order["data_array"])[0];
				$message["order"] = ($order["data_array"])[0];
				$item = $this->M_OrderDB->getOrderItem($data->order_id);
				$date = ($this->M_OrderDB->getOrderDate($data->order_id))["data_array"][0];
				$message["orderitem_count"] = $item["count"];
				$message["order_date"] = $date->dateOrder;
				if ($message["orderitem_count"] > 0) {
					$message["orderitem"] = $item["data_array"];
					$message["total_discount"] = $this->getTotalDiscount($item["data_array"], $date->dateOrder);
				}
				if ($data->confirmation == 0) {
					$message["status"] = 0;
				} else if ($data->confirmation == 1) {
					$message["status"] = 1;
				} else if ($data->confirmation == 2) {
					$message["status"] = 2;
				}else if ($data->confirmation == 3){
					$message["status"] = 3;
				} else if ($data->confirmation == 4){
					$message["kurir"] = $message["order"]->kurir;
					$message["resi"] = $message["order"]->resi;
					$message["status"] = 4;
				}
			} else {
				$message["text"] = "Anda belum melakukan order";
				$message["status"] = -1;
			}

			$datas["cat"] = $this->getCategory();
			$datas["suball"] = $this->getSubCategory();

			$this->load->view('V_header',$datas);
			$this->load->view('V_order',$message);
			$this->load->view('V_footer');
		} else {
			redirect(base_url('login'));
		}
	}

	public function invoice() {
		$order = $this->M_OrderDB->getOrder($_SESSION["email"]);
		$data = ($order["data_array"])[0];
		$item = $this->M_OrderDB->getOrderItem($data->order_id);
		$date = ($this->M_OrderDB->getOrderDate($data->order_id))["data_array"][0];
		$orderitem = $item["data_array"];
		$total_discount = $this->getTotalDiscount($item["data_array"], $date->dateOrder);
		$normal_price = $data->totalPrice + $total_discount;
		$total_price = $data->totalPrice + $data->logistic_price + $data->unique_price;
		$nama = implode(' ', array_slice(explode(' ', $_SESSION["name"]), 0, 1));

		$pdf = new FPDF('P', 'mm', 'A5');
		$pdf->SetTitle('OneTech, Your Mining Solution Service');
		$pdf->SetKeywords('OneTech, Mining');
		$pdf->AddPage();
		$pdf->SetFont('Helvetica', 'B', '22');

		$pdf->SetTextColor(62,193,213);
		$pdf->Cell(17	,7,'ONE',0,0);
		$pdf->SetTextColor(4,4,4);
		$pdf->Cell(10,7,'TECH',0,1);

		$pdf->SetFont('Arial', '', '9');
		$pdf->cell(100, 7, 'Order ID : ', 0, 0, 'R');
		$pdf->cell(1, 7, ''.$data->order_id.'', 0, 1);

		$pdf->SetFont('Arial', '', '14');
		$pdf->Cell(20,7,'',0,1);
		$pdf->Cell(20, 7, 'Terima Kasih Atas Pemesanan Anda!', 0, 1);

		$pdf->SetFont('Arial', '', '11');
		$pdf->SetTextColor(100,100,100);
		$pdf->Cell(5, 7, "Hi $nama, kami telah menerima pesanan anda.", 0, 1);
		$pdf->Cell(20, 7, 'Silahkan Transfer ke Rekening Di Bawah ini:', 0, 1);
		$pdf->Cell(20, 5, '', 0, 1);
		$pdf->Cell(20, 7, 'Bank Mandiri 125-002388-3838 a.n. PT Minindo Artha Gemilang', 0, 1);
		$pdf->Cell(20, 5, '', 0, 1);

		$pdf->SetFont('Arial', '', '10');
		$pdf->SetTextColor(0,0,0);
		$pdf->cell(20, 5, 'PENTING: Jika sudah transfer, Anda WAJIB KONFIRMASI', 0, 1);
		$pdf->cell(20, 5, 'PEMBAYARAN ANDA', 0, 1);
		$pdf->Cell(20, 5, '', 0, 1);
		$pdf->Cell(20, 5, '', 0, 1);

		$pdf->Cell(20, 7, 'ORDER DETAILS', 0, 1);
		$pdf->Cell(20, 3, '', 0, 1);

		$pdf->SetFont('Arial', '', '9');
		foreach ($orderitem as $row) {
			$pricetoview = $row->product_price;
			if ($row->discount > 0 && $row->discount < 100) {
				$order_date = date("Y-m-d");
				$order_date = date('Y-m-d', strtotime($order_date));
				$begin = date('Y-m-d', strtotime($row->startDateDiscount));
				$end = date('Y-m-d', strtotime($row->lastDateDiscount));
				if (($order_date >= $begin) && ($order_date <= $end)) {
					$pricetoview = $row->product_price - ($row->product_price * ($row->discount / 100));
				}
			}
			$name = implode(' ', array_slice(explode(' ', $row->product_name), 0, 4));
			$hargasatuan = number_format($pricetoview, 2, ",", ".");
			$hargatotal = number_format($pricetoview * $row->quantity, 2, ",", ".");

			$pdf->Cell(100, 5, ''.$name.'', 0, 0);
			$pdf->Cell(20, 5, 'Rp. '.$hargatotal.'', 0, 1);
			$pdf->Cell(20, 5, ''.$row->quantity.' x Rp. '.$hargasatuan.'', 0, 1);
			$pdf->Cell(20, 3, '', 0, 1);
		}

		$pdf->Cell(20, 3, '', 0, 1);
		$pdf->Cell(100, 7, 'Subtotal', 0, 0);
		$pdf->Cell(20, 7, 'Rp. ' . number_format($normal_price, 2, ",", ".") . '', 0, 1);
		$pdf->Cell(98, 7, 'Discount', 0, 0);
		$pdf->Cell(20, 7, '- Rp. ' . number_format($total_discount, 2, ",", ".") . '', 0, 1);
		$pdf->Cell(100, 7, 'Delivery Fee', 0, 0);
		$pdf->Cell(20, 7, 'Rp. ' . number_format($data->logistic_price, 2, ",", ".") . '', 0, 1);
		$pdf->Cell(100, 7, 'Unique Code', 0, 0);
		$pdf->Cell(20, 7, 'Rp. ' . number_format($data->unique_price, 2, ",", ".") . '', 0, 1);
		$pdf->Cell(100, 7, 'TOTAL', 0, 0);
		$pdf->Cell(20, 7, 'Rp. ' . number_format($total_price, 2, ",", ".") . '', 0, 1);

		$pdf->output();

		$this->load->view('V_invoice');

	}

	public function createpdf() {
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', '12');
		$pdf->Cell(30,7,'OneTech......',0,1);
		$pdf->Cell(50,7,'[OneTech Address]......',0,1);
		$pdf->Cell(50,7,'[OneTech Phone]......',0,1);
		$pdf->Cell(20,7,'',0,1);
		$pdf->Cell(60,7,'Sold to :','LRT',1);
		$pdf->Cell(60,7,'[Customer Name]','LRB',0);
		$pdf->Cell(70,7,'',0,0);
		$pdf->SetFont('Arial', 'BU', '18');
		$pdf->Cell(30,7,'INVOICE',0,1);
		$pdf->SetFont('Arial', 'B', '12');
		$pdf->Cell(110,7,'',0,0);
		$pdf->Cell(25,7,'Invoice no :',0,1);
		$pdf->Cell(60,7,'Delivered to :','LRT',0);
		$pdf->Cell(50,7,'',0,0);
		$pdf->Cell(25,7,'Date :',0,1);
		$pdf->Cell(60,7,'[Customer Addresss]','LRB',0);
		$pdf->Cell(50,7,'',0,0);
		$pdf->Cell(25,7,'P/O No :',0,1);
		$pdf->Cell(110,7,'',0,0);
		$pdf->Cell(25,7,'Payment :',0,1);
		$pdf->Cell(20,7,'',0,1);
		$pdf->Cell(20,7,'No.',1,0,'C');
		$pdf->Cell(40,7,'Code/Item',1,0,'C');
		$pdf->Cell(45,7,'Description',1,0,'C');
		$pdf->Cell(15,7,'Qty',1,0,'C');
		$pdf->Cell(35,7,'Unit Price',1,0,'C');
		$pdf->Cell(25,7,'Amount',1,1,'C');
		$pdf->Cell(20,7,'1',1,0,'C');
		$pdf->Cell(40,7,'',1,0,'C');
		$pdf->Cell(45,7,'',1,0,'C');
		$pdf->Cell(15,7,'',1,0,'C');
		$pdf->Cell(35,7,'',1,0,'C');
		$pdf->Cell(25,7,'',1,1,'C');
		$pdf->Cell(20,7,'2',1,0,'C');
		$pdf->Cell(40,7,'',1,0,'C');
		$pdf->Cell(45,7,'',1,0,'C');
		$pdf->Cell(15,7,'',1,0,'C');
		$pdf->Cell(35,7,'',1,0,'C');
		$pdf->Cell(25,7,'',1,1,'C');
		$pdf->Cell(20,7,'3',1,0,'C');
		$pdf->Cell(40,7,'',1,0,'C');
		$pdf->Cell(45,7,'',1,0,'C');
		$pdf->Cell(15,7,'',1,0,'C');
		$pdf->Cell(35,7,'',1,0,'C');
		$pdf->Cell(25,7,'',1,1,'C');
		$pdf->Cell(120,7,'',0,0);
		$pdf->Cell(35,7,'Subtotal  : ',1,0,'R');
		$pdf->Cell(25,7,'',1,1,'C');
		$pdf->Cell(120,7,'',0,0);
		$pdf->Cell(35,7,'Discount  : ',1,0,'R');
		$pdf->Cell(25,7,'',1,1,'C');
		$pdf->Cell(120,7,'',0,0);
		$pdf->Cell(35,7,'Tax  : ',1,0,'R');
		$pdf->Cell(25,7,'',1,1,'C');
		$pdf->Cell(120,7,'',0,0);
		$pdf->Cell(35,7,'Total  : ',1,0,'R');
		$pdf->Cell(25,7,'',1,1,'C');
		$pdf->Cell(20,7,'Notes :',0,1);
		$pdf->Cell(70,7,'..........................................................',0,1);
		$pdf->Cell(70,7,'..........................................................',0,1);
		$pdf->Cell(70,7,'..........................................................',0,1);
		$pdf->Cell(70,7,'..........................................................',0,1);
		$pdf->Cell(125,7,'',0,0);
		$pdf->Cell(50,7,'One Tech',0,1, "C");
		$pdf->Cell(125,7,'',0,0);
		$pdf->Cell(50,7,'',0,1);
		$pdf->Cell(125,7,'',0,0);
		$pdf->Cell(50,7,'',0,1);
		$pdf->Cell(125,7,'',0,0);
		$pdf->Cell(50,7,'____________________',0,1,'C');
		$pdf->Cell(125,7,'',0,0);
		$pdf->Cell(50,7,'Authorized Signature',0,1,'C');
		$pdf->output();
	}
}
