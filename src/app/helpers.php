<?php

function getUrl(): string {
    $uri = trim($_SERVER['REQUEST_URI'], '/');
//    d($uri);
//    dd(explode('?', $uri));
    return explode('?', $uri)[0];
}