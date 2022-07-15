<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Insurance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->library('form_validation');

        $this->load->model('admin/Beneficiary_model', 'Beneficiary_model');
    }

    function insurance_list()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

            redirect('/login');
        }

        $data = NULL;

        $this->form_validation->set_rules('insured_name', 'insured_name', 'required');

        $data['errors'] = array();

        if ($this->form_validation->run() == FALSE) {

            $this->load->model('Beneficiary_model');

            $data["insurance"] = $this->Beneficiary_model->getInsurancesdata('tbl_beneficiary');

            $this->load->view('admin/insurance/insurance_list', $data);
        } else {
            $this->load->view('admin/insurance/insurance_list');
        }
    }
}
