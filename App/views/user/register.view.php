<?php include './App/views/partials/head.php'; ?>
<?php include './App/views/partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Register</h1>
        <h4>Join the Dark Side!</h4>
    </div>

    <form action="/register-user" METHOD="POST">
        <input autocomplete="off" type="text" placeholder="Username" name="username">
        <input autocomplete="off" type="password" placeholder="Password" name="password">
        <input autocomplete="off" type="password" placeholder="Password Retry" name="passwordRetry">
        <div class="options">
            <button class="special" type="submit">Sign Up</button>
            <p> - </p>
            <a href="/login">back</a>
        </div>
    </form>

<?php include './App/views/partials/footer.php'; ?>