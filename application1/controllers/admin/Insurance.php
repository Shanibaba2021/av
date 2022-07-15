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

    function insurance_update($insurance_id = '')
    {

        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

            redirect('/login');
        }

        $bId = $this->input->post('bId');

        if (isset($insurance_id) and !empty($insurance_id)) {

            $data = NULL;

            $this->form_validation->set_rules('date_from_policy', 'date_from_policy', 'required');

            $data['errors'] = array();

            if ($this->form_validation->run() == FALSE) {

                $this->load->model('Beneficiary_model');

                $data["branchs"] = $this->Beneficiary_model->getListTable("tbl_branches");

                $data["gender"] = $this->Beneficiary_model->getListTable("tbl_gender");

                $data["cropcycles"] = $this->Beneficiary_model->getListTable("tbl_beneficiary");

                $data["yes"] = $this->Beneficiary_model->getListTable("tbl_yes");

                $data["expose"] = $this->Beneficiary_model->getListTable("tbl_expose");

                $data["check"] = $this->Beneficiary_model->getListTable("tbl_secheck");

                $data["house"] = $this->Beneficiary_model->getListTable("tbl_house");

                $data["work"] = $this->Beneficiary_model->getListTable("tbl_work");

                $data['safety_kit'] = $this->Beneficiary_model->getSafetykit('tbl_beneficiary', $bId);

                $data["insurance"] = $this->Beneficiary_model->getInsurances('tbl_applyinsurance', $bId);

                $data['beneficiary'] = $this->Beneficiary_model->getRow('tbl_beneficiary', $bId);

                $this->load->view('admin/beneficiary/edit', $data);
            } else {

                $insuranceData['insured_name'] = set_value('insured_name');
                $insuranceData['nominee_name'] = set_value('nominee_name');
                $insuranceData['lan_number'] = set_value('lan_number');
                $insuranceData['date_from_policy'] = set_value('date_from_policy');
                $insuranceData['email_Id'] = set_value('email_Id');
                $insuranceData['relation_with_insured'] = set_value('relation_with_insured');
                $politically_exposed = $this->input->post('politically_exposed');
                $insuranceData['politically_exposed'] = $politically_exposed;

                $this->load->model('Beneficiary_model');
                $this->Beneficiary_model->updateinsurance('tbl_applyinsurance', $insuranceData, $insurance_id);

                $this->session->set_flashdata('message', 'Insurance Updated Successfully!');

                $url = $_SERVER['HTTP_REFERER'] ;
                header("Location: $url");


            }
        } else {

            $this->session->set_flashdata('message', ' Invalid Id !');

            redirect('/beneficiary');
        }
    }
}
