<?php
    class Posts extends Controller {
        public function __construct()
        {
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }

            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }

        public function index(){
            //Get posts
            $posts = $this->postModel->getPosts();

            $data=[
                'posts' => $posts,
                'title' => 'Brainster.xyz Labs',
                'description' => 'Simple social network'
            ];

            $this->view('posts/index', $data);
        }

        public function add(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               //Sanitize POST array
               $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

               $data=[
                'image' => trim($_POST['image']),
                'title' => trim($_POST['title']),
                'subtitle' => trim($_POST['subtitle']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'image_err' => '',
                'title_err' => '',
                'subtitle_err' => '',
                'body_err' => ''
            ];

                //Validate data
                if (empty($data['image'])) {
                    $data['image_err'] = 'Please enter image';
                }
                if (empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }
                if (empty($data['subtitle'])) {
                    $data['subtitle_err'] = 'Please enter subtitle';
                }
                if (empty($data['body'])) {
                    $data['body_err'] = 'Please enter body';
                }

                if (strlen($data['body']) > 200) {
                    $data['body_err'] = 'Exceeded character limit. 200 characters max.';
                }

                //Make sure there is no errors
                if (empty($data['image_err']) && empty($data['title_err']) && empty($data['subtitle_err']) && empty($data['body_err'])) {
                    //validated
                    if ($this->postModel->addPost($data)) {
                        flash('post_message', 'Post Added');
                        redirect('');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('posts/add', $data);
                }
            }
            else {
                $data=[
                    'image' => '',
                    'title' => '',
                    'subtitle' => '',
                    'body' => ''
                ];
    
                $this->view('posts/add', $data);
            }
        }

        public function edit($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               //Sanitize POST array
               $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

               $data=[
                'id' => $id,
                'image' => trim($_POST['image']),
                'title' => trim($_POST['title']),
                'subtitle' => trim($_POST['subtitle']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

                //Validate data
                if (empty($data['image'])) {
                    $data['image_err'] = 'Please enter image';
                }
                if (empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }
                if (empty($data['subtitle'])) {
                    $data['subtitle_err'] = 'Please enter subtitle';
                }
                if (empty($data['body'])) {
                    $data['body_err'] = 'Please enter body';
                }

                //Make sure there is no errors
                if (empty($data['image_err']) && empty($data['title_err']) && empty($data['subtitle_err']) && empty($data['body_err'])) {
                    //validated
                    if ($this->postModel->updatePost($data)) {
                        flash('post_message', 'Post Updated');
                        redirect('');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('posts/edit', $data);
                }
            }
            else {
                // get existing post from model
                $post = $this->postModel->getPostById($id);

                //check for owner
                if ($post->user_id != $_SESSION['user_id']) {
                    redirect('');
                }

                $data=[
                    'id' => $id,
                    'image' => $post->image,
                    'title' => $post->title,
                    'subtitle' => $post->subtitle,
                    'body' => $post->body
                ];

                $this->view('posts/edit', $data);
            }
        }

        public function show($id){
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user
            ];

            $this->view('posts/show', $data);
        }

        public function delete($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                 // get existing post from model
                 $post = $this->postModel->getPostById($id);

                 //check for owner
                 if ($post->user_id != $_SESSION['user_id']) {
                     redirect('');
                 }
                 
                if ($this->postModel->deletePost($id)) {
                    flash('post_message', 'Post Removed');
                    redirect('');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                redirect('');
            }
        }
    }