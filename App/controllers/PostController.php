<?php

namespace Wiar\Controllers;
use Wiar\Controllers\Controller;
use Wiar\Core\App;
/**
 * Class Controller
 *
 * handles all the post information
 */
class PostController extends Controller
{
    /**
     * saves the post
     */
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

    /**
     * updates the post
     */
    public function updatePost()
    {
        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {
            if ($_POST['action'] == 'update') {
                # updates the post
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
                # deletes the post
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