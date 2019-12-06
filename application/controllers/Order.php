<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
        $this->load->helper('url');
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
            $this->load->model("M_OrderDB");
            $this->M_OrderDB->addCart($data);
            redirect(base_url('cart'));
        }
	}

	public function cart(){
	    if (isset($_SESSION["email"])) {
            $this->load->model("M_OrderDB");
            $data['data'] = $this->M_OrderDB->getCart();
            $this->load->view('V_cart', $data);
            $this->load->view('footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function updateCart(){
        $this->load->model("M_OrderDB");
        $type_id = $this->input->post('type_id') ;
        $quantity = $this->input->post('quantity');
        if (isset($_SESSION['email'])) {
            echo $this->M_OrderDB->updateCart($_SESSION['email'], $type_id, $quantity);
        }
    }

	public function removeFromCart()
	{

	}

	public function removeAll()
	{

	}

	public function doOrder()
	{

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
