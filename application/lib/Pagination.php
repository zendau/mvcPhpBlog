<?php

namespace application\lib;

class Pagination  
{

    private $total;
    private $limit;
    private $amount;
    private $page;
    private $posts;
    public function __construct($total, $limit, $posts, $page) {
        $this->total = $total;
        $this->limit = $limit;
        $this->page = $page;
        $this->posts = $posts;
        $this->calcPage();
    }

    public function createPost() {

        if(($this->page * $this->limit) - 4 <= $this->total) {
            $post_max = $this->page * $this->limit;
            $res = "";
            $array = [];

            if($post_max >= $this->total) {
                $post_max = $this->total;
            }

            for ($i=($this->page * $this->limit)-$this->limit; $i < $post_max; $i++) { 
                $val = $this->posts[$i];
                array_push($array, $val);
            }
            return $array;
        }else {
            return "404";
        }
        
    }

    public function createPagination() {
        $res = [];
        $min = $this->page-1;
        if($min < 1) {
            $min = 1;
        }
        $item = "<li class='page-item'><a href='/user/news/$min' class='page-link'>Назад</a></li>";
        array_push($res, $item);
        for ($i=0+1; $i < $this->amount+1; $i++) { 
            
            if($i == $this->page) {
                $item = "<li class='page-item active'><a href='/user/news/$i' class='page-link'>$i</a></li>";
            }else {
                $item = "<li class='page-item'><a href='/user/news/$i' class='page-link'>$i</a></li>";
            }
           
            array_push($res, $item);
        }
        $max = $this->page+1;
        if($max > $this->amount) {
            $max = $this->amount;
        }
        $item = "<li class='page-item'><a href='/user/news/$max' class='page-link'>Вперед</a></li>";
        array_push($res, $item);
        return $res;

    }

    private function calcPage() {

        $this->amount = ceil($this->total / $this->limit);
    }
 
}


?>