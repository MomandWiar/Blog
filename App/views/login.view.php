<?php include 'partials/head.php'; ?>
<?php include 'partials/header.php'; ?>

    <div class="header-title">
        <h1>Login</h1>
        <h4>And let the magic do it's job!</h4>
    </div>

    <form action="/" METHOD="get">
        <input autocomplete="off" type="text" placeholder="Username" name="username">
        <input autocomplete="off" type="password" placeholder="Password" name="password">
        <div class="options">
            <button type="submit">Login</button>
            <p> - </p>
            <button type="submit">register</button>
        </div>
    </form>

<?php include 'partials/footer.php'; ?>