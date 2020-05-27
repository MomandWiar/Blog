<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

class PagesController extends Controller
{
    public function getHome()
    {
        $names = App::get('database')->selectAll('users');
        $this->view('home', compact('names'));
    }

    public function getAbout()
    {
        $this->view('about');
    }

    public function getContact()
    {
        $this->view('contact');
    }
}