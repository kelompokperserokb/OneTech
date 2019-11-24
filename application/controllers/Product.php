<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function create()
	{
		$this->load->helper('url');
		$this->load->view('V_admin_addProduct');
	}

	public function addProduct()
	{
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$quota = $this->input->post('quota');
		$price = $this->input->post('price');
		$discount = 0;
		$startDateDiscount = null;
		$lastDateDiscount = null;
		$description = $this->input->post('description');
		$image = $this->input->post('image');
		$datePost = date();

		$this->load->model("M_ProductDB");
		$this->M_ProductDB->registProduct($name, $type, $quota, $price, $discount, $startDateDiscount, $lastDateDiscount, $description, $image, $datePost);
		$this->load->view();
	}

	public function deleteProduct($id) {
		$this->load->helper('url');
		$this->load->model("M_ProductDB");
		$this->M_ProductDB->removeProduct($id);
		redirect(base_url(), 'refresh');
	}

	public function updateProduct($id) {
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$quota = $this->input->post('quota');
		$price = $this->input->post('price');
		$description = $this->input->post('description');
		$image = $this->input->post('image');

		$this->load->model("M_ProductDB");
		$this->M_ProductDB->updateProduct($name, $type, $quota, $price,  $description, $image, $id);
		$this->load->view();
	}

	public function createDiscount($id) {
		$discount = $this->input->post('discount');
		$startDateDiscount = $this->input->post('start');
		$lastDateDiscount = $this->input->post('last');

		$this->load->model("M_ProductDB");
		$this->M_ProductDB->giveDiscount($discount, $startDateDiscount, $lastDateDiscount, $id);
		$this->load->view();
	}
	public function viewProducts($prod_id,$type_id){
        $this->load->helper('url');
        $this->load->model("M_ProductDB");
        $data['data'] = $this->M_ProductDB->getCategory();
        $data['product'] = $this->M_ProductDB->getProductData($prod_id,$type_id);
        $data['product_type'] = $this->M_ProductDB->getProductTypeData($prod_id, $type_id);

        $data["stock"] = $data["product"]["data_array"][0]->quota;
        $data["stock_status"] = $data["stock"] > 0 ? "In Stock" : "Sold Out";

        $this->load->view('V_header',$data);
        $this->load->view('V_productPage',$data);
        $this->load->view('footer');
    }

    public function viewAllProduct(){
        $this->load->helper('url');
        $this->load->model("M_ProductDB");
        $data['data'] = $this->M_ProductDB->getCategory();
        $this->load->view('V_header',$data);
        $this->load->view('V_allProductPage');
        $this->load->view('footer');
    }
}
