<?php include 'partials/head.php'; ?>
<?php include 'partials/navbar.php'; ?>

<h1>Home</h1>

<?php
    if (isset($data['names'])) {
        foreach ($data['names'] as $name) {
            echo $name->username . '<br>';
        }
    }
?>

<?php include 'partials/footer.php'; ?>