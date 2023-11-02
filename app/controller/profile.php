<?php
class Profile extends JI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->setTheme('front');
    $this->load('b_user_model', 'bum');
    $this->load('b_user_like_model', 'bul');
    $this->load('c_konten_model', 'ckm');
  }
  public function index()
  {
    $data = array();
    $data['sess'] = $this->getKey();
    if(!isset($data['sess']->user->id)){
      redir(base_url('login'));
      return;
    }
    $data['bum'] = $this->bum->getById($data['sess']->user->id);
    $data['bum']->likecount = $this->bul->count($data['sess']->user->id);
    $this->setTitle('Profile');
    $this->setDescription("Congratulation, you have done well.");
    $this->setKeyword('Seme Framework');
    $this->setAuthor('Seme Framework');

    $this->putThemeContent("profile/home",$data); //pass data to view
    $this->putJsReady("profile/home_bottom",$data);

    $this->loadLayout("col-1",$data);
    $this->render();
  }

  public function proses(){
    $sess = $this->getKey();
    if(!isset($sess->user->id)){
      redir(base_url('dashboard/?profil=error3'));
      return;
    }

    $username = $this->input->post('username');
    $name = $this->input->post('name');
    $address = $this->input->post('address');
    $bdate = $this->input->post('bdate');
    $description = $this->input->post('description');
    $role = $this->input->post('role');

    if(strlen($username)<=3){
      $this->__flash('Invalid username');
      $this->index();
      return;
    }

    if(strlen($name)<=1){
      $this->__flash('Invalid name');
      $this->index();
      return;
    }

    if(strlen($address)<=1){
      $this->__flash('Invalid address');
      $this->index();
      return;
    }

    

    if(strlen($description)<=1){
      $this->__flash('Invalid Description');
      $this->index();
      return;
    }


    $di = array();
    $di['username'] = $username;
    $di['name'] = $name;
    $di['address'] = $address;
    $di['bdate'] = $bdate;
    $di['description'] = $description;
    $di['role'] = $role;

    $res = $this->bum->update($sess->user->id,$di);
    if($res){
      $sess->user = $this->bum->getById($sess->user->id);
      $this->setKey($sess);

      $this->__flash('Profile '.$username.' berhasil diubah...');
      redir(base_url('profile'),1);
      return;
    }else{
      $this->__flash('Password confirmation doesn\'t match');
      $this->index();
      return;
    }
  }
  public function detail($id)
    {
      $data = $this->__init();

      $data = array();
      $data['bum'] = $this->bum->getById($id);
      $data['sess'] = $this->getKey();
      $data['bum']->likecount = $this->bul->count($id);

      // $data['bum'] = $this->bum->getById($data['sess']->user->id);
      $this->setTitle($data['bum']->username);
      $this->setDescription("Typography BS5 from Seme Framework.");
      $this->setKeyword('Seme Framework');
      $this->setAuthor('Seme Framework');

      $this->putThemeContent("profile/detail",$data); //pass data to view
      $this->loadLayout("col-1",$data);
      $this->render();
    }
  public function proses_detail($id)
    {
      // $data = $this->__init();

      $data = array();
      $data['bum'] = $this->bum->getById($id);
      $data['sess'] = $this->getKey();
    
    $id = $this->input->post('id');
    $username = $this->input->post('username');
    $name = $this->input->post('name');
    $address = $this->input->post('address');
    $bdate = $this->input->post('bdate');
    $description = $this->input->post('description');
    $role = $this->input->post('role');

    if(strlen($username)<=3){
      $this->__flash('Invalid username');
      $this->index();
      return;
    }

    if(strlen($name)<=1){
      $this->__flash('Invalid name');
      $this->index();
      return;
    }

    if(strlen($address)<=1){
      $this->__flash('Invalid address');
      $this->index();
      return;
    }

    

    if(strlen($description)<=1){
      $this->__flash('Invalid Description');
      $this->index();
      return;
    }


    $di = array();
    // $di['ckm']->penulis = $this->bum->getById($di['ckm']->b_user_id);
    $di['id'] = $id;
    $di['username'] = $username;
    $di['name'] = $name;
    $di['address'] = $address;
    $di['bdate'] = $bdate;
    $di['description'] = $description;
    $di['role'] = $role;

    $res = $this->bum->update($id,$di);
    if($res){
      $this->__flash('Profile '.$username.' berhasil diubah...');
      redir(base_url("profile/detail/".$id));
      return;
    }else{
      $this->__flash('Password confirmation doesn\'t match');
      $this->index();
      return;
    }
  }
}