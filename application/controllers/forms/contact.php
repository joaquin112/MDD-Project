<?php

	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');
	$this->load->library('tank_auth');
	
	$message = $this->input->post('message');
	$email = $this->input->post('email');
	
	redirect($this->config->item("base_url") . "thankyou");

?>