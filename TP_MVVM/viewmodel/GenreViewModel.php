<?php
require_once 'model/Genre.php';

class GenreViewModel {
    private $genre;

    public function __construct() {
        $this->genre = new Genre();
    }

    public function getGenreList() {
        return $this->genre->getAll();
    }

    public function getGenreById($id) {
        return $this->genre->getById($id);
    }

    public function addGenre($name) {
        return $this->genre->create($name);
    }

    public function updateGenre($id, $name) {
        return $this->genre->update($id, $name);
    }

    public function deleteGenre($id) {
        return $this->genre->delete($id);
    }
}
?>