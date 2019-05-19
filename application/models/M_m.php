<?php
class M_m extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }
    public function members ($action, $data) {
        if ($action == 'get_this_multi') {
            return $this->db->query("SELECT a.*, b.Name as spName, b.Contact as spContact FROM members as a left join members as b on a.sponsor=b.MemID WHERE ".$data['where'])->result_object();
        }
    }
    public function orders ($action, $data) {
        if ($action == 'get_this') {
            $this->db->select("*");
            $this->db->from('orders');
            $this->db->join('products','products.pID=orders.pID');
            return $this->db->get_where('',$data)->result_object();
        }
    }
    public function branches ($action, $data) {
        if ($action == 'get_this') {
            $this->db->select("*");
            $this->db->from('branches');
            $this->db->join('members','members.MemID=branches.brManager');
            return $this->db->get_where('',$data)->result_object();
        }
    }
    public function new_member($data) {
        $this->db->trans_begin();
            $member = $this->db->get_where('members',array('Contact' => $this->input->post('contact')))->row_object();
            $sponsor = $member->Sponsor;
        if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
        }
        else {
            $this->db->trans_commit();
            $data = array(
                        'memID' => $member->MemID,
                        'sponsorID' => $member->Sponsor, 
                        'parentID' => $member->Sponsor,
                        'memStatus' => 'N'
                    );
            return $query = $this->db->insert('member_downline',$data);
        }
        
    }
    
    public function activate_member($data) {
        $this->db->trans_begin();
            $member = $this->db->get_where('members',array('MemID' => $this->session->ylife))->row_object();
            $sponsor = $member->Sponsor;
            $this->db->where(array('MemID' => $this->session->ylife));
            $this->db->update("members",array('Active' => 'Y'));
            $this->db->where(array('memID' => $this->session->ylife));
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
    
    public function downline ($data) {
        $query = $this->db->query("SELECT a.*, b.Name as spName, b.Contact as spContact FROM members as a left join members as b on a.sponsor=b.MemID WHERE ".$data['where']);
        $rows = $query->result_object();
        $x = array();
        $m = $rows;
        while (count($m) != 0) {
                $x = array_merge($x,$m);
                $m = $this->downline_level($m);
        }
        return $x;
    }
    public function downline_level($users) {
        $m = array();
        foreach ($users as $user) {
            $mem = $user->MemID;
            $query = $this->db->query("SELECT a.*, b.Name as spName, b.Contact as spContact FROM members as a left join members as b on a.sponsor=b.MemID WHERE a.sponsor='$mem'");
            $m = array_merge($m,$query->result_object());
        }
        return $m;
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
    
    function send ($msg, $mobile) {
        
        $ID="vision21";
        $senderid="SKMSIP";
		$message=$msg;
		$message=urlencode($message);
        $url="http://psms.onistech.com/submitsms.jsp?user=$ID&key=b172902064XX&mobile=$mobile&senderid=$senderid&accusage=1&message=$message";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
        curl_close($ch);
        return TRUE;
    }
}