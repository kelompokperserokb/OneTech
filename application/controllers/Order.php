<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
        $this->load->helper('url');
        $this->load->model("M_OrderDB");
        $this->load->model("M_AccountDB");
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
                $message["orderitem_count"] = $item["count"];
                if ($message["orderitem_count"] > 0) {
                    $message["orderitem"] = $item["data_array"];
                }
                if ($data->confirmation == 0) {
                    $message["text"] = "Order telah dilakukan, order sedang menunggu konfirmasi admin. Mohon tunggu waktu kerja maksimum 1x24 jam.";
                    $message["status"] = 0;
                } else if ($data->confirmation == 1) {
                    $message["text"] = "Order telah dikonfirmasi admin. Mohon segera upload bukti pembayaran sesuai dengan harga yang tertera.";
                    $message["status"] = 1;
                } else if ($data->confirmation == 2) {
                    $message["text"] = "Bukti telah diupload. Mohon tunggu untuk verifikasi admin.";
                    $message["status"] = 2;
                }else if ($data->confirmation == 3){
                        $message["text"] = "Pembayaran valid. Barang sedang dalang pengemasan.";
                        $message["status"] = 2;
                } else if ($data->confirmation == 4){
                    $message["text"] = "Barang sedang dalam proses pengiriman menggunakan ".$message["order"]->kurir.", dengan no Resi : ".$message["order"]->resi;
                    $message["status"] = 2;
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

    public function changeAddress(){
        $address = $this->input->post('address') ;
        $telephone = $this->input->post('phone');
        $order_id = $this->input->post('order_id');
        $email = $_SESSION["email"];

        $this->M_OrderDB->changeAddress($order_id, $email, $address, $telephone);
    }

    public function getCategory(){
        $this->load->model("M_ProductDB");
        $datas['data'] = $this->M_ProductDB->getCategory();
        return $datas;
    }

    public function getSubCategory(){
        $this->load->model("M_ProductDB");
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


        //Special request
	    /*if ($order["count"] != 0) {
            $this->addItemToOrder($email, $order["data_array"], $dataCart);
        } else {
	        $this->createNewOrder($email, $dataCart);
        }*/
    }

    public function getItemCart($email){
        $rawdata = $this->M_OrderDB->getCart($email);
        $totalprice = 0;
        foreach ($rawdata["data_array"] as $row){
            $totalprice += $row->quantity * $row->product_price;
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

	public function invoice() {
		$pdf = new FPDF('P', 'mm', 'A5');
		$pdf->AddPage();
		$pdf->SetFont('Helvetica', 'B', '22');

		$pdf->SetTextColor(62,193,213);
		$pdf->Cell(17	,7,'ONE',0,0);
		$pdf->SetTextColor(4,4,4);
		$pdf->Cell(10,7,'TECH',0,1);

		$pdf->SetFont('Arial', '', '9');
		$pdf->cell(100, 7, 'Order ID : ', 0, 0, 'R');
		$pdf->cell(1, 7, '175150201111048', 0, 1);

		$pdf->SetFont('Arial', '', '14');
		$pdf->Cell(20,7,'',0,1);
		$pdf->Cell(20, 7, 'Terima Kasih Atas Pemesanan Anda!', 0, 1);

		$pdf->SetFont('Arial', '', '11');
		$pdf->SetTextColor(100,100,100);
		$pdf->Cell(5, 7, "Hi Robertus, kami telah menerima pesanan anda.", 0, 1);
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
		$pdf->Cell(100, 5, 'CHE40 ELECTRODES WELDING', 0, 0);
		$pdf->Cell(20, 5, 'Rp. 750.000', 0, 1);
		$pdf->Cell(20, 5, '3 x Rp. 250.000', 0, 1);
		$pdf->Cell(20, 3, '', 0, 1);
		$pdf->Cell(100, 5, 'CHE43 ELECTRODES WELDING', 0, 0);
		$pdf->Cell(20, 5, 'Rp. 800.000', 0, 1);
		$pdf->Cell(20, 5, '4 x Rp. 200.000', 0, 1);
		$pdf->Cell(20, 3, '', 0, 1);

		$pdf->Cell(20, 3, '', 0, 1);
		$pdf->Cell(100, 7, 'Subtotal', 0, 0);
		$pdf->Cell(20, 7, 'Rp. 1.550.00', 0, 1);
		$pdf->Cell(98, 7, 'Discount', 0, 0);
		$pdf->Cell(20, 7, '- Rp. 0', 0, 1);
		$pdf->Cell(100, 7, 'Delivery Fee', 0, 0);
		$pdf->Cell(20, 7, 'Rp. 180.000', 0, 1);
		$pdf->Cell(100, 7, 'Unique Code', 0, 0);
		$pdf->Cell(20, 7, 'Rp. 131', 0, 1);
		$pdf->Cell(100, 7, 'TOTAL', 0, 0);
		$pdf->Cell(20, 7, 'Rp. 1.730.131', 0, 1);

		$pdf->output();
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
