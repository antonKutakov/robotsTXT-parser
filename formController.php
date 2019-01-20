<?php

require "./robots.php";

$var = function ($key) {
    if (isset($_POST[$key])) {
        $tempvar = htmlspecialchars($_POST[$key]);
        if (empty($tempvar)) {
            unset($tempvar);
        } else {
            return $tempvar;
        }
    }
};

$URL = $var('url');
$is_sitemap = $var('sitemap');
$is_robots = $var('robots');

// echo "URL: $URL, sitemap: $is_sitemap, robots: $is_robots";