<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

/**
 * Class PaginationController
 *
 * handles the amount of post shown by page
 */
class PaginationController
{
    /**
     * gets the most recent amount of post per page
     *
     * @param int $number_of_result
     * @param bool $where
     * @return array post per page
     */
    public function paginate($number_of_result, $where = false)
    {
        # post per page
        $posts_per_page = 6;

        # calculates the total amount of pages it needs
        $number_of_pages = ceil($number_of_result / $posts_per_page);

        # checks what page it is
        if (empty($_GET['page'])) {
            $page_number = 1;
        } else {
            $page_number = $this->getPageNumber($_GET['page'], $number_of_pages);
        }

        # gets the starting page number per page
        $starting_page_number = ($page_number - 1) * $posts_per_page;

        # checks whether is should get all the post or post by id
        if ($where) {
            $posts = $this->getAmountOfPostsById($starting_page_number, $posts_per_page);
        } else {
            $posts = $this->getAmountOfPosts($starting_page_number, $posts_per_page);
        }

        return ['post' => $posts, 'page_number' => $page_number, 'number_of_pages' => $number_of_pages];
    }

    /**
     * gets all the post
     *
     * @param $starting_page_number
     * @param $posts_per_page
     * @return mixed
     */
    private function getAmountOfPosts($starting_page_number, $posts_per_page)
    {
        App::get('database')->createQuery(
            "SELECT *
            FROM posts
            WHERE deleted = '0'
            ORDER BY date DESC
            LIMIT {$starting_page_number}, {$posts_per_page}"
        );
        return App::get('database')->fetchAll();
    }

    /**
     * only gets the post by id
     *
     * @param int $starting_page_number
     * @param int $posts_per_page
     * @return array
     */
    private function getAmountOfPostsById($starting_page_number, $posts_per_page)
    {
        App::get('database')->createQuery(
            "SELECT *
            FROM posts
            WHERE deleted = '0' AND userId = '{$_SESSION['attributes']['userId']}'
            ORDER BY date DESC
            LIMIT {$starting_page_number}, {$posts_per_page}"
        );
        return App::get('database')->fetchAll();
    }

    /**
     * figure outs what page it is
     *
     * @param int $getPage
     * @param int $number_of_pages
     * @return int page number
     */
    private function getPageNumber($getPage, $number_of_pages)
    {
        $pageNumber = $getPage;
        if ($getPage > $number_of_pages) {
            $pageNumber = $number_of_pages;
        }
        return $pageNumber;
    }
}