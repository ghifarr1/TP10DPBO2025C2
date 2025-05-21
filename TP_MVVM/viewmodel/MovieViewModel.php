<?php
require_once 'model/Movie.php';
require_once 'model/Genre.php';
require_once 'model/Showtime.php';

class MovieViewModel {
    private $movie;
    private $genre;
    private $showtime;

    public function __construct() {
        $this->movie = new Movie();
        $this->genre = new Genre();
        $this->showtime = new Showtime();
    }

    public function getMovieList() {
        return $this->movie->getAll();
    }

    public function getMovieById($id) {
        return $this->movie->getById($id);
    }

    public function getGenres() {
        return $this->genre->getAll();
    }

    public function getShowtimes() {
        return $this->showtime->getAll();
    }

    public function addMovie($title, $genre_id, $showtime_id) {
        return $this->movie->create($title, $genre_id, $showtime_id);
    }

    public function updateMovie($id, $title, $genre_id, $showtime_id) {
        return $this->movie->update($id, $title, $genre_id, $showtime_id);
    }

    public function deleteMovie($id) {
        return $this->movie->delete($id);
    }
}
?>