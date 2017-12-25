<?php
class Hospitalreports extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->library("classes/Hospital");
		$this->load->library("classes/Department");
		$this->load->library("classes/Hospitaldepartment");
		$this->load->library("classes/Hospitaldoctor");
		$this->load->library("classes/Hospitalreport");
		$this->load->library("classes/DistributerRegion");
		$this->load->library("classes/Region");
		$this->load->library("classes/Config");

		$this->load->library("pagination");
		$this->load->library("form_validation");
	}
	
	public function index( $page = 1 ){
		
		$data = array();
		$data['main'] = "hospitalreports/index";
		$data['pagetitle'] = lang("Marti Alko - Hospital Reports");
		
		//search features
		$data['distributers'] = User::find(); // get only distributers';
		$data['regions']	  = Region::findSort();
		$data['recepcion']	  = Config::getByOption('priem');
		$data['departments']  = Department::find();
		$data['doctors']	  = Hospitaldoctor::find();
		$userhospitals	  = DistributerRegion::getByUserId(User::getCurrent()->getId());
		
		if ( $userhospitals  OR User::getCurrent()->getRole() == 1 ) {
		
		
			if (User::getCurrent()->getRole() == 1 ) {
				$data['hospitals'] = Hospital::find();
			} else {
				$data['hospitals'] = Hospital::getAllHospitalsForUser( User::getCurrent()->getId());
			}
			if ( $this->input->get()) {
					
				$params = array();
					
				foreach ( $_GET as $k=>$v) {
					$params[$k] = $v;
				}
					
				$data['hreports'] = Hospitalreport::search( $params );
				//print_r($data['hreports']);
				return $this->load->view("tpl", $data);
			}
		}
		
		if ( User::getCurrent()->getRole() == 2 ) {
			
			$data['hreports'] = Hospitalreport::getByUserId(User::getCurrent()->getId(), ($page-1)*10, 10, 'id', 'desc', $found_rows);
			
		} else {
		
			$data['hreports'] = Hospitalreport::find(0, ($page-1)*10, 10, 'id', 'desc', $found_rows);
		}
		$page = ($page < 1 || empty($page)) ? 1 : $page ;
			
		$config['base_url']             = base_url() . "/hospitalreports/index" ;
		$config['total_rows']           = $found_rows;
		$config['per_page']             = 10;
		$config['first_url']            = base_url() . "/hospitalreports/index/1";
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination" style="margin:0 !important">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
			
			
		$this->pagination->initialize($config);
		
		
		return $this->load->view("tpl", $data);
		
	}
	
	public function insert(){
		
		$data = array();
		$data['main'] = "hospitalreports/insert";
		$data['pagetitle'] = lang("Marti Alko - Insert new report");
		
		//bolnici koi pripagaat na odreden region
		$distributerregions = array();
		$distributerregions = DistributerRegion::getByUserId( User::getCurrent()->getId());
		
		$hospitals = array();
		
		if ($distributerregions) {
		
			foreach ( $distributerregions as $dr ) {
				$hospitalsinregion = Hospital::getByRegion( $dr->getRegionId() );
		
				if ( $hospitalsinregion ) {
					foreach ( $hospitalsinregion as $hr ) {
						$hospitals[$hr->getId()] = $hr->getName();
					}
				} else{
					//print $dr->getRegion() . "<br>";
					//s	set_flash("","/ordinationreports");
				}
			}
		}
		natsort($hospitals);
		
		//print_r($hospitals);die;
			
		$data['hospitals'] = $hospitals;
		$data['departments'] = Department::find();
		$data['doctors'] = Hospitaldoctor::find();
		$data['reception'] = Config::getByOption('priem'); // nachin na priem
		
		if ( $this->input->post() ) {
		
			//validate
			$this->form_validation->set_message('required', 'Полето %s е задолжително.');
			$this->form_validation->set_message('is_unique', 'Полето %s веќе постои.');
			$this->form_validation->set_message('is_natural_no_zero', 'Мора да внесите %s.');
			$this->form_validation->set_rules('hospital', '<b>'.lang("Hospital").'</b>', 'required|is_natural_no_zero|xss_clean');
			$this->form_validation->set_rules('comment', '<b>'.lang("Comment").'</b>', 'required|xss_clean');
			$this->form_validation->set_rules('doctor', '<b>'.lang("Doctor").'</b>', 'required|is_natural_no_zero|xss_clean');
			
		
			if ($this->form_validation->run() == FALSE) {
		
				return $this->load->view("tpl", $data);
			}
			
			$report = new Hospitalreport();
		
			$report->setId(0);
			$report->setHospital( $this->input->post("hospital") );
			//$report->setDepartment( $this->input->post("department") );
			if ( $this->input->post("department") == 0 ){
			
				$report->setDepartment(NULL);
			
			}else{
			
				$report->setDepartment( $this->input->post("department") );
			}
			$report->setDoctor( $this->input->post("doctor") );
			$report->setRecepcion( $this->input->post("recepcion") );
			$report->setCollaboration( $this->input->post("collaboration") );
			$report->setComment( $this->input->post("comment") );
			$report->setDate( date("Y-m-d H:i:s", strtotime($this->input->post("date"))));
			$report->setCreated( date("Y-m-d H:i:s"));
			$report->setUser( User::getCurrent()->getId());
		
			$rid = $report->insert();
			
			if ( $rid ) {
				set_flash(lang("Report successfuly added"), $this->controller_index() );
			} else {
				set_flash(lang("Error occured!"), $this->controller_index() );
			}
		
		}
		
		return $this->load->view("tpl" , $data);
		
	}
	
	public function preview( $id ) {
	
		$data['hreport'] = Hospitalreport::find( $id );
		$data['main'] = "hospitalreports/a_getreportpreview";
		$data['pagetitle'] = "Hospital Report : " . $id;
		//print_r($data['report']);die;
		return $this->load->view("tpl", $data);
	}
	
	public function delete( $id = 0 ) {
		
		if ( $id AND is_numeric( $id ) ) {
			
			$hreport = Hospitalreport::find($id);
		
			if ( $hreport) {
				
				$hreport->delete();
				
			} else {
				set_flash(lang("Invalid ID!"), $this->controller_index());
			}
			
			set_flash(lang("Report was successfuly deleted"), $this->controller_index() );
		} else {
	
			set_flash(lang("Invalid ID!"), $this->controller_index() );
		}
	}
	
	public function a_getdepartments() {
	
		if ( $this->input->is_ajax_request() ) {
			$hid = $this->input->post('hospital');
				
			if ( $hid != 0 ) {
	
				$data['hospital'] = Hospital::find($hid);
				$data['departments'] = Hospitaldepartment::getByHospitalId($hid);
				
				//print_r($data['departments']);
				
				if( $data['departments'] == false ){
					
					echo "false";
					
				} else {
					
					return $this->load->view('hospitalreports/a_getdepartments', $data);
					
					
				}
				
								
			} else {
	
				return FALSE;
			}
			//return $this->load->view('hospitalreports/a_getdepartments', $data);
	
		} else {
			set_flash("", $this->controller_index());
		}
	}
	
	public function a_getdoctors() {
	
		if ( $this->input->is_ajax_request() ) {
			$hid = $this->input->post('hospital');
			$did = $this->input->post('department');
				
			
			
				if ( $did != 0 ) {
		
					//$data['hospital'] = Hospital::find($hid);
					//$data['doctors'] = Hospitaldoctor::getByDepartmentId($did);
					$data['doctors'] = Hospitaldoctor::getByHospitalDepartment( $hid , $did );
					
					//print_r($data['doctors']);
		
				} else {
					
					return FALSE;
				}
			
			return $this->load->view('hospitalreports/a_getdoctors', $data);
	
		} else {
			set_flash("", $this->controller_index());
		}
	}
	
	public function a_gethospitaldoctors(){
		
		if ( $this->input->is_ajax_request() ) {
			$hid = $this->input->post('hospital');
			
			if ( $hid != 0 ) {
				
				$data['hospital'] = Hospital::find($hid);
				$data['doctors'] = Hospitaldoctor::getByHospitalId($hid);
					
				} else {
				
					return FALSE;
				}
				return $this->load->view('hospitalreports/a_getdoctors', $data);
				
			} else {
					set_flash("", $this->controller_index());
		}
	}
	
	public function a_getdoctorsdepartmentnull() {
	
		if ( $this->input->is_ajax_request() ) {
			$hid = $this->input->post('hospital');
			$did = $this->input->post('department');
	
				
				
			if ( $did == 0 ) {
	
				//$data['hospital'] = Hospital::find($hid);
				//$data['doctors'] = Hospitaldoctor::getByDepartmentId($did);
				$data['doctors'] = Hospitaldoctor::getByDepartmentNull( $hid , NULL);
					
				//print_r($data['doctors']);die;
	
			} else {
					
				return FALSE;
			}
				
			return $this->load->view('hospitalreports/a_getdoctors', $data);
	
		} else {
			set_flash("", $this->controller_index());
		}
	}
	
	public function a_getdoctorspeciality() {
	
		if ( $this->input->is_ajax_request() ) {
			
			$docid = $this->input->post('doctor');
	
			if ( $docid != 0 ) {
	
				$data['hdoctor'] = Hospitaldoctor::find( $docid );
					
				//print_r($data['hdoctors']);die;
			} else {
					
				return FALSE;
			}
				
			return $this->load->view('hospitalreports/a_getdoctorspeciality', $data);
	
		} else {
			set_flash("", $this->controller_index());
		}
	}
	
	
	public function a_getreportpreview() {
	
		if ( $this->input->is_ajax_request() ) {
			$rid = $this->input->post('id');
				
			$data['hreport'] = Hospitalreport::find( $rid );
			//print_r($data['report']);die;
			return $this->load->view("hospitalreports/a_getreportpreview", $data);
		}
	}


}