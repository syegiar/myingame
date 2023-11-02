<?php
class Like extends JI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->setTheme('front');
    $this->load('b_user_like_model','bul');
  }
  public function index($b_user_id_like = '')
  {
    $data = array();
    $data['sess'] = $this->getKey();
    if(!isset($data['sess']->user->id)){
      redir(base_url('login'));
      return;
    }
    $bul = $this->bul->check($b_user_id_like,$data['sess']->user->id);
    if(isset($bul->id)){
        //Udah ngelike
        $this->bul->del($b_user_id_like, $data['sess']->user->id);
    }else{
        $this->bul->set($b_user_id_like, $data['sess']->user->id);
    }
    redir(base_url('profile/detail/'.$b_user_id_like));
  }
}