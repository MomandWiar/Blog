<?php include './App/views/partials/head.php'; ?>
<?php include './App/views/partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Login</h1>
        <h4>And let the magic do it's job!</h4>
    </div>

    <form action="/login-user" METHOD="POST">
        <input autocomplete="off" type="text" placeholder="Username" name="username">
        <input autocomplete="off" type="password" placeholder="Password" name="password">
        <div class="options">
            <button class='special' type="submit">Login</button>
            <p> - </p>
            <a href="/register">register</a>
        </div>
    </form>

<?php include './App/views/partials/footer.php'; ?>