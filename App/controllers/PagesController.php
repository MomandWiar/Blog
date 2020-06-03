<?php

namespace Wiar\Controllers;
use Wiar\Core\App;
use Wiar\Controllers\PaginationController;
use Wiar\Controllers\ErrorSuccessController;

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

        $this->assign('css', 'home');
        $this->assign('paginate_result',
            $this->pagination->paginate($total_posts_per_page)
        );

        $this->view('home');
        unset($_GET);
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

        App::get('database')->createQuery(
            "SELECT comments.*, users.username
            FROM comments
            LEFT JOIN users
            ON users.userid = comments.userId
            WHERE comments.deleted = 0 
            AND comments.postId = {$postAttributes['postId']} 
            ORDER BY comments.created DESC"
        );

        $this->assign('css', ['moreInfoAbout', 'form']);
        $this->assign('user', $user);
        $this->assign('postAttributes', $postAttributes);
        $this->assign('comments', App::get('database')->fetchAll());

        $this->view('moreInfo/about');
    }

    public function getAbout()
    {
        $this->assign('css', 'aboutUs');
        $this->view('aboutUs');
    }

    public function getContact()
    {
        $this->assign('css', 'form');
        $this->view('contact');
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

        $this->assign('css', 'home');
        $this->assign('paginate_result',
            $this->pagination->paginate($total_posts_per_page_by_id, true)
        );

        $this->view('post/posts');
    }

    public function getCreatePost() {
        $this->assign('css', 'form');
        $this->view('post/createPost');
    }

    public function getEditPost() {
        App::get('database')->selectAllWhere(
            'posts',
            [
                'postId' => $_GET['postId']
            ]
        );

        $this->assign('css', 'form');
        $this->assign('post_attributes', App::get('database')->fetch());

        $this->view('post/editPost');
    }

    public function getLogin()
    {
        $this->assign('css', 'form');
        $this->view('user/login');
    }

    public function getRegister()
    {
        $this->assign('css', 'form');
        $this->view('user/register');
    }

    public function getAccount()
    {
        $this->assign('css', 'account');
        $this->view('user/account/account');
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


        $this->assign('css', ['account', 'form']);
        $this->assign('username',
            App::get('database')->fetch()['username']
        );

        $this->view('user/account/accountProfile');
    }

    public function getAccountCustomize()
    {
        $this->assign('css', 'account');
        $this->view('user/account/accountCustomize');
    }
}