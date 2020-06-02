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

    public function testCreateComment()
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
        }

        $comments = $this->testGetAllComments($_POST['postId']);

        $userName = [];

        for($index = 0; $index < count($comments); $index++) {
            array_push($userName, $this->testGetUsername($comments[$index]->userId));
            $comments[$index]->userId = $userName[$index]['username'];
        }

        echo json_encode($comments);
    }

    private function testGetAllComments($postId)
    {
        App::get('database')->selectAllWhere(
            'comments',
            [
                'deleted' => 0,
                'postId' => $postId
            ]
        );

        return App::get('database')->fetchAll();
    }

    public function testGetAllComments2()
    {
        App::get('database')->selectAllWhere(
            'comments',
            [
                'deleted' => 0,
                'postId' => $_GET['postId']
            ]
        );

        $comments = App::get('database')->fetchAll();

        $userName = [];

        for($index = 0; $index < count($comments); $index++) {
            array_push($userName, $this->testGetUsername($comments[$index]->userId));
            $comments[$index]->userId = $userName[$index]['username'];
        }

        echo json_encode($comments);

    }

    private function testGetUsername($userId)
    {
        App::get('database')->selectWhere(
            'users',
            [
                'username'
            ],
            [
                'userId' => $userId
            ]
        );

        return App::get('database')->fetch();
    }
}