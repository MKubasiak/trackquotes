<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/controllers/LyricsController.php';

$controller = new LyricsController($pdo);
$controller->index();
