<?php
class TMReport extends CI_Controller {

        //csvダウンロード機能のために作った配列
        private $export_array = array();

        public function __construct()
        {
            parent::__construct();
            if(!isset($this->session->name)){
                        header( 'HTTP/1.1 301 Moved Permanently' );
                        header( 'Location: '."https://rtcrm.net/Auth/logout" );
                }
                $this->load->model('log_model');
                $this->log_model->loger();
                $this->load->model('Report_model');

                //$export_arrayを利用するために、下記のコードを書きました。
                if ($this->session->userdata('export_array')) {
                    $this->export_array = $this->session->userdata('export_array');
                }
        }

        public function index()
        {
          $this->load->model('Dash_model');
          $data['group']= $this->Dash_model->getGroup();

          $data['Rookies']= $this->Report_model->initRookie();
          $data['Teams']= $this->Report_model->initTeam();


          if(isset($_POST['start'])){

              if(isset($_POST['end'])){
                  $trcArr=$this->Report_model->allTracking($_POST['start'],$_POST['end']);
              }
              else{
                  $trcArr=$this->Report_model->allTracking(0,0);
              }

          }
          else{
              $trcArr=$this->Report_model->allTracking(0,0);
          }

          $allArr= $this->Report_model->allStaff();

          $arr=array();
          for($i=0;$i<count($allArr);$i++){
            $listUp=0;
            $call=0;
            $apo=0;
            $comp=0;
            $call_comp=0;

            for($j=0;$j<count($trcArr);$j++){
              if($allArr[$i]->id ==$trcArr[$j]->staff ){
                if($trcArr[$j]->status==11){
                  $listUp++;
                }
                if($trcArr[$j]->status==0){
                  $call++;
                }
                if($trcArr[$j]->status==2){
                  $apo++;
                }
                if($trcArr[$j]->status==3){
                  $comp++;
                }
                if($trcArr[$j]->status==12){
                    $call_comp++;
                }
              }
            }
            $telem_point=$apo*1+$call_comp*2;
            array_push($arr,array("id"=>$allArr[$i]->id,"name"=>$allArr[$i]->name,"listup"=>$listUp,"call"=>$call,"apo"=>$apo,"comp"=>$comp,"call_comp"=>$call_comp,"telem_point"=>$telem_point));
          }

          if(isset($_POST['priority'])){

              $pri=$_POST['priority'];

              switch ($pri) {
                case 'non':
                  // code...
                  break;

                case '1':
                usort($arr, function($a, $b){
                  if($a["listup"] == $b["listup"]){
                      return 0;
                  }
                  if($a["listup"] > $b["listup"]){
                      return -1;
                  }
                  if($a["listup"] < $b["listup"]){
                      return 1;
                  }
              });

                  break;


                  case '2':
                  usort($arr, function($a, $b){
                    if($a["listup"] == $b["listup"]){
                        return 0;
                    }
                    if($a["listup"] > $b["listup"]){
                        return 1;
                    }
                    if($a["listup"] < $b["listup"]){
                        return -1;
                    }
                });

                    break;

                    case '3':
                    usort($arr, function($a, $b){
                      if($a["call"] == $b["call"]){
                          return 0;
                      }
                      if($a["call"] > $b["call"]){
                          return -1;
                      }
                      if($a["call"] < $b["call"]){
                          return 1;
                      }
                  });

                      break;

                      case '4':
                      usort($arr, function($a, $b){
                        if($a["call"] == $b["call"]){
                            return 0;
                        }
                        if($a["call"] > $b["call"]){
                            return 1;
                        }
                        if($a["call"] < $b["call"]){
                            return -1;
                        }
                    });

                    break;



                    case '5':
                    usort($arr, function($a, $b){
                      if($a["apo"] == $b["apo"]){
                          return 0;
                      }
                      if($a["apo"] > $b["apo"]){
                          return -1;
                      }
                      if($a["apo"] < $b["apo"]){
                          return 1;
                      }
                  });

                      break;

                      case '6':
                      usort($arr, function($a, $b){
                        if($a["apo"] == $b["apo"]){
                            return 0;
                        }
                        if($a["apo"] > $b["apo"]){
                            return 1;
                        }
                        if($a["apo"] < $b["apo"]){
                            return -1;
                        }
                    });

                        break;


                        case '7':
                        usort($arr, function($a, $b){
                          if($a["comp"] == $b["comp"]){
                              return 0;
                          }
                          if($a["comp"] > $b["comp"]){
                              return -1;
                          }
                          if($a["comp"] < $b["comp"]){
                              return 1;
                          }
                      });

                      break;

                      case '8':
                      usort($arr, function($a, $b){
                        if($a["comp"] == $b["comp"]){
                            return 0;
                        }
                        if($a["comp"] > $b["comp"]){
                            return 1;
                        }
                        if($a["comp"] < $b["comp"]){
                            return -1;
                        }
                    });

                        break;

                        case '9':
                        usort($arr, function($a, $b){
                          if($a["telem_point"] == $b["telem_point"]){
                              return 0;
                          }
                          if($a["telem_point"] > $b["telem_point"]){
                              return -1;
                          }
                          if($a["telem_point"] < $b["telem_point"]){
                              return 1;
                          }
                      });

                      break;

                      case '10':
                      usort($arr, function($a, $b){
                        if($a["telem_point"] == $b["telem_point"]){
                            return 0;
                        }
                        if($a["telem_point"] > $b["telem_point"]){
                            return 1;
                        }
                        if($a["telem_point"] < $b["telem_point"]){
                            return -1;
                        }
                    });

                        break;
                        
                default:
                  // code...
                  break;
              }

          }

          //レポートのデータがこの配列の中にあります
          $data['All']= $arr;
          //$this->export_arrayはexport メソッドに渡すための配列
          $this->export_array = $arr;
          $this->session->set_userdata('export_array', $this->export_array);
          //viewを呼びだす
          $this->load->view('common/head');
          $this->load->view('TMReport/index',$data);
          $this->load->view('common/footer');

        }

