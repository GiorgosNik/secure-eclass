<?php

function csrf_token() {
    return md5(uniqid(mt_rand(), true));
}

function create_csrf_token() {
    if (isset($_SESSION['csrf_token'])) {
        return $_SESSION['csrf_token'];
    }
    $token = csrf_token();
    $_SESSION['csrf_token'] = $token;
    return $token;
}

function csrf_token_tag() {
    $token = create_csrf_token();
}


?>