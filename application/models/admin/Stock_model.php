<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Stock_model extends CI_Model
{
    public $v_fields = array('id','fwid','sid','quantity','bid', 'created');

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

    function getList($table, $pagination = array())
    {


      
        $this->db->select("*, CONCAT(tbl_users.fname,' ',tbl_users.lname) as  fwid, tbl_branches.bname as bid ,tbl_users.fname as fname,tbl_users.lname as lname ,  tbl_product.pname as sid, tbl_product.id as id, tbl_stockrequest.sid as product,");

        $this->db->from($table);

        $this->db->join("tbl_product", "tbl_product.id = tbl_stockrequest.sid", "left");
        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_stockrequest.bid", "left");
        $this->db->join("tbl_users", "tbl_users.userId = tbl_stockrequest.fwid", "left");

        $query = $this->db->get();


        return $result = $query->result();
    }

    function getproduct($table, $id)
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

    function getstockrequest($table, $id)
    {

        $this->db->select("*, CONCAT(tbl_users.fname,' ',tbl_users.lname) as  fwid, tbl_branches.bname as bname ,  tbl_product.pname as pname,tbl_product.id as id,");

    
        $this->db->join("tbl_product", "tbl_product.id = tbl_stockrequest.sid", "left");
        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_stockrequest.bid", "left");
        $this->db->join("tbl_users", "tbl_users.userId = tbl_stockrequest.fwid", "left");
        
        $query = $this->db->get_where($table, array('sid' => $id));

        $data = $query->result();
        if(count($data) > 0)
        {
            return $data[0];
        }
        else{
            return null;
        }

    }

    function getListTable($table,$id)
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->where('id', $id);
    
        $query = $this->db->get();

        return $result = $query->result();
    }


    function updatestock($table, $data,$pid, $id,$branchid,$productid,$allocate_quantity,$branchInfo)
    {
        $this->db->where("id", $pid);

        $this->db->update($table, $data);

        $stock =
        [
            'status' => '1'
        ];

        $this->db->where('sid', $id);
        
        $this->db->update('tbl_stockrequest', $stock);


        $this->db->select('pname');
        $this->db->where('pname', $productid);
        $this->db->where('bname', $branchid);
        $query = $this->db->get('tbl_assign_item_branch');


        if ($query->num_rows() > 0){
 
            $qun = $allocate_quantity;
 

            $this->db->set('assign_quantity', 'assign_quantity + '.$qun, FALSE);

          

            $this->db->where("bname", $branchid);
            $this->db->where("pname", $productid );

          

            $this->db->update('tbl_assign_item_branch');

        
        } else {

            $this->db->trans_start();
            $this->db->insert('tbl_assign_item_branch', $branchInfo);

            $insert_id = $this->db->insert_id();
            
            $this->db->trans_complete();
            return $insert_id;
        }

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return 0 ;
        }
        else
        {
                $this->db->trans_commit();
                return 1 ;
        }

    }

}