<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class TSession_1 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->model('admin/TSession_model','TSession_model');

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
        $this->form_validation->set_rules('name', 'name', 'required|trim|max_length[128]');
        $this->form_validation->set_rules('loan_id', 'Loan id', 'required|max_length[128]');
		$this->form_validation->set_rules('fid', 'Field Worker', 'required|max_length[128]');
		
    
        if ($this->form_validation->run() == FALSE) {

			$data["fid"] = $this->TSession_model->getListTable("tbl_users");
			$data["bid"] = $this->TSession_model->getListBranch("tbl_branches");
            $this->load->view('admin/tsession_1/add',$data);

        } else {
            $saveData['name'] = ucwords(strtolower($this->security->xss_clean(set_value('name'))));
            $saveData['loan_id'] = set_value('loan_id');
			$saveData['fid'] = set_value('fid');
            $saveData['created'] = date('Y-m-d H:i:s');
			
            $this->load->model('TSession_model');
            $result = $this->TSession_model->addNew($saveData);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'New Tsession added successfully');
            } else {
                $this->session->set_flashdata('error', 'Tsession added failed');
            }

            redirect('admin/tsession_1/add');
        }
        
    
    }

    function index($id = 1)
	{	
		$cond = "";

		$data['searchBy'] = '';

		$data['searchValue'] = '';

		$v_fields = $this->TSession_model->v_fields;

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

		$data['csvlink'] = base_url() . 'admin/training/export/csv';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

		$config = array();

		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/training/index";

		$total_row = $this->TSession_model->getCount('tbl_session', $searchBy, $searchValue);

		$config["first_url"] = base_url() . "admin/training/index" . '?' . $_SERVER['QUERY_STRING'];

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



		$data["results"] = $result = $this->TSession_model->getList("tbl_session", $pagi);

		$str_links = $this->pagination->create_links();



		$data["links"] = $str_links;

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		} else {
            

			$data['session']  = $this->TSession_model->getList('tbl_session');

			$this->load->view('admin/tsession_1/manage', $data);
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

			$this->form_validation->set_rules("name", "name", "trim|xss_clean");


			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) {

                $data['data'] = $this->TSession_model->getRows('tbl_session', $id);

				$this->load->view('admin/tsession_1/view',$data);

			} else {

				redirect('admin/training/view');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('admin/training/view');
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

            $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[500]');
            $this->form_validation->set_rules('loan_id', 'Loan Id', 'required|max_length[128]');
		    $this->form_validation->set_rules('fid', 'Field Worker ', 'required|max_length[128]');
			$this->form_validation->set_rules('bid', 'branch', 'required|max_length[128]');

			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) 
			{
				
				$data["bid"] = $this->TSession_model->getListBranch("tbl_branches");
				$data["fid"] = $this->TSession_model->getListTable("tbl_users");
				$data['data'] = $this->TSession_model->getRow('tbl_session', $id);
				$this->load->view('admin/tsession_1/edit',$data);
			} else {
                $saveData['name'] = ucwords(strtolower($this->security->xss_clean(set_value('name'))));
                $saveData['loan_id'] = ucwords(strtolower($this->security->xss_clean(set_value('loan_id'))));
				$saveData['fid'] = ucwords(strtolower($this->security->xss_clean(set_value('fid'))));
				$saveData['bid'] = ucwords(strtolower($this->security->xss_clean(set_value('bid'))));
                $saveData['updated'] = date('Y-m-d H:i:s');
                
				$this->TSession_model->updateData('tbl_session', $saveData, $id);

				$this->session->set_flashdata('message', 'TSession Updated Successfully!');

				redirect('admin/tsession_1');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('admin/tsession_1');
		}
	}

	function delete($id='')
	{

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}


		if (isset($id) and !empty($id)) {
			
			$this->load->model('Training_model');
			$count = $this->Training_model->getCount('tbl_training', 'tbl_training.id', $id);


			if (isset($count) and !empty($count)) {

				$this->Training_model->delete('tbl_training', 'id', $id);

				$this->session->set_flashdata('message', 'Training Deleted Successfully !');


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