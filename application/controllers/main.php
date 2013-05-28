<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller
{
    
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -  
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    
    function __construct()
    {
    
        parent::__construct();
        
        $this->load->library('session'); 
        $this->load->library('tank_auth');
        
    }
    
    function _remap()
    {
        
    	$segment_1 = $this->uri->segment(2);
       
        switch ($segment_1) { 
        
       	 	case null:
            case false:
            case "index":
            case '':
                $this->index();
                break;
            case 'login':
                $this->login();
                break;
            case 'signup':
                $this->signup();
                break;
            case 'users':
                $this->users();
                break;
            case 'listingpage':
                $this->listingPage();
                break;
            case 'detailpage':
                $this->detailPage();
                break;
            case 'forms':
            	$this->forms();
            	break;
            case 'submit':
            	$this->submit();
            	break;
                
         }
        
    }
    
    
    function _fullTemplateData()
    {
        //This function returns all the data needed for the template to work.
        $this->load->library('templatedata');
        
        $data = $this->templatedata->fullTemplate($this->tank_auth->get_username());
        
        return $data;
    }
    
    public function forms()
    
    { 
	   
	   $scriptUrl = $this->uri->segment(3);
	   
	   $file = "forms/$scriptUrl.php";		    
	 	    
	   $userName = $this->tank_auth->get_username();
	   $userId = $this->tank_auth->get_user_id();	    
	 	    
	   include $file;
	   
	   if ($scriptUrl == "register") {
	   
		   $register = new Register();
		   
		   $register->main();
	   
	   } else if ($scriptUrl == "login") {
	   
		   $register = new Login();
		   
		   $register->main();
	   
	   } else if ($scriptUrl == "submit") {
	   
		   $submit = new Submit();
		   
		   $submit->main();
	   
	   } 
	    
    }
    
    public function index()
    {
        $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->getHomepageContent();
        $this->loadView($title, $content, true);
    }
    
    public function users()
    {
        $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->getUsers();
        $this->loadView($title, $content);
    }
    
    public function login($error = "")
    {
	    $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->login($error);
        $this->loadView($title, $content);
    }
    
    public function signup($error = "")
    {
	    $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->signup($error);
        $this->loadView($title, $content);
    }
    
    public function listingPage()
    {
	    $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->listingPage();
        $this->loadView($title, $content);
    }
    
    public function submit()
    {
	    $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->submit();
        $this->loadView($title, $content);
    }
    
    public function detailPage()
    {
	    $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->detailPage();
        $this->loadView($title, $content);
    }
    
    private function loadView($title, $content, $isHomepage = false) {
	     
	     //This is where I will set all the design variables to aid full encapsulation for my view.
	    
		 if ($this->tank_auth->is_logged_in()) {
	    
	     	$username = $this->tank_auth->get_username();
	     
	     } else {
		     
		     $username = '';
		     
	     }
	     
	     if ($username == "") {$usernameText = "Not logged in";} else {$usernameText = $username;}
	    
	     $data = array("title" => $title, "content" => $content, "username" => $usernameText, "isHomepage" => $isHomepage);
	    
	    $this->load->view('main', $data);
	    
    }
    
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */