<?php

namespace Wiar\Controllers;
use Wiar\Core\App;
use Wiar\Controllers\PaginationController;

/**
 * Class PagesController
 *
 * gets all necessary data
 * and shows the view
 */
class PagesController extends Controller
{
    private $pagination;

    public function __construct()
    {
        parent::__construct();
        $this->pagination = new PaginationController();
    }

    /**
     * gets all the necessary data
     * show the view of home
     */
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
    }

    /**
     * gets all the necessary data
     * show the view of moreInfo
     */
    public function getMoreInfoAbout()
    {
        # gets data for post
        App::get('database')->selectAllWhere(
            'posts',
            [
                'postId' => $_GET['about']
            ]
        );

        $postAttributes = App::get('database')->fetch();

        # gets the username from this post by userId
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

        # gets all the comment from this post by postId
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

    /**
     * show the view of about
     */
    public function getAbout()
    {
        $this->assign('css', 'aboutUs');
        $this->view('aboutUs');
    }

    /**
     * show the view of contact
     */
    public function getContact()
    {
        $this->assign('css', 'form');
        $this->view('contact');
    }

    /**
     * gets all the necessary data
     * show the view of post
     */
    public function getPosts()
    {
        # gets all the data from post by userId
        App::get('database')->selectAllWhere(
            'posts',
            [
                'userId' => $_SESSION['attributes']['userId'],
                'deleted' => 0
            ]
        );

        # counts the amount of post made by this userId
        $total_posts_per_page_by_id = count(
            App::get('database')->fetchAll(
                [
                    'userId' => $_SESSION['attributes']['userId'],
                    'deleted' => 0
                ]
            )
        );

        $this->assign('css', 'home');

        # returns the last 6 post created for this page
        $this->assign('paginate_result',
            $this->pagination->paginate($total_posts_per_page_by_id, true)
        );

        $this->view('post/posts');
    }

    /**
     * show the view of createPost
     */
    public function getCreatePost() {
        $this->assign('css', 'form');
        $this->view('post/createPost');
    }

    /**
     * gets all the necessary data
     * show the view of moreInfo
     */
    public function getEditPost() {
        # gets the post data by postId
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

    /**
     * show the view of moreInfo
     */
    public function getLogin()
    {
        $this->assign('css', 'form');
        $this->view('user/login');
    }

    /**
     * show the view of moreInfo
     */
    public function getRegister()
    {
        $this->assign('css', 'form');
        $this->view('user/register');
    }

    /**
     * show the view of moreInfo
     */
    public function getAccount()
    {
        $this->assign('css', 'account');
        $this->view('user/account/account');
    }

    /**
     * gets all the necessary data
     * show the view of moreInfo
     */
    public function getAccountProfile()
    {
        # gets all the data from user by userId
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

    /**
     * show the view of moreInfo
     */
    public function getAccountCustomize()
    {
        $this->assign('css', 'account');
        $this->view('user/account/accountCustomize');
    }
}