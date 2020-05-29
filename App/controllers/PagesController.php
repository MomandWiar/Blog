<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

class PagesController extends Controller
{
    public function getHome()
    {
        $number_of_result = count(App::get('database')->selectAll('posts'));

        $result = $this->pagination($number_of_result);

        $css = 'home';
        $this->view('home', compact('result', 'css'));
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
        $number_of_result = count(App::get('database')->selectAllWhere(
            'posts',
            [
                'userId' => $_SESSION['attributes'][0]->id
            ]
        ));

        $result = $this->pagination($number_of_result);

        $css = 'home';
        $this->view('posts/posts', compact('result', 'css'));
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