<?php

class Getcontent extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getHomepageContent()
    {
        $content = 'This is the homepage';
        $title = "Title";
    }
    
        
    function login()
    {
        
        $content = 'Login here';
        $title = "Title";
        
    }

    function signup()
    {
        
        $content = 'Sign up here';
        $title = "Title";
        
    }
    
    function listingPage()
    {
        $content = 'Listing page';
        $title = "Title";
    }

    function detailPage()
    {
        $content = 'Detail Page';
        $title = "Title";
    }

}

?>