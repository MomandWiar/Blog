<header>
    <nav>
        <ul>
            <li><a href="/" class="<?= $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?>">Home</a></li>
            <?php if(isset($_SESSION['status'])) : ?>
                <li><a href="/post" class='<?= substr($_SERVER['REQUEST_URI'],0, 6) == '/post' ? 'active' : '' ?>'>Posts</a></li>
                <li><a href="/account" class='<?= $_SERVER['REQUEST_URI'] == '/account' ? 'active' : '' ?>'>Account</a></li>
            <?php endif; ?>
            <li><a href="/aboutUs" class="<?= $_SERVER['REQUEST_URI'] == '/about' ? 'active' : '' ?>">About Us</a></li>
            <li><a href="/contact" class="<?= $_SERVER['REQUEST_URI'] == '/contact' ? 'active' : '' ?>">Contact</a></li>
            <?php if(isset($_SESSION['status'])) : ?>
                <li><a href='/logout-user'>Logout</a></li>
            <?php else : ?>
                <li><a href="/login" class='<?= $_SERVER['REQUEST_URI'] == '/login' ? 'active' : '' ?> special'>Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <?php if(isset($_GET['error']) && $_GET['error'] !== false) : ?>
        <div id="message">
            <div id="error-message" class='message-style'>
                <div class='message-icon' id='error-icon'><p class='fa fa-times-circle'></p></div>
                <div class='message-content'><h1><?php echo $_GET['error'] ?></h1></div>
                <?php unset($_GET['error']) ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(isset($_GET['success']) && $_GET['success'] !== false) : ?>
        <div id="message">
            <div id="success-message" class='message-style'>
                <div class='message-icon' id='success-icon'><p class='fa fa-check'></p></div>
                <div class='message-content'><h1><?php echo $_GET['success'] ?></h1></div>
                <?php unset($_GET['success']) ?>
            </div>
        </div>
    <?php endif; ?>
</header>