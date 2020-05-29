<?php

namespace Wiar\Controllers;

use Wiar\Core\App;
/**
 * Class Controller
 *
 * contains all helpers functions
 */
class PostController extends Controller
{
    public function savePost()
    {
        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {
            App::get('database')->insert(
                'posts',
                [
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'content' => $_POST['content'],
                    'userId' => $_SESSION['attributes']['id']
                ]
            );
            $this->redirect('/post');
        }
        $this->redirect('/post/create-post');
    }

    public function updatePost()
    {
        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {
            if ($_POST['action'] == 'update') {
                App::get('database')->update(
                    'posts',
                    [
                        'title' => $_POST['title'],
                        'description' => $_POST['description'],
                        'content' => $_POST['content'],
                        'date' => $_POST['date']
                    ],
                    [
                        'id' => $_GET['postId'],
                        'userId' => $_SESSION['attributes']['id']
                    ]
                );
                $this->redirect('/post');
            } else if ($_POST['action'] == 'delete') {
                App::get('database')->update(
                    'posts',
                    [
                        'deleted' => 1,
                    ],
                    [
                        'id' => $_GET['postId'],
                        'userId' => $_SESSION['attributes']['id']
                    ]
                );
                $this->redirect('/post');
            }
            $this->redirect('/post/edit-post');
        }
    }
}