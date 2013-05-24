<?php

class Submit extends Main {


	function main()
	{


		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth');
	
		$title = $this->input->post('title');
		$imageurl = $this->input->post('imageurl');
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('imageurl', 'Image URL', 'required|is_unique[thoughts.imagepath]');

		if ($this->form_validation->run() == FALSE)
		{
		
			//$this->register();
		
		}
		
		else {
			
			$slug = $this->toAscii($title);
			$username = $this->tank_auth->get_username();
			
			if ($username == "") {die("Must be logged in");}
		
			$data['title'] = $title;
			$data['imagepath'] = $imageurl;
			$data['url'] = $slug;
			$data['author'] = $username;
			$data['date'] = time(); //UNIX timestamp
			$data['numcomments'] = 0;
			$data['category'] = "undefined";

			if ($this->db->insert("thoughts", $data)) {
				
				redirect(base_url());
				
			}
		
		}
		
	}
	
	function toAscii($str, $replace=array(), $delimiter='-') {
	
		setlocale(LC_ALL, 'en_US.UTF8');
	
		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}
	
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	
		return $clean;
	}
	
}

?>