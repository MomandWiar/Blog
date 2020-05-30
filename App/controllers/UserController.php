<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

class UserController extends Controller
{
    public function login()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            App::get('database')->selectAllWhere(
                'users',
                [
                    'username' => $_POST['username'],
                    'password' => md5($_POST['password']),
                    'deleted' => 0
                ]
            );

            $user = App::get('database')->fetch();

            if ($user == true) {
                $_SESSION['status'] = 1;
                $_SESSION['attributes'] = $user;
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
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $check_if_user_exist = App::get('database')->selectWhere(
                'users',
                [
                    'username' => $_POST['username'],
                ],
                [
                    'username'
                ]
            );

            if (!$check_if_user_exist) {
                if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['passwordRetry'])) {
                    if ($_POST['password'] == $_POST['passwordRetry']) {
                        App::get('database')->insert(
                            'users',
                            [
                                'username' => $_POST['username'],
                                'password' => md5($_POST['password']),
                                'created' => date('Y-m-d')
                            ]
                        );
                        $this->redirect('login');
                    }
                }
            }
        }
        $this->redirect('register');
    }
}