<?php
$cur_link_class = array(
        'class' => "current-link"
    );

$home_link = $about_link = $user_link = $login_link = $profile_link = array();

switch(basename($_SERVER['PHP_SELF'], '.php'))
{
    case 'index':
        $home_link = $cur_link_class;
        break;
    case 'login':
        $login_link = $cur_link_class;
        break;
}
?>


<header>
    <div id="main-logo">LOGO</div>
    <ul id="main-nav" class="horizontal">
        <li><?php echo anchor('./', 'HOME', $home_link) ?></li>
        <?php if (is_logged_in()): ?>
            <?php if ($this->session->level == 9): ?>
                <li><?php echo anchor('admin_panel', 'ADMIN PANEL') ?></li>
            <?php endif; ?>
            <li><?php //echo anchor('', 'USER', $user_link) ?></li>
        <?php endif; ?>
    </ul>

    <ul id="profile-nav" class="horizontal">
        <?php if (is_logged_in()): ?>
            <li><?php echo anchor('logout', 'LOGOUT') ?></li>
        <?php else: ?>
            <li><?php echo anchor('login', 'LOGIN', $login_link) ?></li>
        <?php endif; ?>
    </ul>
</header>
