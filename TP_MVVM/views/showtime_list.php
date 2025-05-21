<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Showtime List</h2>
<a href="index.php?entity=showtime&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Showtime</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Time</th>
        <th class="border p-2">Description</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($showtimeList as $st): ?>
    <tr>
        <td class="border p-2"><?php echo date('H:i', strtotime($st['time'])); ?></td>
        <td class="border p-2"><?php echo htmlspecialchars($st['description']); ?></td>
        <td class="border p-2">
            <a href="index.php?entity=showtime&action=edit&id=<?php echo $st['id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=showtime&action=delete&id=<?php echo $st['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
