<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Funcation extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->model('admin/Funcation_model','Funcation_model');

        $this->load->library('form_validation');
    }

    public function add()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

            redirect('/login');
        } 

        $data = NULL;

        $this->load->library('form_validation');

        $this->form_validation->set_rules('funcation_name', 'Funcation Name', 'required|trim|max_length[128]|is_unique[tbl_funcation.funcation_name]');

        $this->form_validation->set_rules('branch', 'Branch', 'required|trim|max_length[128]');
    
        if ($this->form_validation->run() == FALSE) {

            $data["branchs"] = $this->Funcation_model->getListTable("tbl_branches");

            $this->load->view('admin/funcation/add',$data);

        } else {
            $saveData['funcation_name'] = ucwords(strtolower($this->security->xss_clean(set_value('funcation_name'))));
            $saveData['branch'] = set_value('branch');
            $saveData['createdDtm'] = date('Y-m-d H:i:s');
           
            $this->load->model('Funcation_model');
            $result = $this->Funcation_model->addNew($saveData);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'New Funcation Add successfully');
            } else {
                $this->session->set_flashdata('error', 'Funcation failed');
            }

            redirect('admin/funcation');
        }
    }

    function index($id = 1)
	{	
		$cond = "";

		$data['searchBy'] = '';

		$data['searchValue'] = '';

		$v_fields = $this->Funcation_model->v_fields;

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

		$data['csvlink'] = base_url() . 'admin/funcation/export/csv';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

		$config = array();

		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/funcation/index";

		$total_row = $this->Funcation_model->getCount('tbl_funcation', $searchBy, $searchValue);

		$config["first_url"] = base_url() . "admin/funcation/index" . '?' . $_SERVER['QUERY_STRING'];

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



		$data["results"] = $result = $this->Funcation_model->getList("tbl_funcation", $pagi);

		$str_links = $this->pagination->create_links();



		$data["links"] = $str_links;

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		} else {
            

			$data['gallery']  = $this->Funcation_model->getList('tbl_funcation');

			$this->load->view('admin/funcation/manage', $data);
		}
	}

    public function view($id)
    {
		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}



		if (isset($id) and !empty($id)) {

			$data = NULL;

            $this->load->library('form_validation');

			$this->form_validation->set_rules("branch", "Branch", "trim|xss_clean");

			


			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) {

                $data['funcation'] = $this->Funcation_model->getRows('tbl_funcation', $id);

				$this->load->view('admin/funcation/view',$data);

			} else {

				redirect('admin/banner/view');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('admin/banner/view');
		}
	}

    public function edit($id)
    {

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}



		if (isset($id) and !empty($id)) {

			$data = NULL;
            if($this->input->post('mfuncation_name') == $this->input->post('funcation_name'))
            {
            }
            else
            {
                $this->form_validation->set_rules('funcation_name', 'Funcation Name', 'required|trim|max_length[128]|is_unique[tbl_funcation.funcation_name]');
            }
			
            $this->form_validation->set_rules('branch', 'Branch', 'required|max_length[128]');
            
          
			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) 
			{
                $data["branchs"] = $this->Funcation_model->getListTable("tbl_branches");

				$data['beneficiary'] = $this->Funcation_model->getRow('tbl_funcation', $id);

				$this->load->view('admin/funcation/edit', $data);
			} else {

                $saveData['branch'] = ucwords(strtolower($this->security->xss_clean(set_value('branch'))));
                $saveData['funcation_name'] = set_value('funcation_name');
                $saveData['updateDtm'] = date('Y-m-d H:i:s');
                
				$this->Funcation_model->updateData('tbl_funcation', $saveData, $id);

				$this->session->set_flashdata('message', 'Funcation Updated Successfully!');

				redirect('admin/funcation');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('admin/funcation');
		}
	}


	function delete($id='')
	{

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}


		if (isset($id) and !empty($id)) {
			
			$this->load->model('Funcation_model');
			$count = $this->Funcation_model->getCount('tbl_funcation', 'tbl_funcation.id', $id);


			if (isset($count) and !empty($count)) {

				$this->Funcation_model->delete('tbl_funcation', 'id', $id);

				$this->session->set_flashdata('message', 'Funcation Deleted Successfully !');


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

        $v_fields = array('funcation_name', 'branch');


		$data['sortBy'] = '';



		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';



		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

		$searchValue = addslashes($searchValue);

		$pagi = array('order' => $order, 'order_by' => $order_by);



		$result = $this->Funcation_model->getList("tbl_Funcation");



		if ($filetype == 'csv') {

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=funcation.csv');

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

			<h1 align="center">Funcation lists</h1>

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

			$pdf->Output('Funcation.pdf', "D");

			exit;
		} else {

			echo 'Invalid option';
			exit;
		}
	}

}