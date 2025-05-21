<?php
require_once 'model/Showtime.php';

class ShowtimeViewModel {
    private $showtime;

    public function __construct() {
        $this->showtime = new Showtime();
    }

    public function getShowtimeList() {
        return $this->showtime->getAll();
    }

    public function getShowtimeById($id) {
        return $this->showtime->getById($id);
    }

    public function addShowtime($time, $description) {
        return $this->showtime->create($time, $description);
    }

    public function updateShowtime($id, $time, $description) {
        return $this->showtime->update($id, $time, $description);
    }

    public function deleteShowtime($id) {
        return $this->showtime->delete($id);
    }
}
?>