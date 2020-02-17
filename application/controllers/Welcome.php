<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$this->load->library('session');

		//remove session
		//$this->session->unset_userdata('data_session');

		if($this->session->userdata('data_session')){
			 // do something when exist
			 $newdata['data_session'] = $this->session->userdata('data_session');			 
		}else{
			// do something when doesn't exist
			
			$newdata['data_session'] = array(
						   'status'  => 'save',
						   'username'  => 'johndoe',
						   'email'     => 'johndoe@some-site.com',
						   'logged_in' => TRUE
					   );

			$this->session->set_userdata($newdata);
			$newdata['data_session']['status']='new';
		}



		$this->load->view('welcome_message',$newdata);
	}
}
