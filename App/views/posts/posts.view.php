<?php include './App/views/partials/head.php'; ?>
<?php include './App/views/partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Posts</h1>
        <h4>Here you can Create or Edit a Post!</h4>
    </div>

    <a href="/posts/create-post">Click here to create a new Post!</a>

<?php include './App/views/partials/table.php'; ?>

    <section class="pagination">
        <div class="pagination-options">
            <?php if($data['result']['page_number'] - 1) : ?>
                <a href="/posts?page=<?= $data['result']['page_number'] - 1; ?>">Last Page</a>
            <?php endif; ?>
            <p><?= $data['result']['page_number'] ?></p>
            <?php if($data['result']['page_number'] < $data['result']['number_of_pages']) : ?>
                <a href="/posts?page=<?= $data['result']['page_number'] + 1; ?>">Next Page</a>
            <?php endif; ?>
        </div>
    </section>

<?php include './App/views/partials/footer.php'; ?>