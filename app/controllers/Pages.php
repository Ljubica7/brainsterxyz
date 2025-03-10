<?php
class Pages extends Controller {
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index(){
        if (isLoggedIn()) {
            redirect('posts');
            }

        $posts = $this->postModel->getPosts();

        $data=[
            'posts' => $posts,
            'title' => 'Brainster.xyz Labs',
            'description' => 'Проекти на студентите на академиите за програмирање и маркетинг на Brainster'
        ];

        $this->view('pages/index', $data);
    }
 
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'About me'
        ];
        $this->view('pages/about', $data);
    }
}