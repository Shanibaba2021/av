<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public $v_fields = array('userId','fname','lname','mobile','email', 'createdDtm');

    function addNew($adminInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $adminInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
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

    function getList($table, $pagination = array())
    {


        //  PAGINATION START

        if ((isset($pagination['cur_page'])) and !empty($pagination['per_page'])) {

            $this->db->limit($pagination['per_page'], $pagination['cur_page']);
        }

        //  PAGINATION END



        // sort

        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields) ? $_GET['sortBy'] : '';

        $order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';


        if ($order_by != '') {

            $this->db->order_by($order_by, $order);
        }


        if (isset($_GET['submit'])) {

            $data_range = $this->input->get('daterange');

            $to = date('Y-m-d', strtotime(substr($data_range, 0, 10)));
            $from = date('Y-m-d', strtotime(substr($data_range, 13, 10)));

            $this->db->from($table);

            $this->db->where("createdDtm BETWEEN '$to' AND '$from'");
            $this->db->order_by("id", "desc");

            $query = $this->db->get();


            return $result = $query->result();
        }

        if (!empty($_GET['searchValue']) && $_GET['searchValue'] != "" && !empty($_GET['searchBy']) && $_GET['searchBy'] != "" && in_array($_GET['searchBy'], $this->v_fields)) {

            $this->db->like($_GET['searchBy'], $_GET['searchValue']);
        }



        $this->db->select("*");

        $this->db->where("roleId",1);

        $this->db->from($table);


        $query = $this->db->get();


        return $result = $query->result();
    }

    function getRows($table, $userId)
    {

        $this->db->select('*');

        $query = $this->db->get_where($table, array('userId' => $userId));

        $data = $query->result();
        if(count($data) > 0)
        {
            return $data[0];
        }
        else{
            return null;
        }

    }

    function getRow($table, $userId)
    {
        $this->db->select('*');

        $query = $this->db->get_where($table, array('userId' => $userId));

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

        $this->db->where("userId", $bId);

        $this->db->update($table, $data);

        return true;
    }


}
