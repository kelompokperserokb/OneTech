<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->helper('url');
        $this->homepage();
	}

    public function homepage(){
        $data["merk"] = $this->getMerk();
        $data["product"] = $this->getTypeProducts();
        $this->load->view('header',$data["merk"]);
        $this->load->view('index',$data);
        $this->load->view('footer');
    }

    public function getTypeProducts(){
        $this->load->model("M_ProductDB");
        $datas['data'] = $this->M_ProductDB->getProducts();
        return $datas;
    }

    public function getMerk(){
        $this->load->model("M_ProductDB");
        $datas['data'] = $this->M_ProductDB->getMerk();
        return $datas;
    }
}
