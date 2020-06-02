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
        App::get('database')->selectAllWhere(
            'posts',
            [
                'deleted' => 0
            ]
        );

        $total_posts_per_page = count(App::get('database')->fetchAll());

        $paginate_result = $this->pagination->paginate($total_posts_per_page);

        json_encode($paginate_result);

        $css = 'home';

        $this->view('home', compact('paginate_result', 'css'));
    }

    public function getMoreInfoAbout()
    {
        App::get('database')->selectAllWhere(
            'posts',
            [
                'postId' => $_GET['about']
            ]
        );

        $postAttributes = App::get('database')->fetch();

        App::get('database')->selectWhere(
            'users',
            [
                'username',
                'created'
            ],
            [
                'userId' => $postAttributes['userId']
            ]
        );

        $user = App::get('database')->fetch();

        $css = ['moreInfoAbout', 'form'];
        $js = 'comments';

        $this->view('moreInfo/about', compact('css', 'js', 'postAttributes', 'user'));
    }

    public function getAbout()
    {
        $css = 'aboutUs';
        $this->view('aboutUs', compact('css'));
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
                'userId' => $_SESSION['attributes']['userId'],
                'deleted' => 0
            ]
        );

        $total_posts_per_page_by_id = count(
            App::get('database')->fetchAll(
                [
                    'userId' => $_SESSION['attributes']['userId'],
                    'deleted' => 0
                ]
            )
        );

        $paginate_result = $this->pagination->paginate($total_posts_per_page_by_id, true);
        $css = 'home';

        $this->view('post/posts', compact('paginate_result', 'css'));
    }

    public function getCreatePost() {
        $css = 'form';
        $this->view('post/createPost', compact('css'));
    }

    public function getEditPost() {
        App::get('database')->selectAllWhere(
            'posts',
            [
                'postId' => $_GET['postId']
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
                'userId' => $_SESSION['attributes']['userId']
            ]
        );

        $username = App::get('database')->fetch()['username'];
        $css = ['account', 'form'];

        $this->view('user/account/accountProfile', compact('css', 'username'));
    }

    public function getAccountCustomize()
    {
        $css = 'account';
        $this->view('user/account/accountCustomize', compact('css'));
    }
}