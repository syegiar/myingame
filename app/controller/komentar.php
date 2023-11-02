<?php
class Komentar extends JI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->setTheme('front');
    $this->load('b_user_model','bum');
  }
  public function index()
  {
    echo 'masuk ke index';
    // redir(base_url(''));
  }
  public function hapus($c_konten_id, $id)
    {
        $sess = $this->getkey();
        if(!isset($sess->user->id)){
        redir(base_url('home/detail/'.$c_konten_id.'/?hapus=error1'));
        return;
        }

        $id = (int) $id;
        if($id <= 0) $id=0;

        $ckm = $this->ckm->getById($id);
        if(!isset($ckm->id)){
        redir(base_url('home/detail/'.$c_konten_id.'/?hapus=error2'));
        return;
        }

        $res = $this->ckm->del($id);
        if($res){
        redir(base_url('home/detail/'.$c_konten_id.'/?hapus=sukses'));
        }else{
        redir(base_url('home/detail/'.$c_konten_id.'/?hapus=error3'));
        }
    }
  public function proses(){
    $data = array();
    $data['sess'] = $this->getKey();

    $isi = $this->input->post('isi');
    $c_konten_id = (int) $this->input->post('c_konten_id');

    if($c_konten_id <= 0){
      echo 'Invalid c_konten_id';
      return;
    }

    if(strlen($isi)<=1){
      echo 'Invalid isi';
      return;
    }

    $di = array();
    $di['c_konten_id'] = $c_konten_id;
    $di['isi'] = $isi;
    $di['b_user_id'] = $data['sess']->user->id;

    $res = $this->ckm->set($di);
    if($res){

      $this->ckm->updateReplycount($c_konten_id);

      redir(base_url('home/detail/'.$c_konten_id),1);
      return;
    }else{
      echo 'Gagal mengirim komentar';
      return;
    }
  }
}