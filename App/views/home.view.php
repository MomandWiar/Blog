<?php include 'partials/head.php'; ?>
<?php include 'partials/navbar.php'; ?>

<h1>Welcome to our Blog</h1>
<h4>Search around for a interesting item!</h4>

<section class="blog">
    <?php foreach ($data['posts'] as $post) : ?>
        <ul>
            <li id="number"><?= $post->id ?></li>
            <li id="title"><a href="#"><?= $post->title ?></a></li>
            <li id="description"><?= $post->description ?></li>
            <li id="date"><?= date('Y-m-d', strtotime($post->date)); ?></li>
            <li id="info">+</li>
        </ul>
    <?php endforeach; ?>
</section>

<div class="pages">
    <div class="pages-nav">
        <a href="#" id="last">last Page</a>
        <p id="page-number">1</p>
        <a href="#" id="next">Next Page</a>
    </div>
</div>

<?php include 'partials/footer.php'; ?>