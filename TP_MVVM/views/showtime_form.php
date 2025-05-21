<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">
    <?php echo isset($showtime) ? 'Edit Showtime' : 'Add Showtime'; ?>
</h2>
<form action="index.php?entity=showtime&action=<?php echo isset($showtime) ? 'update&id=' . $showtime['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block mb-1" for="time">Time:</label>
        <input type="time" id="time" name="time" value="<?php echo isset($showtime) ? date('H:i', strtotime($showtime['time'])) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block mb-1" for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?php echo isset($showtime) ? htmlspecialchars($showtime['description']) : ''; ?>" class="border p-2 w-full" placeholder="e.g. Morning Show" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
