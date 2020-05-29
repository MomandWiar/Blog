<section class="blog">
    <?php foreach ($data['paginate_result']['posts'] as $post) : ?>
        <ul>
            <li class="number"><?= $post->id ?></li>
            <li class="title"><a href="#"><?= $post->title ?></a></li>
            <li class="description"><?= $post->description ?></li>
            <li class="date"><?= date('Y-m-d', strtotime($post->date)); ?></li>
            <a class="info">+</a>
        </ul>
    <?php endforeach; ?>
</section>