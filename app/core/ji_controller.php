<?php

class JI_Controller extends SENE_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load('b_kategori_model','bkm');
        $this->load('b_user_model','bum');
        $this->load('c_konten_model','ckm');
    }
    protected function __flash($message='',$type='info'){
      $s = $this->getKey();
      if(!is_object($s)) $s = new stdClass();
      if(!isset($s->flash)) $s->flash = '';
      if(strlen($message)>0){
        $s->flash = $message;
      }
      $this->setKey($s);
      return $s;
    }
    protected function __flashClear(){
      $s = $this->getKey();
      if(!is_object($s)) $s = new stdClass();
      if(!isset($s->flash)) $s->flash = '';
      $s->flash = '';
      $this->setKey($s);
      return $s;
    }
    protected function __init(){
      $data = array();
      
      $data['platform'] = $this->bkm->getKategori();
      $data['genre'] = $this->bkm->getKategori2();
      return $data;
    }

    public function index()
    {

    }
}
