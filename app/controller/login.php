<?php
class Login extends JI_Controller
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
      redir(base_url('home'));
      return;
    }
    $data = array();
    $data['sess'] = $this->__flash();
    $this->setTitle('Login');
    $this->setDescription("Please login before you continue to your page.");
    $this->setKeyword('Seme Framework');
    $this->setAuthor('Seme Framework');

    $this->putThemeContent("login/home",$data); //pass data to view
    $this->loadLayout("col-1",$data);
    $this->__flashClear();
    $this->render();
  }
  public function proses(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if(strlen($username)>=3 && strlen($password)>=5){
      $bum = $this->bum->getByusername($username);
      if(isset($bum->id)){
        if(empty($bum->is_active)){
          $this->__flash('This user has been deactivated');
          $this->index();
          return;
        }

        //update password if still md5
        if(md5($password) == $bum->password){
          $du = array();
          $du['password'] = password_hash($password, PASSWORD_BCRYPT);
          $this->bum->update($bum->id, $du);
          $password = $du['password'];
          $bum->password = $password;
        }


        if (password_verify($password, $bum->password)) {
          //set to session
          $sess = $this->getKey();
          if(!is_object($sess)) $sess = new stdClass();
          if(!isset($sess->user)) $sess->user = new stdClass();
          $sess->user = $bum;
          $this->setKey($sess);

          // redirect to dashboard
          redir(base_url('home'),1);
          return;
        }else{
          $this->__flash('Invalid username or password');
          $this->index();
        }
      }else{
        $this->__flash('Invalid username or password');
        $this->index();
      }
    }else{
      $this->__flash('Invalid username or password');
      $this->index();
    }
  }
}