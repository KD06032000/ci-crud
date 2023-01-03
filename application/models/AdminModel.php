<?php 
    class AdminModel extends CI_Model {
        public function employeeList() {
            $hasil = $this->db->get('sinhvien');
            return $hasil->result();
            
            
        }

        public function save() {
            $data = array(
                'ma_sv'=> $this->input->post('ma_sv'),
                'hoten_sv'=>$this->input->post('hoten_sv'),
                'ngay_sinh'=>$this->input->post('ngay_sinh'),
                'gioi_tinh'=>$this->input->post('gioi_tinh'),
                'dan_toc'=>$this->input->post('dan_toc'),
                'noi_sinh'=>$this->input->post('noi_sinh'),
                'ma_lop'=>$this->input->post('ma_lop')
            );
            $result = $this->db->insert('sinhvien',$data);
            return $result;
        }

        public function update() {
            $masv = $this->input->post('ma_sv');
            $name = $this->input->post('hoten_sv');
            $date = $this->input->post('ngay_sinh');
            $sex = $this->input->post('gioi_tinh');
            $dantoc = $this->input->post('dan_toc');
            $address = $this->input->post('noi_sinh');
            $malop = $this->input->post('ma_lop');
            
            $this->db->set('hoten_sv', $name);
            $this->db->set('ngay_sinh', $date);
            $this->db->set('gioi_tinh', $sex);
            $this->db->set('dan_toc', $dantoc);
            $this->db->set('noi_sinh', $address);
            $this->db->set('ma_lop',$malop);
            $this->db->where('ma_sv',$masv);
            $result = $this->db->update('sinhvien');
            return $result;
        }

        public function delete() {
            $masv = $this->input->post('ma_sv');
            $this->db->where('ma_sv', $masv);
            $result = $this->db->delete('sinhvien');
            return $result;
        }
    }
?>