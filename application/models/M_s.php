<?php
class M_s extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }
    
    public function process_widthraw() {
	    $row = $this->db->get_where('widthraw',array('id' => $this->input->post('id')))->row_object();
	    if ($this->input->post('submit') == 'success') {
	        $status = "Y";
	        $data = array (
	                    'memID' => $row->userID,
	                    'amount' =>$row->amount,
	                    'type' => 'Widthrawl',
	                    'date' => date("Y-m-d h:i:s")
	        );
	        $st = $this->db->insert('transactions',$data);
	    }
	    else if ($this->input->post('submit') == 'cancel') {
	        $status = "C";
	        $amount = $row->amount;
	        $user = $row->userID;
	        $st = $this->db->query("UPDATE members SET Balance=(Balance+$amount) WHERE MemID='$user'");
	    }
	    if ($st) {
    	    $data = array (
    	            'remarks' => $this->input->post('remarks'),
    	            'pr_date' => date("Y-m-d h:i:s"),
    	            'cStatus' => $status
    	    );
    	    $this->db->where('id',$this->input->post('id'));
    	    return $this->db->update('widthraw',$data);
	    }
	}
	
    public function images ($action,$data) {
        if ($action == 'upload') {
            $this->db->order_by('imgID','DESC');
            return $this->db->get_where('images',$data)->result_object();
        }
    }
    
    public function orders ($action,$data) {
        $this->db->select("orders.*,members.*, products.Name as prName");
        $this->db->from('orders');
        $this->db->join('products','products.pID=orders.pID');
        $this->db->join('members','members.MemID=orders.memID');
        return $this->db->get_where('',$data)->result_object();
    }
    
    public function stock ($action,$data) {
        $this->db->select("*");
        $this->db->from('stock');
        $this->db->join('products','products.pID=stock.prID');
        $this->db->join('branches','branches.brID=stock.brID');
        return $this->db->get_where('',$data)->result_object();
    }
    public function stock_report ($action,$data) {
        $this->db->select("*");
        $this->db->from('stock_report');
        $this->db->join('products','products.pID=stock_report.prID');
        $this->db->join('branches','branches.brID=stock_report.brID');
        return $this->db->get_where('',$data)->result_object();
    }
    public function products ($action,$data) {
        $this->db->select("products.*,categories.cName as category,subcat.SubName as subname");
        $this->db->from('products');
        $this->db->join('categories','categories.cID=products.Category');
        $this->db->join('subcat','subcat.cID=products.SubCategory');
        return $this->db->get('')->result_object();
    }
    public function insert ($table,$data) {
        return $this->db->insert($table,$data);
    }
    public function get_where ($table,$data) {
        return $this->db->get_where($table,$data)->row_object();
    }
    public function get_where_multi ($table,$data) {
        return $this->db->get_where($table,$data)->result_object();
    }
    public function update ($table,$data1,$data2) {
        $this->db->where($data1);
        return $this->db->update($table,$data2);
    }
    
    	
	public function closing () {
	    $this->selfteam_level_closing();
	    $this->company_level_closing ();
	}
	
	public function selfteam_level_closing () {
	    $members = $this->db->get_where("member_downline",array('memStatus' => 'Y'))->result_object();
	    foreach ($members as $member) {
	        $row = $this->db->query("SELECT sum(direct_joining) as sponsor, sum(self_team) as selfteam, sum(purchase_bv) as purchase_bv FROM level_income_selfteam WHERE levelID<=($member->selfteam_level+1)")->row_object();
	        if ($member->ef_sponsors >= $row->sponsor && $member->ef_selfteam >= $row->self_tem && $member->purchase_bv >= $row->purchase_bv) {
	            $row1 = $this->db->query("SELECT * FROM level_income_selfteam WHERE levelID = ($member->selfteam_level+1)")->row_object();
	            $data = array(
	                            'memID' => $member->memID,
	                            'amount' => $row1->income,
	                            'level' => $row1->levelID,
	                            'type' => 1
	                        );
	            $this->db->insert('temp_transactions');
	        }
	    } 
	}
	public function company_level_closing () {
	    $members = $this->db->get_where("member_downline",array('memStatus' => 'Y'))->result_object();
	    foreach ($members as $member) {
	        $row = $this->db->query("SELECT sum(direct_joining) as sponsor, sum(self_team) as selfteam, sum(company) as company FROM level_income_company WHERE levelID<=($member->companyteam_level+1)")->row_object();
	        if ($member->ef_sponsors >= $row->sponsor && $member->ef_selfteam >= $row->self_tem && $member->ef_companyteam >= $row->company) {
	            $row1 = $this->db->query("SELECT * FROM level_income_company WHERE levelID = ($member->companyteam_level+1)")->row_object();
	            $data = array(
	                            'memID' => $member->memID,
	                            'amount' => $row1->income,
	                            'level' => $row1->levelID,
	                            'type' => 2
	                        );
	            $this->db->insert('temp_transactions');
	        }
	    }
	}
	
	public function revert () {
	    return $this->db->query("TRUNCATE TABLE 'temp_transactions'");
	}
	public function pay_now () {
	    $trans = $this->db->get('temp_transactions');
	    foreach ($trans as $row) {
	        if ($row->type == 1) $data = array('selfteam_level' => $row->level);
	        else if ($row->type == 2) $data = array('companyteam_level' => $row->level);
	        $this->db->where('memID',$member->memID);
	        $this->db->update('member_downline',$data);
	        $this->db->query("UPDATE member SET Balance=(Balance+$row->amount) WHERE MemID=$member->memID");
	        $data = array(
	                       'memID' => $row->memID,
	                       'amount' => $row->amount,
	                       'type' => 'Credit',
	                       'date' => date("Y-m-d h:i:s")
	                    );
	    }
	    return $this->db->query("TRUNCATE TABLE 'temp_transactions'");
	}
	
	public function closing_details () {
	    $this->db->select('*');
	    $this->db->from('temp_transactions');
	    $this->db->join('members','members.MemID=temp_transactions.memID');
	    return $this->db->get()->result_object();
	}
	
	public function activate_member($data) {
        $this->db->trans_begin();
            $member = $this->db->get_where('members',array('MemID' => $data['member']))->row_object();
            $sponsor = $member->Sponsor;
            $this->db->where(array('MemID' => $data['member']));
            $this->db->update("members",array('Active' => 'Y'));
            $this->db->where(array('memID' => $data['member']));
            $this->db->update("member_downline",array('memStatus' => 'Y')); $i = TRUE;
            while ($sponsor != 0) {
                $temp_sp = $this->db->get_where('member_downline',array('memID' => $sponsor))->row_object();
                if ($temp_sp->memStatus == 'Y') {
                    if ($i === TRUE) { $data = array( 'ef_sponsors' => ($temp_sp->ef_sponsors+1), 'ef_selfteam' => ($temp_sp->ef_selfteam+1)); $i=FALSE; }
                    else { $data = array('ef_selfteam' => ($temp_sp->ef_selfteam+1)); }
                    $this->db->where(array('memID' => $sponsor));
                    $this->db->update("member_downline",$data);
                } else $i=FALSE;
                $sponsor = $temp_sp->sponsorID;
            }
            $this->db->query("UPDATE member_downline SET ef_companyteam=(ef_companyteam+1) WHERE memID<'$member->sponsor' AND memStatus='Y'");
        if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
        }
        else {
            return $this->db->trans_commit();
        }
        
    }
}