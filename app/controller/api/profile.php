<?php
class Profile extends JI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->setTheme('front');
    $this->lib('sene_json_engine','json');
    $this->load('b_user_model','bum');
    header('content-type: application/json');
  }
  public function index()
  {
    $data = array();
        $sess = $this->getKey();
        if(!isset($sess->user->id)){
            $data['status'] = 401;
            $data['message'] = 'Belum';
            echo json_encode($data);
            return;
        }
    
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $bdate = $this->input->post('bdate');
        $description = $this->input->post('description');
        $role = $this->input->post('role');
    
        if(strlen($username)<=3){
            $data['status'] = 900;
            $data['message'] = 'Invalid Username';
            echo json_encode($data);
            return;
        }
    
        if(strlen($name)<=1){
            $data['status'] = 901;
            $data['message'] = 'invalid name';
            echo json_encode($data);
            return;
        }
    
        if(strlen($address)<=1){
            $data['status'] = 902;
            $data['message'] = 'invalid address';
            echo json_encode($data);
            return;
        }
    
        
    
        if(strlen($description)<=1){
            $data['status'] = 903;
            $data['message'] = 'invalid description';
            echo json_encode($data);
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
    
            $data['status'] = 200;
            $data['message'] = 'Berhasil';
            echo json_encode($data);
            return;
        }else{
            $data['status'] = 905;
            $data['message'] = 'gagal';
            echo json_encode($data);
            return;
        }
    }
}