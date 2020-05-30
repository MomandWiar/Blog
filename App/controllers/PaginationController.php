<?php

namespace Wiar\Controller;
use Wiar\Core\App;

class PaginationController
{
    public function paginate($number_of_result, $where = false)
    {
        $posts_per_page = 6;

        $number_of_pages = ceil($number_of_result / $posts_per_page);

        if (empty($_GET['page'])) {
            $page_number = 1;
        } else {
            $page_number = $this->getPageNumber($_GET['page'], $number_of_pages);
        }

        $starting_page_number = ($page_number - 1) * $posts_per_page;

        if ($where) {
            $posts = $this->getAmountOfPostsById($starting_page_number, $posts_per_page);
        } else {
            $posts = $this->getAmountOfPosts($starting_page_number, $posts_per_page);
        }

        return ['post' => $posts, 'page_number' => $page_number, 'number_of_pages' => $number_of_pages];
    }

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

    private function getPageNumber($getPage, $number_of_pages)
    {
        $pageNumber = $getPage;
        if ($getPage > $number_of_pages) {
            $pageNumber = $number_of_pages;
        }
        return $pageNumber;
    }
}