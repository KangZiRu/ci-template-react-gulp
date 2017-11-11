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
    </ul>

    <ul id="profile-nav" class="horizontal">
        <?php if (is_logged_in()): ?>
            <li data-dropdown-menu="profile-dropdown">
                <div id="main-profile-section">
                    <img src="<?php echo 'uploads/user/img/'.$this->session->photo ?>" alt="<?php echo $this->session->username ?>'s photo"
                    height="50">
                    <span><?php echo $this->session->username ?></span>
                </div>
            </li>
        <?php endif; ?>
    </ul>
</header>

<ul id="profile-dropdown" data-dropdown>
    <li><?php echo anchor('account/profile', 'PROFILE') ?></li>
    <li><?php echo anchor('logout', 'LOGOUT') ?></li>
</ul>
