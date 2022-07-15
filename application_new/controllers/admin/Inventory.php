<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Inventory extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->model('admin/Inventory_model','Inventory_model');
        
        $this->load->model('user_model');

        $this->load->library('form_validation');
    }

    public function addstock()
    {

        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

            redirect('/login');
        }


        $data = NULL;

        $this->form_validation->set_rules('item_name', 'Item Name', 'trim|required|max_length[128]|is_unique[tbl_product.pname]');
        $this->form_validation->set_rules('current_quantity', 'Current Quantity', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('remark', 'Remark', 'required');
		$this->form_validation->set_rules('purchase_date', 'Purchase Date', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $this->global['pageTitle'] = 'Add New Stocks';

            $data['plants'] = $this->user_model->getUserRoles();
            
            $this->load->view('admin/inventory/addNewstocks', $this->global, $data, NULL);
            
        } else {
            $saveData['pname'] = ucwords(strtolower($this->security->xss_clean(set_value('item_name'))));
            $saveData['current_quantity'] = ucwords(strtolower($this->security->xss_clean(set_value('current_quantity'))));
			$saveData['remark'] = ucwords(strtolower($this->security->xss_clean(set_value('remark'))));
			$saveData['purchase_date'] = ucwords(strtolower($this->security->xss_clean(set_value('purchase_date'))));
			$purchase['remark'] = ucwords(strtolower($this->security->xss_clean(set_value('remark'))));
			$purchase['purchase_date'] = ucwords(strtolower($this->security->xss_clean(set_value('purchase_date'))));
            $saveData['createdDtm'] = date('Y-m-d H:i:s');

            $this->load->model('Inventory_model');
            
            $result = $this->Inventory_model->addNewstocks($saveData,$purchase);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'New Item created successfully');
            } else {
                $this->session->set_flashdata('error', 'Item creation failed');
            }
            redirect('listproduct');
        }
    }

    public function addstockbyid($id = Null)
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

            redirect('/login');
        }
        
        $data = NULL;

        $this->form_validation->set_rules('pname', 'Item Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('current_quantity', 'Current Quantity', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('add_quantity', 'Add More Quantity', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('remark', 'Remark', 'required');
		$this->form_validation->set_rules('purchase_date', 'Purchase Date', 'trim|required');
        if ($this->form_validation->run() == FALSE) {


            $data['plants'] = $this->Inventory_model->getRow('tbl_product', $id);

            $data["branches"] = $this->Inventory_model->getListTable("tbl_branches");

            $this->load->view('admin/inventory/addNewstocksbyid', $data);
            
        } else {
            $saveData['pname'] = ucwords(strtolower($this->security->xss_clean(set_value('pname'))));
			$purchase['remark'] = ucwords(strtolower($this->security->xss_clean(set_value('remark'))));
			$purchase['purchase_date'] = ucwords(strtolower($this->security->xss_clean(set_value('purchase_date'))));
            $current_quantity = ucwords(strtolower($this->security->xss_clean(set_value('current_quantity'))));
            $more_quantity = ucwords(strtolower($this->security->xss_clean(set_value('add_quantity'))));

            $s =   $current_quantity  + $more_quantity ;
            
            $saveData['current_quantity'] = $s;
            $saveData['updatedDtm'] = date('Y-m-d H:i:s');



			$saveData['id'] = ucwords(strtolower($this->security->xss_clean(set_value('id'))));

            $this->load->model('Inventory_model');
            
            $result = $this->Inventory_model->updateData('tbl_product', $saveData, $id,$more_quantity,$purchase);


            if ($result > 0) {
                $this->session->set_flashdata('success', 'Stock Updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Item creation failed');
            }
            redirect('listproduct');
        }

    }

    public function assignstock($id = Null)
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

            redirect('/login');
        }
        
        $data = NULL;

        $this->form_validation->set_rules('pid', 'Item Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('current_quantity', 'Current Quantity', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('assign_quantity', 'Add More Quantity', '');
        $this->form_validation->set_rules('brname', 'Branch Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('assign_quantity', 'Assign Quantity', 'trim|required|max_length[128]|less_than['.$this->input->post('current_quantity').']|greater_than[0]');
        if ($this->form_validation->run() == FALSE) {


            $data['plants'] = $this->Inventory_model->getRow('tbl_product', $id);

            $data["branches"] = $this->Inventory_model->getListTable("tbl_branches");

            $this->load->view('admin/inventory/assignstocks', $data);
            
        } else {

            $saveData['pname'] = ucwords(strtolower($this->security->xss_clean(set_value('pid'))));

            $current_quantity = ucwords(strtolower($this->security->xss_clean(set_value('current_quantity'))));
            $assign_quantity = ucwords(strtolower($this->security->xss_clean(set_value('assign_quantity'))));

            $s =   $current_quantity  -  $assign_quantity ;

            $updateData['current_quantity'] = $s;

            $saveData['assign_quantity'] = ucwords(strtolower($this->security->xss_clean(set_value('assign_quantity'))));

            $saveData['bname'] = ucwords(strtolower($this->security->xss_clean(set_value('brname'))));

			$saveData['createdDtm'] = date('Y-m-d H:i:s');
            // $saveData['updatedDtm'] = date('Y-m-d H:i:s');


			$product['pid'] = ucwords(strtolower($this->security->xss_clean(set_value('pid'))));
			$product['action'] = 1;
			$product['qun'] = ucwords(strtolower($this->security->xss_clean(set_value('assign_quantity'))));
			$product['bid'] = ucwords(strtolower($this->security->xss_clean(set_value('brname'))));
			$product['created'] = date('Y-m-d H:i:s');

            $this->load->model('Inventory_model');
            
            $result = $this->Inventory_model->updatestock('tbl_product', $updateData, $id);

			$results = $this->Inventory_model->assignitembranch($saveData);

			$product_history = $this->Inventory_model->product_history($product);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'Product Assign Successfully');
            } else {
                $this->session->set_flashdata('error', 'Product creation failed');
            }
            redirect('listproduct');
        }

    }

    function index($id = 1)
	{	
		$cond = "";

		$data['searchBy'] = '';

		$data['searchValue'] = '';

		$v_fields = $this->Inventory_model->v_fields;

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

		$data['csvlink'] = base_url() . 'admin/inventory/exports/csv';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

		$config = array();

		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/inventory/index";

		$total_row = $this->Inventory_model->getCount('tbl_product_history', $searchBy, $searchValue);

		$config["first_url"] = base_url() . "admin/inventory/index" . '?' . $_SERVER['QUERY_STRING'];

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



		$data["results"] = $result = $this->Inventory_model->getinventory("tbl_product_history", $pagi);

		$str_links = $this->pagination->create_links();



		$data["links"] = $str_links;

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		} else {
            

			$data['beneficiary']  = $this->Inventory_model->getinventory('tbl_product_history');

			$this->load->view('admin/inventory/manage', $data);
		}
	}
	
	function listproduct($id = 1)
	{	
		$cond = "";

		$data['searchBy'] = '';

		$data['searchValue'] = '';

		$v_fields = $this->Inventory_model->v_fields;

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

		$data['csvlink'] = base_url() . 'admin/inventory/export/csv';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "5";

		$config = array();

		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/inventory/listproduct";

		$total_row = $this->Inventory_model->getCount('tbl_product', $searchBy, $searchValue);

		$config["first_url"] = base_url() . "admin/inventory/listproduct" . '?' . $_SERVER['QUERY_STRING'];

		$config["total_rows"] = $total_row;

		$config["per_page"] = $per_page = $data['per_page'];

		$config["uri_segment"] = $this->uri->total_segments();

		$config['use_page_numbers'] = TRUE;

		$config['num_links'] = 3; 

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



		$data["results"] = $result = $this->Inventory_model->getList("tbl_product", $pagi);

		$str_links = $this->pagination->create_links();



		$data["links"] = $str_links;

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		} else {
            

			$data['beneficiary']  = $this->Inventory_model->getList('tbl_product');

			$this->load->view('admin/inventory/listproduct', $data);
		}
	}

	function removestock($id=1)
	{
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

            redirect('/login');
        }
        
        $data = NULL;


        $this->form_validation->set_rules('current_quantity', 'Current Quantity', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('remove_quantity', 'Remove Quantity', 'trim|required|max_length[128]|less_than['.$this->input->post('current_quantity').']|greater_than[0]');
        if ($this->form_validation->run() == FALSE) {
	
			
            $data['plants'] = $this->Inventory_model->getRow('tbl_product', $id);

            $this->load->view('admin/inventory/removestock', $data);

            
        } else {
			

			$updateData['pname'] = ucwords(strtolower($this->security->xss_clean(set_value('pname'))));
			
            $current_quantity = ucwords(strtolower($this->security->xss_clean(set_value('current_quantity'))));
            $assign_quantity = ucwords(strtolower($this->security->xss_clean(set_value('remove_quantity'))));
            $s =   $current_quantity  -  $assign_quantity ;

            $updateData['current_quantity'] = $s;
            $this->load->model('Inventory_model');
            
            $result = $this->Inventory_model->updateproduct('tbl_product', $updateData, $id,$assign_quantity);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'Product Remove Successfully');
            } else {
                $this->session->set_flashdata('error', 'Product creation failed');
            }
            redirect('listproduct');
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



			$this->form_validation->set_rules('fname', 'first Name', 'required');
			$this->form_validation->set_rules('lname', 'Last Name', 'required');

			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) {

                $data['beneficiary'] = $this->Inventory_model->getRows('tbl_inventory', $id);

				$this->load->view('admin/inventory/viewassignstock',$data);

			} else {

				redirect('admin/inventory/view');
			}
		} else {

			$this->session->set_flashdata('message', ' Invalid Id !');

			redirect('admin/inventory/view');
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

        $v_fields = array('pname', 'current_quantity');


		$data['sortBy'] = '';



		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';



		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

		$searchValue = addslashes($searchValue);

		$pagi = array('order' => $order, 'order_by' => $order_by);



		$result = $this->Inventory_model->getList("tbl_product");

		if ($filetype == 'csv') {

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=assign_stock.csv');

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

			<h1 align="center">Assign Stocks list</h1>

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

			$pdf->Output('assign_stock.pdf', "D");

			exit;
		} else {

			echo 'Invalid option';
			exit;
		}
	}

	function exports($filetype = 'csv')
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {

			redirect('/login');
		}



		$searchBy = '';

		$searchValue = '';

		$v_fields = array('pid','qun');


		$data['sortBy'] = '';



		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';



		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

		$searchValue = addslashes($searchValue);

		$pagi = array('order' => $order, 'order_by' => $order_by);



		$result = $this->Inventory_model->getinventory("tbl_product_history");

		if ($filetype == 'csv') {

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=assign_stock.csv');

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

			<h1 align="center">Assign Stocks list</h1>

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

			$pdf->Output('assign_stock.pdf', "D");

			exit;
		} else {

			echo 'Invalid option';
			exit;
		}
	}

}