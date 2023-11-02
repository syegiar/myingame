<?php
class Artikel extends JI_Controller
{

    public function __contruct()
    {
        parent::__construct();
        $this->setTheme('front');
        $this->load('b_user_model','bum');
        }

    public function baru()
    {
        $data = array();
        $data['sess'] = $this->getKey();
        if(!isset($data['sess']->user->id)){
            redir(base_url('login'));
            return;
        }
        $data = array();
        $data['sess'] = $this->__flash();
        $data['kategori_list'] = $this->bkm->getKategori();
        $this->setTitle('Artikel');
        $this->setDescription("Please register before you can login");
        $this->setKeyword('Seme Framework');
        $this->setAuthor('Seme Framework');

        $this->putThemeContent("artikel/baru",$data);
        $this->loadLayout("col-1",$data);
        $this->__flashClear();
        $this->render();
    }

    public function hapus($id)
    {
        $sess = $this->getkey();
        if(!isset($sess->user->id)){
        redir(base_url('home/?hapus=error1'));
        return;
        }

        $id = (int) $id;
        if($id <= 0) $id=0;

        $ckm = $this->ckm->getById($id);
        if(!isset($ckm->id)){
        redir(base_url('home/?hapus=error2'));
        return;
        }

        $res = $this->ckm->del($id);
        if($res){
        redir(base_url('home/?hapus=sukses'));
        }else{
        redir(base_url('home/?hapus=error3'));
        }
    }

    public function proses_edit($id){
        // $data['sess'] = $this->getKey();

        $b_user_id = $this->input->post('b_user_id');
        $isi = $this->input->post('isi');
        $judul = $this->input->post('judul');
        $img = $this->input->post('img');
        $genre = $this->input->post('genre');
        $platform = $this->input->post('platform');
        
        if(strlen($isi)<=1){
            echo 'invalid isi';
            return;
        }

        if(strlen($judul)<=4){
            echo 'invalid judul';
            return;
        }

        $di = array();
        $di['b_user_id'] = $b_user_id;
        $di['isi'] = $isi;
        $di['judul'] = $judul;
        $di['img'] = $img;
        $di['b_kategori_id_genre'] = $genre;
        $di['b_kategori_id'] = $platform;
      
        $last_id = $this->ckm->update($id,$di);
        if($last_id){
          redir(base_url('home/detail/'.$id));
          return;
        }else{
          echo 'password confitmation doesn\'t match';
          return;
        }
      }
      
      public function edit($id='')
      {
    
    
          $data = array();
          $data['sess'] = $this->getKey();
          $data['article'] = $this->ckm->getById($id);
          $data['id'] = $id;
    
          $data['ckm'] = $this->ckm->getById($id);
          if(!isset($data['ckm']->id)){
            redir(base_url());
            die();
          }
          if(!is_null($data['ckm']->c_konten_id)){
            redir(base_url());
            die();
          }
    
          $data['kategori_list'] = $this->bkm->getKategori();
          $this->setTitle($data['ckm']->judul);
          $this->setDescription("Typography BS5 from Seme Framework.");
          $this->setKeyword('Seme Framework');
          $this->setAuthor('Seme Framework');
    
          $this->putThemeContent("artikel/edit",$data); //pass data to view
          $this->loadLayout("col-1",$data);
          $this->render();
        
      }

    public function proses()
    {
        $data['sess'] = $this->getKey();

        $isi = $this->input->post('isi');
        $judul = $this->input->post('judul');
        $img = $this->input->post('img');
        $genre = $this->input->post('genre');
        $platform = $this->input->post('platform');

        if(strlen($isi)<=1){
            echo 'invalid isi';
            return;
        }

        if(strlen($judul)<=4){
            echo 'invalid judul';
            return;
        }

        $di = array();
        $di['isi'] = $isi;
        $di['judul'] = $judul;
        $di['img'] = $img;
        $di['b_user_id'] = $data['sess']->user->id;
        $di['b_kategori_id_genre'] = $genre;
        $di['b_kategori_id'] = $platform;

        $last_id = $this->ckm->set($di);
        if($last_id){
            $bum = $this->bum->getById($data['sess']->user->id);
            if(isset($bum->postcount)){
                $du = array();
                $du['postcount'] = (int) $bum->postcount;
                $du['postcount']++;  
                $this->bum->update($data["sess"]->user->id, $du);
            }
            redir(base_url('home/detail/'.$last_id));
            return;
        }else{
            echo 'password confirmation doesn\'t match';
            return;
        }
    }
}