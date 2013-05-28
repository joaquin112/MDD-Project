<?php

	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');
	$this->load->library('tank_auth');

	$email = $this->input->post('email');
	
	redirect($this->config->item("base_url") . "thankyou");

?>