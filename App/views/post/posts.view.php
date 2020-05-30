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

    <section class="pagination">
        <div class="pagination-options">

            <?php if ($data['paginate_result']['page_number'] <= 1) : ?>
                <a class="hide" href="/?page=<?= $data['paginate_result']['page_number'] - 1; ?>">Last Page</a>
            <?php else : ?>
                <a href="/post?page=<?= $data['paginate_result']['page_number'] - 1; ?>">Last Page</a>
            <?php endif ?>

            <p><?= $data['paginate_result']['page_number'] ?></p>

            <?php if ($data['paginate_result']['page_number'] >= $data['paginate_result']['number_of_pages']) : ?>
                <a class='hide' href="/?page=<?= $data['paginate_result']['page_number'] + 1; ?>">Next Page</a>
            <?php else : ?>
                <a href="/post?page=<?= $data['paginate_result']['page_number'] + 1; ?>">Next Page</a>
            <?php endif ?>

        </div>
    </section>

<?php include './App/views/partials/footer.php'; ?>