<?php
class B_Kategori_Model extends SENE_Model{
	var $tbl = 'b_kategori';
	var $tbl_as = 'bk';
	var $tbl2 = 'c_konten';
	var $tbl2_as = 'ck';

	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function getTableAlias(){
		return $this->tbl_as;
	}
	public function getTableAlias2(){
		return $this->tbl2_as;
	}
	public function getAll($page=0,$pagesize=10,$sortCol="sku",$sortDir="ASC",$keyword='',$sdate='',$edate=''){
		$this->db->flushQuery();
		$this->db->select('id');
		$this->db->select('kode');
		$this->db->select('utype');
		$this->db->select('nama');
		$this->db->select('buffer_stok');
		$this->db->select('is_visible');
		$this->db->select('is_active');
		$this->db->from($this->tbl,$this->tbl_as);
		if(strlen($keyword)>1){
			$this->db->where("utype",$keyword,"OR","%like%",1,0);
			$this->db->where("kode",$keyword,"OR","%like%",0,0);
			$this->db->where("nama",$keyword,"OR","%like%",0,0);
			$this->db->where("deskripsi",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAll($keyword='',$sdate='',$edate=''){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		if(strlen($keyword)>1){
			$this->db->where("utype",$keyword,"OR","%like%",1,0);
			$this->db->where("nama",$keyword,"OR","%like%",0,0);
			$this->db->where("kode",$keyword,"OR","%like%",0,0);
			$this->db->where("deskripsi",$keyword,"OR","%like%",0,1);
		}
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
	public function getAllKategori($page=0,$pagesize=10,$sortCol="sku",$sortDir="ASC",$keyword='',$sdate='',$edate=''){
		$this->db->flushQuery();
		$this->db->select('id');
		$this->db->select('kode');
		$this->db->select('utype');
		$this->db->select('nama');
		$this->db->select('buffer_stok');
		$this->db->select('is_visible');
		$this->db->select('is_active');
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where_in("utype",array('kategori','kategori_sub','kategori_sub_sub'));
		if(strlen($keyword)>1){
			$this->db->where("kode",$keyword,"OR","%like%",1,0);
			$this->db->where("nama",$keyword,"OR","%like%",0,0);
			$this->db->where("deskripsi",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAllKategori($keyword='',$sdate='',$edate=''){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where_in("utype",array('kategori','kategori_sub','kategori_sub_sub'));
		if(strlen($keyword)>1){
			$this->db->where("nama",$keyword,"OR","%like%",1,0);
			$this->db->where("kode",$keyword,"OR","%like%",0,0);
			$this->db->where("deskripsi",$keyword,"OR","%like%",0,1);
		}
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
	public function countAllBrand($keyword='',$sdate='',$edate=''){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		$this->db->where("utype",'brand',"AND","like",0,0);
		if(strlen($keyword)>1){
			$this->db->where("nama",$keyword,"OR","%like%",1,0);
			$this->db->where("kode",$keyword,"OR","%like%",0,0);
			$this->db->where("deskripsi",$keyword,"OR","%like%",0,1);
		}
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
	public function getAllBrand($page=0,$pagesize=10,$sortCol="sku",$sortDir="ASC",$keyword='',$sdate='',$edate=''){
		$this->db->flushQuery();
		$this->db->select('id');
		$this->db->select('kode');
		$this->db->select('nama');
		$this->db->select('is_visible');
		$this->db->select('is_active');
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where("utype",'brand',"AND","like",0,0);
		if(strlen($keyword)>1){
			$this->db->where("kode",$keyword,"OR","%like%",1,0);
			$this->db->where("nama",$keyword,"OR","%like%",0,0);
			$this->db->where("deskripsi",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function getById($id){
		$this->db->where("id",$id);
		return $this->db->get_first();
	}
	public function set($di){
		if(!is_array($di)) return 0;
		$this->db->insert($this->tbl,$di,0,0);
		return $this->db->last_id;
	}
	public function update($id,$du){
		if(!is_array($du)) return 0;
		$this->db->where("id",$id);
    return $this->db->update($this->tbl,$du,0);
	}
	public function del($id){
		$this->db->where("id",$id);
		return $this->db->delete($this->tbl);
	}
	public function checkSlug($slug,$id=0){
		$this->db->select_as("COUNT(*)","jumlah",0);
		$this->db->where("slug",$slug);
		if(!empty($id)) $this->db->where("id",$id,'AND','!=');
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
    public function getKategoriPlatform(){
		$this->db->select("id")
				->select("jenis")
				->select("nama")
				->select("slug")
				->select_as("COALESCE(b_kategori_id,'-')",'b_kategori_id',1);
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where("jenis",'genre',"OR","like",1,0);
		$this->db->where("jenis",'genre_sub',"OR","like",0,0);
		$this->db->where("jenis",'genre_sub_sub',"OR","like",0,1);
        $this->db->order_by("nama","asc");
		$this->db->limit(100);
		return $this->db->get('object',0);
    }
	public function getParentKategori(){
		$this->db->select()->from($this->tbl,$this->tbl_as)->where_as("b_kategori_id", "is null");
		$this->db->where("utype",'kategori',"OR","like",1,0);
		$this->db->where("utype",'kategori_sub',"OR","like",0,0);
		$this->db->where("utype",'kategori_sub_sub',"OR","like",0,1);
		$this->db->order_by("prioritas","asc")->order_by("nama","asc");
		$this->db->limit(100);
		return $this->db->get('object',0);
	}
	public function getSubKategori($b_kategori_id){
		$this->db->select()->from($this->tbl,$this->tbl_as)->where_as("b_kategori_id", $b_kategori_id);
		$this->db->where("utype",'kategori_sub',"AND","like",0,0);
		$this->db->limit(100);
		return $this->db->get('',0);
	}

	public function getBrandByVendorId($page=0,$pagesize=10,$sortCol="sku",$sortDir="ASC",$keyword='',$a_vendor_id=''){
		$this->db->flushQuery();
		$this->db->select_as("$this->tbl_as.id id, $this->tbl_as.kode, $this->tbl_as.nama, $this->tbl_as.is_active",'is_active',0);
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->join($this->tbl2,$this->tbl2_as,'b_kategori_id',$this->tbl_as,'id','');
		$this->db->where('utype','brand');
		$this->db->where('a_vendor_id',$a_vendor_id);
		if(strlen($keyword)>1){
			$this->db->where_as("`kode`",$this->db->esc($keyword),"OR","%like%",1,0);
			$this->db->where_as("`nama`",$this->db->esc($keyword),"OR","%like%",0,0);
			$this->db->where_as("`deskripsi`",$this->db->esc($keyword),"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countBrandByVendorId($keyword='',$a_vendor_id=''){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->join($this->tbl2,$this->tbl2_as,'b_kategori_id',$this->tbl_as,'id','');
		$this->db->where('utype','brand');
		$this->db->where('a_vendor_id',$a_vendor_id);
		if(strlen($keyword)>1){
			$this->db->where_as("`kode`",$this->db->esc($keyword),"OR","%like%",1,0);
			$this->db->where_as("`nama`",$this->db->esc($keyword),"OR","%like%",0,0);
			$this->db->where_as("`deskripsi`",$this->db->esc($keyword),"OR","%like%",0,1);
		}
		$d = $this->db->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
	public function getFirstByName($nama){
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where("nama",$nama);
		$this->db->order_by("id","ASC");
		return $this->db->get_first();
	}
	public function getOneArticleByKategori(){
		$this->db->select_as("$this->tbl_as.*, $this->tbl_as.id",'id');
		$this->db->select_as("$this->tbl2_as.id",'c_konten_id');
		$this->db->select_as("$this->tbl2_as.isi",'isi');
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->join($this->tbl2,$this->tbl2_as,'b_kategori_id',$this->tbl_as,'id','');
		$this->db->where("$this->tbl2_as.c_konten_id",'IS NULL');
		$this->db->group_by("$this->tbl_as.id");
		return $this->db->get();
	}
	public function getKategori(){
		$this->db->where('jenis','platform');
		return $this->db->get();
	}
	public function getKategori2(){
		$this->db->where('jenis','genre');
		return $this->db->get();
	}
	
}
