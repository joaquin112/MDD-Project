<?php

class Getcontent extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }
    
    function getHomepageContent($orderBy = "thoughts.id")
    {
    
    	$this->load->model("pages/homepage");
    	$data = $this->homepage->getContent($orderBy);
    	$content = '';
    	
    	//$content = $this->load->view("pages/homepage", array("content" => $data, "username" => $this->tank_auth->get_username()), TRUE);
    	
    	foreach($data as $array) {
	    	
	    		$title = $array['title'];
	    		$tContent = $array['imagepath'];
	    		$userId = $array['userid'];
	    		$author = $array['username'];
	    		$thoughtId = $array['thoughtid'];
	    		$rating = $array['rating'];
	    		$votes = $array['votes'];
	    		
	    		 $afterTitle = $this->load->view("extra/share", array("thoughtid" => $thoughtId), TRUE);
	    		
				$content .= $this->load->view("incontenttwo", array("title" => $title, "content" => $tContent, "afterTitle" => $afterTitle, "author" => $author, "userId" => $userId, "rating" => $rating, "votes" => $votes), TRUE);
	    	

	    	
    	}
    	
        $title = "Positive Thoughts";
        
        return array($title, $content);
    }
    
    
    function getTopContent()
    {
	    
	    $content = $this->getHomepageContent("rating");
	    
	    return $content;
	    
    }
    
        
    function login($error)
    {
    
    	$data = array("error" => $error);
        $content = $this->load->view('forms/login', $data, TRUE);
        $title = "Login to our website";
        
        return array($title, $content);
    }
    
    function contact()
    {
        $content = $this->load->view('pages/contact', '', TRUE);
        $title = "Contact Us";
        
        return array($title, $content);
    }
    
    function getThankyouContent()
    {
	    
	    $content = "Thank you for submitting our form.";
	    
	    $title = "Thank you";
	    
	    return array($title, $content); 
	    
    }
    
    function subscribe()
    {
	    
	     $content = $this->load->view('pages/subscribe', '', TRUE);
	    
	    $title = "Subscribe to our Newsletter";
	    
	    return array($title, $content); 
	    
    }
    
	function getUsers($user)
    {
    	
    	if ($user > 0) {
	    	
	    	$title = "User Profile";
	    	
	    	$content = "This is a user profile";
	    	
    	} else {
    	
	    	$this->load->model("pages/allusers");
	    	$content = $this->allusers->getContent();
	        $title = "View all users";
        
        }
        
        return array($title, $content);
    }

    
    function submit()
    {
    
    	$data = array('username' => $this->tank_auth->get_username());
        
        $content = $this->load->view('pages/submit', $data, TRUE);
 
        $title = "Submit a thought";
        
        return array($title, $content);
    }

    function signup($error)
    {
        
        $data = array("error" => $error);
        
        $content = $this->load->view('forms/signup', $data, TRUE);
        
        $title = "Sign up to our website";
        
        return array($title, $content);
    }
    
    function listingPage()
    {
        $content = 'Listing page';
        $title = "Title";
        
        return array($title, $content);
    }

    function detailPage()
    {
        $content = 'Detail Page';
        $title = "Title";
        
        return array($title, $content);
    }

}

?>