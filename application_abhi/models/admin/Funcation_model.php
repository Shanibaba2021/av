<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Funcation_model extends CI_Model
{
    public $v_fields = array('id','funcation_name', 'branch','createdDtm');

    function addNew($funcationInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_funcation', $funcationInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

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

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_funcation.branch", "left");

        if (isset($key) && isset($value) && !empty($key) && !empty($value)) {

            $this->db->where($key, $value);
        }

        $this->db->from($table);

        $query = $this->db->get();

        return $query->num_rows();
    }

    function getList($table, $pagination = array())
    {
        $this->db->select("* ,tbl_branches.bname as branch");

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_funcation.branch", "left");
        
        $this->db->from($table);
        
        $query = $this->db->get();


        return $result = $query->result();
    }

    
    function getRows($table, $bId)
    {

        $this->db->select('*,tbl_branches.bname as branch');

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_funcation.branch", "left");

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

    
    public function uploadData(&$data, $file_name, $file_path, $postfix = '', $allowedTypes)
    {

        $config = NULL;

        $config['upload_path'] = $this->config->item($file_path);

        $config['allowed_types'] = $allowedTypes;

        if (isset($_FILES[$file_name]['name']) && !empty($_FILES[$file_name]['name'])) {

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            $exts = explode(".", $_FILES[$file_name]['name']);

            $_FILES[$file_name]['name'] = $exts[0] . $postfix . "." . end($exts);

            if (!$this->upload->do_upload($file_name)) {

                $data[$file_name . '_err'] = array('error' => $this->upload->display_errors());
            } else {

                $uploadImg = $this->upload->data();

                if ($uploadImg['file_name'] != '') {

                    if (isset($_POST['old_' . $file_name]) && !empty($_POST['old_' . $file_name])) {

                        @unlink($this->config->item($file_path) . $_POST['old_' . $file_name]);
                    }

                    $data[$file_name] = $uploadImg['file_name'];
                }
            }
        } elseif (isset($_POST['old_' . $file_name]) && !empty($_POST['old_' . $file_name])) {

            $data[$file_name] = $_POST['old_' . $file_name];
        }
    }

    function getRow($table, $id)
    {

        // $this->db->select('*');

        $this->db->select('*,tbl_branches.bname as branch');

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_funcation.branch", "left");

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

    function delete($table, $key = '', $value = '')
    {
        if (isset($key) && isset($value) && !empty($key) && !empty($value)) {

            $this->db->where($key, $value);
        }
        $this->db->delete($table);
    }

}