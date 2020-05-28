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
                    'userId' => $_SESSION['attributes'][0]->id
                ]
            );
        }
        $this->redirect('/posts');
    }
}