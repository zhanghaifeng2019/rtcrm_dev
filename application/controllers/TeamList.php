<?php
class TeamList extends CI_Controller {
  public function __construct()
  {
       parent::__construct();
       if(!isset($this->session->name)){
                 header( 'HTTP/1.1 301 Moved Permanently' );
                 header( 'Location: '."https://rtcrm.net/Auth/logout" );
               }
               $this->load->model('log_model');
               $this->log_model->loger();
  }
        public function index()
        {
                $param = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $this->session->set_userdata('pagiNum',$param );
                $this->load->model('Result_model');
                $this->load->model('Dash_model');
                $data['group']= $this->Dash_model->getGroup();
                $data['genre']= $this->Dash_model->getGenre();
                $data['status']=$this->Dash_model->getStatus();
                $data['StatusComment']=$this->Dash_model->getStatusComment();
                $data['staff']= $this->Dash_model->getStaff();
                $data['type']="mypage";
                $config=array();
                $config['base_url'] =base_url()."/TeamList/index";
                $config['per_page']=10;

                $data['totalRows']=count($this->Result_model->getTeamRecord());

                $config['total_rows']=$data['totalRows'];
                $config["num_links"] = 2;
                $data['table']= $this->Result_model->getTeamList($config["per_page"],$param);

                $config['first_tag_open']='<li class="prv-all">';
                $config['first_tag_close'] = '</li>';

                $config['prev_tag_open']='<li class="prv">';
                $config['prev_tag_close'] = '</li>';

                $config['prev_link']='<li class="prv">';
                $config['prev_link'] = '</li>';

                $config['num_tag_open'] = '<li >';
                $config['num_tag_close'] ='</li>';

                $config['cur_tag_open'] = '<li class="current"><span>';
                $config['cur_tag_close'] = '</span></li >';

                $config['next_tag_open'] ='<li class="nxt">';
                $config['next_tag_close'] ='</li>';

                $config['last_tag_open'] ='<li class="nxt-all">';
                $config['last_tag_close'] ='</li>';
                $this->pagination->initialize($config);

                $data['pagination'] = $this->pagination->create_links();




                $this->load->view('common/head');
                $this->load->view('TM/TeamList',$data);
                $this->load->view('common/footer');







          }



          public function post()
          {

            unset(
                    $_SESSION['PDSVName'],
                    $_SESSION['sorting'],
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
                    $_SESSION['status_comment']

            );

            unset(
                    $_SESSION['priority'],
                    $_SESSION['staff_id'],
                    $_SESSION['genre'],
                    $_SESSION['status'],
                    $_SESSION['status_comment'],
                    $_SESSION['sorting']
            );

            if(isset($_POST['priority'])){
              $this->session->set_userdata('priority',$_POST['priority']);
            }
          if(isset($_POST['staff_id'])){
              $this->session->set_userdata('staff_id',$_POST['staff_id'] );
            }
            if(isset($_POST['staff_id2'])){
               $this->session->set_userdata('staff_id2',$_POST['staff_id2'] );
             }
            if(isset($_POST['genre'])){
              $this->session->set_userdata('genre',$_POST['genre'] );
            }
            if(isset($_POST['status'])){
              $this->session->set_userdata('status',$_POST['status']);
            }
            if(isset($_POST['status_comment'])){
              $this->session->set_userdata('status_comment',$_POST['status_comment']);
            }
            if(isset($_POST['teamCount'])){
              $this->session->set_userdata('teamCount',$_POST['teamCount']);
            }

            if(isset($_POST['is_retired'])){
              $this->session->set_userdata('is_retired',$_POST['is_retired']);
            }

            if(isset($_POST['keywords'])){
              if(!empty($_POST['keywords'])){
                  $this->session->set_userdata('keywords',$_POST['keywords']);
              }

            }


            $URL = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];

