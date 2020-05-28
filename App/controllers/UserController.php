<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

class UserController extends Controller
{
    public function login()
    {
        $check = App::get('database')->selectWhere(
            'users',
            [
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ]
        );

        if ($check == true) {
            $_SESSION['status'] = 1;
            $_SESSION['attributes'] = $check;
            $this->redirect('/');
        }
        $this->redirect('/login');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/login');
    }

    public function register()
    {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetry'])) {
            if ($_POST['password'] == $_POST['passwordRetry']) {
                App::get('database')->insert(
                    'users',
                    [
                        'username' => $_POST['username'],
                        'password' => $_POST['password']
                    ]
                );
                $this->redirect('login');
            }
        }
        $this->redirect('register');
    }
}