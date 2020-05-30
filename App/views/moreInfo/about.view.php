<?php include './App/views/partials/head.php'; ?>
<?php include './App/views/partials/navbar.php'; ?>

    <div class="header-title">
        <h1>More Info</h1>
        <h4>We all Trying to Steal some Nice things Sometimes!</h4>
    </div>

    <a href="/">Never mind Go Back!</a>

    <section class="post">
        <div class="header-title info">
            <h1 class="highlight"><?= $data['post']['title'] ?></h1>
            <h4 class=""><?= $data['post']['description'] ?></h4>
        </div>

        <p class="content">
            <?= $data['post']['content'] ?>
        </p>

        <div class="info">
            <p>Created by <b><?= $data['user']['username'] ?></b></p>
            <p>On <?= $data['user']['created'] ?></p>
        </div>
    </section>

    <div class="header-title info">
        <h1>Comments</h1>
        <h4>Yes we Have Them!</h4>
    </div>

<?php if (isset($_SESSION['status']) && $_SESSION['status'] > 0) : ?>
    <form class='comment_create' action="comment/create-comment" method="post">
        <textarea name="comment" maxlength="750" placeholder="Max 750 characters" rows="5" cols="50"></textarea>
        <input name='postId' type="hidden" value="<?= $data['post']['postId'] ?>">
        <button type="submit">Create a Comment!</button>
    </form>
<?php else : ?>
    <form class='comment_create' action="/login">
        <textarea name="comment" maxlength="750" placeholder="Log in to Comment!" rows="5" cols="50"></textarea>
        <button>Log in to Comment!</button>
    </form>
<?php endif; ?>

    <section class="comment_section">
        <?php foreach ($data['comments'] as $comment) : ?>
        <div class="comment">
            <ul>
                <p><b><?= $comment->username ?></b></p>
                <p class="message"> - <?= $comment->comment ?></p>
                <p><?= $comment->created ?></p>
                <a href="comment/delete-comment?where=<?= $comment->commentId; ?>">Delete</a>
            </ul>
        </div>
        <?php endforeach; ?>
    </section>

<?php include './App/views/partials/footer.php'; ?>