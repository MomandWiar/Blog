<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

class PagesController extends Controller
{
    public function getHome()
    {
        $posts = array_reverse(App::get('database')->selectAll('posts'));
        $css = 'home';
        $this->view('home', compact('posts', 'css'));
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