<?php

class Main extends CI_Controller {
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

            $this->load->view('common/head');
            $this->load->view('Main');
            $this->load->view('common/footer');
            if(!isset($this->session->name)){
              header( 'HTTP/1.1 301 Moved Permanently' );
              header( 'Location: '."https://rtcrm.net/Auth/logout" );
            }

        }
}