                   Header("Location:".base_url('TeamList'));
            }


          public function sorting(){
              $param = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
              $this->session->set_userdata('sorting',strip_tags($param ) );
              $URL = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];

                     Header("Location:".base_url('TeamList'));
              }

          public function outputCsv(){
            $this->load->dbutil();
            $this->load->helper('download');
            $this->load->model('Result_model');
            $this->load->model('Dash_model');
            $genre= $this->Dash_model->getGenre();
            $status=$this->Dash_model->getStatus();
            $status_comment=$this->Dash_model->getStatusComment();
            $query = $this->db->query($this->Result_model->getRecordTeamCsv());
            $priority=['最高','高','中','低'];
            $data[0]['id']="ID";
            $data[0]['priority']='優先';
            $data[0]['staffName']="RTG担当";
            $data[0]['companyName']="会社名";
            $data[0]['serviceName']="案件名";
            $data[0]['genre']="ジャンル";
            $data[0]['status']="ステータス";
            $data[0]['status_comment']="ステータスコメント";
            $data[0]['contact_comment']="最近連絡内容";
            $data[0]['contact_date']="最近連絡日";
            $data[0]['contact']="連絡経過日数";
            $data[0]['timer']="次回連絡タイマー";
            $data[0]['timerDate']="次回連絡予定日";
            $data[0]['url']="url";
            $data[0]['tel']="tel";
            for ( $i = 1 ; $i <= count ( $query->result() ) ; $i ++ ) {
              $data[$i]['id']=$query->row($i-1)->SID;
                $data[$i]['priority']=$priority[$query->row($i-1)->priority];
                $data[$i]['staffName']=$query->row($i-1)->staffName;
                $data[$i]['companyName']=$query->row($i-1)->companyName;
                $data[$i]['serviceName']=$query->row($i-1)->serviceName;
                $data[$i]['genre']=$genre[$query->row($i-1)->genre_id]->name;
                $data[$i]['status']=$status[$query->row($i-1)->status]->name;
                if(empty($query->row($i-1)->contact_date)){
                $data[$i]['contact_date']='コンタクト無';
                }
                else{
                  $data[$i]['contact_date']= date("Y-m-d", strtotime($query->row($i-1)->contact_date));
                }

                if(empty($query->row($i-1)->contact)){
            $data[$i]['contact']='コンタクト無';
                }
                else{

                  if(((strtotime(date("Ymd"))-strtotime( date("Ymd", strtotime($query->row($i-1)->contact_date))))  / 86400)==0 ){
                    $data[$i]['contact']='本日連絡済み';
                  }
                  else{
                  $data[$i]['contact']=((strtotime(date("Ymd"))-strtotime( date("Ymd", strtotime( $query->row($i-1)->contact_date))))  / 86400)."日";
                  }


                }
                $data[$i]['timer']= $query->row($i-1)->timer;

                if(empty($query->row($i-1)->contact)){
                $data[$i]['timerDate']=date("Y-m-d", strtotime( $query->row($i-1)->CLcreated."+".$query->row($i-1)->timer."day"));
                }
                else{
                $data[$i]['timerDate']= date("Y-m-d", strtotime( $query->row($i-1)->contact_date."+".$query->row($i-1)->timer."day"));
                }

                $data[$i]['url']=$query->row($i-1)->url;
                $data[$i]['tel']= '="'.$query->row($i-1)->tel.'"';
                  $data[$i]['status_comment']=$status_comment[$query->row($i-1)->status_comment]->name;


                  if(empty($query->row($i-1)->contact)){
                  $data[$i]['contact_comment']='コンタクト無';
                  }
                  else{
                    $data[$i]['contact_comment']=$query->row($i-1)->contact;

                  }

             }

            for ( $i = 0 ; $i < count ( $data ) ; $i ++ ) {
              $csv_data.= $data[$i]['id'].",";
                $csv_data.= $data[$i]['priority'].",".$data[$i]['staffName'].",";
                $csv_data.= $data[$i]['companyName'].",".$data[$i]['serviceName'].",";
                $csv_data.= $data[$i]['genre'].",".$data[$i]['status'].",";
                $csv_data.= $data[$i]['contact_date'].",".$data[$i]['contact'].",";
                $csv_data.= $data[$i]['timer'].",".$data[$i]['timerDate'].",";
                $csv_data.= $data[$i]['url'].",".$data[$i]['tel'].",";
                $csv_data.= $data[$i]['status_comment'].",".$data[$i]['contact_comment'].",";
                $csv_data.= "\n";
             }

          $csv_data = mb_convert_encoding ( $csv_data , "sjis-win" , 'utf-8' );
          force_download('list.csv', $csv_data);


          }


}
