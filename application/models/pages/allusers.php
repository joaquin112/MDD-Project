<?php

class Allusers extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function getContent()
    {
	    $content = '';
	    
	    $this->db->select("username, id")->from("users")->order_by("id", "asc");
	    $query = $this->db->get();
		
		foreach ($query->result() as $row)
		
			{
			    
			    $content .= "<p><a href = '" . $this->config->item("base_url") . "users/" . $row->id . "'>" . $row->username . "</h2>";
			    
			    
			}
	    
	    return $content;
	    
    }


}

?>