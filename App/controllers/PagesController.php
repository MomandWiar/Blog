<?php

namespace Wiar\Controllers;
use Wiar\Controller\PaginationController;
use Wiar\Core\App;

class PagesController extends Controller
{
    private $pagination;

    public function __construct()
    {
        parent::__construct();
        $this->pagination = new PaginationController();
    }

    public function getHome()
    {
        App::get('database')->selectAll('posts');

        $total_number_of_posts = count(App::get('database')->fetchAll());

        $paginate_result = $this->pagination->paginate($total_number_of_posts);

        $css = 'home';
        $this->view('home', compact('paginate_result', 'css'));
    }

    public function getAbout()
    {
        $css = 'about';
        $this->view('about');
    }

    public function getContact()
    {
        $css = 'form';
        $this->view('contact', compact('css'));
    }

    public function getPosts()
    {
        App::get('database')->selectWhere(
            'posts',
            [
                'userId' => $_SESSION['attributes']['id']
            ]
        );

        $total_number_of_posts_by_id = count(
            App::get('database')->fetchAll(
                [
                    'userId' => $_SESSION['attributes']['id']
                ]
            )
        );

        $paginate_result = $this->pagination->paginate($total_number_of_posts_by_id, true);

        $css = 'home';
        $this->view('posts/posts', compact('paginate_result', 'css'));
    }

    public function getCreatePost() {
        $css = 'form';
        $this->view('posts/createPost', compact('css'));
    }

    public function getEditPost() {
        App::get('database')->selectWhere(
            'posts',
            [
                'id' => $_GET['postId']
            ]
        );

        $post_attributes = App::get('database')->fetch();

        $css = 'form';
        $this->view('posts/editPost', compact('css', 'post_attributes'));
    }

    public function getLogin()
    {
        $css = 'form';
        $this->view('login', compact('css'));
    }

    public function getRegister() {
        $css = 'form';
        $this->view('register', compact('css'));
    }
}