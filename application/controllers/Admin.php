<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_s');
        $this->load->helper('url_helper');
        $this->load->helper('form');
    }
    
	public function index() {
	    $data['page'] = 'home';
	    $data['title'] = ucfirst('home');
	    $this->load->view('member/template/head',$data);
	    $this->load->view('member/template/header',$data);
		$this->load->view('member/home',$data);
		$this->load->view('member/template/footer',$data);
	}
	
	public function page($page = 'home') {
	    if (!$this->session->ylifetype == 'A' ) { redirect('member/home','location'); }
	    $data['page'] = $page;
	    $data['title'] = ucfirst($page);
	    $data['member'] = $this->m_s->get_where('members',array('MemID' => $this->session->ylife)); 
	    
	    if ($page == 'branches') { $data['status'] = $this->branches(); $data['branches'] = $this->m_s->get_where_multi('branches',array());}
	    if ($page == 'products') { $data['products'] = $this->m_s->products('get_multi',array());}
	    if ($page == 'images') { $data['images'] = $this->m_s->images('upload',array()); $data['status'] = $this->image_upload();}
	    if ($page == 'sponsor') $this->sponsor();
	    if ($page == 'closing') { 
	        $data['details'] = $this->m_s->closing_details();
	        if (count($data['details']) > 0) { redirect("admin/closing_details","Location"); exit; }
	        if ($this->input->post('close')){
	            $this->m_s->closing(); 
	            redirect("admin/closing_details","Location");
	        }
	    }
	    if ($page == 'closing_details') { 
	        $data['details'] = $this->m_s->closing_details();
	        if (count($data['details']) == 0) redirect("admin/closing","Location");
	    }
	    
	    if ($page == 'withdraw_requests') {
	        $this->form_validation->set_rules('id', 'request ID', 'required');
	        $this->form_validation->set_rules('remarks', 'Remarks', 'required');
    		if ($this->form_validation->run() === TRUE) {
    			$data['status'] = $this->m_s->process_widthraw();
    		}
	        $this->m_s->db->select("*");
	        $this->m_s->db->from("members");
	        $this->m_s->db->join('widthraw','widthraw.userID=members.MemID');
	        $data['requests'] = $this->m_s->db->get_where('',array('widthraw.cStatus' => 'H'))->result_object();
	    }
	    
	    if ($page == 'members') { 
	        $this->form_validation->set_rules('member', 'Member', 'required');
    		if ($this->form_validation->run() === TRUE) {
    		    $this->m_s->activate_member(array('member' => $this->input->post('member')));
    		    //$this->m_s->db->where('MemID',$this->input->post('member'));
    			//$data['status'] = $this->m_s->db->update('members',array('Active' => 'Y'));
    		}
	        $this->m_s->db->select('a.*, b.Name as spName, b.Contact as spContact');
	        $this->m_s->db->from('members as a');
	        $this->m_s->db->join('members as b', 'a.sponsor=b.MemID','left');
	        $this->m_s->db->order_by('a.MemID','DESC');
	        $data['members'] = $this->m_s->db->get('')->result_object();
	        
	    }
	    
	    if ( ! file_exists(APPPATH.'views/member/admin/'.$page.'.php')) {
                show_404();
        }
        
        
        $this->load->view('member/template/head',$data);
        $this->load->view('member/template/header',$data);
        $this->load->view('member/template/leftside',$data);
        $this->load->view('member/template/rightside',$data);
		$this->load->view('member/admin/'.$page,$data);
		$this->load->view('member/template/footer',$data);
	}
	function branches() {
	    $this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
	    $this->form_validation->set_rules('branch_category', 'Category ', 'required');
	    $this->form_validation->set_rules('branch_code', 'Branch Code', 'required');
	    $this->form_validation->set_rules('branch_manager', 'Branch Manager', 'required');
	    if ($this->form_validation->run()) {
	        $name = $this->input->post('branch_name');
	        $category = $this->input->post('branch_category');
	        $code = $this->input->post('branch_code');
	        $manager = $this->input->post('branch_manager');
	        $manager = str_replace("YLF","",$manager);
	        $member = $this->m_s->get_where('members',array('Contact' =>$manager));
	        $data = array(
	                        "brName" => $name, 
	                        'brManager' => $member->MemID,
	                        'brCategory' => $category,
	                        'brCode' => $code
	               );
	        $this->m_s->insert('branches',$data);
	        $member = $this->m_s->get_where('branches',array('brManager' => $member->MemID));
	        return $this->m_s->update('members',array('Contact' => $manager),array('lcBranch' => $member->brID, 'MemType' => 'S'));
	    }
	}
	function sponsor () {
	    $this->form_validation->set_rules('sponsor', 'Name', 'required');
	    if ($this->form_validation->run()) {
	        $mobile = $this->input->post('sponsor');
	        $mobile = str_replace("YLF","",$mobile);
	        $data = array('Contact' => $mobile);
	        $result = $this->m_s->get_where_multi('members',$data); 
	        if (count($result) == 1) {
	            echo $result[0]->Name;
	        } else echo 'No Match Found';
	        exit;
	    } else echo 'No Match Found';
	    exit;
	}
}