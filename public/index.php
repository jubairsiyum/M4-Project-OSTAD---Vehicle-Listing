<?php
include './views/header.php';
$jsonData = file_get_contents('../data/vehicles.json');
$vehicles = json_decode($jsonData, true);
?>


<div class="container my-4">
    <h1>Vehicle Listing for OSTADs</h1>
    <a href="./views/add.php" class="btn btn-success mb-4">Add Vehicle</a>
    <div class="row">
        <?php foreach ($vehicles as $vehicle): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="images/<?php echo htmlspecialchars($vehicle['image']); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($vehicle['name']); ?></h5>
                        <p class="card-text">Type: <?php echo htmlspecialchars($vehicle['type']); ?></p>
                        <p class="card-text">Price: $<?php echo number_format($vehicle['price'], 2); ?></p>
                        <a href="./views/edit.php?id=<?php echo urlencode($vehicle['id']); ?>" class="btn btn-primary">Edit</a>
                        <a href="./views/delete.php?id=<?php echo urlencode($vehicle['id']); ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
