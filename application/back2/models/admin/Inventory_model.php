<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Inventory_model extends CI_Model
{


    public $v_fields = array('id','pname','item_name','pid','qun','bid','action','current_quantity','bname','assign_quantity','quantity', 'branch', 'createdDtm');

    function addNewstocks($productInfo,$purchase)
    {
        $this->db->trans_begin();

        $this->db->insert('tbl_product', $productInfo);                
        $insert_id = $this->db->insert_id();

        $data = array("pid" => $insert_id, "action" => "0", "qun" => $productInfo['current_quantity'], "bid" => "0" ,"purchase_date" =>$purchase['purchase_date'],"remark" =>$purchase['remark'] );
        $this->db->insert('tbl_product_history', $data);


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

    function assignitembranch($branchInfo)
    {
        $this->db->select('pname');
        $this->db->where('pname', $branchInfo['pname']);
        $this->db->where('bname', $branchInfo['bname']);
        $query = $this->db->get('tbl_assign_item_branch');


        if ($query->num_rows() > 0){
 
            $qun = $branchInfo['assign_quantity'];
 

            $this->db->set('assign_quantity', 'assign_quantity + '.$qun, FALSE);

          

            $this->db->where("bname", $branchInfo['bname']);
            $this->db->where("pname", $branchInfo['pname']);

          

            $this->db->update('tbl_assign_item_branch');
        
        } else {

            $this->db->trans_start();
            $this->db->insert('tbl_assign_item_branch', $branchInfo);

            $insert_id = $this->db->insert_id();
            
            $this->db->trans_complete();
            return $insert_id;
        }

        
        
    }

    function product_history($product)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_product_history', $product);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function userListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.item_name, BaseTbl.current_quantity, BaseTbl.createdDtm');
        $this->db->from('tbl_inventory as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    function userListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.item_name, BaseTbl.current_quantity,BaseTbl.createdDtm,');
        $this->db->from('tbl_inventory as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        
        
        $result = $query->result();        
        return $result;
    }

    function editstock($saveData, $userId)
    {
        $this->db->where('id', $userId);
        $this->db->update('tbl_inventory', $saveData);
        
        return TRUE;
    }

    function getBranchesInfo($id) 
    {
        $this->db->select('id,item_name,current_quantity,createdDtm');
        $this->db->from('tbl_inventory');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->row();
    }

    function getUserRoles()
    {
        $this->db->select('*');
        $this->db->from('tbl_inventory');
        $query = $this->db->get();
        
        return $query->result();
        
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


    function getListTable($table)
    {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }


    function updatestock($table, $data, $id)
    {
        $this->db->where("id", $id);

        $this->db->update($table, $data);

        return true;

    }


    
    function updateData($table, $data, $id,$more_quantity,$purchase)
    {
        $this->db->where("id", $id);

        $this->db->update($table, $data);

        $data = array("pid" => $data['id'], "action" => "0", "qun" => $more_quantity, "bid" => "0","purchase_date" =>$purchase['purchase_date'],"remark" =>$purchase['remark'] );
        $this->db->insert('tbl_product_history', $data);

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

    function updateproduct($table, $data, $id,$assign_quantity)
    {
        $this->db->where("id", $id);

        $this->db->update($table, $data);

        $data = array("pid" => $id, "action" => "2", "qun" => $assign_quantity, "bid" => "0" );
        $this->db->insert('tbl_product_history', $data);

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

    function getList($table)
    {
        $this->db->select("*");


        $this->db->from($table);


        $query = $this->db->get();


        return $result = $query->result();
    }

    function getinventory($table, $pagination = array())
    {

        $this->db->select("$table.*  ,tbl_product.pname as pid   , tbl_product_history.pid as pid");
        $this->db->select("$table.*  ,tbl_branches.bname as bid   , tbl_product_history.bid as bid");

        $this->db->from($table);

        $this->db->join("tbl_product", "tbl_product_history.pid = tbl_product.id", "left");
        $this->db->join("tbl_branches", "tbl_product_history.bid = tbl_branches.branchId", "left");

        $this->db->select("$table.* ,pname as pid,bname as bid");

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

    function getRows($table, $id)
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

    function getBranchList($table)
    {

        $this->db->select("$table.*  , state.StateName as StCode, tbl_branches.state as state,StateName  as state ,DistrictName as district,district.DistrictName as DistCode, tbl_branches.district as district");
        $this->db->select("$table.*   ");

        $this->db->from($table);

        $this->db->join("state", "tbl_branches.state = state.StCode", "left");
        $this->db->join("district", "tbl_branches.district = district.DistCode", "left");

        $this->db->select("$table.* ");

        $query = $this->db->get();


        return $result = $query->result();
    }


    function getListbranchstock($table,$branchId)
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->where('branchId', $branchId);
    
        $query = $this->db->get();


        return $result = $query->result();
    }

    
    function getListTableByCol($table,$col,$colval)
    {

        $this->db->select("*,tbl_product.current_quantity as total_stock");

        $this->db->from($table);

        $this->db->join("tbl_product", "tbl_product.id = tbl_assign_item_branch.pname", "left");

        $this->db->where("$col",$colval);

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    

}