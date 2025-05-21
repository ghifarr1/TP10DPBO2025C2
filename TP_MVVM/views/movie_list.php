<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Movie List</h2>
<a href="index.php?entity=movie&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Movie</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Title</th>
        <th class="border p-2">Genre</th>
        <th class="border p-2">Showtime</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($movieList as $movie): ?>
    <tr>
        <td class="border p-2"><?php echo htmlspecialchars($movie['title']); ?></td>
        <td class="border p-2"><?php echo htmlspecialchars($movie['genre_name']); ?></td>
        <td class="border p-2">
            <?php 
                // Tampilkan waktu (HH:MM) dan deskripsi, misalnya "19:00 – Evening Show"
                echo date('H:i', strtotime($movie['showtime_time'])) 
                     . ' – ' 
                     . htmlspecialchars($movie['showtime_desc']); 
            ?>
        </td>
        <td class="border p-2">
            <a href="index.php?entity=movie&action=edit&id=<?php echo $movie['id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=movie&action=delete&id=<?php echo $movie['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
