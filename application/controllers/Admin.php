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
        $target_dir = "uploads/";
        $image_product1 = $target_dir . basename($_FILES["image-product1"]["name"]);
        $image_product2 = $target_dir . basename($_FILES["image-product2"]["name"]);
        $image_product3 = $target_dir . basename($_FILES["image-product3"]["name"]);
        $uploadOk = 1;
        $imageFileType1 = strtolower(pathinfo($image_product1, PATHINFO_EXTENSION));
        $imageFileType2 = strtolower(pathinfo($image_product2, PATHINFO_EXTENSION));
        $imageFileType3 = strtolower(pathinfo($image_product3, PATHINFO_EXTENSION));

// Check file size
        if ($_FILES["image-product1"]["size"] > 500000 && $_FILES["image-product2"]["size"] > 500000 && $_FILES["image-product3"]["size"] > 500000) {
            echo "Sorry, the file is too big";
            $uploadOk = 0;
        }

// Allow certain file formats
        if ($imageFileType1 != "jpeg" && $imageFileType2 != "jpeg" && $imageFileType3 != "jpeg") {
            echo "Sorry, only JPG or JPEG files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image-product1"]["tmp_name"], $image_product1) &&
                move_uploaded_file($_FILES["image-product2"]["tmp_name"], $image_product2) &&
                move_uploaded_file($_FILES["image-product3"]["tmp_name"], $image_product3)) {
                echo "The file has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}