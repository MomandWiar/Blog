<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

class AccountController extends Controller
{
    public function updateProfile()
    {
        if (!empty($_POST['username'])) {
            if ($_POST['action'] == 'update') {
                if (!empty($_POST['password'])) {
                    App::get('database')->update(
                        'users',
                        [
                            'username' => $_POST['username'],
                            'password' => md5($_POST['password'])
                        ],
                        [
                            'id' => $_SESSION['attributes']['id']
                        ]
                    );
                } else {
                    App::get('database')->update(
                        'users',
                        [
                            'username' => $_POST['username'],
                        ],
                        [
                            'id' => $_SESSION['attributes']['id']
                        ]
                    );
                }
                $this->redirect('/account/profile');
            } else {
                App::get('database')->update(
                    'users',
                    [
                        'deleted' => 1
                    ],
                    [
                        'id' => $_SESSION['attributes']['id']
                    ]
                );
                $_SESSION['attributes']['deleted'] = 1;
                $this->redirect('/logout-user');
            }
        }
        $this->redirect('/account');
    }
}