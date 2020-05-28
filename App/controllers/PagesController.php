<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

class PagesController extends Controller
{
    public function getHome()
    {
        if (empty($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $number_of_result = count(App::get('database')->selectAll('posts'));

        $result_per_page = 6;

        $number_of_pages = ceil($number_of_result/$result_per_page);

        $starting_page_number = ($page-1)*$result_per_page;

        $posts = array_reverse(App::get('database')->createQuery(
            "SELECT * FROM posts LIMIT " . $starting_page_number . ', ' . $result_per_page
        ));

        $css = 'home';
        $this->view('home', compact('page', 'number_of_pages', 'posts', 'css'));
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
        if (empty($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $number_of_result = count(App::get('database')->selectAllWhere(
            'posts',
            [
                'userId' => $_SESSION['attributes'][0]->id
            ]
        ));

        $result_per_page = 6;

        $number_of_pages = ceil($number_of_result/$result_per_page);

        $starting_page_number = ($page-1)*$result_per_page;

        $posts = array_reverse(App::get('database')->createQuery(
            "SELECT * FROM posts 
            WHERE userId = '{$_SESSION['attributes'][0]->id}' 
            LIMIT {$starting_page_number}, {$result_per_page}"
        ));

        $css = 'home';
        $this->view('posts/posts', compact('page', 'number_of_pages', 'posts', 'css'));
    }

    public function getCreatePost() {
        $css = 'form';
        $this->view('posts/createPost', compact('css'));
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