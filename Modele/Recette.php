<?php

class Recette {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRecettes() {
        $query = $this->db->query("SELECT `titre`,`image`,`note` FROM `Recette` ORDER BY RAND() LIMIT 3");
        $recette = $query->fetchAll();
        return $recette;
    }

    public function rating_stars($rating) {
        $rating = floatval($rating);
        if ($rating < 0) $rating = 0;
        if ($rating > 5) $rating = 5;
        
        $star_html = '<span class="fa fa-star"></span>';
        $star_half_html = '<span class="fa fa-star-half-alt"></span>';
        $star_empty_html = '<span class="fa fa-star-o"></span>';
        
        $full_stars = floor($rating);
        $half_stars = ceil($rating - $full_stars);
        $empty_stars = 5 - ($full_stars + $half_stars);
        
        $output = str_repeat($star_html, $full_stars);
        $output .= str_repeat($star_half_html, $half_stars);
        $output .= str_repeat($star_empty_html, $empty_stars);
        
        return $output;
    }
}
