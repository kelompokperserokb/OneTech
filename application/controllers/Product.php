<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

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

	public function deleteProduct($id)
	{
		$this->load->helper('url');
		$this->load->model("M_ProductDB");
		$this->M_ProductDB->removeProduct($id);
		redirect(base_url(), 'refresh');
	}

	public function updateProduct($id)
	{
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$quota = $this->input->post('quota');
		$price = $this->input->post('price');
		$description = $this->input->post('description');
		$image = $this->input->post('image');

		$this->load->model("M_ProductDB");
		$this->M_ProductDB->updateProduct($name, $type, $quota, $price, $description, $image, $id);
		$this->load->view();
	}

	public function createDiscount($id)
	{
		$discount = $this->input->post('discount');
		$startDateDiscount = $this->input->post('start');
		$lastDateDiscount = $this->input->post('last');

		$this->load->model("M_ProductDB");
		$this->M_ProductDB->giveDiscount($discount, $startDateDiscount, $lastDateDiscount, $id);
		$this->load->view();
	}

	public function viewProducts($prod_id)
	{
		$this->load->helper('url');
		$this->load->model("M_ProductDB");
		$data["cat"] = $this->getCategory();
		$data["suball"] = $this->getAllSubCategory();
		$data['product'] = $this->M_ProductDB->getProduct($prod_id);
		$data['product_type'] = $this->M_ProductDB->getProductTypeData($prod_id);

		$data["stock"] = $data["product_type"]["data_array"][0]->quota;
		$data["stock_status"] = $data["stock"] > 0 ? "In Stock" : "Sold Out";

		$this->load->view('V_header', $data);
		$this->load->view('V_productPage', $data);
		$this->load->view('footer');
	}

	public function viewProductsType($prod_id, $type_id)
	{
		$this->load->helper('url');
		$this->load->model("M_ProductDB");
		$data["cat"] = $this->getCategory();
		$data["suball"] = $this->getAllSubCategory();
		$data['product'] = $this->M_ProductDB->getProductData($prod_id, $type_id);
		$data['product_type'] = $this->M_ProductDB->getProductTypeData($prod_id, $type_id);

		$data["stock"] = $data["product"]["data_array"][0]->quota;
		$data["stock_status"] = $data["stock"] > 0 ? "In Stock" : "Sold Out";

		$this->load->view('V_header', $data);
		$this->load->view('V_productPage', $data);
		$this->load->view('footer');
	}

	public function viewAllProduct($page)
	{
		$this->load->helper('url');
		$limit = 12;
		$start = ($page-1) * $limit;

		$data["product"] = $this->getProductByLimit($start, $limit);
		$data["cat"] = $this->getCategory();
		$data["allprod"] = $this->getProductAll();
		$data["suball"] = $this->getAllSubCategory();

		$this->load->view('V_header', $data);
		$this->load->view('V_allProductPage', $data);
		$this->load->view('footer');
	}

	public function viewProductByCat($category_id, $page){
		$this->load->helper('url');
		$limit = 12;
		$start = ($page-1) * $limit;

		$this->load->model("M_ProductDB");
		$data["cat"] = $this->getCategory();
		$data["suball"] = $this->getAllSubCategory();
		$data["sub"] = $this->getSubCategory($category_id);
		$data["product"] = $this->M_ProductDB->getProductByCategoryLimit($category_id, $start, $limit);
		$data["allprod"] = $this->M_ProductDB->getProductByCategory($category_id);
		$data["catid"] = $category_id;
		$data['catname'] = $this->getCategoryName($category_id);

		$this->load->view('V_header', $data);
		$this->load->view('V_viewProduct', $data);
		$this->load->view('footer');
	}

	public function viewProductBySubCat($category_id, $subcategory_id, $page){
		$this->load->helper('url');
		$limit = 12;
		$start = ($page-1) * $limit;

		$this->load->model("M_ProductDB");
		$data["cat"] = $this->getCategory();
		$data["suball"] = $this->getAllSubCategory();
		$data["sub"] = $this->getSubCategory($category_id);
		$data["product"] = $this->M_ProductDB->getProductBySubCategoryLimit($subcategory_id, $start, $limit);
		$data["allprod"] = $this->M_ProductDB->getProductBySubCategory($subcategory_id);
		$data["catid"] = $category_id;
		$data['catname'] = $this->getCategoryName($category_id);
		$data["subcatid"] = $subcategory_id;
		$data['subcatname'] = $this->getSubCategoryName($category_id);

		$this->load->view('V_header', $data);
		$this->load->view('V_viewSubProduct', $data);
		$this->load->view('footer');
	}

	public function viewSearched() {
		$this->load->helper('url');
		$query = $this->input->get('value');
		$page = isset($_GET["page"]) ? $this->input->get('page') : 1;
		$limit = 12;
		$start = ($page-1) * $limit;

		$this->load->model("M_ProductDB");
		$data["cat"] = $this->getCategory();
		$data["suball"] = $this->getAllSubCategory();
		$data["product"] = $this->M_ProductDB->getProductBySearchLimit($query, $start, $limit);
		$data["allprod"] = $this->M_ProductDB->getProductBySearch($query);
		$data["link"] = base_url()."viewproduct/search?value=".(str_replace(" ","%20",$query))."&page=";

		$this->load->view('V_header', $data);
		$this->load->view('V_viewSearchProduct', $data);
		$this->load->view('footer');
	}

	public function getProductAll()
	{
		$this->load->model("M_ProductDB");
		$datas['data'] = $this->M_ProductDB->getProductAll();
		return $datas;
	}

	public function getProductByLimit($start, $limit)
	{
		$this->load->model("M_ProductDB");
		$datas['data'] = $this->M_ProductDB->getProductByLimit($start, $limit);
		return $datas;
	}

	public function getCategory()
	{
		$this->load->model("M_ProductDB");
		$datas['data'] = $this->M_ProductDB->getCategory();
		return $datas;
	}

	public function getCategoryName($category_id)
	{
		$this->load->model("M_ProductDB");
		$datas['data'] = $this->M_ProductDB->getCategoryName($category_id);
		return $datas;
	}

	public function getSubCategoryName($subcategory_id)
	{
		$this->load->model("M_ProductDB");
		$datas['data'] = $this->M_ProductDB->getSubCategoryName($subcategory_id);
		return $datas;
	}

	public function getSubCategory($subcat)
	{
		$this->load->model("M_ProductDB");
		$datas['data'] = $this->M_ProductDB->getSubCategory($subcat);
		return $datas;
	}

	public function getAllSubCategory()
	{
		$this->load->model("M_ProductDB");
		$datas['data'] = $this->M_ProductDB->getAllSubCategory();
		return $datas;
	}

}
