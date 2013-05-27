<?php

class Getcontent extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }
    
    function getHomepageContent()
    {
    
    	$afterTitle = "<div class = 'share'>Facebook info goes here</div>";
    
    	$this->load->model("pages/homepage");
    	$data = $this->homepage->getContent();
    	$content = '';
    	
    	//$content = $this->load->view("pages/homepage", array("content" => $data, "username" => $this->tank_auth->get_username()), TRUE);
    	
    	foreach($data as $item=>$key) {
	    	
			$content .= $this->load->view("incontenttwo", array("title" => $item, "content" => $key, "afterTitle" => $afterTitle), TRUE);
	    	
    	}
    	
        $title = "Positive Thoughts";
        
        return array($title, $content);
    }
    
        
    function login($error)
    {
    
    	$data = array("error" => $error);
        $content = $this->load->view('forms/login', $data, TRUE);
        $title = "Login to our website";
        
        return array($title, $content);
    }

	function getUsers()
    {
    	
    	$this->load->model("pages/allusers");
    	$content = $this->allusers->getContent();
        $title = "View all users";
        
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