<?php

namespace Wiar\Controllers;
use Wiar\Core\App;
use Wiar\Core\ErrorSuccessController;

/**
 * Class UserController
 *
 * handles all the users data
 */
class UserController extends Controller
{
    /**
     * login
     */
    public function login()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            # checks if user exist and if its not deleted
            App::get('database')->selectAllWhere(
                'users',
                [
                    'username' => $_POST['username'],
                    'password' => md5($_POST['password']),
                    'deleted' => 0
                ]
            );

            $user = App::get('database')->fetch();

            # if user does exist login
            if ($user == true) {
                $this->assign('success', 'successfully logged in!');
                $_SESSION['status'] = 1;
                $_SESSION['attributes'] = $user;
                $this->redirect('/', 'successfully logged in!', true);
            }
        }
        $this->redirect('/login', 'invalid user');
    }

    /**
     * logout
     */
    public function logout()
    {
        # destroy session and logout
        session_destroy();
        $this->redirect('/login', 'User Out!', true);
    }

    /**
     * register
     */
    public function register()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            # check if user exists
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
                        # if user does not exist then register this new user
                        App::get('database')->insert(
                            'users',
                            [
                                'username' => $_POST['username'],
                                'password' => md5($_POST['password']),
                                'created' => date('Y-m-d')
                            ]
                        );
                        $this->redirect('login', 'successfully created new account', true);
                    }
                }
            }
        }
        $this->redirect('register', 'Something went Wrong..');
    }
}