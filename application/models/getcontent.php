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
    }
    
        
    function login()
    {
        
        $content = 'Login here';
        
    }

    function signup()
    {
        
        $content = 'Sign up here';
        
    }
    
    function listingPage()
    {
        $content = 'Listing page';
    }

    function detailPage()
    {
        $content = 'Detail Page';
    }

}

?>