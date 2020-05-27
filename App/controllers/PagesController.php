<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

class PagesController extends Controller
{
    public function getHome()
    {
        $posts = App::get('database')->selectAll('posts');
        $this->view('home', compact('posts'));
    }

    public function getAbout()
    {
        $this->view('about');
    }

    public function getContact()
    {
        $this->view('contact');
    }

    public function getLogin()
    {
        $this->view('login');
    }
}