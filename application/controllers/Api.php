<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	 
		 public function __construct() {
			 parent::__construct();
			 
			 $this->load->model('Student_model');
			 $this->load->model('Subject_model');
		 }
	 
		 
		 public function students() {
			
			 $students = $this->Student_model->get_all_students();
	 
			 $this->output
				 ->set_content_type('application/json')
				 ->set_output(json_encode($students));
		 }
	 
		 
		 public function subjects() {
			 
			 $subjects = $this->Subject_model->get_software_engineering_subjects();
	 
	
			 $this->output
				 ->set_content_type('application/json')
				 ->set_output(json_encode($subjects));
		 }
	 }
	 