<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class NotiBoard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->model('admin/NotiBoard_model','NotiBoard_model');

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
        $this->form_validation->set_rules('desc', 'Descripation', 'required|trim|max_length[500]');
        $this->form_validation->set_rules('notice', 'Notice', 'required|max_length[128]');
        $this->form_validation->set_rules('image', 'image', 'trim|xss_clean');
    
        $this->NotiBoard_model->uploadData($photo_data, "image", "photo_path", "", "gif|jpg|png|jpeg");
    
        if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {
       
            $data["errors"] = $photo_data["photo_err"];

            $this->form_validation->set_rules("image", "Image", "trim");
        
        }

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/NotiBoard/add',$data);

        } else {
            $saveData['description'] = ucwords(strtolower($this->security->xss_clean(set_value('desc'))));
            $saveData['notice'] = set_value('notice');
            $saveData['createdDtm'] = date('Y-m-d H:i:s');
            if (isset($photo_data["image"]) && !empty($photo_data["image"])) {

                $saveData["image"] = $photo_data["image"];
            }

            $this->load->model('NotiBoard_model');
            $result = $this->NotiBoard_model->addNew($saveData);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'New Notice Created successfully');
            } else {
                $this->session->set_flashdata('error', 'Notice upload failed');
            }

            redirect('admin/notiBoard');
        }
        
    
    }

    function index($id = 1)
	{	
		$cond = "";

		$data['searchBy'] = '';

		$data['searchValue'] = '';

		$v_fields = $this->NotiBoard_model->v_fields;

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

		$data['csvlink'] = base_url() . 'admin/notiboard/export/csv';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

		$config = array();

		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/notiboard/index";

		$total_row = $this->NotiBoard_model->getCount('tbl_noticeboard', $searchBy, $searchValue);

		$config["first_url"] = base_url() . "admin/notiboard/index" . '?' . $_SERVER['QUERY_STRING'];

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



		$data["results"] = $result = $this->NotiBoard_model->getList("tbl_noticeboard", $pagi);

		$str_links = $this->pagination->create_links();



		$data["links"] = $str_links;

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		} else {
            

			$data['gallery']  = $this->NotiBoard_model->getList('tbl_noticeboard');

			$this->load->view('admin/notiboard/manage', $data);
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

			$this->form_validation->set_rules("image", "Image", "trim|xss_clean");

			$this->NotiBoard_model->uploadData($photo_data, "image", "photo_path", "", "gif|jpg|png|jpeg");

			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("image", "Image", "trim");
			}



			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) {

                $data['beneficiary'] = $this->NotiBoard_model->getRows('tbl_noticeboard', $id);

				$this->load->view('admin/notiboard/view',$data);

			} else {

				redirect('admin/notiboard/view');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('admin/notiboard/view');
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

            $this->form_validation->set_rules('desc', 'Descripation', 'required|trim|max_length[500]');
            $this->form_validation->set_rules('notice', 'Notice', 'required|max_length[128]');
			$this->form_validation->set_rules("image", "Image", "trim|xss_clean");
            
            $this->NotiBoard_model->uploadData($photo_data, "image", "photo_path", "", "gif|jpg|png|jpeg");
        
			if (isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"])) {

				$data["errors"] = $photo_data["photo_err"];

				$this->form_validation->set_rules("image", "Image", "trim");
			}

			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) 
			{

				$data['beneficiary'] = $this->NotiBoard_model->getRow('tbl_noticeboard', $id);

				$this->load->view('admin/NotiBoard/edit', $data);
			} else {
                $saveData['description'] = ucwords(strtolower($this->security->xss_clean(set_value('desc'))));
                $saveData['notice'] = ucwords(strtolower($this->security->xss_clean(set_value('notice'))));
                $saveData['updatedDtm'] = date('Y-m-d H:i:s');
                
				if (isset($photo_data["image"]) && !empty($photo_data["image"])) {

					$saveData["image"] = $photo_data["image"];
				}

				$this->NotiBoard_model->updateData('tbl_noticeboard', $saveData, $id);

				$this->session->set_flashdata('message', 'Notice Updated Successfully!');

				redirect('admin/notiboard');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('admin/notiboard');
		}
	}

	function delete($id='')
	{

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}


		if (isset($id) and !empty($id)) {
			
			$this->load->model('NotiBoard_model');
			$count = $this->NotiBoard_model->getCount('tbl_noticeboard', 'tbl_noticeboard.id', $id);


			if (isset($count) and !empty($count)) {

				$this->NotiBoard_model->delete('tbl_noticeboard', 'id', $id);

				$this->session->set_flashdata('message', 'Notice Deleted Successfully !');


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

		$v_fields = array('description','notice','image');


		$data['sortBy'] = '';



		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';



		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

		$searchValue = addslashes($searchValue);

		$pagi = array('order' => $order, 'order_by' => $order_by);



		$result = $this->NotiBoard_model->getList("tbl_noticeboard");



		if ($filetype == 'csv') {

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=Notice.csv');

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

			<h1 align="center">Notice list</h1>

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

			$pdf->Output('Notice.pdf', "D");

			exit;
		} else {

			echo 'Invalid option';
			exit;
		}
	}


}