<?php include './App/views/partials/head.php'; ?>
<?php include './App/views/partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Posts</h1>
        <h4>Here you can Create or Edit a Post!</h4>
    </div>

    <a href="/post/create-post">Click here to create a new Post!</a>

    <section class="blog">
        <?php foreach ($data['paginate_result']['post'] as $post) : ?>
            <ul id="post<?= $post->postId ?>">
                <li class="number"><?= $post->postId ?></li>
                <li class="title"><a href="moreInfo?about=<?= $post->postId; ?>&id=$post"><?= $post->title ?></a></li>
                <li class="description"><?= $post->description ?></li>
                <li class="date"><?= date('Y-m-d', strtotime($post->date)); ?></li>
                <a href='/post/edit-post?postId=<?= $post->postId; ?>' class="info">Edit</a>
            </ul>
        <?php endforeach; ?>
    </section>

<?php
    $page_number = $data['paginate_result']['page_number'];
    $number_of_pages = $data['paginate_result']['number_of_pages'];
?>

    <section class="pagination">
        <div class="pagination-options">
            <a class="<?= $page_number <= 1 ? 'hide' : '' ?>" href="/post?page=<?= $page_number - 1; ?>">Last Page</a>
            <p><?= $page_number ?></p>
            <a class="<?= $page_number >= $number_of_pages ? 'hide' : '' ?>" href="/post?page=<?= $page_number + 1; ?>">Next Page</a>
        </div>
    </section>

<?php include './App/views/partials/footer.php'; ?>