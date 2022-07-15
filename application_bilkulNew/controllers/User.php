<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Dashboard';

        $this->loadViews("dashboard", $this->global, NULL, NULL);
    }

    /**
     * This function is used to load the user list
     */
    function userListing()
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->user_model->userListingCount($searchText);

            $returns = $this->paginationCompress("userListing/", $count, 10);

            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'User Listing';

            $this->load->view("users",  $data);
        }
    }

    function liststock()
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->user_model->userListingCount($searchText);

            $returns = $this->paginationCompress("userListing/", $count, 10);

             $data['userRecords'] = $this->user_model->stocks($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'List Stock';

            $this->loadViews("liststocks", $this->global, $data, NULL);
        }
    }

   

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $this->load->model('user_model');

            $data['plants'] = $this->user_model->getUserRoles();

            $this->global['pageTitle'] = 'CodeInsect : Add New User';

            $this->load->view("addNew",  $data);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if (empty($userId)) {
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if (empty($result)) {
            echo ("true");
        } else {
            echo ("false");
        }
    }

    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fname', 'First Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|is_unique[tbl_users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|is_unique[tbl_users.mobile]');
            $this->form_validation->set_rules("image", "Image", "trim|xss_clean");

            $this->user_model->uploadData($photo_data, "image", "photo_path", "", "gif|jpg|png|jpeg");

            if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

                $data["errors"] = $photo_data["photo_err"];

                $this->form_validation->set_rules("image", "Image", "trim");
            }


            $data['errors'] = array();

            if ($this->form_validation->run() == FALSE) {

                $this->load->model('user_model');

                
                $this->load->view("addNew");

            } else {
               
                $saveData['fname'] = ucwords(strtolower($this->security->xss_clean(set_value('fname'))));
                $saveData['lname'] = ucwords(strtolower($this->security->xss_clean(set_value('lname'))));
                $saveData['email'] = ucwords(strtolower($this->security->xss_clean(set_value('email'))));
                $saveData['roleId'] = 3;
                $saveData['mobile'] =ucwords(strtolower($this->security->xss_clean(set_value('mobile'))));
                $saveData['password'] = getHashedPassword(set_value('password'));
                $saveData['createdDtm'] = date('Y-m-d H:i:s');
                if (isset($photo_data["image"]) && !empty($photo_data["image"])) {

                    $saveData["image"] = $photo_data["image"];
                }


                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($saveData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New User created successfully');
                } else {
                    $this->session->set_flashdata('error', 'User creation failed');
                }

                redirect('addNew');
            }
        }
    }


    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            if ($userId == null) {
                redirect('userListing');
            }

            $data['branches'] = $this->user_model->getbranches();

            $data['userInfo'] = $this->user_model->getUserInfo($userId);

            $this->global['pageTitle'] = 'CodeInsect : Edit User';

            $this->load->view("editOld",$data);
        }
    }

    

    public function view($userId = NULL)
    {

        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $this->load->helper('form');
            $data['userInfo'] = $this->user_model->getUserInfosingle($userId);
            $data["beneficiary"] = $this->user_model->getListTable("tbl_beneficiary",$userId);
            $data["insurance"] = $this->user_model->getInsurance("tbl_beneficiary",$userId);
            $data["insurances"] = $this->user_model->getinsurances("tbl_beneficiary",$userId);
            $data["beneficiarys"] = $this->user_model->getbeneficiaryTable("tbl_beneficiary",$userId);
            $data["claim"] = $this->user_model->getClaim("tbl_claim",$userId);
            $this->load->view("viewuser",  $data);
        }
    }

    

    public function viewbranch($branchId = NULL)
    {
        
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            if ($branchId == null) {
                redirect('userListing');
            }
            $this->load->model('admin/Branch_model','Branch_model');
            $data['userInfo'] = $this->user_model->getBranchesInfo($branchId);
			$data["results"] = $result = $this->Branch_model->getRow("tbl_assign_item_branch", $branchId);
			$data["beneficiary"] = $result = $this->Branch_model->beneficiary_branch($branchId);
            $data["stocks"] = $result = $this->Branch_model->stock_assign_history($branchId);

            $this->global['pageTitle'] = 'CodeInsect : Edit User';

            $this->load->view("viewbranch", $data);
        }
    }


    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $userId = $this->input->post('userId');

            if($this->input->post('hmobile') == $this->input->post('mobile'))
            {
            }
            else
            {
                $this->form_validation->set_rules('mobile', 'Mobile ', 'trim|required|max_length[128]|is_unique[tbl_users.mobile]');
            }

            $this->form_validation->set_rules('fname', 'First Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]|max_length[20]');

            $this->user_model->uploadData($photo_data, "image", "photo_path", "", "gif|jpg|png|jpeg");

            if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

                $data["errors"] = $photo_data["photo_err"];

                $this->form_validation->set_rules("image", "Image", "trim");
            }

            if ($this->form_validation->run() == FALSE) {
                $this->editOld($userId);
            } else {



                $password = $this->input->post('password');


                if (empty($password)) {

                    $saveData['fname'] = ucwords(strtolower($this->security->xss_clean(set_value('fname'))));
                    $saveData['lname'] = ucwords(strtolower($this->security->xss_clean(set_value('lname'))));
                    $saveData['email'] = ucwords(strtolower($this->security->xss_clean(set_value('email'))));
                    $saveData['roleId'] = 3;
                    $saveData['mobile'] = ucwords(strtolower($this->security->xss_clean(set_value('mobile'))));
                    $saveData['createdDtm'] = date('Y-m-d H:i:s');
                    if (isset($photo_data["image"]) && !empty($photo_data["image"])) {

                        $saveData["image"] = $photo_data["image"];
                    }
                } else {
                    $saveData['fname'] = ucwords(strtolower($this->security->xss_clean(set_value('fname'))));
                    $saveData['lname'] = ucwords(strtolower($this->security->xss_clean(set_value('lname'))));
                    $saveData['email'] = ucwords(strtolower($this->security->xss_clean(set_value('email'))));
                    $saveData['roleId'] = 3;
                    $saveData['mobile'] = ucwords(strtolower($this->security->xss_clean(set_value('mobile'))));
                    $saveData['password'] = getHashedPassword(set_value('password'));
                    $saveData['createdDtm'] = date('Y-m-d H:i:s');
                    if (isset($photo_data["image"]) && !empty($photo_data["image"])) {

                        $saveData["image"] = $photo_data["image"];
                    }
                }

                $result = $this->user_model->editUser($saveData, $userId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'User updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'User updation failed');
                }

                redirect('userListing');
            }
        }
    }

    function editbranchs($branchId = NULL)
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            if ($branchId == null) {
                redirect('userListing');
            }
            
            $data['userInfo'] = $this->user_model->getBranchesInfo($branchId);

            $data['plants'] = $this->user_model->getstate();
            
            $stcode = $data['userInfo']->StCode; 


            $data['districtes'] = $this->user_model->getdistrict($stcode);


            $this->load->view("editOldbranch",$data);
        }
    }


    public function editbranch()
    {
        
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $userId = $this->input->post('userId');

            // if($this->input->post('hcode') == $this->input->post('bcode'))
            // {
            // }
            // else
            // {
            //     $this->form_validation->set_rules('bcode', 'Branch Code', 'trim|required|max_length[128]|is_unique[tbl_branches.bcode]');
            // }
            
            $this->form_validation->set_rules('bname', 'Branch Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('address', 'address', 'trim|required|max_length[400]');
            $this->form_validation->set_rules('district', 'District', 'required|max_length[20]');
            $this->form_validation->set_rules('state', 'State', 'required|max_length[20]');
            $this->form_validation->set_rules('zipcode', 'zipcode', 'max_length[20]');

            if ($this->form_validation->run() == FALSE) {
               
                $this->editbranchs($userId);
            } else {

                $saveData['bname'] = ucwords(strtolower($this->security->xss_clean(set_value('bname'))));
                $saveData['address'] = ucwords(strtolower($this->security->xss_clean(set_value('address'))));
                $saveData['district'] = ucwords(strtolower($this->security->xss_clean(set_value('district'))));
                $saveData['state'] = set_value('state');
                $saveData['zipcode'] = set_value('zipcode');
                $saveData['createdDtm'] = date('Y-m-d H:i:s');
       
                $result = $this->user_model->editBranch($saveData, $userId);
                if ($result == true) {
                    $this->session->set_flashdata('success', 'Branch updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'User updation failed');
                }

                redirect('/branches');
            }
        }
    }

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if (!$this->isAdmin()) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted' => 1, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->deleteUser($userId, $userInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }

    function approveUser()
    {
        if (!$this->isAdmin()) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted' => 0, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->approveUser($userId, $userInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }


    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';

        $this->loadViews("404", $this->global, NULL, NULL);
    }

    /**
     * This function used to show login history
     * @param number $userId : This is user id
     */
    function loginHistoy($userId = NULL)
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $userId = ($userId == NULL ? 0 : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;

            $this->load->library('pagination');

            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress("login-history/" . $userId . "/", $count, 10, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'CodeInsect : User Login History';

            $this->loadViews("loginHistory", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to show users profile
     */
    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;

        $this->global['pageTitle'] = $active == "details" ? 'CodeInsect : My Profile' : 'CodeInsect : Change Password';
        $this->loadViews("profile", $this->global, $data, NULL);
    }

    /**
     * This function is used to update the user details
     * @param text $active : This is flag to set the active tab
     */
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|callback_emailExists');

        if ($this->form_validation->run() == FALSE) {
            $this->profile($active);
        } else {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));

            $userInfo = array('name' => $name, 'email' => $email, 'mobile' => $mobile, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->editUser($userInfo, $this->vendorId);

            if ($result == true) {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect('profile/' . $active);
        }
    }

    /**
     * This function is used to change the password of the user
     * @param text $active : This is flag to set the active tab
     */
    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldPassword', 'Old password', 'required|max_length[20]');
        $this->form_validation->set_rules('newPassword', 'New password', 'required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword', 'Confirm new password', 'required|matches[newPassword]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->profile($active);
        } else {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if (empty($resultPas)) {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('profile/' . $active);
            } else {
                $usersData = array(
                    'password' => getHashedPassword($newPassword), 'updatedBy' => $this->vendorId,
                    'updatedDtm' => date('Y-m-d H:i:s')
                );

                $result = $this->user_model->changePassword($this->vendorId, $usersData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Password updation successful');
                } else {
                    $this->session->set_flashdata('error', 'Password updation failed');
                }

                redirect('profile/' . $active);
            }
        }
    }

    /**
     * This function is used to check whether email already exist or not
     * @param {string} $email : This is users email
     */
    function emailExists($email)
    {
        $userId = $this->vendorId;
        $return = false;

        if (empty($userId)) {
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if (empty($result)) {
            $return = true;
        } else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }

    function delete($userId='')
	{

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}


		if (isset($userId) and !empty($userId)) {
			
			$this->load->model('user_model');
			$count = $this->user_model->getCount('tbl_users', 'tbl_users.userId', $userId);


			if (isset($count) and !empty($count)) {

				$this->user_model->delete('tbl_users', 'userId', $userId);

				$this->session->set_flashdata('message', 'User Deleted Successfully !');


				echo "success";

				exit;
			} else {
				$this->session->set_flashdata('message', ' Invalid Id !');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');
		}
	}
}
