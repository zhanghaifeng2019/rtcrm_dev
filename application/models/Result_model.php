<?php
class Result_model extends CI_Model {



  public function getAllRecord()
      {
        $sql='SELECT count(*) as num FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 ';

        if( isset($_SESSION['keywords'])) {

          $sql.='and ( CL.name like "%'.$this->session->keywords.'%" or ';
          $sql.='CL.tel like "%'.$this->session->keywords.'%" or ';
          $sql.='CL.domain like "%'.$this->session->keywords.'%" or ';
          $sql.='CL.service_name like "%'.$this->session->keywords.'%"';
          $sql.=') ';

            }
        if(isset($_SESSION['contact_date_from'])){
          if($this->session->contact_date_from!=''){
            $sql.='and SI.contact_date >="'.$_SESSION['contact_date_from'].'" ';
          }
        }
        if(isset($_SESSION['contact_date_end'])){
          if($this->session->contact_date_end!=''){
            $sql.='and SI.contact_date <="'.$_SESSION['contact_date_end'].'" ';
          }
        }
        if( isset($_SESSION['priority'])) {
              if($this->session->priority!='non'){
              $sql.='and priority ='.$this->session->priority.' ';
              }
            }

          if( isset($_SESSION['staff_id'])) {
                if($this->session->staff_id!='non'){
                $sql.='and SI.rtg_staff_id ='.$this->session->staff_id.' ';
                }
              }
              if( isset($_SESSION['staff_id2'])) {
                              if($this->session->staff_id2!='non'){
                              $sql.='and SI.staff_id ='.$this->session->staff_id2.' ';
                              }
                            }
          if( isset($_SESSION['genre'])) {
                if($this->session->genre!='non'){
                $sql.='and genre_id ='.$this->session->genre.' ';
                }
              }
          if( isset($_SESSION['status'])) {
                if($this->session->status!='non'){
                $sql.='and SI.status ='.$this->session->status.' ';
                }
              }
          if( isset($_SESSION['is_retired'])) {
              if($this->session->is_retired!='non'){
                $sql.='and is_retired ='.$this->session->is_retired.' ';
              }
          }

        if( isset($_SESSION['status_comment'])) {
                    if($this->session->status_comment!='non'){
                    $sql.='and status_comment ='.$this->session->status_comment.' ';
                    }
                  }
                  if( isset($_SESSION['teamCount'])) {
                    if($this->session->teamCount!='non'){
                      $sql.='and ST.group_id ='.$this->session->teamCount.' ';
                    }
                      }
        $result = $this->db->query($sql)->result();
        $this->db->close();
        return $result;
      }


