<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Branch_model extends CI_Model
{

    public $v_fields = array('branchId', 'bname', 'address','district','state','zipcode','createdDtm');

    function getListTable($table)
    {

        $this->db->select("*");

        $this->db->from($table);

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

    function getList($table)
    {

        $this->db->select("$table.*  , state.StateName as StCode, tbl_branches.state as state");
        $this->db->select("$table.*  , district.DistrictName as DistCode, tbl_branches.district as district ");

        $this->db->from($table);
        
        $this->db->join("state", "tbl_branches.state = state.StCode", "left");
        $this->db->join("district", "tbl_branches.district = district.DistCode", "left");

        $this->db->select("$table.* ,StateName  as state ,DistrictName as district");

        $query = $this->db->get();


        return $result = $query->result();
    }

    function getListforassignbarnch($table,$id)
    {

        $this->db->select("$table.*  ,tbl_branchassign.status as status");

        $this->db->from($table);
  
        $this->db->join("tbl_branchassign", "tbl_branchassign.bid = tbl_branches.branchId", "left");

        $this->db->order_by("branchId", "desc");


        $query = $this->db->get();

        return $result = $query->result();
    }


    function getListTableByCol($table,$col,$colval) 
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->join("tbl_product", "tbl_product.id = tbl_assign_item_branch.pname", "left");

        $this->db->where("$col",$colval);

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    public function getdistrict($data,$tablename,$where)
	{
		$query = $this->db->select($data)
						->from($tablename)
						->where($where)
						->get();
		return $query->result_array();
	}



    function getRow($table,$branchId)
    {
        $this->db->select("$table.*,tbl_product.pname as pname ,tbl_branches.bname as bname ");

        $this->db->join("tbl_product", "tbl_product.id = tbl_assign_item_branch.pname", "left");

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_assign_item_branch.bname", "left");

        $query = $this->db->get_where($table, array('tbl_assign_item_branch.bname' => $branchId));

        return $result = $query->result();
    }

    function beneficiary_branch($bid)
    {

        $this->db->select('*');

        $this->db->select("tbl_beneficiary.*  ,tbl_branches.branchId as bname , tbl_beneficiary.branch as branch");
        $this->db->select("tbl_beneficiary.*  ,tbl_gender.id as gender , tbl_beneficiary.gender as gender");

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_beneficiary.branch", "left");
        $this->db->join("tbl_gender", "tbl_gender.id = tbl_beneficiary.gender", "left");
        $this->db->join("tbl_yes", "tbl_yes.id = tbl_beneficiary.insurance", "left");
        $this->db->join("tbl_house", "tbl_house.id = tbl_beneficiary.own_house", "left");
        $this->db->join("tbl_work", "tbl_work.id = tbl_beneficiary.type_work", "left");
        $this->db->join("tbl_secheck", "tbl_secheck.id = tbl_beneficiary.security_equipment", "left");
        $this->db->join("tbl_expose", "tbl_expose.id = tbl_beneficiary.politically_exposed", "left");

        $this->db->select("tbl_beneficiary.* ,tbl_branches.bname  as branch,tbl_gender.gender as gender,tbl_yes.status  as insurance,tbl_house.house_status as own_house,tbl_work.work_name as type_work,tbl_secheck.status as security_equipment,tbl_expose.status as politically_exposed");

        $this->db->from("tbl_beneficiary");

        $this->db->where("tbl_beneficiary.branch", $bid);
         $this->db->where("tbl_beneficiary.status !=", 0);
        $query = $this->db->get();
		return $result = $query->result();
    }

    
    function stock_assign_history($bid)
    {

        $this->db->select("*,tbl_product.pname as pid ");

        $this->db->from('tbl_product_history');

        $this->db->join("tbl_product", "tbl_product_history.pid = tbl_product.id", "left");

        $this->db->join("tbl_branches", "tbl_product_history.bid = tbl_branches.branchId", "left");

        $this->db->where('bid', $bid);
        

        $query = $this->db->get();
        
        return $result = $query->result();
    }


}