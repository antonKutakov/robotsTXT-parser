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

$robots = new RobotsTxt($URL);

if ($is_sitemap) {
    $robots->save_sitemap();
}
if ($is_robots) {
    $robots->save_robots();
}

echo <<<'EOT'
    <script>
        alert("Success! Check your assets directory for seen files!");
        history.back();
    </script>
EOT;
// $robots->check_assets_dir();
// echo "URL: $URL, sitemap: $is_sitemap, robots: $is_robots";