<?php 
    include "includes/header.php";
    $sql = "SELECT * FROM classmates";
    $results = $conn->query($sql);
    $rows = $results->fetch_all(MYSQLI_ASSOC);
?>

    <div class="jumbotron">
        <h1 class="display-3">ITEC Classmates</h1>
    </div>

    <div class="container">
        <h3>My Classmates</h3>
        <div class="row">
            <?php 
                foreach ($rows as $row) {
                    echo "<div class='col-md-4'>
                    <h3><a href='classmate.php?id={$row['ID']}'>Name: {$row['name']}</a></h3>
                    </div>";
                };
            ?>
        </div>
    </div>

<?php 
    include "includes/footer.php";
?>