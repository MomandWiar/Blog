<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/standard.css">
    <script src="/public/js/standard.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>
    <link rel="shortcut icon" href="#" />

    <?php if (isset($data['css'])) : ?>
        <?php if (is_array($data['css'])) : ?>
            <?php foreach ($data['css'] as $css) : ?>
                <link rel="stylesheet" href="/public/css/<?= $css; ?>.css">
            <?php endforeach; ?>
        <?php else : ?>
            <link rel="stylesheet" href="/public/css/<?= $data['css']; ?>.css">
        <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($data['js'])) : ?>
        <?php if (is_array($data['js'])) : ?>
            <?php foreach ($data['js'] as $js) : ?>
                <script src="/public/js/<?= $js ?>.js"></script>
            <?php endforeach; ?>
        <?php else : ?>
            <script src="/public/js/<?= $data['js']; ?>.js"></script>
        <?php endif; ?>
    <?php endif; ?>

</head>
<body>