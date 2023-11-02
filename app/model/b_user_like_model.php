<?php
class B_User_Like_Model extends SENE_Model{
	var $tbl = 'b_user_like';
	var $tbl_as = 'bul';
	var $tbl2 = 'b_user';
	var $tbl2_as = 'bu';
	var $tbl2a_as = 'bu2';

	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}

    public function set($b_user_id_like, $b_user_id){
		$di = array();
        $di['b_user_id_like'] = $b_user_id_like;
        $di['b_user_id'] = $b_user_id;
		$this->db->insert($this->tbl,$di,0,0);
		return $this->db->last_id;
	}
    public function update($id,$du){
		if(!is_array($du)) return 0;
		$this->db->where("id",$id);
    return $this->db->update($this->tbl,$du,0);
	}
	public function del($b_user_id_like, $b_user_id){
		$this->db->where("b_user_id_like",$b_user_id_like);
		$this->db->where("b_user_id",$b_user_id);
		return $this->db->delete($this->tbl);
	}
    public function check($b_user_id_like, $b_user_id){
        $this->db->where('b_user_id_like', $b_user_id_like);
        $this->db->where('b_user_id', $b_user_id);
        return $this->db->get_first();
    }
    public function count($b_user_id_like){
        $this->db->select_as("count($this->tbl_as.id)",'total');
        $this->db->where('b_user_id_like', $b_user_id_like);
        $this->db->from($this->tbl,$this->tbl_as);
        $d = $this->db->get_first();
        if(isset($d->total)){
            return $d->total;
        }else{
            return 0;
        }
    }
}
