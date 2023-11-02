<?php
class Register extends JI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->setTheme('front');
    $this->load('b_user_model','bum');
  }
  public function index()
  {
    $data = array();
    $data['sess'] = $this->getKey();
    if(isset($data['sess']->user->id)){
      redir(base_url('dashboard'));
      return;
    }
    $data = array();
    $data['sess'] = $this->__flash();
    $this->setTitle('Register');
    $this->setDescription("Please register before you can login.");
    $this->setKeyword('Seme Framework');
    $this->setAuthor('Seme Framework');

    $this->putThemeContent("register/home",$data); //pass data to view
    $this->putJsContent("register/home_bottom",$data); //pass data to view
    $this->loadLayout("col-1",$data);
    $this->__flashClear();
    $this->render();
  }
  public function proses(){
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $password_konfirmasi = $this->input->post('password_konfirmasi');

    if(strlen($username)<=1){
      echo 'invalid username';
      return;
    }

    if(strlen($email)<=4){
      echo 'invalid email';
      return;
    }
    $bum = $this->bum->getByEmail($email);
    if(isset($bum->id)){
      echo 'email have been used';
      return;
    }

    if(strlen($password)<=4){
      echo 'invalid password';
      return;
    }

    if($password != $password_konfirmasi){
      echo 'Password confirmation doesn\'t match';
      return;
    }

    $di = array();
    $di['username'] = $username;
    $di['email'] = $email;
    $di['password'] = password_hash($password, PASSWORD_BCRYPT);

    $res = $this->bum->set($di);
    if($res){
      $sess = $this->getKey();
      if(!is_object($sess)) $sess = new stdClass();
      if(!isset($sess->user)) $sess->user = new stdClass();
      $sess->user = $this->bum->getById($res);
      $this->setKey($sess);

      $this->__flash('Welcome '.$username.'....');
      redir(base_url('dashboard'),1);
      return;
    }else{
      echo 'Password confirmation doesn\'t match';
      return;
    }
  }
}