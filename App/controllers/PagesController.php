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
        $this->view('about', compact('css'));
    }

    public function getContact()
    {
        $css = 'form';
        $this->view('contact', compact('css'));
    }

    public function getPosts()
    {
        App::get('database')->selectAllWhere(
            'posts',
            [
                'userId' => $_SESSION['attributes']['id'],
                'deleted' => 0
            ]
        );

        $total_number_of_posts_by_id = count(
            App::get('database')->fetchAll(
                [
                    'userId' => $_SESSION['attributes']['id'],
                    'deleted' => 0
                ]
            )
        );

        $paginate_result = $this->pagination->paginate($total_number_of_posts_by_id, true);

        $css = 'home';
        $this->view('post/posts', compact('paginate_result', 'css'));
    }

    public function getCreatePost() {
        $css = 'form';
        $this->view('post/createPost', compact('css'));
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
        $this->view('post/editPost', compact('css', 'post_attributes'));
    }

    public function getLogin()
    {
        $css = 'form';
        $this->view('user/login', compact('css'));
    }

    public function getRegister()
    {
        $css = 'form';
        $this->view('user/register', compact('css'));
    }

    public function getAccount()
    {
        $css = 'account';
        $this->view('user/account/account', compact('css'));
    }

    public function getAccountProfile()
    {
        App::get('database')->selectWhere(
            'users',
            [
                'username'
            ],
            [
                'id' => $_SESSION['attributes']['id']
            ]
        );

        $username = App::get('database')->fetch()['username'];

        $css = ['account', 'form'];;
        $this->view('user/account/accountProfile', compact('css', 'username'));
    }

    public function getAccountCustomize()
    {
        $css = 'account';
        $this->view('user/account/accountCustomize', compact('css'));
    }
}