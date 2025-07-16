<?php
class Lyric {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function save(string $artist, string $title, string $lyrics): void {
        $stmt = $this->pdo->prepare(
            "INSERT INTO lyrics (artist, title, lyrics) VALUES (:artist, :title, :lyrics)"
        );
        $stmt->execute([
            ':artist' => $artist,
            ':title' => $title,
            ':lyrics' => $lyrics
        ]);
    }

    public function getRandom(): ?array {
        $stmt = $this->pdo->query('SELECT * FROM lyrics ORDER BY RAND() LIMIT 1');
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}
?>
