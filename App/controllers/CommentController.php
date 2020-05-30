<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

/**
 * Class Controller
 *
 * contains all helpers functions
 */
class CommentController extends Controller
{
    public function getAllComments()
    {
        App::get('database')->selectAllWhere(
            'comments',
            [
                'deleted' => 0
            ]
        );

        return App::get('database')->fetchAll();
    }

    public function createComment()
    {
        if (!empty($_POST['comment'])) {
            App::get('database')->insert(
                'comments',
                [
                    'userId' => $_SESSION['attributes']['userId'],
                    'comment' => $_POST['comment'],
                    'postId' => $_POST['postId']
                ]
            );
            $this->redirect('/moreInfo?about=' . $_POST['postId']);
        }
        $this->redirect('/moreInfo?about=' . $_POST['postId']);
    }

    public function deleteComment()
    {
        App::get('database')->update(
            'comments',
            [
                'deleted' => 1
            ],
            [
                'commentId' => $_GET['where']
            ]
        );
        $this->redirect('/moreInfo?' . $_GET['params']);
    }
}