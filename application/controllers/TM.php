<?php
class TM extends CI_Controller {
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
              $this->load->view('TM/index');
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
                      $_SESSION['domain'],
                      $_SESSION['keywords']

              );
              unset(
                      $_SESSION['priority'],
                      $_SESSION['staff_id'],
                      $_SESSION['staff_id2'],
                      $_SESSION['genre'],
                      $_SESSION['status'],
                      $_SESSION['status_comment'],
                      $_SESSION['is_retired'],          //退職したかどうかを初期化する
                      $_SESSION['contact_date_from'],
                      $_SESSION['contact_date_end']
  

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
            unset(
                    $_SESSION['priority'],
                    $_SESSION['staff_id'],
                    $_SESSION['genre'],
                    $_SESSION['status'],
                    $_SESSION['status_comment'],
                    $_SESSION['contact_date_from'],
                    $_SESSION['contact_date_end']

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


            public function MyList()
            {

              unset(
                      $_SESSION['sorting'],
                      $_SESSION['teamCount'],
                      $_SESSION['PDSVName'],
                      $_SESSION['Phone'],
                      $_SESSION['companyName'],
                      $_SESSION['domain']
              );
              unset(
                      $_SESSION['priority'],
                      $_SESSION['staff_id'],
                      $_SESSION['genre'],
                      $_SESSION['status'],
                      $_SESSION['status_comment'],
                      $_SESSION['is_retired'],                 //退職したかどうかを初期化する
                      $_SESSION['contact_date_from'],
                      $_SESSION['contact_date_end']

              );



            $this->session->set_userdata('staff_id2',$_SESSION['id']);
            $this->session->set_userdata('cancelPage',"MyList");

              $URL = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];

                     Header("Location:".base_url('TMAll'));     // TMAll コントローラーにリダイレクト
              }


              public function TeamList()
              {

                unset(
                        $_SESSION['sorting'],
                        $_SESSION['teamCount'],
                        $_SESSION['PDSVName'],
                        $_SESSION['Phone'],
                        $_SESSION['companyName'],
                        $_SESSION['domain']
                );
                unset(
                        $_SESSION['priority'],
                        $_SESSION['staff_id'],
                        $_SESSION['genre'],
                        $_SESSION['status'],
                        $_SESSION['status_comment'],
                        $_SESSION['is_retired'],                 //退職したかどうかを初期化する
                        $_SESSION['contact_date_from'],
                        $_SESSION['contact_date_end']

                );



                  $this->session->set_userdata('teamCount',$_SESSION['group']);
                  $this->session->set_userdata('cancelPage',"TeamList");

                $URL = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];

                       Header("Location:".base_url('TMAll'));
                }

                public function Report()
                {

                  unset(
                          $_SESSION['sorting'],
                          $_SESSION['teamCount'],
                          $_SESSION['PDSVName'],
                          $_SESSION['Phone'],
                          $_SESSION['companyName'],
                          $_SESSION['domain']
                  );
                  unset(
                          $_SESSION['priority'],
                          $_SESSION['staff_id'],
                          $_SESSION['genre'],
                          $_SESSION['status'],
                          $_SESSION['status_comment'],
                          $_SESSION['contact_date_from'],
                          $_SESSION['contact_date_end']

                  );




                  $URL = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];

                         Header("Location:".base_url('TMReport'));
                  }






}
