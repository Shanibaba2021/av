<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->model('admin/Admin_model','Admin_model');

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

        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|is_unique[tbl_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[10]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|is_unique[tbl_users.mobile]');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/admin/add',$data);

        } else {

            $saveData['fname'] = ucwords(strtolower($this->security->xss_clean(set_value('fname'))));
            $saveData['lname'] = ucwords(strtolower($this->security->xss_clean(set_value('lname'))));
            $saveData['email'] = ucwords(strtolower($this->security->xss_clean(set_value('email'))));
            $saveData['roleId'] = 1;
            $saveData['mobile'] =ucwords(strtolower($this->security->xss_clean(set_value('mobile'))));
            $saveData['password'] = getHashedPassword(set_value('password'));
            $saveData['createdDtm'] = date('Y-m-d H:i:s');

            $this->load->model('Admin_model');
            $result = $this->Admin_model->addNew($saveData);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'New Admin created successfully');
            } else {
                $this->session->set_flashdata('error', 'Admin creation failed');
            }

            redirect('admin/admin');
        }
        
    
    }

    function index($id = 1)
	{	
		$cond = "";

		$data['searchBy'] = '';

		$data['searchValue'] = '';

		$v_fields = $this->Admin_model->v_fields;

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

		$data['csvlink'] = base_url() . 'admin/admin/export/csv';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

		$config = array();

		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/admin/index";

		$total_row = $this->Admin_model->getCount('tbl_users', $searchBy, $searchValue);

		$config["first_url"] = base_url() . "admin/admin/index" . '?' . $_SERVER['QUERY_STRING'];

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



		$data["results"] = $result = $this->Admin_model->getList("tbl_users", $pagi);

		$str_links = $this->pagination->create_links();



		$data["links"] = $str_links;

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		} else {
            

			$data['gallery']  = $this->Admin_model->getList('tbl_users');

			$this->load->view('admin/admin/manage', $data);
		}
	}

    public function view($userId)
    {
		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}



		if (isset($userId) and !empty($userId)) {

			$data = NULL;

            $this->load->library('form_validation');

			$this->form_validation->set_rules("fname", "fname", "trim|xss_clean");

			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) {

                $data['users'] = $this->Admin_model->getRows('tbl_users', $userId);

				$this->load->view('admin/admin/view',$data);

			} else {

				redirect('admin/admin/view');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('admin/admin/view');
		}
	}

	public function edit($userId)
    {

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}



		if (isset($userId) and !empty($userId)) {

			$data = NULL;
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            
			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) 
			{
				$this->load->model('Admin_model');

				$data['users'] = $this->Admin_model->getRow('tbl_users', $userId);

				$this->load->view('admin/admin/edit', $data);
			} else {
                $saveData['fname'] = ucwords(strtolower($this->security->xss_clean(set_value('fname'))));
                $saveData['lname'] = ucwords(strtolower($this->security->xss_clean(set_value('lname'))));
                $saveData['email'] = ucwords(strtolower($this->security->xss_clean(set_value('email'))));
				$saveData['mobile'] = ucwords(strtolower($this->security->xss_clean(set_value('mobile'))));
                $saveData['updatedDtm'] = date('Y-m-d H:i:s');

				$this->Admin_model->updateData('tbl_users', $saveData, $userId);

				$this->session->set_flashdata('message', 'Admin Updated Successfully!');

				redirect('admin');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('/admin/gallery');
		}
	}

    
}