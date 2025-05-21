<?php
require_once 'viewmodel/MovieViewModel.php';
require_once 'viewmodel/GenreViewModel.php';
require_once 'viewmodel/ShowtimeViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'movie';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'movie') {
    $viewModel = new MovieViewModel();
    if ($action == 'list') {
        $movieList = $viewModel->getMovieList();
        require_once 'views/movie_list.php';
    } elseif ($action == 'add') {
        $genres = $viewModel->getGenres();
        $showtimes = $viewModel->getShowtimes();
        require_once 'views/movie_form.php';
    } elseif ($action == 'edit') {
        $movie = $viewModel->getMovieById($_GET['id']);
        $genres = $viewModel->getGenres();
        $showtimes = $viewModel->getShowtimes();
        require_once 'views/movie_form.php';
    } elseif ($action == 'save') {
        $viewModel->addMovie($_POST['title'], $_POST['genre_id'], $_POST['showtime_id']);
        header('Location: index.php?entity=movie');
    } elseif ($action == 'update') {
        $viewModel->updateMovie($_GET['id'], $_POST['title'], $_POST['genre_id'], $_POST['showtime_id']);
        header('Location: index.php?entity=movie');
    } elseif ($action == 'delete') {
        $viewModel->deleteMovie($_GET['id']);
        header('Location: index.php?entity=movie');
    }
} elseif ($entity == 'genre') {
    $viewModel = new GenreViewModel();
    if ($action == 'list') {
        $genreList = $viewModel->getGenreList();
        require_once 'views/genre_list.php';
    } elseif ($action == 'add') {
        require_once 'views/genre_form.php';
    } elseif ($action == 'edit') {
        $genre= $viewModel->getGenreById($_GET['id']);
        require_once 'views/genre_form.php';
    } elseif ($action == 'save') {
        $viewModel->addGenre($_POST['name']);
        header('Location: index.php?entity=genre');
    } elseif ($action == 'update') {
        $viewModel->updateGenre($_GET['id'], $_POST['name']);
        header('Location: index.php?entity=genre');
    } elseif ($action == 'delete') {
        $viewModel->deleteGenre($_GET['id']);
        header('Location: index.php?entity=genre');
    }
} elseif ($entity == 'showtime') {
    $viewModel = new ShowtimeViewModel();
    if ($action == 'list') {
        $showtimeList = $viewModel->getShowtimeList();
        require_once 'views/showtime_list.php';
    } elseif ($action == 'add') {
        require_once 'views/showtime_form.php';
    } elseif ($action == 'edit') {
        $showtime = $viewModel->getShowtimeById($_GET['id']);
        require_once 'views/showtime_form.php';
    } elseif ($action == 'save') {
        $viewModel->addShowtime($_POST['time'], $_POST['description']);
        header('Location: index.php?entity=showtime');
    } elseif ($action == 'update') {
        $viewModel->updateShowtime($_GET['id'], $_POST['time'], $_POST['description']);
        header('Location: index.php?entity=showtime');
    } elseif ($action == 'delete') {
        $viewModel->deleteShowtime($_GET['id']);
        header('Location: index.php?entity=showtime');
    }
}
?>
