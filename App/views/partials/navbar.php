<header>
    <nav>
        <ul>
            <li><a href="/" class="<?= $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?>">Home</a></li>
            <li><a href="/about" class="<?= $_SERVER['REQUEST_URI'] == '/about' ? 'active' : '' ?>">About Us</a></li>
            <li><a href="/contact" class="<?= $_SERVER['REQUEST_URI'] == '/contact' ? 'active' : '' ?>">Contact</a></li>
            <?php if(!isset($_SESSION['status'])) : ?>
                <li><a href="/login" class='<?= $_SERVER['REQUEST_URI'] == '/login' ? 'active' : '' ?> special'>Login</a></li>
            <?php else : ?>
                <li><a href="/posts" class='<?= substr($_SERVER['REQUEST_URI'],0, 6) == '/posts' ? 'active' : '' ?>'>Posts</a></li>
                <li><a href='/logout-user' class='special'>Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>