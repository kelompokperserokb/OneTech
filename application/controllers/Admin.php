<?php
/**
 * Created by PhpStorm.
 * User: Arata Reito
 * Date: 05/12/2019
 * Time: 0:19
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_ProductDB");
        $this->load->model("M_OrderDB");
        $this->load->helper('url');
    }

    public function upload(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        	if (!isset($_FILES['image-product1']['name']) || !isset($_FILES['image-product2']['name']) || !isset($_FILES['image-product2']['name'])) {
        		return;
			}

            $currentDir = getcwd();
            $baseURL = base_url();
            $errors = array();
            $path = "/Asset/uploads/";
            $extensions = array('jpg', 'jpeg', 'png', 'gif');

            //Image 1
            $file_name = $_FILES['image-product1']['name'];
            $file_tmp_1 = $_FILES['image-product1']['tmp_name'];
            $file_type = $_FILES['image-product1']['type'];
            $file_size = $_FILES['image-product1']['size'];
            $temp = explode('.', $file_name);
            $file_ext = strtolower(end($temp));

            $file_image1 = $path . $file_name;

            if (!in_array($file_ext, $extensions)) {
                $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
            }

            if ($file_size > 2097152) {
                $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
            }

            //Image 2
            $file_name = $_FILES['image-product2']['name'];
            $file_tmp_2 = $_FILES['image-product2']['tmp_name'];
            $file_type = $_FILES['image-product2']['type'];
            $file_size = $_FILES['image-product2']['size'];
            $temp = explode('.', $file_name);
            $file_ext = strtolower(end($temp));

            $file_image2 = $path . $file_name;

            if (!in_array($file_ext, $extensions)) {
                $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
            }

            if ($file_size > 2097152) {
                $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
            }

            //Image 3
            $file_name = $_FILES['image-product3']['name'];
            $file_tmp_3 = $_FILES['image-product3']['tmp_name'];
            $file_type = $_FILES['image-product3']['type'];
            $file_size = $_FILES['image-product3']['size'];
            $temp = explode('.', $file_name);
            $file_ext = strtolower(end($temp));

            $file_image3 = $path . $file_name;

            if (!in_array($file_ext, $extensions)) {
                $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
            }

            if ($file_size > 2097152) {
                $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
            }

            if (empty($errors)) {
                move_uploaded_file($file_tmp_1, $currentDir.$file_image1);
                move_uploaded_file($file_tmp_2, $currentDir.$file_image2);
                move_uploaded_file($file_tmp_3, $currentDir.$file_image3);
            }

            if ($errors) echo $errors[0];
            else {
                echo $baseURL.$file_image1.";".$baseURL.$file_image2.";".$baseURL.$file_image3;
            }

        }
    }


    public function addMerk()
    {
        $merkName = $this->input->post('merkName');
        echo ($this->M_ProductDB->adminAddNewMerk($merkName))[0]->merk_id;
    }

    public function getMerk(){
        $str ='';
        $arr = $this->M_ProductDB->adminGetMerk();
        foreach ($arr as $row) {
            $str .= $row->merk_name.';'.$row->merk_id.'%';
        }
        echo $str;
    }

    public function editMerk()
    {
        $merkName = $this->input->post('merkName');
        $merkId = $this->input->post('merkId');

        $this->M_ProductDB->adminUpdateMerk($merkName,$merkId);
    }

    public function  deleteMerk(){
        $merkId = $this->input->post('merkId');

        $this->M_ProductDB->adminDeleteMerk($merkId);
    }

    public function addCategory()
    {
        $categoryName = $this->input->post('categoryName');

        echo ($this->M_ProductDB->adminAddNewCategory($categoryName))[0]->category_id;
    }

    public function getCategory(){
        $str= '';
        $arr = $this->M_ProductDB->adminGetCategory();
        foreach ($arr as $row) {
            $str .= $row->category_name.';'.$row->category_id.'%';
        }
        echo $str;
    }

    public function editCategory()
    {
        $categoryName = $this->input->post('categoryName');
        $categoryId = $this->input->post('categoryId');

        $this->M_ProductDB->adminUpdateCategory($categoryName,$categoryId);
    }

    public function  deleteCategory(){
        $categoryId = $this->input->post('categoryId');

        $this->M_ProductDB->adminDeleteCategory($categoryId);
    }

    public function addSubCategory()
    {
        $categoryId = $this->input->post('categoryId');
        $subCategoryName = $this->input->post('subCategoryName');

        echo ($this->M_ProductDB->adminAddNewSubCategory($categoryId,$subCategoryName))[0]->subcategory_id;
    }

    public function getSubCategory(){
        $str ='';
        $arr = $this->M_ProductDB->adminGetSubCategory();
        foreach ($arr as $row) {
            $str.=$row->category_name.';'.$row->category_id.';'.$row->subcategory_name.';'.$row->subcategory_id.'%';
        }
        echo $str;
    }

    public function getDependentSubCategory(){
		$id = $this->input->post('categoryId');
    	$str ='';
		$arr = $this->M_ProductDB->adminGetDependentSubCategory($id);
		foreach ($arr as $row) {
			$str.=$row->subcategory_name.';'.$row->subcategory_id.'%';
		}
		echo $str;
	}

    public function editSubCategory()
    {
        $categoryId = $this->input->post('categoryId');
        $subCategoryId = $this->input->post('subCategoryId');
        $subCategoryName = $this->input->post('subCategoryName');

        $this->M_ProductDB->adminUpdateSubCategory($categoryId, $subCategoryId, $subCategoryName);
    }

    public function  deleteSubCategory(){
        $categoryId = $this->input->post('categoryId');
        $subcategoryId = $this->input->post('subcategoryId');

        $this->M_ProductDB->adminDeleteSubCategory($categoryId, $subcategoryId);
    }

    public function addProduct()
    {
    	$merk_id = $this->input->post('merk_id');
		$category_id = $this->input->post('category_id');
		$subcategory_id = $this->input->post('subcategory_id');
		$product_name = $this->input->post('product_name');
		$product_code = $this->input->post('product_code');
		$product_price = $this->input->post('product_price');
		$product_desc = $this->input->post('product_desc');
        $image_product1 = $this->input->post('image_product1');
        $image_product2 = $this->input->post('image_product2');
        $image_product3 = $this->input->post('image_product3');
        $discount = $this->input->post('discount');
        $startDateDiscount = $this->input->post('date_start');
        $lastDateDiscount = $this->input->post('date_end');
        $datePost = date('Y-m-d');

        echo ($this->M_ProductDB->adminAddNewProduct($merk_id, $category_id, $subcategory_id, $product_name, $product_code, $product_price,
			$product_desc, $image_product1, $image_product2, $image_product3, $discount, $startDateDiscount, $lastDateDiscount, $datePost))[0]->product_id;
    }

	public function getProduct(){
		$str ='';
		$arr = $this->M_ProductDB->adminGetProduct();
		foreach ($arr as $row) {
			$str.=$row->merk_id.'##'.$row->category_id.'##'.$row->subcategory_id."##".$row->product_id."##".$row->merk_name.'##'.$row->category_name.'##'.$row->subcategory_name.'##'
				.$row->product_name.'##'.$row->product_code.'##'.$row->product_price.'##'.$row->product_desc.'##'.$row->product_img_1.'##'.$row->product_img_2.'##'
				.$row->product_img_3.'##'.$row->discount.'##'.$row->startDateDiscount.'##'.$row->lastDateDiscount.'##'.'%%';
		}
		echo $str;
	}

	public function editProduct()
	{
		$merk_id = $this->input->post('merk_id');
		$category_id = $this->input->post('category_id');
		$subcategory_id = $this->input->post('subcategory_id');
		$product_id = $this->input->post('product_id');
		$product_name = $this->input->post('product_name');
		$product_code = $this->input->post('product_code');
		$product_price = $this->input->post('product_price');
		$product_desc = $this->input->post('product_desc');
		$image_product1 = $this->input->post('image_product1');
		$image_product2 = $this->input->post('image_product2');
		$image_product3 = $this->input->post('image_product3');
		$discount = $this->input->post('discount');
		$startDateDiscount = $this->input->post('date_start');
		$lastDateDiscount = $this->input->post('date_end');
		$datePost = date('Y-m-d');

		$this->M_ProductDB->adminUpdateProduct($merk_id, $category_id, $subcategory_id, $product_id, $product_name, $product_code, $product_price,
			$product_desc, $image_product1, $image_product2, $image_product3, $discount, $startDateDiscount, $lastDateDiscount, $datePost);
	}

	public function  deleteProduct(){
		$product_id = $this->input->post('product_id');

		$this->M_ProductDB->adminDeleteProduct($product_id);
	}

	public function getMerkCategory(){
		$str ='';
		$arr = $this->M_ProductDB->adminGetMerkAndCategory();
		foreach ($arr["merk"] as $row) {
			$str .= '%'.$row->merk_name.';'.$row->merk_id;
		}
		$str .= "##";
		foreach ($arr["category"] as $row) {
			$str .= $row->category_name.';'.$row->category_id.'%';
		}

		echo $str;
	}

	public function addTypeProduct()
	{
		$product_id = $this->input->post('product_id');
		$type_name = $this->input->post('type_name');
		$quota = $this->input->post('quota');
		$description = $this->input->post('description');

		echo ($this->M_ProductDB->adminAddNewTypeProduct($product_id, $type_name, $quota, $description))[0]->type_id;
	}

	public function getTypeProduct(){
		$str ='';
		$arr = $this->M_ProductDB->adminGetTypeProduct();
		foreach ($arr as $row) {
			$str.=$row->product_id.";".$row->product_name.";".$row->type_id.';'.$row->product_type.';'.$row->quota.';'.$row->description_type.'%';
		}
		echo $str;
	}

	public function getProductList(){
		$str ='';
		$arr = $this->M_ProductDB->adminGetProduct();
		foreach ($arr as $row) {
			$str.=$row->product_id.'##'.$row->product_name.'%%';
		}
		echo $str;
	}

	public function editTypeProduct()
	{
		$product_id = $this->input->post('product_id');
		$type_id = $this->input->post('type_id');
		$type_name = $this->input->post('type_name');
		$quota = $this->input->post('quota');
		$description = $this->input->post('description');

		$this->M_ProductDB->adminUpdateTypeProduct($product_id, $type_id, $type_name, $quota, $description);
	}

	public function  deleteTypeProduct(){
		$product_id = $this->input->post('product_id');
		$type_id = $this->input->post('type_id');

		$this->M_ProductDB->adminDeleteTypeProduct($product_id, $type_id);
	}


	public function getOrderList(){
    	$arr = $this->M_OrderDB->adminGetOrderList();
    	$str = '';
		foreach ($arr as $row) {
			$str.=$row->order_id.'##'.($row->first_name." ".$row->last_name).'##'.$row->order_address.'##'.$row->phoneNumber.'##'.$row->email.'##'.
				$row->accountType.'##'.($row->institutionName == "" ? "-" : $row->institutionName).'##'.($row->institutionAddress == "" ? "-" : $row->institutionAddress).'##'.($row->npwp == "" ? "-" : $row->npwp).'##'.
				$row->dateOrder.'##'.$row->totalPrice.'##'.($row->proofOfPayment == "" ? " " : $row->proofOfPayment).'##'.$row->confirmation.'%%';
		}
		echo $str;
	}

	public function  verifyOrder(){
		$order_id = $this->input->post('order_id');
		$email = $this->input->post('email');

		$this->M_OrderDB->adminVerifyOrder($order_id, $email);
	}

	public function  unverifyOrder(){
		$order_id = $this->input->post('order_id');
		$email = $this->input->post('email');

		$this->M_OrderDB->adminUnVerifyOrder($order_id, $email);
	}

	public function getOrderItemsList(){
		$order_id = $this->input->post('order_id');
		$arr = $this->M_OrderDB->adminGetOrderItemsList($order_id);
		$str = '';
		foreach ($arr as $row) {
			$str.=$row->merk_name.'##'.$row->category_name.'##'.$row->subcategory_name.'##'.$row->product_name.'##'.$row->product_code.'##'.$row->product_type.'##'. $row->quantity.'%%';
		}
		echo $str;
	}
}


