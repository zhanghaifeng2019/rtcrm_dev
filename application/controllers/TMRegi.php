<?php
class TMRegi extends CI_Controller {

  public function __construct()
  {

       parent::__construct();
       if(!isset($this->session->name)){
                 header( 'HTTP/1.1 301 Moved Permanently' );
                 header( 'Location: '."https://rtcrm.net/Auth/logout" );
               }
               $this->load->model('Log_model');
               $this->Log_model->loger();
  }


        public function index()
        {

          $this->load->model('Dash_model');
          $data['genre']= $this->Dash_model->getGenre();
          $data['agency']= $this->Dash_model->getAgency();
          $data['staff']= $this->Dash_model->getStaff();
          $data['group']= $this->Dash_model->getGroup();
          $data['status']=$this->Dash_model->getStatus();
          $data['StatusComment']=$this->Dash_model->getStatusComment();
          $data['customertype']= $this->Dash_model->customertype();

            $this->load->view('common/head');
            $this->load->view('TMRegi/index',$data);
            $this->load->view('common/footer');
        }

        public function insert()
        {
          $this->load->model('TMRegi_model');
          $id=$this->TMRegi_model->insert();
          $this->session->set_userdata('POST', $id);

          $URL = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
                 header("HTTP/1.1 307 Temporary move");
                 Header("Location:".base_url('TMDetail'));
        }
}
