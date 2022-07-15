<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->model('login_model');
        $this->load->model('admin/Beneficiary_model', 'Beneficiary_model');
        $this->load->library('form_validation');
    }
    public function loginMe()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "email or password is wrong", "data" => []));
        } else {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = $this->input->post('password');

            $result = $this->login_model->loginMe($email, $password);

            if (!empty($result)) {

                if ($result->isDeleted == 1 && $result->roleId == 3) {
                    echo json_encode(array("status" => "0", "msg" => "Your Account Not Approved, please check with admin!", "data" => []));
                } else {
                    $lastLogin = $this->login_model->lastLoginInfo($result->userId);

                    $userData = array(
                        'userId' => $result->userId,
                        'role' => $result->roleId,
                        'roleText' => $result->role,
                        'name' => $result->fname,
                        'branch' => $result->brname,
                        'image' =>  $result->image,
                        'isLoggedIn' => TRUE,
                        'tac' => "assets2/tac.pdf"
                    );

                    echo json_encode(array("status" => "1", "msg" => "Login success", "data" => $userData));
                }
            } else {
                echo json_encode(array("status" => "0", "msg" => "Email or password mismatch", "data" => []));
            }
        }
    }

    public function addNewBeneficiary()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("mobile_number", "mobile", "required|is_unique[tbl_beneficiary.mobile]");
        $this->form_validation->set_rules("image", "Image", "trim|xss_clean");
        $this->Beneficiary_model->uploadData($photo_data, "signature", "photo_path", "", "gif|jpg|png|jpeg");

        $this->load->model('Beneficiary_model');
        $this->Beneficiary_model->uploadData($photo_data, "image", "photo_path", "", "gif|jpg|png|jpeg");
        $this->Beneficiary_model->uploadData($photo_data, "signature", "photo_path", "", "gif|jpg|png|jpeg");

        if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

            $data["errors"] = $photo_data["photo_err"];

            $this->form_validation->set_rules("image", "Image", "trim");
        }
        if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

            $data["errors"] = $photo_data["photo_err"];

            $this->form_validation->set_rules("signature", "signature", "trim");
        }


        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "Mobile no. is unique ", "data" => []));
        } else {

            $saveData['fId'] = set_value('fId');
            $saveData['status'] = set_value('status');
            $saveData['fun_id'] = set_value('fun_id');
            $saveData['fname'] = set_value('fname');
            $saveData['gender'] = set_value('gender');
            $saveData['date'] = set_value('date');
            $saveData['dob'] = set_value('dob');
            $saveData['branch'] = set_value('branch');
            $saveData['mobile'] = set_value('mobile_number');
            $saveData['father_husband_name'] = set_value('father_husband_name');
            $saveData['caste'] = set_value('caste');
            $saveData['current_address'] = set_value('present_address');
            $saveData['permanent_address'] = set_value('residence');
            $saveData['pincode'] = set_value('present_pin_code');
            $saveData['qualification'] = set_value('education');
            $saveData['f_m_income_daily_income'] = set_value('family_income');
            $saveData['number_earning_family_member'] = set_value('earning_member');
            $saveData['numbers_children'] = set_value('num_of_child');
            $saveData['son'] = set_value('son');
            $saveData['married_status'] = set_value('married_status');
            $saveData['daughter'] = set_value('daughter');
            $saveData['monthly_income'] = set_value('monthly_income');
            $saveData['own_house'] = set_value('own_house');
            $saveData['type_work'] = set_value('type_work');
            $saveData['security_equipment'] = set_value('security_equipment');
            $saveData['aadhar_number'] = set_value('aadhar_number');
            $saveData['pan_number'] = set_value('pan_number');
            $saveData['account_number'] = set_value('account_number');
            $saveData['other_insurance'] = set_value('other_insurance');
            $saveData['insurance'] = set_value('insurance');
            $saveData['insured_name'] = set_value('insured_name');
            $saveData['nominee_name'] = set_value('nominee_name');
            $saveData['relation_with_insured'] = set_value('relation_with_insured');
            $saveData['nominee_dob'] = set_value('nominee_dob');
            $saveData['date_from_policy'] = set_value('date_from_policy');
            $saveData['politically_exposed'] = set_value('politically_exposed');

            $saveData['safety_kit'] = set_value('safety_kit');


            $saveData['lat'] = set_value('lat');
            $saveData['longg'] = set_value('longg');

            $saveData['p_state_code'] = set_value('p_state_code');
            $saveData['p_city_code'] = set_value('p_city_code');
            $saveData['l_state_code'] = set_value('l_state_code');
            $saveData['l_city_code'] = set_value('l_city_code');
            $saveData['l_pin_code'] = set_value('l_pin_code');

            $saveData['tsession'] = set_value('tsession');
            $saveData['training_id'] = set_value('training_id');
            $saveData['insurance_company'] = set_value('insurance_company');
            $saveData['insurance_amount'] = set_value('insurance_amount');
            $saveData['bank'] = set_value('bank');




            $saveData['createdDtm'] = date('Y-m-d H:i:s');
            if (isset($photo_data["image"]) && !empty($photo_data["image"])) {

                $saveData["image"] = $photo_data["image"];
            }

            if (isset($photo_data["signature"]) && !empty($photo_data["signature"])) {

                $saveData["signature"] = $photo_data["signature"];
            }


            $this->load->model('Api_model');
            $result = $this->Api_model->addNewBeneficiary($saveData);

            if ($result > 0) {
                echo json_encode(array("status" => "1", "msg" => "New Beneficiary Successfully Store ", "data" => $result));
            } else {
                echo json_encode(array("status" => "0", "msg" => "New Beneficiary created Failed", "data" => []));
            }
        }
    }

    public function getbranches()
    {
        $fid = $this->input->post('fid');
        $this->load->model('api_model');

        $branches = $this->api_model->getassignbranch("tbl_branchassign",$fid);
        $state = $this->api_model->getListTable("state");



        $i = 0 ;
        foreach($state as  $row) {

            $state[$i]->distic = $this->api_model->getListTableByCol("district","StCode",$row->StCode);



            //$state[$i]->distic
            $i++;
        }


        $data[0] = array("branches" => $branches , "state" => $state);



        if ($data > 0) {
            echo json_encode(array("status" => "1", "msg" => "Branches getting successfully", "data" => $data));
        } else {
            echo json_encode(array("status" => "0", "msg" => "Branches getting Failed", "data" => []));
        }
    }

    public function getsafetykit()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('branchId', 'Branch Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "Branch required", "data" => []));
        } else {

            $branchId = $this->input->post('branchId');
            $result = $this->Api_model->getsafetykit("tbl_assign_item_branch", $branchId);


            if (!empty($result)) {

                $this->load->model('api_model');
                $safetykit = $this->api_model->getsafetykit("tbl_assign_item_branch", $branchId);
                $funcation = $this->api_model->get_funcation("tbl_funcation", $branchId);

				$data[0] = array("safetykit" => $safetykit , "funcation" => $funcation);

                echo json_encode(array("status" => "1", "msg" => "Safetykit getting successfully", "data" => $data));
            } else {
                echo json_encode(array("status" => "0", "msg" => "Didn`t get any Safetykit", "data" => []));
            }
        }
    }


    public function getevent()
    {
        $this->load->model('api_model');

        $data["event"] = $this->api_model->getgallery("tbl_event");

        if ($data > 0) {
            echo json_encode(array("status" => "1", "msg" => "Gallery getting successfully", "data" => $data['event']));
        } else {
            echo json_encode(array("status" => "0", "msg" => "Gallery getting Failed", "data" => []));
        }
    }

    public function getgallery()
    {
        $this->load->model('Api_model');

        $data["gallery"] = $this->Api_model->getgallery("tbl_gallery");

        if ($data > 0) {
            echo json_encode(array("status" => "1", "msg" => "Gallery getting successfully", "data" => $data['gallery']));
        } else {
            echo json_encode(array("status" => "0", "msg" => "Gallery getting Failed", "data" => []));
        }
    }

    public function getschemes()
    {
        $this->load->model('Api_model');

        $data["schemes"] = $this->Api_model->getschemes("tbl_schemes");

        if ($data > 0) {
            echo json_encode(array("status" => "1", "msg" => "Schemes getting successfully", "data" => $data['schemes']));
        } else {
            echo json_encode(array("status" => "0", "msg" => "Schemes getting Failed", "data" => []));
        }
    }

    public function gettraining()
    {
        $this->load->model('Api_model');

        $data["training"] = $this->Api_model->gettraining("tbl_training");

        if ($data > 0) {
            echo json_encode(array("status" => "1", "msg" => "Training getting successfully", "data" => $data['training']));
        } else {
            echo json_encode(array("status" => "0", "msg" => "Training getting Failed", "data" => []));
        }
    }

    public function getnotice()
    {
        $this->load->model('Api_model');

        $data["notice"] = $this->Api_model->getnotice("tbl_noticeboard");

        if ($data > 0) {
            echo json_encode(array("status" => "1", "msg" => "Notice getting successfully", "data" => $data['notice']));
        } else {
            echo json_encode(array("status" => "0", "msg" => "Notice getting Failed", "data" => []));
        }
    }

    public function getbanner()
    {
        $this->load->model('Api_model');

        $data["banner"] = $this->Api_model->getbanner("tbl_banner");

        if ($data > 0) {
            echo json_encode(array("status" => "1", "msg" => "Banner getting successfully", "data" => $data['banner']));
        } else {
            echo json_encode(array("status" => "0", "msg" => "Banner getting Failed", "data" => []));
        }
    }



    public function getbeneficiarylistbyid()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('bId', 'Beneficiary Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "beneficiary required", "data" => []));
        } else {

            $bId = $this->input->post('bId');

            $this->load->model('Api_model');

            $data["beneficiary"] = $this->Api_model->getbeneficiarylistbyid("tbl_beneficiary", $bId);
            if ($data > 0) {
                echo json_encode(array("status" => "1", "msg" => "beneficiary Details getting successfully", "data" => $data["beneficiary"]));
            } else {
                echo json_encode(array("status" => "0", "msg" => "Didn`t get any beneficiary details", "data" => []));
            }
        }
    }

    public function getbeneficiarylistbyfid()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fid', 'Filed Worker Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "beneficiary required", "data" => []));
        } else {

            $fid = $this->input->post('fid');
            $this->load->model('Api_model');
            $data["beneficiary"] = $this->Api_model->getbeneficiarylistbyfid("tbl_beneficiary", $fid);
            if ($data > 0) {
                echo json_encode(array("status" => "1", "msg" => "beneficiary Details getting successfully", "data" => $data["beneficiary"]));
            } else {
                echo json_encode(array("status" => "0", "msg" => "Didn`t get any beneficiary details", "data" => []));
            }
        }
    }

    public function updatebeneficiary()
    {
        $bId = $this->input->post('bId');
        if (isset($bId) and !empty($bId)) {

            $data = NULL;

            $this->load->library('form_validation');

            if ($this->input->post('mmobile') == $this->input->post('mobile')) {
            } else {
                $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|max_length[10]|is_unique[tbl_beneficiary.mobile]');
            }

            $this->form_validation->set_rules("image", "Image", "trim|xss_clean");
            $this->form_validation->set_rules("signature", "signature", "trim|xss_clean");

            $this->load->model('Beneficiary_model');

            $this->Beneficiary_model->uploadData($photo_data, "image", "photo_path", "", "gif|jpg|png|jpeg");

            $this->Beneficiary_model->uploadData($photo_data, "signature", "photo_path", "", "gif|jpg|png|jpeg");

            if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

                $data["errors"] = $photo_data["photo_err"];

                $this->form_validation->set_rules("image", "Image", "trim");
            }

            if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

                $data["errors"] = $photo_data["photo_err"];

                $this->form_validation->set_rules("signature", "signature", "trim");
            }

            $data['errors'] = array();

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array("status" => "0", "msg" => "Mobile No. is Unique", "data" => []));
            } else {


                $saveData['status'] = set_value('status');
                $saveData['fname'] = set_value('fname');
                $saveData['gender'] = set_value('gender');
                $saveData['date'] = set_value('date');
                $saveData['dob'] = set_value('dob');
                $saveData['branch'] = set_value('branch');
                $saveData['mobile'] = set_value('mobile_number');
                $saveData['father_husband_name'] = set_value('father_husband_name');
                $saveData['caste'] = set_value('caste');
                $saveData['current_address'] = set_value('present_address');
                $saveData['pincode'] = set_value('present_pin_code');
                $saveData['qualification'] = set_value('education');
                $saveData['f_m_income_daily_income'] = set_value('family_income');
                $saveData['number_earning_family_member'] = set_value('earning_member');
                $saveData['numbers_children'] = set_value('num_of_child');
                $saveData['son'] = set_value('son');
                $saveData['married_status'] = set_value('married_status');
                $saveData['fun_id'] = set_value('fun_id');
                $saveData['daughter'] = set_value('daughter');
                $saveData['permanent_address'] = set_value('residence');
                $saveData['monthly_income'] = set_value('monthly_income');
                $saveData['own_house'] = set_value('own_house');
                $saveData['type_work'] = set_value('type_work');
                $saveData['security_equipment'] = set_value('security_equipment');
                $saveData['aadhar_number'] = set_value('aadhar_number');
                $saveData['pan_number'] = set_value('pan_number');
                $saveData['account_number'] = set_value('account_number');
                $saveData['insurance'] = set_value('insurance');
                $saveData['other_insurance'] = set_value('other_insurance');
                $saveData['insured_name'] = set_value('insured_name');
                $saveData['nominee_name'] = set_value('nominee_name');
                $saveData['relation_with_insured'] = set_value('relation_with_insured');
                $saveData['nominee_dob'] = set_value('nominee_dob');
                $saveData['date_from_policy'] = set_value('date_from_policy');
                $saveData['politically_exposed'] = set_value('politically_exposed');
                $saveData['safety_kit'] = set_value('safety_kit');
                $saveData['lat'] = set_value('lat');
                $saveData['longg'] = set_value('longg');
                $saveData['updatedDtm'] = date('Y-m-d H:i:s');

                $saveData['tsession'] = set_value('tsession');
                $saveData['training_id'] = set_value('training_id');
                $saveData['insurance_company'] = set_value('insurance_company');
                $saveData['insurance_amount'] = set_value('insurance_amount');
                $saveData['bank'] = set_value('bank');

				$saveData['p_state_code'] = set_value('p_state_code');
				$saveData['p_city_code'] = set_value('p_city_code');
				$saveData['l_state_code'] = set_value('l_state_code');
				$saveData['l_city_code'] = set_value('l_city_code');
				$saveData['l_pin_code'] = set_value('l_pin_code');




                if (isset($photo_data["image"]) && !empty($photo_data["image"])) {

                    $saveData["image"] = $photo_data["image"];
                }

                if (isset($photo_data["signature"]) && !empty($photo_data["signature"])) {

                    $saveData["signature"] = $photo_data["signature"];
                }

                $this->load->model('Api_model');
                $data['beneficiary'] =  $this->Api_model->updateData('tbl_beneficiary', $saveData, $bId);

                if ($data > 0) {
                    echo json_encode(array("status" => "1", "msg" => "beneficiary Details update successfully", "data" => $data["beneficiary"]));
                } else {
                    echo json_encode(array("status" => "0", "msg" => "Didn`t Update Beneficiary Details", "data" => []));
                }
            }
        } else {
            echo json_encode(array("status" => "0", "msg" => "Invalid Id !", "data" => []));
        }
    }

    public function insurance()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("bId", "Beneficiary Id", "required");
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "Beneficiary required", "data" => []));
        } else {

            $bId = $this->input->post('bId');
            $fid = $this->input->post('fid');
            $saveData['insurance'] = set_value('insurance');
            $saveData['insured_name'] = set_value('insured_name');
            $saveData['nominee_name'] = set_value('nominee_name');
            $saveData['relation_with_insured'] = set_value('relation_with_insured');
            $saveData['nominee_dob'] = set_value('nominee_dob');
            $saveData['date_from_policy'] = set_value('date_from_policy');
            $saveData['politically_exposed'] = set_value('politically_exposed');
            $saveData['updatedDtm'] = date('Y-m-d H:i:s');

            $this->load->model('Api_model');

            $result['beneficiary'] = $this->Api_model->updateDataInsurance('tbl_beneficiary', $saveData, $bId);

            if ($result > 0) {
                echo json_encode(array("status" => "1", "msg" => "Apply for Insurance Successfully", "data" => $result));
            } else {
                echo json_encode(array("status" => "0", "msg" => "Insurance Failed", "data" => []));
            }
        }
    }

    public function insurance_claim()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("bId", "Beneficiary Id", "required");
        $this->form_validation->set_rules("docs", "Documents", "trim|xss_clean");
        $this->load->model('Beneficiary_model');
        $this->Beneficiary_model->uploadData($photo_data, "docs", "photo_path", "", "gif|jpg|png|jpeg");

        if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

            $data["errors"] = $photo_data["photo_err"];

            $this->form_validation->set_rules("docs", "Documents", "trim");
        }

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "Beneficiary required", "data" => []));
        } else {

            $saveData['bId'] = $this->input->post('bId');
            $saveData['fId'] = set_value('fId');
            $saveData['insurance_id'] = set_value('insurance_id');
            $saveData['insurance_type'] = set_value('insurance_type');
            $saveData['claim_amount'] = set_value('claim_amount');
            $saveData['claim_date'] = set_value('claim_date');
            $saveData['createdDtm'] = date('Y-m-d H:i:s');
            if (isset($photo_data["docs"]) && !empty($photo_data["docs"])) {

                $saveData["docs"] = $photo_data["docs"];
            }
            $this->load->model('Api_model');

            $result = $this->Api_model->addInsuranceClaim($saveData);

            if ($result > 0) {
                echo json_encode(array("status" => "1", "msg" => "Insurance Claim Successfully", "data" => $result));
            } else {
                echo json_encode(array("status" => "0", "msg" => "Claim Failed", "data" => []));
            }
        }
    }

    public function getInsurancelistbybid()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fid', 'Filed Worker Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "beneficiary required", "data" => []));
        } else {

            $bId = $this->input->post('bId');
            $fid = $this->input->post('fid');
            $this->load->model('Api_model');

            $data["beneficiary"] = $this->Api_model->getInsurancelistbybid("tbl_beneficiary", $bId, $fid);
            if ($data > 0) {
                echo json_encode(array("status" => "1", "msg" => "Insurance Details getting successfully", "data" => $data["beneficiary"]));
            } else {
                echo json_encode(array("status" => "0", "msg" => "Didn`t get any Insurance details", "data" => []));
            }
        }
    }

    public function getClaimlistbybid()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('bId', 'Beneficiary', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "beneficiary required", "data" => []));
        } else {

            $bId = $this->input->post('bId');
            $this->load->model('Api_model');

            $data["claim_list"] = $this->Api_model->getClaimlistbybid("tbl_claim", $bId);
            if ($data > 0) {
                echo json_encode(array("status" => "1", "msg" => "Claim List successfully", "data" => $data["claim_list"]));
            } else {
                echo json_encode(array("status" => "0", "msg" => "Didn`t get any Claim List", "data" => []));
            }
        }
    }

    public function get_dashboard_data()
    {
        $this->form_validation->set_rules('fid', 'Filed Worker Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "Filed Worker Id", "data" => []));
        } else {
            $fid = $this->input->post('fid');
            $this->load->model('Api_model');
			$getListbeneficiary = $this->Api_model->getListbeneficiary("tbl_beneficiary",$fid);
            $data["total_beneficiary"] = $getListbeneficiary[0]["total_leads"];
			$getInsurance = $this->Api_model->getInsurance("tbl_beneficiary",$fid);
			$data["getInsurance"] = $getInsurance[0]["total_insurance"];

      $getsession = $this->Api_model->getfunation("tbl_session",$fid);
			$data["training_session"] = $getsession[0]["training_session"];
      $totabranch =  $this->Api_model->totalbrach("tbl_branchassign",$fid);
			$data["totalbrach"] = $totabranch[0]['total_branch'];

            if ($data > 0) {
                echo json_encode(array("status" => "1", "msg" => "Total Beneficiary Get Successfully", "data" => $data));
            } else {
                echo json_encode(array("status" => "0", "msg" => "Didn`t get  beneficiary details", "data" => []));
            }
        }
    }

    public function gettsession()
    {
        $this->form_validation->set_rules('fid', 'Filed Worker Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "Filed Worker Id", "data" => []));
        } else {
            $this->load->model('Api_model');
            $fid = $this->input->post('fid');
            $bid = $this->input->post('bid');
            $data["tsession"] = $this->Api_model->gettsession("tbl_session",$fid,$bid);

            if ($data > 0) {
                echo json_encode(array("status" => "1", "msg" => "Training session getting successfully", "data" => $data['tsession']));
            } else {
                echo json_encode(array("status" => "0", "msg" => "session getting Failed", "data" => []));
            }
        }
    }


    public function getInsuranceLIst()
    {
        $this->form_validation->set_rules('fid', 'Filed Worker Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "Filed Worker Id", "data" => []));
        } else {
            $fid = $this->input->post('fid');
            $this->load->model('Api_model');
            $getInsurance = $this->Api_model->getInsurance("tbl_beneficiary", $fid);
            $getInsurance = $getInsurance[0]["total_insurance"];

            $insurance_list = $this->Api_model->getInsuranceLIst("tbl_beneficiary", $fid);

            $data[0] = array("total_Insurance" => $getInsurance , "insurance_list" => $insurance_list);


            if ($data > 0) {
                echo json_encode(array("status" => "1", "msg" => "Insurance getting successfully", "data" => $data));
            } else {
                echo json_encode(array("status" => "0", "msg" => "Insurance getting Failed", "data" => []));
            }
        }
    }

    public function forgotPassword()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules("userId", "userId", "required");

        $data['errors'] = array();

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "user id required", "data" => []));
        } else {
            $userId = $this->input->post('userId');
            $saveData['password'] = getHashedPassword(set_value('password'));

            $this->load->model('Api_model');
            $data =  $this->Api_model->updatepassword('tbl_users', $saveData,$userId);

            if ($data > 0) {
                echo json_encode(array("status" => "1", "msg" => "Password forgot successfully", "data" => $data));
            } else {
                echo json_encode(array("status" => "0", "msg" => "Didn`t forgot Password", "data" => []));
            }
        }
    }


    public function addNewtrainingsession()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("address", "address", "required");

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "Mobile no. is unique ", "data" => []));
        } else {

            $saveData['fId'] = set_value('fid');
            $saveData['name'] = set_value('name');
            $saveData['address'] = set_value('address');
            $saveData['bid'] = set_value('branchId');

            $this->load->model('Api_model');
            $result = $this->Api_model->addNewtrainingsession($saveData);

            if ($result > 0) {
                echo json_encode(array("status" => "1", "msg" => "New Training Session added Successfully Store ", "data" => $result));
            } else {
                echo json_encode(array("status" => "0", "msg" => "New Training created Failed", "data" => []));
            }
        }
    }

    public function updatetrainingsession()
    {
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("address", "address", "required");

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => "0", "msg" => "name", "data" => []));
        } else {

            $saveData['fid'] = set_value('fid');
            $saveData['name'] = set_value('name');
            $saveData['address'] = set_value('address');
            $saveData['bid'] = set_value('branchId');

            $this->load->model('Api_model');
            $data =  $this->Api_model->updatetrainingsession('tbl_session', $saveData, $id);

          //  echo $this->db->last_query(); die();

            if (true) {
                echo json_encode(array("status" => "1", "msg" => "New Training Session added Successfully Store ", "data" => $data));
            } else {
                echo json_encode(array("status" => "0", "msg" => "New Training created Failed", "data" => []));
            }
        }
    }

    public function getmyInventory()
    {
        $fid = $this->input->post('fid');
        $this->load->model('api_model');

        $branches = $this->api_model->getassignbranch("tbl_branchassign",$fid);


  			$kit_assign = $branches;

  			$i = 0;
  			foreach ($kit_assign as  $row) {

  				$kit_assign[$i]->kit_assign = $this->api_model->getListTableByAssignBranch("tbl_assign_item_branch", "bname", $row->branchId);

  				$i++;
  			}

  			$data[0] = array("kit" => $kit_assign);

        if (true) {
            echo json_encode(array("status" => "1", "msg" => "Branch Get Successfully ", "data" => $data));
        } else {
            echo json_encode(array("status" => "0", "msg" => "Branch Get Failed", "data" => []));
        }
    }

}
