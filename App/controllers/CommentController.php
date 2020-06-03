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
    /**
     * creates a new comment by post data
     */
    public function createComment()
    {
        if (!empty($_POST['comment'])) {
            # creates a new comment
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
        # deletes a comment
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