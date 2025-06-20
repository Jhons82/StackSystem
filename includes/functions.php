<?php
function getSessionUserId() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['id']) || !is_numeric($_SESSION['id']) || $_SESSION['id'] <= 0) {
        return false;
    }

    return intval($_SESSION['id']);
}