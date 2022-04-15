<?php
session_start();$_SESSION['ipaddress'] = $_SERVER['REMOTE_ADDR'];
$path2add = 0;
include 'include/baseTheme.php';
        if (!$csrf_token || $csrf_token !== $_SESSION['csrf_token'] || $_SERVER['REMOTE_ADDR'] != $_SESSION['ipaddress']) {
                header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
                session_unset();
                session_destroy();
        } else {
        if (isset($_SESSION['statut']) and $_SESSION['statut'] == 1) {
                $_SESSION['saved_statut'] = $_SESSION['statut'];
                $_SESSION['statut'] = 5;
        } elseif (isset($_SESSION['saved_statut'])) {
                $_SESSION['statut'] = $_SESSION['saved_statut'];
                unset($_SESSION['saved_statut']);
        }
        if (isset($_SESSION['dbname'])) {
                $_SESSION['status'][$_SESSION['dbname']] = $_SESSION['statut'];
                header("Location: {$urlServer}courses/$_SESSION[dbname]/");
        } else {
                header('Location: ' . $urlServer);
        }
}
