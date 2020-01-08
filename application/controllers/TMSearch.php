<?php
class TMSearch extends CI_Controller {
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
              $this->load->view('TMSearch/index');
              $this->load->view('common/footer');

              // $this->output->enable_profiler(false);
              // $this->load->library('form_validation');
              // $this->form_validation->set_rules('companyName', '会社名' );
              // $this->form_validation->set_rules('Phone', '電話番号','max_length[12]|numeric');
              unset(
                      $_SESSION['sorting'],
                      $_SESSION['PDSVName'],
                      $_SESSION['teamCount'],
                      $_SESSION['Phone'],
                      $_SESSION['companyName'],
                      $_SESSION['domain']
              );

          }

          public function post()
          {

            unset(
                    $_SESSION['PDSVName'],
                    $_SESSION['sorting'],
                    $_SESSION['Phone'],
                    $_SESSION['companyName'],
                    $_SESSION['domain']
            );

            if(!empty($_POST['PDSVName'])){
              $this->session->set_userdata('PDSVName',strip_tags($_POST['PDSVName']) );
            }
          if(!empty($_POST['Phone'])){
              $this->session->set_userdata('Phone',strip_tags($_POST['Phone']) );
            }
            if(!empty($_POST['companyName'])){
              $this->session->set_userdata('companyName',strip_tags($_POST['companyName']) );
            }
            if(!empty($_POST['domain'])){
              $this->session->set_userdata('domain',strip_tags($_POST['domain']) );
            }

            $this->session->set_userdata('cancelPage',"TMResult");

            $URL = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];

                   Header("Location:".base_url('TMResult'));
            }









}
