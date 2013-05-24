<?php

class Homepage extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function getContent()
    {
	    $content = '';
	    
	    $this->db->select("imagepath, url, title")->from("thoughts")->order_by("id", "desc");
	    $query = $this->db->get();
		
		foreach ($query->result() as $row)
		
			{
			    
			    $content .= "<h2>" . $row->title . "</h2>" . "<img src = '" . $row->imagepath . "'/>";
			    
			}
	    
	    return $content;
	    
    }


}

?>