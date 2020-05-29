<?php include 'partials/head.php'; ?>
<?php include 'partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Welcome to our Blog</h1>
        <h4>Search around for a interesting item!</h4>
    </div>

<?php include 'partials/table.php '?>

<?php
    $page_number = $data['paginate_result']['page_number'];
    $number_of_pages = $data['paginate_result']['number_of_pages'];
?>

    <section class="pagination">
        <div class="pagination-options">
            <a class="<?= $page_number <= 1 ? 'hide' : '' ?>" href="/?page=<?= $page_number - 1; ?>">Last Page</a>
            <p><?= $page_number ?></p>
            <a class="<?= $page_number >= $number_of_pages ? 'hide' : '' ?>" href="/?page=<?= $page_number + 1; ?>">Next Page</a>
        </div>
    </section>

<?php include 'partials/footer.php'; ?>