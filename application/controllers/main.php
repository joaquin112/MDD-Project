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
                
         }
        
    }
    
    
    
    function _fullTemplateData()
    {
        //This function returns all the data needed for the template to work.
        
        $this->load->library('templatedata');
        
        $data = $this->templatedata->fullTemplate($this->tank_auth->get_username());
        
        return $data;
        
    }
    
    public function index()
    {
        
        $this->load->model("getcontent");

        $content = $this->getcontent->getHomepageContent();
        
        $this->load->view('main');
        
    }
    
    public function signup()
    {
	    
	    $this->load->model("getcontent");
        $content = $this->getcontent->getHomepageContent();
	    
	    $this->load->view('main');
	    
    }
    
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */