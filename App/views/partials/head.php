<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/standard.css">
    <?php if (is_array($data['css'])) : ?>
        <?php foreach ($data['css'] as $css) : ?>
            <link rel="stylesheet" href="/public/css/<?= $css; ?>.css">
        <?php endforeach; ?>
    <?php else : ?>
        <link rel="stylesheet" href="/public/css/<?= $data['css']; ?>.css">
    <?php endif; ?>
    <link rel="shortcut icon" href="#" />
    <script src="/public/js/standard.js"></script>
</head>
<body>