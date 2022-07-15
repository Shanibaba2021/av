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
        
        $data["branchs"] = $this->Dashboard_model->getListbranches("tbl_branches");
        $data["user"] = $this->Dashboard_model->getListUser("tbl_users");
        $data["beneficiary"] = $this->Dashboard_model->getListbeneficiary("tbl_beneficiary");
        $data["kit"] = $this->Dashboard_model->getListTable("tbl_product");
        $data["results"] = $result = $this->Dashboard_model->getRow("tbl_beneficiary");
        $this->load->view('dashboard',$data);
    }

}