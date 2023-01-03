<?php 
    class AdminModel extends CI_Model {
    
        var $table = "sinhvien";  
        var $select_column = array("ma_sv", "hoten_sv", "ngay_sinh", "gioi_tinh","dan_toc","noi_sinh","ma_lop");  
        var $order_column = array("ma_sv", "hoten_sv", "ngay_sinh", "gioi_tinh", "dan_toc","noi_sinh","ma_lop"); 

        function make_query()  
        {  
            $this->db->select($this->select_column);  
            $this->db->from($this->table);  
            if(isset($_POST["search"]["value"]))  
            {  
                    $this->db->like("ma_sv", $_POST["search"]["value"]);  
                    $this->db->or_like("hoten_sv", $_POST["search"]["value"]);  
            }  
            if(isset($_POST["order"]))  
            {  
                    $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
            }  
            else  
            {  
                    $this->db->order_by('ma_sv', 'DESC');  
            }  
        }  

        function make_datatables() {  
            $this->make_query();  
            if($_POST["length"] != -1)  
            {  
                    $this->db->limit($_POST['length'], $_POST['start']);  
            }  
            $query = $this->db->get();  
            return $query->result();  
        } 

        function get_filtered_data() {  
            $this->make_query();  
            $query = $this->db->get();  
            return $query->num_rows();  
        } 

        function get_all_data()  
        {  
            $this->db->select("*");  
            $this->db->from($this->table);  
            return $this->db->count_all_results();  
        } 

        function insert_crud($data)  
        {  
            $this->db->insert('sinhvien', $data);  
        } 

        function fetch_single_user($user_id)  
        {  
            $this->db->where("ma_sv", $user_id);  
            $query=$this->db->get('sinhvien');  
            return $query->result();  
        } 
         
        function update_crud($user_id, $data)  
        {  
            $this->db->where("ma_sv", $user_id);  
            $this->db->update("sinhvien", $data);  
        }  

        function delete_single_user($user_id)  
        {  
             $this->db->where("ma_sv", $user_id);  
             $this->db->delete("sinhvien");  
             
        }  
    }
?>