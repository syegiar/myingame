<?php
class Detail extends SENE_Controller
{
    public function __contruct()
    {
        parent::__construct();
        $this->setTheme('front');
        $this->load('c_konten_model' , 'ckm');
    }
    public function index($id='')
    {
        $data = array();
        $data['sess'] = $this->getKey();
        
        $data['article'] = $this->ckm->getById($id);
        $this->setTitle('');
        $this->setDescription('');
        $this->setKeyword('Seme Framework');
        $this->setAuthor('Seme Framework');

        $data['hello'] = "this is from controller";
        
        $this->putThemeContent("home/detail",$data);
        $this->putJSContent("home/home_bottom",$data);
        
        $this->LoadLayout("col-1",$data);
        $this->render();
    }
}