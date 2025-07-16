<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TrackQuotes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2em; }
        .lyrics { margin-bottom: 1em; }
        button { padding: 0.5em 1em; }
    </style>
</head>
<body>
    <h1>TrackQuotes</h1>
    <form action="fetch.php" method="get" style="margin-bottom:1em;">
        <input type="text" name="artist" placeholder="Artiste" required>
        <input type="text" name="title" placeholder="Titre" required>
        <button type="submit">Ajouter</button>
    </form>
    <?php if ($lyric): ?>
        <?php
            $lines = preg_split('/\r?\n/', $lyric['lyrics']);
            $display = implode("\n", array_slice($lines, 0, 2));
        ?>
        <div class="lyrics" id="lyrics">
            <pre><?php echo htmlspecialchars($display); ?></pre>
        </div>
        <button onclick="document.getElementById('details').style.display='block'; this.style.display='none';">Afficher la musique/l'artiste</button>
        <div id="details" style="display:none;">
            <p><strong><?php echo htmlspecialchars($lyric['title']); ?></strong> par <?php echo htmlspecialchars($lyric['artist']); ?></p>
            <pre><?php echo htmlspecialchars($lyric['lyrics']); ?></pre>
        </div>
    <?php else: ?>
        <p>Aucune lyric dans la base de données.</p>
    <?php endif; ?>
</body>
</html>
