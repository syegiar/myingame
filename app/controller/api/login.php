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
    $data['status'] = 550;
    $data['message'] = 'Invalid parameter(s)';
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if(strlen($username)>=1 && strlen($password)>=5){
      $bum = $this->bum->getByUsername($username);
      if(isset($bum->id)){
        if(empty($bum->is_active)){
          $data['status'] = 551;
          $data['message'] = 'This user has been deactivated';
          echo json_encode($data);
          die();
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
          $data['status'] = 200;
          $data['message'] = 'berhasil';
          $data['redirect'] = base_url('dashboard');
          echo json_encode($data);
          die();
        }else{
          $data['status'] = 900;
          $data['message'] = 'Invalid username or password';
          echo json_encode($data);
          die();
        }
      }else{
        $data['status'] = 520;
        $data['message'] = 'Invalid username or password';
        echo json_encode($data);
        die();
      }
    }else{
      $data['status'] = 521;
      $data['message'] = 'Invalid username or password';
      echo json_encode($data);
      die();
    }
  }
}