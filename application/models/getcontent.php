<?php

class Getcontent extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getHomepageContent()
    {
        $content = "This is the homepage. You can <a href = 'login'>login</a>, <a href = 'signup'>signup</a>, <a href = 'listingpage'>view listing pages</a> or view <a href = 'detailpage'>Detail page</a>.";
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