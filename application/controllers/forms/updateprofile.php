<?php

class Updateprofile extends Main {


	function main()
	{


		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth');
	
		$content = $this->input->post('content');
		$id = $this->tank_auth->get_user_id();
		
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() == FALSE)
		{
		
			show_error("You must enter a description");		
		}
		
		else {
			
			$array['about'] = $content;
			
			
			$this->db->where("id", $id);
			if ($this->db->update("user_profiles", $array)) {
				
				redirect("users");
				
			}
			
			
			}
			
	}
	
}

?>