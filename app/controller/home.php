<?php

class Home extends JI_Controller
{
  public $pagesize = 12;
  
    public function __construct()
    {
        parent::__construct();
        $this->load('b_user_like_model','bul');
    }
    public function index()
    {
      $data = array();
      $data = $this->__init();
      $data['sess'] = $this->getKey();
      $data['page'] = 1;
      $data['pagesize'] = $this->pagesize;
      $data['artikel_count'] = $this->ckm->countAll();
      $data['artikel_list'] = $this->ckm->getAll(0,$this->pagesize);
      $data['pagetotal'] = ceil($data['artikel_count']/$this->pagesize);
      
      $data['kategori_list'] = $this->bkm->getOneArticleByKategori();
      $data['artikel_terbaru'] = $this->ckm->getLatest();

      $this->setTitle('MyInGameID');
      $this->setDescription("Typography BS5 from Seme Framework.");
      $this->setKeyword('Seme Framework');
      $this->setAuthor('Seme Framework');

      $this->putThemeContent("home/home",$data); //pass data to view
      $this->loadLayout("col-1",$data);
      $this->render();
    }

    public function page($page=''){
      $data = $this->__init();

      $page = (int) $page;
      if($page<=1) $page = 1;

      $data['sess'] = $this->getKey();
      $data['page'] = $page;
      $data['pagesize'] = $this->pagesize;
      $data['artikel_count'] = (int) $this->ckm->countAll();
      $data['artikel_list'] = $this->ckm->getAll($page,$this->pagesize);
      $data['pagetotal'] = ceil($data['artikel_count']/$this->pagesize);

      $data['kategori_list'] = $this->bkm->getOneArticleByKategori();
      $data['artikel_terbaru'] = $this->ckm->getLatest();
      
      

      $this->setTitle('List artikel');
      $this->setDescription("List artikel");
      $this->setKeyword('Seme Framework');
      $this->setAuthor('Seme Framework');

      $this->putThemeContent("home/home",$data);
      $this->loadLayout("col-1",$data);
      $this->render();
  }

    public function detail($id)
    {
      $data = $this->__init();

      $data = array();
      $data['article'] = $this->ckm->getById($id);
      $data['sess'] = $this->getKey();

      $data['ckm'] = $this->ckm->getById($id);
      if(!isset($data['ckm']->id)){
        redir(base_url());
        die();
      }
      if(!is_null($data['ckm']->c_konten_id)){
        redir(base_url());
        die();
      }
      // $data['bum'] = $this->bum->getById($data['sess']->user->id);
      $data['ckm']->kategori = $this->bkm->getById($data['ckm']->b_kategori_id);
      $data['ckm']->penulis = $this->bum->getById($data['ckm']->b_user_id);
      $data['ckm']->komentar = $this->ckm->getKomentarById($id);
      $data['artikel_lain'] = $this->ckm->getLatest();
      $data['ckm']->penulis->likecount = $this->bul->count($data['ckm']->b_user_id);
      foreach($data['ckm']->komentar as &$komentar){
        $komentar->likecount = $this->bul->count($komentar->b_user_id);
      }

      $this->ckm->updateViewcount($id);

      $this->setTitle($data['ckm']->judul);
      $this->setDescription("Typography BS5 from Seme Framework.");
      $this->setKeyword('Seme Framework');
      $this->setAuthor('Seme Framework');

      $this->putThemeContent("home/detail",$data); //pass data to view
      $this->loadLayout("col-1",$data);
      $this->render();
    }
}
