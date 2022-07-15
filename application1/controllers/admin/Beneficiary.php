<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class beneficiary extends CI_Controller
{


	function __construct()
	{

		parent::__construct();

		$this->load->library('pagination');

		$this->load->helper('url');

		$this->load->library('form_validation');

		$this->load->model('admin/Beneficiary_model', 'Beneficiary_model');
	}



	function index($id = 1)
	{
		$cond = "";

		$data['searchBy'] = '';

		$data['searchValue'] = '';

		$v_fields = $this->Beneficiary_model->v_fields;

		$per_page_arr = array('5', '10', '20', '50', '100');



		if (isset($_GET['searchValue']) && isset($_GET['searchBy'])) {

			$data['searchBy'] = $_GET['searchBy'];

			$data['searchValue'] = $_GET['searchValue'];

			if (!empty($_GET['searchValue']) && $_GET['searchValue'] != "" && !empty($_GET['searchBy']) && $_GET['searchBy'] != "") {

				$cond = "true";
			}
		}



		$data['sortBy'] = '';

		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';

		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

		$searchValue = addslashes($searchValue);



		if (isset($_GET['sortBy']) && $_GET['sortBy'] != '') {

			$data['sortBy'] = $_GET['sortBy'];

			if (isset($_GET['order']) && $_GET['order'] != '') {

				$_GET['order'] = $_GET['order'] == 'asc' ? 'desc' : 'asc';
			} else {

				$_GET['order'] = 'desc';
			}
		}



		$get_q = $_GET;

		foreach ($v_fields as $key => $value) {

			$get_q['sortBy'] = $value;

			$query_result = http_build_query($get_q);

			$data['fields_links'][$value] = current_url() . '?' . $query_result;
		}

		$data['csvlink'] = base_url() . 'admin/beneficiary/export/csv';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

		$config = array();

		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/beneficiary/index";

		$total_row = $this->Beneficiary_model->getCount('tbl_beneficiary', $searchBy, $searchValue);

		$config["first_url"] = base_url() . "admin/beneficiary/index" . '?' . $_SERVER['QUERY_STRING'];

		$config["total_rows"] = $total_row;

		$config["per_page"] = $per_page = $data['per_page'];

		$config["uri_segment"] = $this->uri->total_segments();

		$config['use_page_numbers'] = TRUE;

		$config['num_links'] = 3; //$total_row

		$config['cur_tag_open'] = '&nbsp;<a class="current">';

		$config['cur_tag_close'] = '</a>';

		$config['full_tag_open'] = "<ul class='pagination'>";

		$config['full_tag_close'] = "</ul>";

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";

		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

		$config['next_tag_open'] = "<li>";

		$config['next_tagl_close'] = "</li>";

		$config['prev_tag_open'] = "<li>";

		$config['prev_tagl_close'] = "</li>";

		$config['first_link'] = 'First';

		$config['first_tag_open'] = "<li>";

		$config['first_tagl_close'] = "</li>";

		$config['last_link'] = 'Last';

		$config['last_tag_open'] = "<li>";

		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);



		if ($this->uri->segment(2)) {

			$cur_page = $id;

			$pagi = array("cur_page" => ($cur_page - 1) * $per_page, "per_page" => $per_page, 'order' => $order, 'order_by' => $order_by);
		} else {

			$pagi = array("cur_page" => 0, "per_page" => $per_page);
		}



		$data["results"] = $result = $this->Beneficiary_model->getList("tbl_beneficiary", $pagi);

		$str_links = $this->pagination->create_links();
		$data["links"] = $str_links;

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		} else {


			$data['beneficiary']  = $this->Beneficiary_model->getList('tbl_beneficiary');

			$this->load->view('admin/beneficiary/manage', $data);
		}
	}

	public function get_function()
	{
		$branchId = $this->input->post('branchId');
		$result =  $this->Beneficiary_model->getfuncation('*','tbl_funcation',array('branch'=>$branchId));

		if($result)
		{
			echo json_encode(array('status'=>'1','msg'=> 'Data found Successfully!','data'=>$result));
		}
	}


	public function view($bId)
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}



		if (isset($bId) and !empty($bId)) {

			$data = NULL;



			$this->form_validation->set_rules('fname', 'first Name', 'required');

			$this->form_validation->set_rules("image", "Image", "trim|xss_clean");

			$this->Beneficiary_model->uploadData($photo_data, "image", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("image", "Image", "trim");
			}

			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) {

				$data["branchs"] = $this->Beneficiary_model->getListTable("tbl_branches");

				$data["gender"] = $this->Beneficiary_model->getListTable("tbl_gender");

				$data["cropcycles"] = $this->Beneficiary_model->getListTable("tbl_beneficiary");

				$data["yes"] = $this->Beneficiary_model->getListTable("tbl_yes");

				$data["expose"] = $this->Beneficiary_model->getListTable("tbl_expose");

				$data["check"] = $this->Beneficiary_model->getListTable("tbl_secheck");

				$data["house"] = $this->Beneficiary_model->getListTable("tbl_house");

				$data["work"] = $this->Beneficiary_model->getListTable("tbl_work");

				$data['beneficiary'] = $this->Beneficiary_model->getRows('tbl_beneficiary', $bId);
				
				$data['safety_kit'] = $this->Beneficiary_model->getSafetykit('tbl_beneficiary', $bId);

				$data["insurance"] = $this->Beneficiary_model->getListInsurance('tbl_beneficiary', $bId);

				$this->load->view('admin/beneficiary/view', $data);
			} else {

				redirect('admin/beneficiary/view');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('admin/beneficiary/view');
		}
	}

	public function edit($bId='',$insurance_id='')
	{
		// print_r($_POST);
		// die();
		
		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}



		if (isset($bId) and !empty($bId)) {

			$data = NULL;


			if ($this->input->post('mmobile') == $this->input->post('mobile')) {
			} else {
				$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|max_length[128]|is_unique[tbl_beneficiary.mobile]');
			}

			$this->form_validation->set_rules('fname', 'First Name', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules("image", "Image", "trim|xss_clean");
			$this->form_validation->set_rules("signature", "signature", "trim|xss_clean");

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

				$data["marital"] = $this->Beneficiary_model->getListTable("married_status");

				$data["other_insurance"] = $this->Beneficiary_model->getListTable("other_insurance");

				$data["branchs"] = $this->Beneficiary_model->getListTable("tbl_branches");

				$data["gender"] = $this->Beneficiary_model->getListTable("tbl_gender");

				$data["cropcycles"] = $this->Beneficiary_model->getListTable("tbl_beneficiary");

				$data["yes"] = $this->Beneficiary_model->getListTable("tbl_yes");

				$data["expose"] = $this->Beneficiary_model->getListTable("tbl_expose");

				$data["check"] = $this->Beneficiary_model->getListTable("tbl_secheck");

				$data["house"] = $this->Beneficiary_model->getListTable("tbl_house");

				$data["work"] = $this->Beneficiary_model->getListTable("tbl_work");
				
				$data["type_insurance"] = $this->Beneficiary_model->getListTable("tbl_typeinsurance");

				$data['safety_kit'] = $this->Beneficiary_model->getSafetykit('tbl_beneficiary', $bId);

				$data["insurance"] = $this->Beneficiary_model->getInsurances('tbl_applyinsurance', $bId);

				$data['beneficiary'] = $this->Beneficiary_model->getRow('tbl_beneficiary', $bId);

				$function = $data['beneficiary']->branchId;

				$data["function"] = $this->Beneficiary_model->getListfunation("tbl_funcation",$function);

				$this->load->view('admin/beneficiary/edit', $data);
			} else {

				

				$saveData['fname'] = set_value('fname');
				$saveData['lname'] = set_value('lname');
				$saveData['gender'] = set_value('gender');
				$saveData['date'] = set_value('date');
				$saveData['dob'] = set_value('dob');
				$saveData['branch'] = set_value('branch');
				$saveData['mobile'] = set_value('mobile');
				$saveData['father_husband_name'] = set_value('father_husband_name');
				$saveData['caste'] = set_value('caste');
				$saveData['pincode'] = set_value('pincode');
				$saveData['current_address'] = set_value('current_address');
				$saveData['qualification'] = set_value('qualification');
				$saveData['f_m_income_daily_income'] = set_value('f_m_income_daily_income');
				$saveData['number_earning_family_member'] = set_value('number_earning_family_member');
				$saveData['numbers_children'] = set_value('numbers_children');
				$saveData['son'] = set_value('son');
				$saveData['daughter'] = set_value('daughter');
				$saveData['monthly_income'] = set_value('monthly_income');
				$saveData['account_number'] = set_value('account_number');
				$saveData['other_insurance'] = set_value('other_insurance');
				$saveData['fun_id'] = set_value('funcation');
				$saveData['permanent_address'] = set_value('permanent_address');


				$insurance = $this->input->post('insurance');
				if($insurance == 1 || $insurance == 2 || $insurance == 3 )
				{
					$saveData['insurance'] = set_value('insurance_type');
					$saveData['insured_name'] = set_value('insured_name');
					$saveData['nominee_name'] = set_value('nominee_name');
					$saveData['relation_with_insured'] = set_value('relation_with_insured');
					$saveData['nominee_dob'] = set_value('nominee_dob');
					$saveData['date_from_policy'] = set_value('date_from_policy');
					$saveData['politically_exposed'] = set_value('politically_exposed');
				}
				else{
					$saveData['insurance'] = '';
					$saveData['insured_name'] = '';
					$saveData['nominee_name'] = '';
					$saveData['relation_with_insured'] = '';
					$saveData['nominee_dob'] = '';
					$saveData['date_from_policy'] = '';
					$saveData['politically_exposed'] = '';
				}
		
				$saveData['type_work'] = set_value('type_work');
				$saveData['security_equipment'] = set_value('security_equipment');
				$saveData['aadhar_number'] = set_value('aadhar_number');
				$saveData['pan_number'] = set_value('pan_number');
				$saveData['insurance'] = set_value('insurance');
				
				if (isset($photo_data["image"]) && !empty($photo_data["image"])) {

					$saveData["image"] = $photo_data["image"];
				}

				if (isset($photo_data["signature"]) && !empty($photo_data["signature"])) {

					$saveData["signature"] = $photo_data["signature"];
				}

				$ownhouse = $this->input->post('own_house');

				if($ownhouse == 1 || $ownhouse == 2 )
				{
					$saveData['own_house'] = set_value('own_houses');
				}
				else{
					$saveData['own_house'] = 0;
				}
				
				$this->Beneficiary_model->updateData('tbl_beneficiary', $saveData, $bId);



				$this->session->set_flashdata('message', 'Beneficiary Updated Successfully!');

				redirect('/beneficiary');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('/beneficiary');
		}
	}

	function deleteAll($bId = '')
	{



		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}



		$all_ids = $_POST["allIds"];



		if (isset($all_ids) and !empty($all_ids)) {


			for ($a = 0; $a < count($all_ids); $a++) {

				if ($all_ids[$a] != "") {

					$this->Beneficiary_model->delete('crop_cultivation_yield', 'id', $all_ids[$a]);

					$this->session->set_flashdata('message', ' Crop_cultivation_yield(s) Deleted Successfully !');
				}
			}



			echo "success";

			exit;
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');
		}
	}

	function deletebeneficiary()
	{


		$bId = $this->input->post('userId');
		$saveData = set_value('note');
		$beneficiaryInfo = array('status' => 3,'note'=>$saveData);

		$this->load->model('Beneficiary_model');
		$result = $this->Beneficiary_model->deletebeneficiary($bId, $beneficiaryInfo);

		if ($result > 0) {
			echo (json_encode(array('status' => TRUE)));
		} else {
			echo (json_encode(array('status' => FALSE)));
		}
	}

	function approvebeneficiary()
	{


		$array = json_decode($this->input->post('safetykit'));

		$bId = $this->input->post('userId');
		$branch = $this->input->post('branch');
		$saveData = set_value('note');
		$fid = set_value('fid');
		$beneficiaryInfo = array('status' => 2,'note'=>$saveData,'branch'=>$branch,'fid' => $fid);

		$this->load->model('Beneficiary_model');
		$result = $this->Beneficiary_model->approvebeneficiary($bId, $beneficiaryInfo,$array);

		if ($result > 0) {
			echo (json_encode(array('status' => TRUE)));
		} else {
			echo (json_encode(array('status' => FALSE)));
		}
		
	}

	function updatebeneficiary()
	{
		$bId = $this->input->post('userId');
		$saveData = set_value('note');
		$beneficiaryInfo = array('note'=>$saveData);

		$this->load->model('Beneficiary_model');
		$result = $this->Beneficiary_model->UpdateBeneficiary($bId, $beneficiaryInfo);

		if ($result > 0) {
			echo (json_encode(array('status' => TRUE)));
		} else {
			echo (json_encode(array('status' => FALSE)));
		}
	}


	function delete($bId ='')
	{

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}

		if (isset($bId) and !empty($bId)) {
			

			
			$this->load->model('Beneficiary_model');
			$count = $this->Beneficiary_model->getCount('tbl_beneficiary', 'tbl_beneficiary.bId', $bId);


			if (isset($count) and !empty($count)) {

				$this->Beneficiary_model->delete('tbl_beneficiary', 'bId', $bId);

				$this->session->set_flashdata('message', 'Beneficiary Deleted Successfully !');

				echo "success";

				exit;
			} else {
				$this->session->set_flashdata('message', ' Invalid Id !');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');
		}
	}

	function export($filetype = 'csv')
	{



		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}



		$searchBy = '';

		$searchValue = '';

		$v_fields = array( 'fname', 'gender', 'dob', 'branch', 'mobile', 'father_husband_name', 'caste', 'pincode', 'current_address', 'qualification', 'f_m_income_daily_income', 'number_earning_family_member', 'numbers_children', 'son', 'daughter', 'monthly_income', 'own_house', 'type_work','security_equipment', 'aadhar_number', 'pan_number', 'insurance', 'insured_name', 'nominee_name', 'relation_with_insured', 'email_Id',    'lan_number', 'date_from_policy', 'politically_exposed', 'safety_kit', 'image', 'lat', 'longg', 'signature');


		$data['sortBy'] = '';



		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';



		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

		$searchValue = addslashes($searchValue);

		$pagi = array('order' => $order, 'order_by' => $order_by);



		$result = $this->Beneficiary_model->getList("tbl_beneficiary");



		if ($filetype == 'csv') {

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=beneficiary.csv');

			header('Pragma: no-cache');

			$csv = 'Sr. No,' . implode(',', $v_fields) . "\n";

			foreach ($result as $key => $value) {

				$line = ($key + 1) . ',';

				foreach ($v_fields as $field) {

					$line .= '"' . addslashes($value->$field) . '"' . ',';
				}

				$csv .= ltrim($line, ',') . "\n";
			}

			echo $csv;
			exit;
		} elseif ($filetype == 'pdf') {

			error_reporting(0);

			ob_start();

			$this->load->library('m_pdf');

			$table = '

			<html>

			<head><title></title>

			<style>

			table{

				border:1px solid;

			}

			tr:nth-child(even)

			{

			    background-color: rgba(158, 158, 158, 0.82);

			}

			</style>

			</head>

			<body>

			<h1 align="center">Beneficiary</h1>

			<table><tr>';

			$table .= '<th>Sr. No</th>';

			foreach ($v_fields as $value) {

				$table .= '<th>' . $value . '</th>';
			}

			$table .= '</tr>';

			foreach ($result as $key => $value) {

				$table .= '<tr><td>' . ($key + 1) . '</td>';

				foreach ($v_fields as $field) {

					$table .= '<td>' . $value->$field . '</td>';
				}

				$table .= '</tr>';
			}

			$table .= '</table></body></html>';

			ob_clean();

			$pdf = $this->m_pdf->load();

			$pdf->WriteHTML($table);

			$pdf->Output('beneficiary.pdf', "D");

			exit;
		} else {

			echo 'Invalid option';
			exit;
		}
	}
}
