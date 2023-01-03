<?php 
    class AdminController extends CI_Controller {
        function index() {
            $this->load->view('admin/index.php');
        }
        function fetch_user() {

            $this->load->model("AdminModel");  
            $fetch_data = $this->AdminModel->make_datatables();  
            $data = array();  
            foreach($fetch_data as $row)  
            {  
                 $sub_array = array();  
                 $sub_array[] = $row->ma_sv;  
                 $sub_array[] = $row->hoten_sv;
                 $sub_array[] = $row->ngay_sinh; 
                 $sub_array[] = $row->gioi_tinh; 
                 $sub_array[] = $row->dan_toc; 
                 $sub_array[] = $row->noi_sinh; 
                 $sub_array[] = $row->ma_lop;   
                 $sub_array[] = '<button type="button" name="update" id="'.$row->ma_sv.'" class="btn btn-warning btn-xs update">Update</button>';  
                 $sub_array[] = '<button type="button" name="delete" id="'.$row->ma_sv.'" class="btn btn-danger btn-xs delete">Delete</button>';  
                 $data[] = $sub_array;  
            }  
            $output = array(  
                 "draw"                    =>     intval($_POST["draw"]),  
                 "recordsTotal"            =>      $this->AdminModel->get_all_data(),  
                 "recordsFiltered"         =>     $this->AdminModel->get_filtered_data(),  
                 "data"                    =>     $data  
            );  
            echo json_encode($output);  
        }

        function user_action(){  
            if($_POST["action"] == "Add")  
            {  
                 $insert_data = array(  
                      'ma_sv'          =>     $this->input->post('ma_sv'),  
                      'hoten_sv'       =>     $this->input->post("hoten_sv"),  
                      'ngay_sinh'      =>     $this->input->post("ngay_sinh"),
                      'gioi_tinh'          =>     $this->input->post('gioi_tinh'),  
                      'dan_toc'          =>     $this->input->post('dan_toc'),  
                      'noi_sinh'          =>     $this->input->post('noi_sinh'),  
                      'ma_lop'          =>     $this->input->post('ma_lop'),    

                 );  
                 $this->load->model('AdminModel');  
                 $this->AdminModel->insert_crud($insert_data);  
                 echo 'Data Inserted';  
            }
            if($_POST["action"] == "Edit")  
            {  
                 $updated_data = array(  
                    'ma_sv'          =>     $this->input->post('ma_sv'),  
                    'hoten_sv'       =>     $this->input->post("hoten_sv"),  
                    'ngay_sinh'      =>     $this->input->post("ngay_sinh"),
                    'gioi_tinh'          =>     $this->input->post('gioi_tinh'),  
                    'dan_toc'          =>     $this->input->post('dan_toc'),  
                    'noi_sinh'          =>     $this->input->post('noi_sinh'),  
                    'ma_lop'          =>     $this->input->post('ma_lop'), 
                 );  
                 $this->load->model('AdminModel');  
                 $this->AdminModel->update_crud($this->input->post("ma_sv"), $updated_data);  
                 echo 'Data Updated';  
            }    
        }  

        function fetch_single_user()  
        {  
             $output = array();  
             $this->load->model("AdminModel");  
             $data = $this->AdminModel->fetch_single_user($_POST["ma_sv"]);  
             foreach($data as $row)  
             {  
                  $output['ma_sv'] = $row->ma_sv;  
                  $output['hoten_sv'] = $row->hoten_sv;
                  $output['ngay_sinh'] = $row->ngay_sinh; 
                  $output['gioi_tinh'] = $row->gioi_tinh; 
                  $output['dan_toc'] = $row->dan_toc; 
                  $output['noi_sinh'] = $row->noi_sinh; 
                  $output['ma_lop'] = $row->ma_lop;
             }  
             echo json_encode($output);  
        } 

        function delete_single_user()  
        {  
            $this->load->model("AdminModel");  
            $this->AdminModel->delete_single_user($_POST["ma_sv"]);  
            echo 'Data Deleted';  
        }  
    }
?>