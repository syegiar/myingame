<?php

class Kategori extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
      redir(base_url());
      die();
    }
    public function detail($id)
    {
      $data = $this->__init();
      $data['kategori'] = $this->bkm->getById($id);
      if(!isset($data['kategori']->id)){
        redir(base_url('notfound'));
        die();
      }
      $data['artikel_kategori'] = $this->ckm->getByKategoriId($id);

      $this->setTitle($data['kategori']->nama);
      $this->setDescription("Typography BS5 from Seme Framework.");
      $this->setKeyword('Seme Framework');
      $this->setAuthor('Seme Framework');

      $this->putThemeContent("kategori/detail",$data); //pass data to view
      $this->loadLayout("col-1",$data);
      $this->render();
    }
}
