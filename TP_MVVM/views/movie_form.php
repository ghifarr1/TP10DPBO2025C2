<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">
    <?php echo isset($movie) ? 'Edit Movie' : 'Add Movie'; ?>
</h2>
<form action="index.php?entity=movie&action=<?php echo isset($movie) ? 'update&id=' . $movie['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block mb-1" for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo isset($movie) ? htmlspecialchars($movie['title']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block mb-1" for="genre_id">Genre:</label>
        <select id="genre_id" name="genre_id" class="border p-2 w-full" required>
            <option value="" disabled <?php echo !isset($movie) ? 'selected' : ''; ?>>-- Select Genre --</option>
            <?php foreach ($genres as $genre): ?>
            <option value="<?php echo $genre['id']; ?>" >
                <?php echo htmlspecialchars($genre['name']); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block mb-1" for="showtime_id">Showtime:</label>
        <select id="showtime_id" name="showtime_id" class="border p-2 w-full" required>
            <option value="" disabled <?php echo !isset($movie) ? 'selected' : ''; ?>>-- Select Showtime --</option>
            <?php foreach ($showtimes as $st): ?>
            <option value="<?php echo $st['id']; ?>" >
                <?php 
                    echo date('H:i', strtotime($st['time'])) 
                         . ' – ' 
                         . htmlspecialchars($st['description']); 
                ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        Save
    </button>
</form>

<?php
require_once 'views/template/footer.php';
?>
