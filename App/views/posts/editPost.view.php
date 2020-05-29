<?php include './App/views/partials/head.php'; ?>
<?php include './App/views/partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Edit Post</h1>
        <h4>I know that you are here to just Fix some Typos!</h4>
    </div>

    <a href="/posts">Never mind go Back!</a>

    <form action="/posts/edit-post?postId=<?= $_GET['postId'] ?>" method="post">
        <input autocomplete="off" name='title' type="text" class='highlight' placeholder="Title" value="<?= $data['post_attributes']['title'] ?>">
        <input autocomplete="off" name='content' type="text" placeholder="Content" value="<?= $data['post_attributes']['content'] ?>">
        <textarea name='description' maxlength="500" placeholder="Description" rows="5" cols="75"><?= $data['post_attributes']['description'] ?></textarea>
        <input type="hidden" name="date" value="<?= $data['post_attributes']['date'] ?>">
        <button type="submit" name="action" value="update">Save the Typos!</button>
        <p></p>
        <button type="submit" name="action" value="delete">Just Delete it!</button>
    </form>

<?php include './App/views/partials/footer.php'; ?>