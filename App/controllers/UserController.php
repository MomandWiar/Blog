<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

class UserController extends Controller
{
    public function login()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            App::get('database')->selectWhere(
                'users',
                [
                    'username' => $_POST['username'],
                    'password' => md5($_POST['password'])
                ]
            );

            $check_if_user_exist = App::get('database')->fetch();

            if ($check_if_user_exist == true) {
                $_SESSION['status'] = 1;
                $_SESSION['attributes'] = $check_if_user_exist;
                $this->redirect('/');
            }
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
        $check = App::get('database')->selectWhere(
            'users',
            [
                'username' => $_POST['username'],
            ]
        );

        if (!$check) {
            if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['passwordRetry'])) {
                if ($_POST['password'] == $_POST['passwordRetry']) {
                    App::get('database')->insert(
                        'users',
                        [
                            'username' => $_POST['username'],
                            'password' => md5($_POST['password'])
                        ]
                    );
                    $this->redirect('login');
                }
            }
        }
        $this->redirect('register');
    }
}