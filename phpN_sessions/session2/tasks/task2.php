<?php
declare(strict_types = 1);

function charsAftrSlash(string $url){
    $lastTocken = strtok(strrev($url) ,"/");

    echo strrev($lastTocken);
}

charsAftrSlash('http://www.example.com/5478631');
?>