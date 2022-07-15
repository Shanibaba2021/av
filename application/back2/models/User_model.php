<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function userListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isDeleted', 0);
        // $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();

        return $query->num_rows();
    }

    function branchListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.branchId, BaseTbl.bcode, BaseTbl.bname, BaseTbl.address,BaseTbl.district,BaseTbl.state, BaseTbl.zipcode,BaseTbl.createdDtm, Role.role');
        $this->db->from('tbl_branches as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.bcode  LIKE '%".$searchText."%'
                            OR  BaseTbl.bname  LIKE '%".$searchText."%'
                            OR  BaseTbl.address  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isDeleted', 0);
        // $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function userListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.brname, BaseTbl.name,BaseTbl.image,BaseTbl.fname,BaseTbl.lname,BaseTbl.isDeleted, BaseTbl.mobile, BaseTbl.createdDtm, Role.role,tbl_branches.bname as brname,');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        $this->db->join('tbl_branches', 'tbl_branches.branchId = BaseTbl.brname','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId', 3);
        $this->db->order_by('BaseTbl.userId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    function stocks($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.item_name,BaseTbl.id, BaseTbl.current_quantity,BaseTbl.createdDtm,');
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

    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getUserRoles()
    {
        $this->db->select('*');
        $this->db->from('tbl_branches');
        $query = $this->db->get();

        return $query->result();
    }

    function getbranches()
    {
        $this->db->select('*');
        $this->db->from('tbl_branches');
        $query = $this->db->get();

        return $query->result();
    }

    function getstate()
    {
        $this->db->select('*');
        $this->db->from('state');
        $query = $this->db->get();

        return $query->result();
    }

    function getdistrict($stcode = '')
    {
        $this->db->select('*');
        $this->db->from('district');
        if($stcode != '')
        {
            $this->db->where('StCode', $stcode);
        }
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    function addNewBranch($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_branches', $userInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('userId,name,fname,lname,brname, email,image, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->row();
    }
    function getBranchesInfo($branchId)
    {
        $this->db->select('branchId,bname,address, district,state, zipcode,zipcode,createdDtm,tbl_branches.state as StCode, tbl_branches.district as DistCode ');
        $this->db->from('tbl_branches');

        $this->db->join("state", "tbl_branches.state = state.StCode", "left");
        $this->db->join("district", "tbl_branches.district = district.DistCode", "left");

        $this->db->select("StateName  as state, DistrictName  as district, ");

        $this->db->where('branchId', $branchId);

        $query = $this->db->get();

        return $query->row();
    }

    function getUserInfosingle($userId)
    {
        $this->db->select('userId,CONCAT(tbl_users.fname," ",tbl_users.lname) as  fullname,name,tbl_branches.bname as branch, fname,lname,image, email,isDeleted,tbl_users.createdDtm, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->join("tbl_branches", "tbl_branches.branchId = tbl_users.brname", "left");
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        $data = $query->result();
        return $data[0];
        return $query->row();
    }

    function getListTable($table,$userId)
    {

        $this->db->select("COUNT(bId) as bId");

        $this->db->from($table);

        $this->db->where('fid', $userId);

        $this->db->where('status !=', 0);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getbeneficiaryTable($table,$userId)
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->order_by("bId", "desc");

        $this->db->where('fid', $userId);

        $this->db->where('status !=', 0);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getinsurances($table,$userId)
    {

        $this->db->select("*");

        $this->db->from($table);

        $this->db->order_by("bId", "desc");

       $this->db->where('insurance', 1);

        $this->db->where('fid', $userId);

        $query = $this->db->get();

        return $result = $query->result();
    }


    function getInsurance($table,$userId)
    {

        $this->db->select("COUNT(insurance) as insurance");

        $this->db->from($table);

        $this->db->where('insurance', 1);
        $this->db->where('fid', $userId);

        $query = $this->db->get();

        return $result = $query->result();
    }

    function getClaim($table,$userId)
    {

        $this->db->select("COUNT(id) as claim_id");

        $this->db->from($table);

        $this->db->where('fid', $userId);

        $query = $this->db->get();

        return $result = $query->result();
    }


    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($saveData, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $saveData);

        return TRUE;
    }

    function editBranch($saveData, $userId)
    {
        $this->db->where('branchId', $userId);

        $this->db->update('tbl_branches', $saveData);

        return TRUE;
    }



    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }


    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');

        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }


    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     */
    function loginHistoryCount($userId, $searchText, $fromDate, $toDate)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->from('tbl_last_login as BaseTbl');
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('tbl_last_login as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfoById($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $query = $this->db->get();

        return $query->row();
    }

    /**
     * This function used to get user information by id with role
     * @param number $userId : This is user id
     * @return aray $result : This is user information
     */
    function getUserInfoWithRole($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.fname, BaseTbl.lname, BaseTbl.image, BaseTbl.name, BaseTbl.mobile, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.userId', $userId);
        // $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();

        return $query->row();
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
    }

    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function approveUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }

    function AssignBranch($userInfo,$id)
    {
        $this->db->trans_start();

        $this->db->where('fid', $id);
        $this->db->delete('tbl_branchassign');

        $this->db->insert_batch('tbl_branchassign', $userInfo);

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
