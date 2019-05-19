<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_m');
        $this->load->helper('url_helper');
        $this->load->library('template');
        $this->load->library('form_validation');
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
	    $data['page'] = $page;
	    $data['title'] = ucfirst($page);
	    if (!$this->session->ylife) redirect('member/account/login','location');
	    $data['member'] = $this->m_m->get_where('members',array('MemID' => $this->session->ylife));
	    if ($page == 'home') { 
	        $data['sponsors'] = $this->m_m->get_where_multi('members',array('sponsor' => $this->session->ylife)); 
	        $data['account_info'] = $this->m_m->get_where_multi('member_downline',array('memID' => $this->session->ylife));  
	    }
	    if ($page == 'personal_info') { $data['status'] = $this->personal_info(array('MemID' => $this->session->ylife)); }
	    if ($page == 'nominee_details') { $data['status'] = $this->nominee(array('MemID' => $this->session->ylife)); }
	    if ($page == 'banking_details') { $data['status'] = $this->banking_details(array('MemID' => $this->session->ylife)); }
	    if ($page == 'update_password') { $data['status'] = $this->update_password(array('MemID' => $this->session->ylife)); }
	    if ($page == 'logout') { $this->logout(); }
	    
	    if ($page == 'wallet') { $page = 'wallet'; }
	    if ($page == 'withdraw') { 
	        $page = 'wallet'; 
	        $data['status'] = $this->withdraw();
	        $this->m_m->db->order_by('id', 'DESC');
	        $data['withdrawls'] = $this->m_m->db->get_where('widthraw',array('userID' => $this->session->ylifebranch))->result_object();
	    }
	    if ($page == 'withdrawls') { 
	        $this->m_m->db->order_by('id', 'DESC');
	        $data['withdrawls'] = $this->m_m->db->get_where('widthraw',array('userID' => $this->session->ylifebranch, 'cStatus' => 'Y'))->result_object();
	    }
	    
	    if ($page == 'my_members') { $page = "members"; $data['members'] = $this->m_m->members('get_this_multi',array('where' => 'a.sponsor='.$this->session->ylife." AND a.Active='Y'")); }
	    if ($page == 'inactive_my_members') { $page = "members"; $data['members'] = $this->m_m->members('get_this_multi',array('where' => 'a.sponsor='.$this->session->ylife." AND a.Active='N'")); }
	    if ($page == 'my_downline') { $page = "members"; $data['members'] = $this->m_m->downline(array('where' => 'a.sponsor='.$this->session->ylife)); }
	    
	    if ($page == 'order_now') { 
	        $data['status'] = $this->order_now();
	        $data['products'] = $this->m_m->get_where_multi('products',array()); 
	        $data['branches'] = $this->m_m->get_where_multi('branches',array()); 
	    }
	    if ($page == 'my_orders') { 
	        $data['orders'] = $this->m_m->orders('get_this',array('orders.memID' => $this->session->ylife));
	    }
	    if ($page == 'business-plan') { 
	        $data['company_income'] = $this->m_m->get_where_multi('level_income_company',array());
	        $data['selfteam_income'] = $this->m_m->get_where_multi('level_income_selfteam',array());
	    }
	    
	    if ( ! file_exists(APPPATH.'views/member/'.$page.'.php')) {
                show_404();
        }
        $this->load->view('member/template/head',$data);
        $this->load->view('member/template/header',$data);
        $this->load->view('member/template/leftside',$data);
        $this->load->view('member/template/rightside',$data);
		$this->load->view('member/'.$page,$data);
		$this->load->view('member/template/footer',$data);
	}
	
	function withdraw () {
	    $this->form_validation->set_rules('amount', 'Withdrawl Amount', 'required|numeric');
	    if ($this->form_validation->run()) {
	        $res = $this->m_m->get_where('members',array('MemID' => $this->session->ylifebranch));
	        if ($res->Balance >= $this->input->post('amount')) {
	            $data = array (
    	            'userID' => $this->session->ylifebranch,
    	            'amount' => $this->input->post('amount'),
    	            'date' => date("Y-m-d h:i:s"),
    	            'cStatus' => 'H'
	                );
            	   $this->m_m->db->insert('widthraw',$data);
            	   $this->m_m->db->where('MemID', $this->session->ylifebranch);
            	   return $this->m_m->db->update('members',array('Balance' => ($res->Balance - $this->input->post('amount'))));
	        } else {
	            return "Withdrawl Amount has been exeeded.";
	        }
	    }
	}
	function order_now () {
	    $this->form_validation->set_rules('product', 'Product', 'required|numeric');
	    $this->form_validation->set_rules('qty', 'Quantity', 'required|numeric|min_length[1]|max_length[3]');
	    $this->form_validation->set_rules('method', 'Payment method', 'required');
	    if ($this->form_validation->run()) {
	        $product = $this->input->post('product');
	        $qty = $this->input->post('qty');
	        if ($this->input->post('method') == 'online') {
	            $method = 'P';
	            $payment_status = 'Y';
	        }
	        else {
	            $method = 'C';
	            $payment_status = 'N';
	            return $this->order_placed($product,$qty,$method,$payment_status);
	        }
	    }
	}
	function order_placed($product,$qty,$method,$payment_status) {
	    $stock = $this->m_m->get_where_multi('stock',array('prID' => $product, 'brID' => $this->session->ylifebranch));
        if (count($stock) == 1) {
            if ($stock[0]->qty >= $qty) {
                $product_info = $this->m_m->get_where_multi('products',array('pID' => $product));
                $this->m_m->update('stock',array('prID' => $product, 'brID' => $this->session->ylifebranch), array('qty' => ($stock[0]->qty - $qty)));
                $data = array(
    	                    'pID' => $product,
    	                    'memID' => $this->session->ylife,
    	                    'brID' => $this->session->ylifebranch,
    	                    'qty' => $qty,
    	                    'oDate' => date("Y-m-d h:i:s"),
    	                    'uPrice' => $product_info[0]->Price,
    	                    'tPrice' => ($product_info[0]->Price*$qty),
    	                    'oStatus' => 'H',
    	                    'pMethod' => $method,
    	                    'pStatus' => $payment_status
    	                    
                         );
                return $this->m_m->insert('orders',$data);
            }
            else {
                if ($stock[0]->qty > 0) return "You can order only ".$stock[0]->qty." unit(s).";
                else return "Out of Stock.";
            }
        } else "Product not available";
	}
	function update_password ($data1) {
	    $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[8]');
	    $this->form_validation->set_rules('confirm', 'Confirm', 'required|matches[password]');
	    if ($this->form_validation->run()) {
	        $data2 = array( "Pass" => $this->input->post('password'));
	        return $this->m_m->update('members',$data1,$data2);
	    }
	}
	function personal_info ($data1) {
	    $this->form_validation->set_rules('father_husband', 'Father / Husband', 'required');
	    $this->form_validation->set_rules('gender', 'Gender', 'required');
	    $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
	    $this->form_validation->set_rules('occupation', 'Occupation', 'required');
	    $this->form_validation->set_rules('address', 'Address', 'required');
	    $this->form_validation->set_rules('city', 'City', 'required');
	    $this->form_validation->set_rules('state', 'State', 'required');
	    $this->form_validation->set_rules('pin', 'Pincode', 'required');
	    if ($this->form_validation->run()) {
	        $data2 = array(
	            "Father_husband" => $this->input->post('father_husband'),
	            "Gender" => $this->input->post('father_husband'),
	            "DOB" => $this->input->post('dob'),
	            "Occupation" => $this->input->post('occupation'),
	            "Address" => $this->input->post('address'),
	            "City" => $this->input->post('city'),
	            "State" => $this->input->post('state'),
	            "Country" => 'India',
	            "Pincode" => $this->input->post('pin')
	            
	        );
	        return $this->m_m->update('members',$data1,$data2);
	    }
	}
	function nominee ($data1) {
	    $this->form_validation->set_rules('nominee_name', 'Nominee name', 'required');
	    $this->form_validation->set_rules('nominee_guardian', 'Father/ husband/ Wife', 'required');
	    $this->form_validation->set_rules('nominee_address', 'Address', 'required');
	    $this->form_validation->set_rules('nominee_dob', 'date of Birth', 'required');
	    $this->form_validation->set_rules('nominee_relation', 'Relation with Nominee', 'required');
	    if ($this->form_validation->run()) {
	        $data2 = array(
	            "nominee_name" => $this->input->post('nominee_name'),
	            "nominee_guardian" => $this->input->post('nominee_guardian'),
	            "nominee_address" => $this->input->post('nominee_address'),
	            "nominee_dob" => $this->input->post('nominee_dob'),
	            "nominee_relation" => $this->input->post('nominee_relation')
	            
	        );
	        return $this->m_m->update('members',$data1,$data2);
	    }
	}
	function banking_details ($data1) {
	    $this->form_validation->set_rules('bank', 'Bank Name', 'required');
	    $this->form_validation->set_rules('branch', 'Branch', 'required');
	    $this->form_validation->set_rules('account', 'Account', 'required');
	    $this->form_validation->set_rules('ifsc', 'IFS Code', 'required');
	    $this->form_validation->set_rules('pancard', 'Pancard', 'required');
	    if ($this->form_validation->run()) {
	        $data2 = array(
	            "Bank" => $this->input->post('bank'),
	            "Branch" => $this->input->post('branch'),
	            "Account" => $this->input->post('account'),
	            "IFSC" => $this->input->post('ifsc'),
	            "Pancard" => $this->input->post('pancard')
	            
	        );
	        return $this->m_m->update('members',$data1,$data2);
	    }
	}
	function logout () {
	   $this->session->unset_userdata("ylife");
	   $this->session->unset_userdata("ylifename");
	   $this->session->unset_userdata("ylifetype");
	   $this->session->unset_userdata("ylifecontact");
	   redirect('member/home','location');
	}
	
	public function account($page = 'login') {
	    if ($this->session->ylife) redirect('member/home','location');
	    $data['page'] = $page;
	    $data['title'] = ucfirst($page);
	    if ($page == 'login') $data['status'] = $this->login();
	    if ($page == 'register') $data['status'] = $this->register();
	    
	    if ($page == 'sponsor') $this->sponsor();
	    if ( ! file_exists(APPPATH.'views/member/account/'.$page.'.php')) {
                show_404();
        }
        
		$this->load->view('member/account/'.$page,$data);
	}
	function login () {
	    $this->form_validation->set_message(array('required' => '%s is required.'));
	    $this->form_validation->set_rules('mobile', 'Mobile number', 'required|numeric|min_length[10]|max_length[10]');
	    $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[8]');
	    if ($this->form_validation->run()) {
	        $mobile = $this->input->post('mobile');
	        $mobile = str_replace("YLF","",$mobile);
	        $data = array('Contact' => $mobile);
	        $res = $this->m_m->get_where_multi('members',$data); 
	        if (count($res) == 1) {
	            $res[0]->Name;
	            if ($res[0]->Pass == $this->input->post('password')) {
	                $this->session->ylife = $res[0]->MemID;
	                $this->session->ylifename = $res[0]->Name;
	                $this->session->ylifetype = $res[0]->MemType;
	                $this->session->ylifecontact = $res[0]->Contact;
	                $this->session->ylifebranch = $res[0]->lcBranch;
	                redirect('member/home','location');
	            } else return 3;
	        } else return 2;
	    }
	}
	function register () {
	    $this->form_validation->set_message('is_unique', 'The %s is already taken');
	    $this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('contact', 'Mobile number', 'required|is_unique[members.Contact]|numeric|min_length[10]|max_length[10]');
	    $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[8]');
	    $this->form_validation->set_rules('confirm', 'Confirm', 'required|matches[password]');
	    if ($this->form_validation->run()) {
	        $name = $this->input->post('name');
	        $contact = $this->input->post('contact');
	        $password = $this->input->post('password');
	        $sponsor = $this->input->post('sponsor');
	        $sponsor = str_replace("YLF","",$sponsor);
	        $data = array('Contact' => $sponsor);
	        $res = $this->m_m->get_where_multi('members',$data); 
	        if (count($res) != 1) return 2;
	        $data = array(
	            "Name" => $name, 
	            'Contact' => $contact, 
	            'Pass' => $password, 
	            'sponsor' => $res[0]->MemID,
	            'Active' => 'N', 
	            'cStatus' => 'N', 
	            'Rgdate' => date("Y-m-d h:i:s"), 
	            'MemType' => 'M',
	            'lcBranch' => $res[0]->lcBranch
	        );
	        if ($this->m_m->insert('members',$data)) {
	            $this->m_m->new_member();
	            $msg = "Thanks Mr $name being a part of VISION121. Your user id is 'YLF$contact', password: $password Please visit vision121.in.\n Regards- Surya Kamal Marketing and Services (P) ltd'";
	            return $this->m_m->send($msg, $contact);
	        } else return $result;
	    }
	}
	function sponsor () {
	    $this->form_validation->set_rules('sponsor', 'Name', 'required');
	    if ($this->form_validation->run()) {
	        $mobile = $this->input->post('sponsor');
	        $mobile = str_replace("YLF","",$mobile);
	        $data = array('Contact' => $mobile);
	        $result = $this->m_m->get_where_multi('members',$data); 
	        if (count($result) == 1) {
	            echo $result[0]->Name;
	        } else echo 'No Match Found';
	        exit;
	    } else echo 'No Match Found';
	    exit;
	}
}