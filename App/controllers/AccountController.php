<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

/**
 * Class AccountController
 *
 * handles all the Account information
 */
class AccountController extends Controller
{
    /**
     * updates profile by post data
     */
    public function updateProfile()
    {
        if (!empty($_POST['username'])) {
            if ($_POST['action'] == 'update') {
                if (!empty($_POST['password'])) {
                    # updates username and password
                    App::get('database')->update(
                        'users',
                        [
                            'username' => $_POST['username'],
                            'password' => md5($_POST['password'])
                        ],
                        [
                            'userId' => $_SESSION['attributes']['userId']
                        ]
                    );
                } else {
                    # updates username
                    App::get('database')->update(
                        'users',
                        [
                            'username' => $_POST['username'],
                        ],
                        [
                            'userId' => $_SESSION['attributes']['userId']
                        ]
                    );
                }
                $this->redirect('/account/profile', 'Account has been Updated!', true);
            } else {
                # soft deletes user
                App::get('database')->update(
                    'users',
                    [
                        'deleted' => 1
                    ],
                    [
                        'userId' => $_SESSION['attributes']['userId']
                    ]
                );
                $_SESSION['attributes']['deleted'] = 1;
                $this->redirect('/logout-user');
            }
        }
        $this->redirect('/account', 'Something went Wrong');
    }
}