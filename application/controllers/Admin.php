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
}