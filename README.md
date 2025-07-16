# TrackQuotes

A minimal PHP/MySQL application that stores song lyrics from the free [lyrics.ovh](https://lyrics.ovh) API and displays a couple of lines with the option to reveal the full song title and artist.

This version follows a simple MVC structure:

- `app/models` contains the `Lyric` model for database interactions
- `app/controllers` holds the `LyricsController`
- `app/views` stores the HTML templates
- entry points are located in `public/`

## Setup

1. Create a MySQL database named `trackquotes` and run `schema.sql` to create the `lyrics` table.
2. Adjust the database credentials in `config/config.php` if needed.
3. You can either call `public/fetch.php?artist=Artist&title=Song` directly or use the form on the home page to fetch lyrics and save them in the database.
4. Serve the `public` directory with a PHP web server (for example `php -S localhost:8000 -t public`).
5. Visit the root page to see a random lyric excerpt and use the form to add new songs.
