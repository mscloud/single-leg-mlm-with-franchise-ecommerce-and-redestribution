<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('m_m');
    }
        
	public function index() {
	    $data['page'] = 'home';
	    $data['title'] = ucfirst('home');
	    $this->load->view('template/head',$data);
	    $this->load->view('template/header',$data);
		$this->load->view('home',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function page($page = 'home') {
	    $data['page'] = $page;
	    $data['title'] = ucfirst($page);
	    if ( ! file_exists(APPPATH.'views/'.$page.'.php')) {
                show_404();
        }
        if ($page == 'products') {
            $data['products'] = $this->m_m->get_where_multi ('products',array());
        }
        if ($page == 'frienchies') {
            $data['frienchies'] = $this->m_m->branches('get_this',array());
        }
	    $this->load->view('template/head',$data);
	    $this->load->view('template/header',$data);
		$this->load->view($page,$data);
		$this->load->view('template/footer',$data);
	}
}
