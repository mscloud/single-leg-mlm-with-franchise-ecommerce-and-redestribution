<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
    
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
	    if ($this->session->ylifetype == 'A' || $this->session->ylifetype == 'S') { } else redirect('member/home','location');
	    $data['page'] = $page;
	    $data['title'] = ucfirst($page);
	    if (!$this->session->ylife) redirect('member/account/login','location');
	    $data['member'] = $this->m_s->get_where('members',array('MemID' => $this->session->ylife)); 
	    
	    if ($page == 'new_product') { $data['images'] = $this->m_s->images('upload',array()); $data['subcat'] = $this->m_s->get_where_multi('subcat',array()); $data['category'] = $this->m_s->get_where_multi('categories',array());  $data['status'] = $this->new_product(); }
	    if ($page == 'products') { 
	        $data['status'] = $this->stock_update();
	        $data['products'] = $this->m_s->products('get_multi',array());
	        $data['branches'] = $this->m_s->get_where_multi('branches',array());
	    }
	    if ($page == 'stock') {
	        if ($this->input->get('q')) {
    	        $data['stock'] = $this->m_s->stock('get_this',array('stock.prID' => $this->input->get('q')));
    	        $data['stock_report'] = $this->m_s->stock_report('get_this',array('stock_report.prID' => $this->input->get('q')));
	        }
	        else {
	            $data['stock'] = $this->m_s->stock('get_all',array());
	        }
    	        $data['branches'] = $this->m_s->get_where_multi('branches',array());
	    }
	    if ($page == 'images') { $data['status'] = $this->image_upload(); $data['images'] = $this->m_s->images('upload',array()); }
	    
	    if ($page == 'new_orders') { 
	        $data['status'] = $this->orders();
	        $data['orders'] = $this->m_s->orders(NULL,array('orders.oStatus' => 'H', 'brID' => $this->session->ylifebranch));
	        $page = 'orders';
	    }
	    if ($page == 'cancelled_orders') { 
	        $data['status'] = $this->orders();
	        $data['orders'] = $this->m_s->orders(NULL,array('orders.oStatus' => 'C', 'brID' => $this->session->ylifebranch));
	        $page = 'orders';
	    }
	    if ($page == 'delivered_orders') { 
	        $data['status'] = $this->orders();
	        $data['orders'] = $this->m_s->orders(NULL,array('orders.oStatus' => 'D', 'brID' => $this->session->ylifebranch));
	        $page = 'orders';
	    }
	    
	    if ( ! file_exists(APPPATH.'views/member/product/'.$page.'.php')) {
                show_404();
        }
        $this->load->view('member/template/head',$data);
        $this->load->view('member/template/header',$data);
        $this->load->view('member/template/leftside',$data);
        $this->load->view('member/template/rightside',$data);
		$this->load->view('member/product/'.$page,$data);
		$this->load->view('member/template/footer',$data);
	}
	function orders () {
	    if ($this->input->post('deliver') && $this->input->post('order')) {
	        return $this->m_s->update('orders',array('oID' => $this->input->post('order')), array('pStatus' => 'Y', 'oStatus' => 'D'));
	    } else if ($this->input->post('cancel') && $this->input->post('order')) {
	        return $this->m_s->update('orders',array('oID' => $this->input->post('order')), array('pStatus' => 'N', 'oStatus' => 'C'));
	    }
	}
	function stock_update() {
	    $this->form_validation->set_rules('branch', 'Branch', 'required|numeric');
	    $this->form_validation->set_rules('product', 'Product', 'required|numeric');
	    $this->form_validation->set_rules('qty', 'Quantity', 'required|numeric');
	    if ($this->form_validation->run()) {
	        $data = array (
	                        'brID' => $this->input->post('branch'),
	                        'prID' => $this->input->post('product'),
	                        'qty' => $this->input->post('qty'),
	                        'stDate' => date("Y-m-d h:i:s")
	                );
	       $query =  $this->m_s->get_where_multi('stock',array('brId' => $this->input->post('branch'), 'prID' => $this->input->post('product')));
	       if (count($query) == 0) {
	           $data1 = array (
	                        'brID' => $this->input->post('branch'),
	                        'prID' => $this->input->post('product'),
	                        'qty' => $this->input->post('qty')
	                );
	           $this->m_s->insert('stock',$data1);
	           return $this->m_s->insert('stock_report',$data);
	       } else if (count($query) == 1) {
	           $this->m_s->update('stock',array('brID' => $this->input->post('branch'),'prID' => $this->input->post('product')), array('qty' => ($this->input->post('qty')+$query[0]->qty)));
	           return $this->m_s->insert('stock_report',$data);
	       }
	        
	    }
	}
	
	function new_product() {
	    $this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('price', 'Price', 'required|numeric|min_length[2]|max_length[6]');
	    $this->form_validation->set_rules('code', 'Product Code', 'required');
	    $this->form_validation->set_rules('category', 'Category', 'required|numeric|min_length[1]|max_length[2]');
	    $this->form_validation->set_rules('subcat', 'Sub-category', 'required|numeric|min_length[1]|max_length[3]');
	    $this->form_validation->set_rules('dp', 'DP', 'required');
	    $this->form_validation->set_rules('bv', 'BV', 'required');
	    $this->form_validation->set_rules('image', 'Image', 'required');
	    $this->form_validation->set_rules('type', 'Product Type', 'required');
	    if ($this->form_validation->run()) {
	        $data = array(
	                        "Name" => $this->input->post('name'), 
	                        'Category' => $this->input->post('category'),
	                        'SubCategory' => $this->input->post('subcat'),
	                        'Description' => $this->input->post('description'),
	                        'DP' => $this->input->post('dp'),
	                        'BV' => $this->input->post('bv'),
	                        'ProductCode' => $this->input->post('code'),
	                        'Price' => $this->input->post('price'),
	                        'ProductType' => $this->input->post('type'),
	                        'image' => $this->input->post('image')
	               );
	        return $this->m_s->insert('products',$data);
	    }
	}
	
	function image_upload () {
	    $this->form_validation->set_rules('upload', 'Image', 'required');
	    $this->form_validation->set_rules('name', 'Name', 'required');
	    if ($this->form_validation->run()) {
    	    $config['upload_path']          = 'public/products/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1024;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('image')) {
                return $this->upload->display_errors();
            }
            else {
                $data = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'public/products/'.$data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['width']         = 400;
                $config['height']       = 400;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $image = array('name' => $this->input->post('name'), 'imgName' => $data['file_name']);
                return $this->m_s->insert('images',$image);
            }
	    }
	}
}