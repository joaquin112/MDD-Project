<?php

class Login extends Main {


	function main()
	{


		$this->load->helper('url');
		$this->load->library('tank_auth');
	
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		if ($this->tank_auth->login($username, $password, TRUE, TRUE, TRUE)) {
			
			redirect(base_url());
			
		} else {
			
			$this->login("Wrong username/password combination");
			
		}
		
	}
}

?>