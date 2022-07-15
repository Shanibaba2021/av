<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class TSession_model extends CI_Model
{
    
    public $v_fields = array('id','name','fid','loan_id', 'createdDtm');
    function addNew($sesionInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_session', $sesionInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function getListTable($table)
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->where('roleId', 3);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getListBranch($table)
    {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }

    
    function getList($table)
    {

        $this->db->select("*,tbl_session.name as name,CONCAT(tbl_users.fname,' ',tbl_users.lname) as fieldworker,tbl_branches.bname as bname");

        $this->db->from($table);

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_session.bid", "left");
        $this->db->join("tbl_users", "tbl_users.userId = tbl_session.fid", "left");

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

    function getRows($table, $bId)
    {

        $this->db->select("*,tbl_session.name as name,CONCAT(tbl_users.fname,' ',tbl_users.lname) as fieldworker,tbl_branches.bname as bname");

        $this->db->join("tbl_users", "tbl_users.userId = tbl_session.fid", "left");
        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_session.bid", "left");
        $query = $this->db->get_where($table, array('id' => $bId));

        $data = $query->result();
        if(count($data) > 0)
        {
            return $data[0];
        }
        else{
            return null;
        }
    }
    
    function getRow($table, $id)
    {

        $this->db->select('*');

        $query = $this->db->get_where($table, array('id' => $id));

        $data = $query->result();
        if(count($data) > 0)
        {
            return $data[0];
        }
        else{
            return null;
        }

    }
    function updateData($table, $data, $bId)
    {

        $this->db->where("id", $bId);

        $this->db->update($table, $data);
        
        return true ;
    }
}