        // $sub_sql="SELECT customerlist.cid,CCT.contact_date cct_date,
        //           (CASE 
        //             WHEN CCT.contact_date IS NULL THEN DATE_ADD(customerlist.created, interval SI.timer DAY)
        //           ELSE 
        //             DATE_ADD(contact_date, interval SI.timer DAY) END
        //           ) timer_date 
        //           FROM customerlist
        //           join sponsorinfo SI on customerlist.cid = SI.cid 
        //           join staff ST on SI.staff_id = ST.id
        //           LEFT OUTER JOIN customercontact CCT on customerlist.cid = CCT.cid 
        //           and CCT.id = (SELECT id from customercontact where cid = CCT.cid order by contact_date desc limit 0,1) 
        //           WHERE customerlist.is_delete = 0 ";

       
        public function getAllList($limit,$start)
        {
          $sub_sql="SELECT customerlist.cid
                    FROM customerlist
                    join sponsorinfo SI on customerlist.cid = SI.cid 
                    join staff ST on SI.staff_id = ST.id
                    WHERE customerlist.is_delete = 0 ";
                    
      if( isset($_SESSION['keywords'])) {
  
        $sub_sql.='and ( customerlist.name like "%'.$this->session->keywords.'%" or ';
        $sub_sql.='customerlist.tel like "%'.$this->session->keywords.'%" or ';
        $sub_sql.='customerlist.domain like "%'.$this->session->keywords.'%" or ';
        $sub_sql.='customerlist.service_name like "%'.$this->session->keywords.'%"';
        $sub_sql.=') ';
      }
  
      if( isset($_SESSION['priority'])) {
        if($this->session->priority!='non'){
        $sub_sql.='and priority ='.$this->session->priority.' ';
        }
      }
  
      if( isset($_SESSION['staff_id'])) {
        if($this->session->staff_id!='non'){
        $sub_sql.='and SI.rtg_staff_id ='.$this->session->staff_id.' ';
        }
      }
  
      if( isset($_SESSION['staff_id2'])) {
        if($this->session->staff_id2!='non'){
          $sub_sql.='and SI.staff_id ='.$this->session->staff_id2.' ';
        }
      }
  
      if( isset($_SESSION['genre'])) {
        if($this->session->genre!='non'){
        $sub_sql.='and genre_id ='.$this->session->genre.' ';
        }
      }
  
      if( isset($_SESSION['status'])) {
        if($this->session->status!='non'){
        $sub_sql.='and SI.status ='.$this->session->status.' ';
        }
      }
  
      if( isset($_SESSION['status_comment'])) {
        if($this->session->status_comment!='non'){
          $sub_sql.='and status_comment ='.$this->session->status_comment.' ';
        }
      }
  
      if( isset($_SESSION['teamCount'])) {
        if($this->session->teamCount!='non'){
          $sub_sql.='and ST.group_id ='.$this->session->teamCount.' ';
        }
      }
  
      if( isset($_SESSION['is_retired'])) {
        if($this->session->is_retired!='non'){
          $sub_sql.='and is_retired ='.$this->session->is_retired.' ';
        }
      }

      if(isset($_SESSION['contact_date_from'])){
        if($this->session->contact_date_from!=''){
          $sub_sql.='and contact_date >="'.$_SESSION['contact_date_from'].'" ';
        }
      }
      if(isset($_SESSION['contact_date_end'])){
        if($this->session->contact_date_end!=''){
          $sub_sql.='and contact_date <="'.$_SESSION['contact_date_end'].'" ';
        }
      }
      
      if( isset($_SESSION['sorting'])) {
        if($_SESSION['sorting']=='timerDesc') {
            $sub_sql.=' order by timer_date desc ';
        }
        if($_SESSION['sorting']=='timerAsc') {
            $sub_sql.=' order by timer_date asc ';
        }
        if($_SESSION['sorting']=='contact_dateDesc') {
            $sub_sql.=' order by contact_date desc ';
        }
        if($_SESSION['sorting']=='contact_dateAsc') {
            $sub_sql.=' order by contact_date ASC ';
        }
      }

      if($limit!="all"){
        $sub_sql.=' LIMIT '.$start.",".$limit;
      }
  
          $main_sql="SELECT CL.*,
                 CL.created CLcreated ,
                 SI.*, 
                 ST.name staffName,
                 ST.is_retired,
                 CC.contact contact
         FROM ({$sub_sql}) q
  
         JOIN customerlist CL ON q.cid = CL.cid
  
         join sponsorinfo SI on CL.cid = SI.cid 
  
         join staff ST on SI.staff_id = ST.id 

         LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid 

         and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) 
         ";
            
          $result = $this->db->query($main_sql)->result();
          $this->db->close();
          return $result;
        }
  

    public function getList($limit,$start)
        {
          $sql='SELECT CL.*,CL.created CLcreated ,SI.*, ST.name staffName,ST.is_retired, CC.contact_date, CC.contact contact, (CASE WHEN CC.contact_date IS NULL THEN DATE_ADD(CL.created, interval SI.timer DAY) ELSE DATE_ADD(CC.contact_date, interval SI.timer DAY) END) timer_date FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 and (';

          if($this->session->companyName!=''){
            $sql.='CL.name like "%'.$this->session->companyName.'%"  ';
          }

          if($this->session->Phone!=''){
            $sql.='or CL.tel like "%'.$this->session->Phone.'%"';
          }

          if($this->session->domain!=''){
            $sql.='or CL.domain like "%'.$this->session->domain.'%" ';
          }

          if($this->session->PDSVName!=''){
          $sql.='or CL.service_name like "%'.$this->session->PDSVName.'%"';
          }
    $sql.=') ';


          if(!isset($_SESSION['PDSVName']) && !isset($_SESSION['Phone']) && !isset($_SESSION['companyName']) && !isset($_SESSION['domain']) ){
            $sql.='and ST.id='.$this->session->id;
          }
          if( isset($_SESSION['sorting'])) {
             if($_SESSION['sorting']=='timerDesc') {
                  $sql.='order by timer_date desc';
             }
             if($_SESSION['sorting']=='timerAsc') {
                  $sql.='order by timer_date asc';
             }
             if($_SESSION['sorting']=='contact_dateDesc') {
                  $sql.='order by CC.contact_date desc ';
             }
             if($_SESSION['sorting']=='contact_dateAsc') {
                  $sql.='order by CC.contact_date ASC ';
             }
           }
           else
           {
             $sql.='order by CL.cid ASC ';
           }


          $sql.=' LIMIT '.$start.",".$limit;
          $result = $this->db->query($sql)->result();
          $this->db->close();



          return $result;


        }


        public function getRecord()
            {
              $sql='SELECT CL.*,CL.created CLcreated ,SI.*, ST.name staffName, CC.contact_date contact_date, CC.contact contact FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 and ( ';
              if($this->session->companyName!=''){
                $sql.='CL.name like "%'.$this->session->companyName.'%"  ';
              }

              if($this->session->Phone!=''){
                $sql.='or CL.tel like "%'.$this->session->Phone.'%" ';
              }

              if($this->session->domain!=''){
                $sql.='or CL.domain like "%'.$this->session->domain.'%" ';
              }

              if($this->session->PDSVName!=''){
              $sql.='or CL.service_name like "%'.$this->session->PDSVName.'%"';
              }
            $sql.=') ';

        if(!isset($_SESSION['PDSVName']) && !isset($_SESSION['Phone']) && !isset($_SESSION['companyName']) && !isset($_SESSION['domain']) && !isset($this->session->teamCount)){
          $sql.=' and ST.id='.$this->session->id;
        }
        if(isset($this->session->teamCount)){
          $sql.=' and ST.group_id='.$this->session->teamCount;
        }
              if(!isset($_SESSION['PDSVName']) && !isset($_SESSION['Phone']) && !isset($_SESSION['companyName']) && !isset($_SESSION['domain'])){
                $sql.='and ST.id='.$this->session->id;
              }

              $result = $this->db->query($sql)->result();
              $this->db->close();
              return $result;
            }

            public function getRecordCsv()
                {
                  $sql='SELECT CL.*,CL.service_name serviceName,CL.created CLcreated ,CL.name companyName,SI.*,SI.cid SID, ST.name staffName, CC.contact_date contact_date, CC.contact contact FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 and (';

                  if($this->session->companyName!=''){
                    $sql.='CL.name like "%'.$this->session->companyName.'%" ';
                  }

                  if($this->session->Phone!=''){
                    $sql.='or CL.tel like "%'.$this->session->Phone.'%" ';
                  }

                  if($this->session->domain!=''){
                    $sql.='or CL.domain like "%'.$this->session->domain.'%" ';
                  }

                  if($this->session->PDSVName!=''){
                  $sql.='or CL.service_name like "%'.$this->session->PDSVName.'%"';
                  }
            $sql.=') ';
                  return $sql;
                }

                public function getRecordAllCsv()
                    {
                      $sql='SELECT CL.*,CL.service_name serviceName,CL.created CLcreated ,CL.name companyName,SI.*,SI.cid SID, ST.name staffName, CC.contact_date contact_date, CC.contact contact FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 ';
                      if( isset($_SESSION['keywords'])) {

                        $sql.='and ( CL.name like "%'.$this->session->keywords.'%" or ';
                        $sql.='CL.tel like "%'.$this->session->keywords.'%" or ';
                        $sql.='CL.domain like "%'.$this->session->keywords.'%" or ';
                        $sql.='CL.service_name like "%'.$this->session->keywords.'%"';
                        $sql.=') ';

                          }
                      if( isset($_SESSION['priority'])) {
                            if($this->session->priority!='non'){
                            $sql.='and priority ='.$this->session->priority.' ';
                            }
                          }

                        if( isset($_SESSION['staff_id'])) {
                              if($this->session->staff_id!='non'){
                              $sql.='and SI.rtg_staff_id ='.$this->session->staff_id.' ';
                              }
                            }
                               if( isset($_SESSION['staff_id2'])) {
                              if($this->session->staff_id2!='non'){
                              $sql.='and SI.staff_id ='.$this->session->staff_id2.' ';
                              }
                            }
                        if( isset($_SESSION['genre'])) {
                              if($this->session->genre!='non'){
                              $sql.='and genre_id ='.$this->session->genre.' ';
                              }
                            }
                        if( isset($_SESSION['status'])) {
                              if($this->session->status!='non'){
                              $sql.='and SI.status ='.$this->session->status.' ';
                              }
                            }

                      if( isset($_SESSION['status_comment'])) {
                                  if($this->session->status_comment!='non'){
                                  $sql.='and status_comment ='.$this->session->status_comment.' ';
                                  }
                                }

                      // if(!isset($_SESSION['PDSVName']) && !isset($_SESSION['Phone']) && !isset($_SESSION['companyName']) && !isset($_SESSION['domain']) && !isset($this->session->teamCount)){
                      //   $sql.=' and ST.id='.$this->session->id;
                      // }
                      if(isset($this->session->teamCount)){
                        $sql.=' and ST.group_id='.$this->session->teamCount;
                      }

                      if($this->session->companyName!=''){
                        $sql.=' and CL.name like "%'.$this->session->companyName.'%"';
                      }

                      if($this->session->Phone!=''){
                        $sql.=' and CL.tel like "%'.$this->session->Phone.'%"';
                      }

                      if($this->session->domain!=''){
                        $sql.=' and CL.domain like "%'.$this->session->domain.'%"';
                      }

                      if($this->session->PDSVName!=''){
                        $sql.=' and CL.service_name like "%'.$this->session->PDSVName.'%"';
                      }
                      if(isset($this->session->teamCount)){
                        $sql.=' and ST.group_id='.$this->session->teamCount;
                      }

                      if( isset($_SESSION['sorting'])) {
                         if($_SESSION['sorting']=='timerDesc') {
                              $sql.='order by timer_date desc';
                         }
                         if($_SESSION['sorting']=='timerAsc') {
                              $sql.='order by timer_date asc';
                         }
                         if($_SESSION['sorting']=='contact_dateDesc') {
                              $sql.='order by contact_date desc ';
                         }
                         if($_SESSION['sorting']=='contact_dateAsc') {
                              $sql.='order by contact_date ASC ';
                         }
                       }
                       else
                       {
                         $sql.=' order by CL.cid';
                       }




                      return $sql;


                    }



                    public function getRecordTMAllCsv()
                        {
                          $sql='SELECT CL.*,CL.service_name serviceName,CL.created CLcreated ,CL.name companyName,SI.*,SI.cid SID, ST.name staffName, CC.contact_date contact_date, CC.contact contact FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 ';
                          if( isset($_SESSION['keywords'])) {

                            $sql.='and ( CL.name like "%'.$this->session->keywords.'%" or ';
                            $sql.='CL.tel like "%'.$this->session->keywords.'%" or ';
                            $sql.='CL.domain like "%'.$this->session->keywords.'%" or ';
                            $sql.='CL.service_name like "%'.$this->session->keywords.'%"';
                            $sql.=') ';

                              }
                          if( isset($_SESSION['priority'])) {
                                if($this->session->priority!='non'){
                                $sql.='and priority ='.$this->session->priority.' ';
                                }
                              }

                            if( isset($_SESSION['staff_id'])) {
                                  if($this->session->staff_id!='non'){
                                  $sql.='and SI.rtg_staff_id ='.$this->session->staff_id.' ';
                                  }
                                }
                                   if( isset($_SESSION['staff_id2'])) {
                              if($this->session->staff_id2!='non'){
                              $sql.='and SI.staff_id ='.$this->session->staff_id2.' ';
                              }
                            }
                            if( isset($_SESSION['genre'])) {
                                  if($this->session->genre!='non'){
                                  $sql.='and genre_id ='.$this->session->genre.' ';
                                  }
                                }
                            if( isset($_SESSION['status'])) {
                                  if($this->session->status!='non'){
                                  $sql.='and SI.status ='.$this->session->status.' ';
                                  }
                                }

                          if( isset($_SESSION['status_comment'])) {
                                      if($this->session->status_comment!='non'){
                                      $sql.='and status_comment ='.$this->session->status_comment.' ';
                                      }
                                    }

                                    if( isset($_SESSION['teamCount'])) {
                                      if($this->session->teamCount!='non'){
                                        $sql.='and ST.group_id ='.$this->session->teamCount.' ';
                                      }


                                        }




                          return $sql;


                        }

                public function getMyList($limit,$start)
                    {

                      $sql='SELECT CL.*,CL.created CLcreated ,SI.*, ST.name staffName,CC.contact_date contact_date, CC.contact contact, (CASE WHEN CC.contact_date IS NULL THEN DATE_ADD(CL.created, interval SI.timer DAY) ELSE DATE_ADD(contact_date, interval SI.timer DAY) END) timer_date FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 ';

                      if( isset($_SESSION['keywords'])) {

                        $sql.='and ( CL.name like "%'.$this->session->keywords.'%" or ';
                        $sql.='CL.tel like "%'.$this->session->keywords.'%" or ';
                        $sql.='CL.domain like "%'.$this->session->keywords.'%" or ';
                        $sql.='CL.service_name like "%'.$this->session->keywords.'%"';
                        $sql.=') ';

                          }

                      if( isset($_SESSION['priority'])) {
                            if($this->session->priority!='non'){
                            $sql.='and priority ='.$this->session->priority.' ';
                            }
                          }

                        if( isset($_SESSION['staff_id'])) {
                              if($this->session->staff_id!='non'){
                              $sql.='and SI.rtg_staff_id ='.$this->session->staff_id.' ';
                              }
                            }
                            if( isset($_SESSION['staff_id2'])) {
                              if($this->session->staff_id2!='non'){
                              $sql.='and SI.staff_id ='.$this->session->staff_id2.' ';
                              }
                            }
                        if( isset($_SESSION['genre'])) {
                              if($this->session->genre!='non'){
                              $sql.='and genre_id ='.$this->session->genre.' ';
                              }
                            }
                        if( isset($_SESSION['status'])) {
                          if($this->session->status!='non'){
                          $sql.='and SI.status ='.$this->session->status.' ';
                          }
                        }



                      if( isset($_SESSION['status_comment'])) {
                                  if($this->session->status_comment!='non'){
                                  $sql.='and status_comment ='.$this->session->status_comment.' ';
                                  }
                                }

                                if( isset($_SESSION['teamCount'])) {
                                  if($this->session->teamCount!='non'){
                                    $sql.='and ST.group_id ='.$this->session->teamCount.' ';
                                  }


                                    }

                                    if( isset($_SESSION['sorting'])) {
                                       if($_SESSION['sorting']=='timerDesc') {
                                            $sql.='order by timer_date desc';
                                       }
                                       if($_SESSION['sorting']=='timerAsc') {
                                            $sql.='order by timer_date asc';
                                       }
                                       if($_SESSION['sorting']=='contact_dateDesc') {
                                            $sql.='order by contact_date desc ';
                                       }
                                       if($_SESSION['sorting']=='contact_dateAsc') {
                                            $sql.='order by contact_date ASC ';
                                       }
                                     }
                       else
                       {
                         $sql.=' order by CL.cid';
                       }

                      $sql.=' LIMIT '.$start.",".$limit;
                      $result = $this->db->query($sql)->result();
                      $this->db->close();



                      return $result;


                    }

                    public function getMyRecord()
                        {
                          $sql='SELECT CL.*,CL.created CLcreated ,SI.*, ST.name staffName, CC.contact_date contact_date, CC.contact contact FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 ';

                          if( isset($_SESSION['keywords'])) {

                            $sql.='and ( CL.name like "%'.$this->session->keywords.'%" or ';
                            $sql.='CL.tel like "%'.$this->session->keywords.'%" or ';
                            $sql.='CL.domain like "%'.$this->session->keywords.'%" or ';
                            $sql.='CL.service_name like "%'.$this->session->keywords.'%"';
                            $sql.=') ';

                              }

                          if( isset($_SESSION['priority'])) {
                                if($this->session->priority!='non'){
                                $sql.='and priority ='.$this->session->priority.' ';
                                }
                              }

                            if( isset($_SESSION['staff_id'])) {
                                  if($this->session->staff_id!='non'){
                                  $sql.='and SI.rtg_staff_id ='.$this->session->staff_id.' ';
                                  }
                                }
                            if( isset($_SESSION['staff_id2'])) {
                              if($this->session->staff_id2!='non'){
                              $sql.='and SI.staff_id ='.$this->session->staff_id2.' ';
                              }
                            }
                            if( isset($_SESSION['genre'])) {
                                  if($this->session->genre!='non'){
                                  $sql.='and genre_id ='.$this->session->genre.' ';
                                  }
                                }
                            if( isset($_SESSION['status'])) {
                                  if($this->session->status!='non'){
                                  $sql.='and SI.status ='.$this->session->status.' ';
                                  }
                                }

                          if( isset($_SESSION['status_comment'])) {
                                if($this->session->status_comment!='non'){
                                  $sql.='and status_comment ='.$this->session->status_comment.' ';
                                }
                          }



                                    if( isset($_SESSION['teamCount'])) {
                                      if($this->session->teamCount!='non'){
                                        $sql.='and ST.group_id ='.$this->session->teamCount.' ';
                                      }


                                        }



                          $result = $this->db->query($sql)->result();
                          $this->db->close();



                          return $result;


                        }

          public function getRecordTeamCsv()
              {
                $sql='SELECT CL.*,CL.service_name serviceName,CL.created CLcreated ,CL.name companyName,SI.*,SI.cid SID, ST.name staffName, CC.contact_date contact_date, CC.contact contact FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 ';


                if( isset($_SESSION['keywords'])) {

                  $sql.='and ( CL.name like "%'.$this->session->keywords.'%" or ';
                  $sql.='CL.tel like "%'.$this->session->keywords.'%" or ';
                  $sql.='CL.domain like "%'.$this->session->keywords.'%" or ';
                  $sql.='CL.service_name like "%'.$this->session->keywords.'%"';
                  $sql.=') ';

                    }

                          if( isset($_SESSION['priority'])) {
                                if($this->session->priority!='non'){
                                $sql.='and priority ='.$this->session->priority.' ';
                                }
                              }

                            if( isset($_SESSION['staff_id'])) {
                                  if($this->session->staff_id!='non'){
                                  $sql.='and SI.rtg_staff_id ='.$this->session->staff_id.' ';
                                  }
                                }
                                   if( isset($_SESSION['staff_id2'])) {
                              if($this->session->staff_id2!='non'){
                              $sql.='and SI.staff_id ='.$this->session->staff_id2.' ';
                              }
                            }
                            if( isset($_SESSION['genre'])) {
                                  if($this->session->genre!='non'){
                                  $sql.='and genre_id ='.$this->session->genre.' ';
                                  }
                                }
                            if( isset($_SESSION['status'])) {
                                  if($this->session->status!='non'){
                                  $sql.='and SI.status ='.$this->session->status.' ';
                                  }
                                }

                          if( isset($_SESSION['status_comment'])) {
                                      if($this->session->status_comment!='non'){
                                      $sql.='and status_comment ='.$this->session->status_comment.' ';
                                      }
                                    }
                                    if( isset($_SESSION['teamCount'])) {
                                      if($this->session->teamCount!='non'){
                                        $sql.='and ST.group_id ='.$this->session->teamCount.' ';
                                      }
                                    }




                return $sql;


              }

    public function getTeamList($limit,$start)
        {

          $sql='SELECT CL.*,CL.created CLcreated ,SI.*, ST.name staffName,ST.is_retired, CC.contact_date contact_date, CC.contact contact, (CASE WHEN CC.contact_date IS NULL THEN DATE_ADD(CL.created, interval SI.timer DAY) ELSE DATE_ADD(contact_date, interval SI.timer DAY) END) timer_date FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 ';

          if( isset($_SESSION['keywords'])) {

            $sql.='and ( CL.name like "%'.$this->session->keywords.'%" or ';
            $sql.='CL.tel like "%'.$this->session->keywords.'%" or ';
            $sql.='CL.domain like "%'.$this->session->keywords.'%" or ';
            $sql.='CL.service_name like "%'.$this->session->keywords.'%"';
            $sql.=') ';

              }

          if( isset($_SESSION['priority'])) {
                if($this->session->priority!='non'){
                $sql.='and priority ='.$this->session->priority.' ';
                }
              }

            if( isset($_SESSION['staff_id'])) {
                  if($this->session->staff_id!='non'){
                  $sql.='and SI.rtg_staff_id ='.$this->session->staff_id.' ';
                  }
                }
                   if( isset($_SESSION['staff_id2'])) {
                              if($this->session->staff_id2!='non'){
                              $sql.='and SI.staff_id ='.$this->session->staff_id2.' ';
                              }
                            }
            if( isset($_SESSION['genre'])) {
                  if($this->session->genre!='non'){
                  $sql.='and genre_id ='.$this->session->genre.' ';
                  }
                }
            if( isset($_SESSION['status'])) {
                  if($this->session->status!='non'){
                  $sql.='and SI.status ='.$this->session->status.' ';
                  }
                }

          if( isset($_SESSION['status_comment'])) {
                      if($this->session->status_comment!='non'){
                      $sql.='and status_comment ='.$this->session->status_comment.' ';
                      }
                    }
          if( isset($_SESSION['is_retired'])) {
              if($this->session->is_retired!='non'){
                $sql.='and is_retired ='.$this->session->is_retired.' ';
              }
          }

          if( isset($_SESSION['teamCount'])) {
            if($this->session->teamCount!='non'){
              $sql.='and ST.group_id ='.$this->session->teamCount.' ';
            }
          }

                    if( isset($_SESSION['sorting'])) {
                       if($_SESSION['sorting']=='timerDesc') {
                            $sql.='order by timer_date desc';
                       }
                       if($_SESSION['sorting']=='timerAsc') {
                            $sql.='order by timer_date asc';
                       }
                       if($_SESSION['sorting']=='contact_dateDesc') {
                            $sql.='order by contact_date desc ';
                       }
                       if($_SESSION['sorting']=='contact_dateAsc') {
                            $sql.='order by contact_date ASC ';
                       }
                     }
           else
           {
             $sql.=' order by CL.cid';
           }

          $sql.=' LIMIT '.$start.",".$limit;
          $result = $this->db->query($sql)->result();
          $this->db->close();



          return $result;


        }

        public function getTeamRecord()
            {
              $sql='SELECT CL.*,CL.created CLcreated ,SI.*, ST.name staffName, CC.contact_date contact_date, CC.contact contact FROM `customerlist` CL join sponsorinfo SI on CL.cid = SI.cid join staff ST on SI.staff_id = ST.id LEFT OUTER JOIN customercontact CC on CL.cid = CC.cid and CC.id = (SELECT id from customercontact where cid = CC.cid order by contact_date desc limit 0,1) WHERE CL.is_delete = 0 ';

              if( isset($_SESSION['keywords'])) {

                $sql.='and ( CL.name like "%'.$this->session->keywords.'%" or ';
                $sql.='CL.tel like "%'.$this->session->keywords.'%" or ';
                $sql.='CL.domain like "%'.$this->session->keywords.'%" or ';
                $sql.='CL.service_name like "%'.$this->session->keywords.'%"';
                $sql.=') ';

                  }

              if( isset($_SESSION['priority'])) {
                    if($this->session->priority!='non'){
                    $sql.='and priority ='.$this->session->priority.' ';
                    }
                  }

                if( isset($_SESSION['staff_id'])) {
                      if($this->session->staff_id!='non'){
                      $sql.='and SI.rtg_staff_id ='.$this->session->staff_id.' ';
                      }
                    }
                       if( isset($_SESSION['staff_id2'])) {
                              if($this->session->staff_id2!='non'){
                              $sql.='and SI.staff_id ='.$this->session->staff_id2.' ';
                              }
                            }
                if( isset($_SESSION['genre'])) {
                      if($this->session->genre!='non'){
                      $sql.='and genre_id ='.$this->session->genre.' ';
                      }
                    }
                if( isset($_SESSION['status'])) {
                      if($this->session->status!='non'){
                      $sql.='and SI.status ='.$this->session->status.' ';
                      }
                    }
              
                if( isset($_SESSION['is_retired'])) {
                    if($this->session->is_retired!='non'){
                      $sql.='and is_retired ='.$this->session->is_retired.' ';
                    }
                }

              if( isset($_SESSION['status_comment'])) {
                          if($this->session->status_comment!='non'){
                          $sql.='and status_comment ='.$this->session->status_comment.' ';
                          }
                        }

              if( isset($_SESSION['teamCount'])) {
                if($this->session->teamCount!='non'){
                  $sql.='and ST.group_id ='.$this->session->teamCount.' ';
                }
              }

              $result = $this->db->query($sql)->result();
              $this->db->close();
              return $result;


            }

}
