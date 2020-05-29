<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

/**
 * Class Controller
 *
 * contains all helpers functions
 */
class Controller
{
    public function __construct()
    {
        session_start();
    }

    /**
     * views the view.php by name
     *
     * @param String $name
     * @return void
     */
    public function view($name, $data = [])
    {
        extract($data);
        return require "App/views/{$name}.view.php";
    }

    /**
     * redirects the traffic
     *
     * @param String $path
     */
    public function redirect($path)
    {
        header("Location: {$path}");
        exit();
    }

    protected function pagination($number_of_result) {
        $posts_per_page = 6;

        $number_of_pages = ceil($number_of_result / $posts_per_page);

        if (empty($_GET['page'])) {
            $page_number = 1;
        } else {
            $page_number = $this->getPageNumber($_GET['page'], $number_of_pages);
        }

        $starting_page_number = ($page_number-1) * 6;

        $posts = $this->getPostPerPage($starting_page_number);

        return ['posts' => $posts, 'page_number' => $page_number, 'number_of_pages' => $number_of_pages];
    }

    private function getPostPerPage($starting_page_number, $where = '') {

        return array_reverse(App::get('database')->createQuery(
            "SELECT * FROM posts 
            {$where}
            ORDER BY date 
            LIMIT {$starting_page_number}, 6"
        ));
    }

    private function getPageNumber($getPage, $number_of_pages) {
        $pageNumber = $getPage;
        if ($getPage > $number_of_pages) {
            $pageNumber = $number_of_pages;
        }
        return $pageNumber;
    }
}