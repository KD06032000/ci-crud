<?php 
    class AdminController extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('AdminModel');
        }

        public function index() {
            return $this->load->view('admin/index');
        }

        public function show() {
            $data = $this->AdminModel->employeeList();
            echo json_encode($data);
        }

        public function save() {
            $data =  $this->AdminModel->save();
            echo json_encode($data);
        }

        public function update() {
            $data = $this->AdminModel->update();
            echo json_encode($data);
        }

        public function delete() {
            $data = $this->AdminModel->delete();
            echo json_encode($data);
        }
    }

?>