<?php include './App/views/partials/head.php'; ?>
<?php include './App/views/partials/navbar.php'; ?>

    <div class="header-title">
        <h1>Account Profile</h1>
        <h4>We are sorry but we do not support Gender Transformation!</h4>
    </div>

    <a href="/account">Never mind go Back!</a>

    <div class="input-title">
        <h2>Change Profile Information</h2>
    </div>

    <form action="/account/update-profile" method="post">
        <input type="text" name='username' placeholder="Username" value="<?= $data['username']; ?>">
        <input type="password" name='password' placeholder="Password">
        <p></p>
        <button type="submit" name="action" value="update">Update it!</button>
        <p></p>
        <button type="submit" name="action" value="delete">Just Delete me!</button>
    </form>


<?php include './App/views/partials/footer.php'; ?>