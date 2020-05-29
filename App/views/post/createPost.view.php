<?php include './App/views/partials/head.php'; ?>
<?php include './App/views/partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Create Post</h1>
        <h4>Make it worth it!</h4>
    </div>

    <a href="/post">Never mind go Back!</a>

    <form action="/post/create-post" method="post">
        <input autocomplete="off" name='title' type="text" class='highlight' placeholder="Title">
        <input autocomplete="off" name='content' type="text" placeholder="Content">
        <textarea name='description' maxlength="500" placeholder="Description" rows="5" cols="75"></textarea>
        <button type='submit'>Post it NOW!</button>
    </form>

<?php include './App/views/partials/footer.php'; ?>