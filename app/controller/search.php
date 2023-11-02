<?php
class Search extends JI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load('c_konten_model','ckm');
  }
  public function index()
  {
    $data = this->__init();

    $data['kategori_list'] = $this->bkm->getOneArticleByKategori();
    $data['artikel_terbaru'] = $this->ckm->getLatest();

    $this->setTitle('Adnvanced Search');
    $this->setDescription("Typography BSS from seme framework.");
    $this->setKeyword('Seme Framework');
    $this->setAuthor('Seme Framework');


    $this->putThemeContent("search/home",$data); //pass data to view
    $this->loadLayout("col-1",$data);
    $this->render();
  }
  public function result()
  {
    $data = $this->__init();
    $keyword = strip_tags($this->input->request('keyword', ''));
    $platform = ($this->input->request('platform'));
    $genre = ($this->input->request('genre'));

    if(!is_array($platform)) $platform = array();
    if(!is_array($genre)) $genre = array();

    $data['keyword'] = $keyword;
    $data['ckm'] = $this->ckm->getSearch($keyword, $platform, $genre);

    $this->setTitle('Search Result for', ($keyword));
    $this->setDescription("Typography BSS from seme framework.");
    $this->setKeyword('Seme Framework');
    $this->setAuthor('Seme Framework');


    $this->putThemeContent("search/result",$data); //pass data to view
    $this->loadLayout("col-1",$data);
    $this->render();
  }
}