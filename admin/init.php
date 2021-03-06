<?php

function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }
    return $results;
}

spl_autoload_register(function($class) {
    $files = [];
    getDirContents('../admin', $files);
    foreach ($files as $value) {
        if (strpos($value, $class . '.php') !== false) {
            require $value;
        }
    }
});

function render($page) {
    header("Location: render.php?view=" . $page);
}

