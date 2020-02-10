<?php
    class Users extends Controller{
        public function __construct()
        {
            $this->userModel = $this->model('User');
        }

        public function login() {
            //check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //process the form

                //sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                //init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                 //Validate Email
                 if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }

                 //Validate Password
                 if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }     

                //Check for user/email
                if($this->userModel->findUserByEmail($data['email'])){
                    //User found
                }
                else {
                    //User not found
                    $data['email_err'] = 'No user found';
                }

                //make sure errors are empy
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    //validated
                    //Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if ($loggedInUser) {
                        //Create session
                        $this->createUserSession($loggedInUser);
                    }
                    else {
                        $data['password_err'] = 'Password incorrect';

                        $this->view('users/login', $data);
                    }
                }
                else {
                    //load view with errors
                    $this->view('users/login', $data);
                }
            }
            else {
                //Init data
                $data = [                    
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''                    
                ];
                
                //load view
                $this->view('users/login', $data);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            redirect('posts');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }        
    }