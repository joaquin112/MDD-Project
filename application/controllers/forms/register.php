<?php

class Register extends Main {


	function main()
	{


		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('m_form_validation');
		
		$this->load->library('tank_auth');
	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		
		$this->form_validation->set_rules('username', 'Username', 'min_length[1]|max_length[20]|required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[2]|max_length[20]|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

		if ($this->form_validation->run() == FALSE)
		{
		
			$this->register();
		
		}
		
		else {

			if ($this->tank_auth->create_user($username, $email, $password, FALSE)) {
				
				redirect(base_url());
				
			} else {
				
				redirect(base_url() . "register.html");
				
			}
		
		}
		
	}
}

?>