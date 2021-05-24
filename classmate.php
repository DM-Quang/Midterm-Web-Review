<?php 
    include "includes/header.php";
    $row = false;
    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM classmates WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_GET['id']);
        $stmt->execute();
        $results = $stmt->get_result();
        if ($results->num_rows == 1) {
            $row = $results->fetch_assoc();
        }
        var_dump($row);
    }
?>

    <hr>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <?php if (isset($_GET['new'])): ?>
                <div class="alert alert-success">
                    New classmate added successfully!
                </div>
            <?php endif; ?>

            <?php if ($row == false): ?>
                <h2 class="display-4">Classmate not found!</h2>
            <?php else: ?>
                <div class="col-md-6 offset-md-3 text-center">
                    <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="">
                    <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                    <h5><em><?php echo htmlspecialchars($row['gender']); ?></em></h5>
                    <h4><?php echo htmlspecialchars($row['major']); ?></h4>
                    <button type="button" name="button" class="mt-2 mb-5 btn btn-lg btn-block btn-outline-primary"><a href="index.php">Go back</a></button>
                    <hr>
                </div>
            <?php  endif; ?>
        </div>
    </div>

    

<?php 
    include "includes/footer.php";
?>