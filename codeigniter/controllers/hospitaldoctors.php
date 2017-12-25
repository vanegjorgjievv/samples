<?php
class Hospitaldoctors extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->library("classes/Hospital");
		$this->load->library("classes/Department");
		$this->load->library("classes/Hospitaldepartment");
		$this->load->library("classes/Hospitaldoctor");
		$this->load->library("classes/Hospitalreport");
		
		$this->load->library("pagination");
		$this->load->library("form_validation");
	}
	
	public function index(){
		
		$data = array();
		$data['main'] = "hospitaldoctors/index";
		$data['pagetitle'] = lang("Marti Alko - Hospital Doctors");
		
		$data['hdoctors'] = Hospitaldoctor::find();
		
		return $this->load->view("tpl", $data);
		
	}
	public function insert(){
		
		$data = array();
		$data['main'] = "hospitaldoctors/insert";
		$data['pagetitle'] = lang("Marti Alko - Insert new doctor");
		
		$data['hospdep'] = Hospitaldepartment::find();
		$data['hospitals'] = Hospital::find();
		$data['departments'] = Department::find();
		
		if ( $this->input->post() ) {
		
			//validate
			$this->form_validation->set_message('required', 'Полето %s е задолжително.');
			$this->form_validation->set_message('is_unique', 'Полето %s веќе постои.');
			$this->form_validation->set_message('is_natural_no_zero', 'Мора да внесите %s.');
			$this->form_validation->set_rules('firstname', '<b>'.lang("Firstname").'</b>', 'required|trim|xss_clean');
			$this->form_validation->set_rules('lastname', '<b>'.lang("Lastname").'</b>', 'required|xss_clean');
			$this->form_validation->set_rules('speciality', '<b>'.lang("Speciality").'</b>', 'required|xss_clean');
			$this->form_validation->set_rules('hospital', '<b>'.lang("Hospital").'</b>', 'required|is_natural_no_zero|xss_clean');
			//$this->form_validation->set_rules('doctor', '<b>'.lang("Doctor").'</b>', 'required|is_natural_no_zero|xss_clean');
			//$this->form_validation->set_rules('city', '<b>'.lang("City").'</b>', 'required|is_natural_no_zero|xss_clean');
			//$this->form_validation->set_rules('department', '<b>'.lang("Department").'</b>', 'required|xss_clean');
		
			if ($this->form_validation->run() == FALSE) {
		
				return $this->load->view("tpl", $data);
			}
		
		
			$hdoctor = new Hospitaldoctor();
		
			$hdoctor->setId(0);
			$hdoctor->setFirstname( $this->input->post("firstname") );
			$hdoctor->setLastname( $this->input->post("lastname") );
			$hdoctor->setSpeciality( $this->input->post("speciality") );
			$hdoctor->setHospital( $this->input->post("hospital") );
			
			if ( $this->input->post("department") == 0 ){
				
				$hdoctor->setDepartment(NULL);
				
			}else{
				
				$hdoctor->setDepartment( $this->input->post("department") );
			}
			
			$hdoctor->setPhone( $this->input->post("phone") );
			$hdoctor->setEmail( $this->input->post("email") );
			$hdoctor->setComment( $this->input->post("comment") );
				
			
			$hdid = $hdoctor->insert();
				
			
			if ( $hdid ) {
				set_flash(lang("Doctor successfuly added"), $this->controller_index() );
			} else {
				set_flash(lang("Error occured!"), $this->controller_index() );
			}
		
		}
		
		return $this->load->view("tpl" , $data);
		
		
		
	}
	public function edit( $id = 0 ){
		
		$data = array();
		$data['main'] = "hospitaldoctors/edit";
		$data['pagetitle'] = lang("Marti Alko - Edit doctor");
		
		$data['hospdep'] = Hospitaldepartment::find();
		$data['hospitals'] = Hospital::find();
		$data['departments'] = Department::find();
		
		if ( $this->input->post() ) {
			
			$hdid = $this->input->post("hdid");
			$hdoctor = Hospitaldoctor::find($hdid);
			$data['hdoctor'] = $hdoctor;
			
			//validate
			$this->form_validation->set_message('required', 'Полето %s е задолжително.');
			$this->form_validation->set_message('is_unique', 'Полето %s веќе постои.');
			$this->form_validation->set_message('is_natural_no_zero', 'Мора да внесите %s.');
			$this->form_validation->set_rules('firstname', '<b>'.lang("Firstname").'</b>', 'required|trim|xss_clean');
			$this->form_validation->set_rules('lastname', '<b>'.lang("Lastname").'</b>', 'required|xss_clean');
			$this->form_validation->set_rules('speciality', '<b>'.lang("Speciality").'</b>', 'required|xss_clean');
			$this->form_validation->set_rules('hospital', '<b>'.lang("Hospital").'</b>', 'required|is_natural_no_zero|xss_clean');
			//$this->form_validation->set_rules('doctor', '<b>'.lang("Doctor").'</b>', 'required|is_natural_no_zero|xss_clean');
			//$this->form_validation->set_rules('city', '<b>'.lang("City").'</b>', 'required|is_natural_no_zero|xss_clean');
			//$this->form_validation->set_rules('department', '<b>'.lang("Department").'</b>', 'required|xss_clean');
		
			if ($this->form_validation->run() == FALSE) {
		
				return $this->load->view("tpl", $data);
			}
		
		
			//$hdoctor = new Hospitaldoctor();
		
			//$hdoctor->setId(0);
			$hdoctor->setFirstname( $this->input->post("firstname") );
			$hdoctor->setLastname( $this->input->post("lastname") );
			$hdoctor->setSpeciality( $this->input->post("speciality") );
			$hdoctor->setHospital( $this->input->post("hospital") );
			if ( $this->input->post("department") == 0 ){
				
				$hdoctor->setDepartment(NULL);
				
			}else{
				
				$hdoctor->setDepartment( $this->input->post("department") );
			}
			$hdoctor->setPhone( $this->input->post("phone") );
			$hdoctor->setEmail( $this->input->post("email") );
			$hdoctor->setComment( $this->input->post("comment") );
				
			$hdup = $hdoctor->update();
		
				
			if ( $hdup ) {
				set_flash(lang("Doctor updated sucessfuly"), $this->controller_index() );
			} else {
				set_flash(lang("Error occured!"), $this->controller_index() );
			}
		
		
		
		set_flash(lang("Doctor updated sucessfuly"), "/hospitaldoctors");
	}
		if ( $id AND is_numeric( $id ) ) {
				
			$data['hdoctor'] = Hospitaldoctor::find( $id );
		
			//print_r($data);die;
		
			return $this->load->view("tpl", $data);
		
		} else {
		
			set_flash(lang("Invalid ID!"), "/hospitaldoctors");
		}
		
	}
	public function delete( $id = 0 ) {
	
		if ( $id and is_numeric( $id )) {
	
			$hdoctor = Hospitaldoctor::find($id);
			if ( $hdoctor ){
	
				$reports = Hospitalreport::getByDoctorId( $id );
	
				if ( count ($reports) > 0){
					foreach( $reports as $r ){
	
						$r->delete();
					}
				}
					
				$h = $hdoctor->delete();
			}
	
			if ( $h ) {
				set_flash(lang("Doctor deleted"), $this->controller_index());
			} set_flash(lang("Error while deleting doctor"), $this->controller_index());
	
		} set_flash(lang("Error occured!"), $this->controller_index());
	
	}
	
	
	public function a_getdepartments() {
	
		if ( $this->input->is_ajax_request() ) {
			$hid = $this->input->post('hospital');
			
			if ( $hid != 0 ) {
	
				$data['hospital'] = Hospital::find($hid);
				$data['departments'] = Hospitaldepartment::getByHospitalId($hid);
					
			} else {
	
				return FALSE;
			}
			return $this->load->view('hospitaldoctors/a_getdepartments', $data);
				
		} else {
			set_flash("", $this->controller_index());
		}
	}
	
}