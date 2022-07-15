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
        $data["results"] = $result = $this->Dashboard_model->getRow("tbl_beneficiary");
        $this->load->view('dashboard',$data);
    }

    public function branchcover()
    {
      $data["results"] = $result = $this->Dashboard_model->branchcover("tbl_beneficiary");
      $this->load->view('branchcover',$data);
    }

    function delete($bId ='')
	{

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}

		if (isset($bId) and !empty($bId)) {
			
			$this->load->model('Dashboard_model');
			$count = $this->Dashboard_model->getCount('tbl_beneficiary', 'tbl_beneficiary.bId', $bId);


			if (isset($count) and !empty($count)) {

				$this->Dashboard_model->delete('tbl_beneficiary', 'bId', $bId);

				$this->session->set_flashdata('message', 'Beneficiary Deleted Successfully !');

				redirect('dashboard');
			} else {
				$this->session->set_flashdata('message', ' Invalid Id !');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');
		}
	}

}
