<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    function getListbranches($table)
    {

        $this->db->select("COUNT(branchId) as ids");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }


    function getListbranchescoderd($table)
    {

        $this->db->select("COUNT(DISTINCT(branch)) as ids");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getListUser($table)
    {

        $this->db->select("COUNT(userId) as id");

        $this->db->from($table);

        $this->db->where('roleId ',3);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getListbeneficiary($table)
    {

        $this->db->select("COUNT(bId) as bId");

        $this->db->from($table);

        $this->db->where('status !=',0);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getListTable($table)
    {

        $this->db->select("SUM(current_quantity) as kit");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getRow($table)
    {
        $this->db->select("*");

        $this->db->from($table);

        $this->db->limit(5);
        $this->db->order_by("bId", "desc");

        $this->db->where('status !=',0);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function branchcover($table)
    {
        $this->db->select("*");
        // $this->db->distinct("branch");
        $this->db->from($table);
        $this->db->join('tbl_branches','tbl_branches.branchId = tbl_beneficiary.branch');
        $this->db->group_by("branch");
        // $this->db->where('tbl_beneficiary.');
        $query = $this->db->get();

        return $result = $query->result();
    }

    function getSession($table)
    {

        $this->db->select("COUNT(DISTINCT(training_id)) as training_session");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getInsurances($table)
    {

        $this->db->select("COUNT(insurance) as total_insurance");

        $this->db->from($table);

        $this->db->where('insurance !=', 0);
        
        $query = $this->db->get();

        return $result = $query->result();
    }

    function getCount($table, $key = '', $value = '')
    {

        $this->db->select("$table.*");

        if (isset($key) && isset($value) && !empty($key) && !empty($value)) {

            $this->db->where($key, $value);
        }

        $this->db->from($table);


        $query = $this->db->get();

        return $query->num_rows();
    }

    function delete($table, $key = '', $value = '')
    {

        if (isset($key) && isset($value) && !empty($key) && !empty($value)) {

            $this->db->where($key, $value);
        }

        $this->db->delete($table);
        return $this->db->affected_rows();
    }
}
