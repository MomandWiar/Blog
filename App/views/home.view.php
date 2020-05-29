<?php include 'partials/head.php'; ?>
<?php include 'partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Welcome to our Blog</h1>
        <h4>Search around for a interesting item!</h4>
    </div>

<?php include 'partials/table.php '?>

    <section class="pagination">
        <div class="pagination-options">
            <?php if($data['result']['page_number'] - 1) : ?>
                <a class='hide' href="/?page=<?= $data['result']['page_number'] - 1; ?>">Last Page</a>
            <?php endif; ?>
            <p><?= $data['result']['page_number'] ?></p>
            <?php if($data['result']['page_number'] < $data['result']['number_of_pages']) : ?>
                <a class='hide' href="/?page=<?= $data['result']['page_number'] + 1; ?>">Next Page</a>
            <?php endif; ?>
        </div>
    </section>

<?php include 'partials/footer.php'; ?>