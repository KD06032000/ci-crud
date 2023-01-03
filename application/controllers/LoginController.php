<?php 
    class LoginController extends CI_Controller {
        public function __construct() {
            parent::__construct();
        }

        public function index() {
            return $this->load->view('login/index');
        }

        public function login() {
            $this->form_validation->set_rules('email', 'Email', 'required',['required'=>'You must provide a %s.']);
            $this->form_validation->set_rules('password', 'Password', 'required',['required'=>'You must provide a %s.']);
            if ($this->form_validation->run())
            {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $this->load->model('LoginModel');
                $result = $this->LoginModel->checkLogin( $email,$password);
                if($result) {
                    $session_array = [
                        'username'=> $result[0]->username,
                        'password'=> $result[0]->password
                    ];
                    $this->session->set_userdata('Login',$session_array);
                    $this->session->set_flashdata('success', 'Login Successfully');
                    redirect(base_url('index.php/admin'));
                } else{
                    $this->session->set_flashdata('error', 'Wrong Email or Password please login again');
                    redirect(base_url('index.php/login'));
                }
            }
            else
            {
                $this->index();
            }
        }
    }

?>