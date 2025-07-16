<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/controllers/LyricsController.php';

$artist = $_GET['artist'] ?? ($_POST['artist'] ?? null);
$title = $_GET['title'] ?? ($_POST['title'] ?? null);

if (!$artist || !$title) {
    die("Usage: fetch.php?artist=Artist+Name&title=Song+Title");
}

$controller = new LyricsController($pdo);
$controller->fetch($artist, $title);
