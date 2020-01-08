<?php
    class Agency_model extends CI_Model{
        function insert_data($data){
            $this->db->insert("agencyinfo",$data);
        }

         
        function fetch_data(){
            $query=$this->db->get("agencyinfo");  
            return $query;
        }

        function fetch_single_data($id){
            $this->db->where("id",$id);
            $query=$this->db->get("agencyinfo");
            return $query;
        }

        function update_data($data,$id){
            $this->db->where("id",$id);
            $this->db->update("agencyinfo",$data);
        }

        function fetch_ten_records($per_page_records,$offset){

            //从agencyinfo表中取出10条数据，从$offset开始，不包含$offset
            $this->db->where("is_deleted",0);
            $query=$this->db->get("agencyinfo",$per_page_records,$offset);
            return $query->result();
            //return $query

            //注意单纯返回$query 和返回 $query->result(); 是不同的。
            //$query->result();提供的是一个数组。可以直接取出里面的数据
            //$query 提供的是一个数据库对象。不可以直接取出里面的数据
            //如果单纯的只是返回$query。那么后期想要取出$query 里面的数据时，
            //就要再view 或者  controller 里面呼叫result()方法。 比较麻烦。
        }
    }
?>