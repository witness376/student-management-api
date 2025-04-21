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
			 
<<<<<<< HEAD
			 $this->load->model('student_model');
			 $this->load->model('subject_model');
			
=======
			 $this->load->model('Student_model');
			 $this->load->model('Subject_model');
			 $this->load->library('output');
>>>>>>> 07a4b0911ae8dabef5d3ddd284f990457a046ed4
		 }
	 
		 
		 public function students() {
			
			 $students = $this->student_model->get_all_students();
			 header('Content-Type: application/json');
	 
			 echo json_encode($students);
		 }
	 
		 
		 public function subjects() {
			 
			 $subjects = $this->subject_model->get_all_subjects();
			 header('Content-Type: application/json');
	 
	
			echo json_encode($subjects);
		 }
	 
	 public function api_links() {
		$this->load->view('api_links');
	}
}