        public function returnAll(){

          echo json_encode($this->Report_model->allStaff());
        }

        public function returnPersonal(){

          echo json_encode($this->Report_model->personal($_POST['id']));
        }

        public function detail($staff_id="",$status=""){
            $config["total_rows"]=count($this->Report_model->number_detail($staff_id,$status));
            $config['base_url'] =base_url()."/TMReport/detail/".$staff_id."/".$status;
            $offset=($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            $per_page_records=10;
            $data["records"]=$this->Report_model->fetch_ten_records($staff_id,$status,$per_page_records,$offset);

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
            $this->load->view('TMReport/detail',$data);
            $this->load->view('common/footer');
        }


        //レポートのcsvダウンロード機能
        public function export(){

                $file_name="performance_report".date("Ymd").".csv";

                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=$file_name");
                header("Content-Type: application/csv;");

                $file=fopen("php://output","w");

                stream_filter_prepend($file,'convert.iconv.utf-8/cp932');

                $header=array("お名前","リストアップ","コール","アポ","成約","電クロ","テレマポイント","受注率");
                fputcsv($file,$header);

                foreach ($this->export_array as $key=>$value){
                    
                    //テレマポイントを計算する
                    $value["telem_point"] = $value["apo"]*1+$value["call_comp"]*2;

                    if($value["apo"]==0){
                        $value["order_rate"]="0%";
                    }else{
                        $value["order_rate"]=strval(round($value["comp"]/$value["apo"],3)*100)."%";
                    }

                    //idを削除して、"お名前","リストアップ","コール","アポ","成約","合計","テレマポイント"を保留する
                    unset($value["id"]);
                    fputcsv($file,$value);
                }

                fclose($file);
                exit;
        }

}
