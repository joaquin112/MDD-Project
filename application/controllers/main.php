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
            case 'listingpage':
                $this->listingPage();
                break;
            case 'detailpage':
                $this->detailPage();
                break;
            case 'forms':
            	$this->forms();
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
	   
	   } 
	    
    }
    
    public function index()
    {
        $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->getHomepageContent();
        
        $data = array("title" => $title, "content" => $content);
        
        $this->load->view('main', $data);
    }
    
    public function login()
    {
	    $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->login();
        
        $data = array("title" => $title, "content" => $content);
	    
	    $this->load->view('main', $data);
    }
    
    public function signup()
    {
	    $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->signup();
        
        $data = array("title" => $title, "content" => $content);
	    
	    $this->load->view('main', $data);
    }
    
    public function listingPage()
    {
	    $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->listingPage();
        
        $data = array("title" => $title, "content" => $content);
	    
	    $this->load->view('main', $data);
    }
    
    public function detailPage()
    {
	    $this->load->model("getcontent");
        list($title, $content) = $this->getcontent->detailPage();
        
        $data = array("title" => $title, "content" => $content);
	    
	    $this->load->view('main', $data);
    }
    
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */