<?php
class Report_model extends CI_Model {

   public function initRookie(){
     $result = $this->db->query("SELECT st.name,count(*) as count FROM sponsorinfo ss,staff st where ss.staff_id=st.id and st.is_rookie=1 group by ss.staff_id order by count(*) desc")->result();
     $this->db->close();

     return $result;
   }

   public function initTeam(){
     $result = $this->db->query("SELECT count(*) as count,sg.name as name FROM sponsorinfo ss,staff st,staffgroup sg where st.group_id = sg.id and ss.staff_id=st.id group by sg.id order by count(*) desc")->result();
     $this->db->close();

     return $result;
   }
   public function allStaff(){

     $query="select id,name from staff where is_delete=0";
     if(isset($_POST['teamCount'])){
       if($_POST['teamCount']!="non"){
         $query.=" and group_id=".$_POST['teamCount'];
       }
     }

     if(isset($_POST['rookie'])){
       if($_POST['rookie']==1){
         $query.=" and is_rookie=".$_POST['rookie'];
       }
     }

     $result = $this->db->query($query)->result();
     $this->db->close();

     return $result;
   }
   public function allTracking($start,$end){
     if($start==0||$end==0){
        $result = $this->db->query("SELECT * FROM statustracking")->result();
     }
    else{
       $result = $this->db->query("SELECT * FROM statustracking WHERE DATE(created) BETWEEN '".$start ."' AND '".$end."'" )->result();
    }
     $this->db->close();

     return $result;
   }
   public function personal($id){


     $result = $this->db->query("SELECT concat(DATE_FORMAT(str.created,'%y/%m/'),floor((date_format(str.created,'%d')+(date_format(date_format(str.created,'%Y%m%01'),'%w')-1))/7)+1 ) week ,st.name name FROM `statustracking`
      str , status st where str.status=st.id and str.staff=".$id." ORDER BY `week` ASC")->result();
     $this->db->close();

     return $result;
   }

   public function number_detail($staff_id,$status){
    $result=$this->db->query("SELECT name As company_name,service_name FROM customerlist c JOIN statustracking s ON c.cid=s.sid WHERE status=".$status." AND staff=".$staff_id)->result();
    $this->db->close();
    return $result;
   }

   public function fetch_ten_records($staff_id,$status,$per_page_records,$offset){
     //offset limit is slow
     $result=$this->db->query("SELECT 
                                  name As company_name,
                                  c.created,
                                  service_name FROM customerlist c 
                              JOIN statustracking s 
                              ON c.cid=s.sid 
                              WHERE status=".$status." AND staff=".$staff_id." limit ".$per_page_records." offset ".$offset
                            )->result();
      $this->db->close();
      return $result;
    
    }


}

?>
