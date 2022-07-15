<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->model('Dashboard_model','Dashboard_model');

        $this->load->library('form_validation');
    }

    public function dashboard ()
    {

        $data["branchs"] = $this->Dashboard_model->getListbranchescoderd("tbl_beneficiary");
        $data["user"] = $this->Dashboard_model->getListUser("tbl_users");
        $data["beneficiary"] = $this->Dashboard_model->getListbeneficiary("tbl_beneficiary");
        $data["kit"] = $this->Dashboard_model->getListTable("tbl_product");
        $data["session"] = $this->Dashboard_model->getSession("tbl_beneficiary");
        $data["insurance"] = $this->Dashboard_model->getInsurances("tbl_beneficiary");
        // print_r($data["insurance"]);
        // die();
        $data["results"] = $result = $this->Dashboard_model->getRow("tbl_beneficiary");
        $this->load->view('dashboard',$data);
    }

    public function branchcover()
    {
      $data["results"] = $result = $this->Dashboard_model->branchcover("tbl_beneficiary");
      $this->load->view('branchcover',$data);
    }

}
