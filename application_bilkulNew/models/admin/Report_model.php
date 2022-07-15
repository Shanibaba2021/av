<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model
{

    function get_user($table, $userId)
    {

        $this->db->select("fname,lname,userId");


        $this->db->from($table);

        $this->db->where('userId', $userId);

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    public function get_beneficiary($table,$userId)
    {

        $data_range = $this->input->post('datepicker');


        $query = $this->db->query("SELECT COUNT(bId) as total_beneficiary,createdDtm  FROM `$table` WHERE `createdDtm` LIKE '%$data_range%' AND fid = $userId");

        $result = $query->result();

        return $result;
    }

    public function get_branch($userId)
    {
        $data_range = $this->input->post('datepicker');



        $query = $this->db->query("SELECT count(DISTINCT(branch)) as total_branch FROM `tbl_beneficiary` WHERE `createdDtm` LIKE '%$data_range%' AND fid = $userId") ;

        $result = $query->result();
        return $result;
    }

    public function get_safety_kit($table,$userId)
    {
        $data_range = $this->input->post('datepicker');


        $query = $this->db->query("SELECT COUNT(safety_kit) as safety_kit FROM `$table` WHERE `createdDtm` LIKE '%$data_range%' AND fid = $userId") ;

        $result = $query->result();
        return $result;
    }

    public function get_funcation($userId)
    {
        $data_range = $this->input->post('datepicker');

        $query = $this->db->query("SELECT count(DISTINCT(training_id)) as total_function FROM `tbl_beneficiary` WHERE `createdDtm` LIKE '%$data_range%' AND fid = $userId") ;


        $result = $query->result();
        return $result;

    }


}
