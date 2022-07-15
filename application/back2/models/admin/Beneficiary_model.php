<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Beneficiary_model extends CI_Model

{


    public $v_fields = array('bId ', 'createdDtm', 'fname', 'lname', 'gender', 'dob', 'branch', 'mobile', 'father_husband_name', 'caste', 'pincode', 'current_address', 'qualification', 'f_m_income_daily_income', 'number_earning_family_member', 'numbers_children', 'son', 'daughter', 'monthly_income', 'own_house', 'type_work', 'security_equipment', 'aadhar_number', 'pan_number', 'insurance', 'insured_name', 'nominee_name', 'relation_with_insured', 'email_Id',    'lan_number', 'date_from_policy', 'politically_exposed', 'safety_kit', 'image', 'lat', 'longg', 'signature');

    function getList($table, $pagination = array())
    {

        $this->db->select("*,CONCAT(tbl_users.fname,' ',tbl_users.lname) as fieldworker");

        $this->db->select("$table.*  ,tbl_branches.branchId as bname , tbl_beneficiary.branch as branch");
        $this->db->select("$table.*  ,tbl_gender.id as gender , tbl_beneficiary.gender as gender");

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_beneficiary.branch", "left");
        $this->db->join("tbl_gender", "tbl_gender.id = tbl_beneficiary.gender", "left");
        $this->db->join("tbl_yes", "tbl_yes.id = tbl_beneficiary.insurance", "left");
        $this->db->join("tbl_house", "tbl_house.id = tbl_beneficiary.own_house", "left");
        $this->db->join("tbl_work", "tbl_work.id = tbl_beneficiary.type_work", "left");
        $this->db->join("tbl_secheck", "tbl_secheck.id = tbl_beneficiary.security_equipment", "left");
        $this->db->join("tbl_expose", "tbl_expose.id = tbl_beneficiary.politically_exposed", "left");
        $this->db->join("tbl_users", "tbl_users.userId = tbl_beneficiary.fid", "left");

        $this->db->select("$table.* ,tbl_branches.bname  as branch,tbl_gender.gender as gender,tbl_yes.status  as insurance,tbl_house.house_status as own_house,tbl_work.work_name as type_work,tbl_secheck.status as security_equipment,tbl_expose.status as politically_exposed");

        $this->db->from($table);

        $this->db->where("tbl_beneficiary.status !=", 0);
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

        $this->db->select('* ,tbl_funcation.funcation_name as funcation_name,tbl_branches.branchId as branchId,married_status.status as married,tbl_typeinsurance.insurance as insurancess,tbl_session.name as training,tbl_typeinsurance.insurance as otherinsurance ');


        $this->db->select("$table.*  ,tbl_branches.branchId as bname , tbl_beneficiary.branch as branch");
        $this->db->select("$table.*  ,tbl_gender.id as gender , tbl_beneficiary.gender as gender");

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_beneficiary.branch", "left");
        $this->db->join("tbl_gender", "tbl_gender.id = tbl_beneficiary.gender", "left");
        $this->db->join("tbl_yes", "tbl_yes.id = tbl_beneficiary.insurance", "left");
        $this->db->join("tbl_house", "tbl_house.id = tbl_beneficiary.own_house", "left");
        $this->db->join("tbl_work", "tbl_work.id = tbl_beneficiary.type_work", "left");
        $this->db->join("tbl_secheck", "tbl_secheck.id = tbl_beneficiary.security_equipment", "left");
        $this->db->join("tbl_typeinsurance", "tbl_typeinsurance.id = tbl_beneficiary.insurance", "left");
        $this->db->join("tbl_expose", "tbl_expose.id = tbl_beneficiary.politically_exposed", "left");
        $this->db->join("married_status", "married_status.id = tbl_beneficiary.married_status", "left");
        $this->db->join("other_insurance", "other_insurance.id = tbl_beneficiary.other_insurance", "left");
        $this->db->join("tbl_funcation", "tbl_funcation.id = tbl_beneficiary.fun_id", "left");
        $this->db->join("tbl_session", "tbl_session.id = tbl_beneficiary.training_id", "left");

        $this->db->select("$table.* ,tbl_branches.bname  as branch,tbl_gender.gender as gender,tbl_yes.status  as insurance,tbl_house.house_status as own_house,tbl_work.work_name as type_work,tbl_secheck.status as security_equipment,tbl_expose.status as politically_exposed");


        $query = $this->db->get_where($table, array('tbl_beneficiary.bId' => $bId));

        $data = $query->result();
        if (count($data) > 0) {
            return $data[0];
        } else {
            return null;
        }
    }

    public function getfuncation($data,$tablename,$where)
	{
		$query = $this->db->select($data)
						->from($tablename)
						->where($where)
						->get();
		return $query->result_array();
	}


    function getListTable($table)
    {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getListfunation($table,$function)
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->where('branch', $function);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function updateData($table, $data, $bId)
    {

        $this->db->where("bId", $bId);

        $this->db->update($table, $data);
    }

    function updateinsurance($table, $data, $bId)
    {

        $this->db->where("insurance_id", $bId);

        $this->db->update($table, $data);
        return true;
    }

    function getRow($table, $id)
    {

        $this->db->select('*,own_house as house');

        $this->db->select("$table.*  ,tbl_branches.branchId as bname , tbl_beneficiary.branch as branch");
        $this->db->select("$table.*  ,tbl_gender.id as gender , tbl_beneficiary.gender as gender");

        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_beneficiary.branch", "left");
        $this->db->join("tbl_gender", "tbl_gender.id = tbl_beneficiary.gender", "left");
        $this->db->join("tbl_house", "tbl_house.id = tbl_beneficiary.own_house", "left");
        $this->db->join("tbl_work", "tbl_work.id = tbl_beneficiary.type_work", "left");
        $this->db->join("tbl_secheck", "tbl_secheck.id = tbl_beneficiary.security_equipment", "left");

        $this->db->select("$table.* ,tbl_branches.bname  as branch,tbl_gender.gender as gender,tbl_house.house_status as own_house,tbl_work.work_name as type_work,tbl_secheck.status as security_equipment,");

        $query = $this->db->get_where($table, array('bId' => $id));

        $data = $query->result();
        if (count($data) > 0) {
            return $data[0];
        } else {
            return null;
        }
    }

    function delete($table, $key = '', $value = '')
    {

        if (isset($key) && isset($value) && !empty($key) && !empty($value)) {

            $this->db->where($key, $value);
        }

        $this->db->delete($table);
    }


    function deletebeneficiary($bId, $beneficiaryInfo)
    {
        $this->db->where('bId', $bId);
        $this->db->update('tbl_beneficiary', $beneficiaryInfo);

        return $this->db->affected_rows();
    }

    function approvebeneficiary($bId, $beneficiaryInfo)
    {
        $this->db->where('bId', $bId);

        $this->db->update('tbl_beneficiary', $beneficiaryInfo);

        return $this->db->affected_rows();
        
        // if (empty($array)) {
            // $this->db->where('bId', $bId);

            // $this->db->update('tbl_beneficiary', $beneficiaryInfo);

            // return $this->db->affected_rows();
        // } else {

        //     $this->db->where('bId', $bId);

        //     $this->db->update('tbl_beneficiary', $beneficiaryInfo);

        //     $qun = 1;

        //     foreach ($array as  $value) {
        //         $this->db->set('assign_quantity', 'assign_quantity - ' . $qun, FALSE);
        //         $this->db->where("pname", $value);
        //         $this->db->where("bname", $beneficiaryInfo['branch']);
        //         $this->db->update('tbl_assign_item_branch');
        //         $kitarray[] = array("kit_id" => $value , "fid" => $beneficiaryInfo["fid"] ,"branchid" => $beneficiaryInfo["branch"] , "benefid" =>$bId);
        //     }

        //     // print_r($kitarray);
        //     // die();
        //     $this->db->insert_batch('table_kit_distributaion', $kitarray);

            // if ($this->db->trans_status() === FALSE) {
            //     $this->db->trans_rollback();
            //     return 0;
            // } else {
            //     $this->db->trans_commit();
            //     return 1;
            // }
        // }
    }

    function UpdateBeneficiary($bId, $beneficiaryInfo)
    {
        $this->db->where('bId', $bId);
        $this->db->update('tbl_beneficiary', $beneficiaryInfo);

        return $this->db->affected_rows();
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

    function getListInsurance($table, $bId)
    {
        $this->db->select("*,tbl_typeinsurance.insurance as insurance");

        $this->db->from($table);

        $this->db->join("tbl_typeinsurance", "tbl_typeinsurance.id = tbl_beneficiary.insurance", "left");

        $this->db->limit(3);

        $this->db->order_by("bId", "desc");

        $this->db->where('bId', $bId);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getInsurances($table, $bId)
    {
        $this->db->select("*,tbl_typeinsurance.insurance as insurance");

        $this->db->from($table);

        $this->db->join("tbl_typeinsurance", "tbl_typeinsurance.id = tbl_applyinsurance.insurance", "left");
        $this->db->join("tbl_yes", "tbl_yes.id = tbl_applyinsurance.politically_exposed", "left");

        $this->db->limit(3);

        $this->db->order_by("insurance_id", "desc");

        $this->db->where('bId', $bId);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getSafetykit($table, $bId)
    {

        $this->db->select(" safety_kit  ");

        $this->db->from($table);

        $this->db->where('bId', $bId);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function get_kit_name($id)
    {
        $this->db->select("pname");
        $this->db->from("tbl_product");
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $result = $query->result();
    }
}
