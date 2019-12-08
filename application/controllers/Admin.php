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
        $this->load->helper('url');
    }

    public function upload(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $category = $this->input->post('category');
        $merk = $this->input->post('merk');
        $name_product = $this->input->post('name_product');
        $image_product1 = $this->input->post('image_product1');
        $image_product2 = $this->input->post('image_product2');
        $image_product3 = $this->input->post('image_product3');
        $code_product = $this->input->post('code_product');
        $price = $this->input->post('price');
        $discount = $this->input->post('discount');
        $startDateDiscount = $this->input->post('date_start');
        $lastDateDiscount = $this->input->post('date_end');
        $description = $this->input->post('desc_product');
        $datePost = date('Y-m-d');

        $this->M_ProductDB->adminAddNewProduct($category, $merk, $name_product, $image_product1, $image_product2, $image_product3, $code_product, $price, $discount, $startDateDiscount, $lastDateDiscount, $description, $datePost);
    }
}