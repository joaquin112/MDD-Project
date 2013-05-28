<?php

class Homepage extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function getContent($orderBy)
    {
	    $content = '';
	    $fullArray = array();
	    
	    $this->db->select("thoughts.id as userid, imagepath, url, author, title, users.username as username, rating, votes")->from("thoughts")->join('users', 'thoughts.author = users.id')->order_by($orderBy, "desc");
	    $query = $this->db->get();
		
		foreach ($query->result() as $row)
		
			{
			    
			    //$content .= "<h2>" . $row->title . "</h2>" . "<img src = '" . $row->imagepath . "'/><p><a href = 'report/" . $row->id . "'>Report</a>";
			    
			    $array['title'] = $row->title;
			    $array['imagepath'] = $row->imagepath;
			    $array['username'] = $row->username;
			    $array['userid'] = $row->author;
			    $array['thoughtid'] = $row->userid;
			    $array['rating'] = $row->rating;
			    $array['votes'] = $row->votes;
			    
			    array_push($fullArray, $array);
			    
			}
			
		
	    
	    return $fullArray;
	    
    }


}

?>