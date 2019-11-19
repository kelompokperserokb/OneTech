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

	public function getProduct(){
        $this->load->model("M_ProductDB");
        $data['data'] = $this->M_ProductDB->getProduct();

        $this->load->view('V_homePage', $data);
    }
}
