<?php

namespace Wiar\Controllers;
use Wiar\Core\App;
use Wiar\Core\ErrorSuccessController;

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
                $this->assign('success', 'successfully logged in!');
                $_SESSION['status'] = 1;
                $_SESSION['attributes'] = $user;
                $this->redirect('/', 'successfully logged in!', true);
            }
        }
        $this->redirect('/login', 'invalid user');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/login', 'User Out!', true);
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