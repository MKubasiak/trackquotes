<?php
require_once __DIR__ . '/../models/Lyric.php';

class LyricsController {
    private $model;

    public function __construct(PDO $pdo) {
        $this->model = new Lyric($pdo);
    }

    public function index(): void {
        $lyric = $this->model->getRandom();
        include __DIR__ . '/../views/lyrics/index.php';
    }

    public function fetch(string $artist, string $title): void {
        $apiUrl = 'https://api.lyrics.ovh/v1/' . urlencode($artist) . '/' . urlencode($title);
        $response = @file_get_contents($apiUrl);
        if ($response === false) {
            die('Failed to fetch lyrics from API');
        }
        $data = json_decode($response, true);
        if (!isset($data['lyrics'])) {
            die('Lyrics not found');
        }
        $this->model->save($artist, $title, $data['lyrics']);
        echo 'Lyrics saved.';
    }
}
?>
