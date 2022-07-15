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
}