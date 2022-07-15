<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Report extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->model('admin/Report_model','Report_model');

        $this->load->library('form_validation');
    }

    function report($userId='')
    {
        
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

            redirect('/login');
        } 

        $data = NULL;

        $this->load->library('form_validation');

        $this->form_validation->set_rules('datepicker', 'datepicker', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['result'] = $this->Report_model->get_user('tbl_users',$userId);

            $this->load->view('admin/report/generate_report',$data);

        } else {

            redirect('user');
        }   
        
    }
    function get_report()
    {
        $fwid = $this->input->post('userId');
        // print_r($userId);
        // die();
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

            redirect('/login');
        }

        $data['errors'] = array();

        if (isset($fwid) and !empty($fwid)) {

			$data = NULL;

            $this->load->library('form_validation');

			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) {

                $this->load->model('Report_model');

                $result['user_details'] = $this->Report_model->get_user('tbl_users',$fwid);
                $result['get_beneficiary'] = $this->Report_model->get_beneficiary('tbl_beneficiary',$fwid);
                $result['get_branch'] = $this->Report_model->get_branch($fwid);
                $result['get_safety_kit'] = $this->Report_model->get_safety_kit('tbl_beneficiary',$fwid);
                $result['get_function'] = $this->Report_model->get_funcation($fwid);

				$this->load->view('admin/report/get_report',$result);

			} else {

				redirect('user');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('user');
		}
        

    }


    

}