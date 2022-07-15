<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Branches extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->model('user_model');

        $this->load->model('admin/Branch_model','Branch_model');

        $this->load->library('form_validation');
    }
    

    function index($id = 1)
	{	
		$cond = "";

		$data['searchBy'] = '';

		$data['searchValue'] = '';

		$v_fields = $this->Branch_model->v_fields;

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

		$data['csvlink'] = base_url() . 'admin/branches/export/csv';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "10";

		$config = array();

		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/branches/index";

		$total_row = $this->Branch_model->getCount('tbl_branches', $searchBy, $searchValue);

		$config["first_url"] = base_url() . "admin/branches/index" . '?' . $_SERVER['QUERY_STRING'];

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



		$data["results"] = $result = $this->Branch_model->getList("tbl_branches", $pagi);

		$str_links = $this->pagination->create_links();



		$data["links"] = $str_links;

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		} else {
            

			$data['beneficiary']  = $this->Branch_model->getList('tbl_branches');

			$this->load->view('admin/branch/manage', $data);
		}
	}


    public function addNewBranch()
    {

        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

            redirect('/login');
        }


        $data = NULL;

        // $this->form_validation->set_rules('bcode', 'Branch Code', 'trim|required|max_length[128]|is_unique[tbl_branches.bcode]');
        $this->form_validation->set_rules('bname', 'Branch Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('address', 'address', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('district', 'District', 'required|max_length[20]');
        $this->form_validation->set_rules('state', 'State', 'required|max_length[20]');
        $this->form_validation->set_rules('zipcode', 'zipcode', 'max_length[20]');

        if ($this->form_validation->run() == FALSE) {

            $data['plants'] = $this->user_model->getstate();

            $this->load->view('admin/branch/add',$data);
            
        } else {


            // $saveData['bcode'] = ucwords(strtolower($this->security->xss_clean(set_value('bcode'))));
            $saveData['bname'] = ucwords(strtolower($this->security->xss_clean(set_value('bname'))));
            $saveData['address'] = ucwords(strtolower($this->security->xss_clean(set_value('address'))));
            $saveData['district'] = ucwords(strtolower($this->security->xss_clean(set_value('district'))));
            $saveData['state'] = set_value('state');
            $saveData['zipcode'] = set_value('zipcode');
            $saveData['createdDtm'] = date('Y-m-d H:i:s');

            $this->load->model('user_model');
            
            $result = $this->user_model->addNewBranch($saveData);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'New Branch created successfully');
            } else {
                $this->session->set_flashdata('error', 'Branch creation failed');
            }
            redirect('branches');
        }
    }


	public function checkstock($branchId)
    {
		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}



		if (isset($branchId) and !empty($branchId)) {

			$data = NULL;

            $this->load->library('form_validation');

			$this->form_validation->set_rules("branch", "branch", "trim|xss_clean");

	
			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) {
				
				$data["results"] = $result = $this->Branch_model->getRow("tbl_assign_item_branch", $branchId);

				$this->load->view('admin/branch/checkstock',$data);

			} else {

				redirect('admin/branch/checkstock');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('admin/branch/checkstock');
		}
	}


	public function getdistrict()
	{
		$state_id = $this->input->post('state_id');
		$result =  $this->Branch_model->getdistrict('*','district',array('StCode'=>$state_id));
		if($result)
		{
			echo json_encode(array('status'=>'1','msg'=> 'Data found Successfully!','data'=>$result));
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

		$v_fields = array( 'bname', 'address','district','state','zipcode','createdDtm');



		$data['sortBy'] = '';



		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';



		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

		$searchValue = addslashes($searchValue);

		$pagi = array('order' => $order, 'order_by' => $order_by);



		$result = $this->Branch_model->getList("tbl_branches");



		if ($filetype == 'csv') {

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=branch.csv');

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

			<h1 align="center">Branches list</h1>

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

			$pdf->Output('branch.pdf', "D");

			exit;
		} else {

			echo 'Invalid option';
			exit;
		}
	}



}
