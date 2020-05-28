<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

class PagesController extends Controller
{
    public function getHome()
    {
        $posts = App::get('database')->selectAll('posts');
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
        $css = 'contact';
        $this->view('contact');
    }

    public function getLogin()
    {
        $css = 'login';
        $this->view('login', compact('css'));
    }
}