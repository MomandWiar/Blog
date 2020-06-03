<?php

namespace Wiar\Controllers;
use Wiar\Controllers;
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
                    'userId' => $_SESSION['attributes']['userId']
                ]
            );
            $this->redirect('/post', 'Successfully created a new post', true);
        }
        $this->redirect('/post/create-post', 'Something went Wrong..');
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
                        'postId' => $_GET['postId'],
                        'userId' => $_SESSION['attributes']['userId']
                    ]
                );
                $this->redirect('/post', 'Post had been updated!', true);
            } else if ($_POST['action'] == 'delete') {
                App::get('database')->update(
                    'posts',
                    [
                        'deleted' => 1,
                    ],
                    [
                        'postId' => $_GET['postId'],
                        'userId' => $_SESSION['attributes']['userId']
                    ]
                );
                $this->redirect('/post', 'Post has been Deleted!');
            }
        }
        $this->redirect('/post/edit-post', 'Something went Wrong..');
    }
}