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
</header>