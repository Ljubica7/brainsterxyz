<?php
class Pages extends Controller {
    public function __construct()
    {
    
    }
    public function index()
    {       
        if (isLoggedIn()) {
            redirect('posts');
        }
        $data = [
            'title' => 'BrainsterXYZ',
            'description' => 'Simple social network'
        ];

        $this->view('pages/index', $data);
    }
 
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'About me '
        ];
        $this->view('pages/about', $data);
    }
}