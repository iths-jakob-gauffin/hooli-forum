<?php
    $urlArr = explode("/", $_SERVER['REQUEST_URI']);
    $active_class = array_pop($urlArr); 
?>

<nav class="Blog__Nav">
    <a href="<?php echo esc_url(site_url('/blog')); ?>" class="Blog__Title">Bloggen</a>
    <ul class="Blog__NavList">
        <li class="Blog__NavItem <?php echo $active_class === 'intervjuer' ? 'Blog__NavItem--Selected' : null ?>">
            <a href="<?php echo esc_url(site_url('/intervjuer')); ?>" class="Blog__NavLink"></a>
            <span class="Blog__NavLinkText Blog__NavLinkText--Pink <?php echo $active_class === 'intervjuer' ? 'Blog__NavLinkText--PinkSelected' : null ?>">Intervjuer</span>
        </li>
        <li class="Blog__NavItem <?php echo $active_class === 'events' ? 'Blog__NavItem--Selected' : null ?>">
            <a href="<?php echo esc_url(site_url('/events')); ?>" class="Blog__NavLink"></a>
            <span class="Blog__NavLinkText Blog__NavLinkText--Green <?php echo $active_class === 'events' ? 'Blog__NavLinkText--GreenSelected' : null ?>">Events</span>
        </li>
        <li class="Blog__NavItem <?php echo $active_class === 'recensioner' ? 'Blog__NavItem--Selected' : null ?>">
            <a href="<?php echo esc_url(site_url('/recensioner')); ?>" class="Blog__NavLink"></a>
            <span class="Blog__NavLinkText Blog__NavLinkText--Yellow <?php echo $active_class === 'recensioner' ? 'Blog__NavLinkText--YellowSelected' : null ?>">Recensioner</span>
        </li>
        <li class="Blog__NavItem <?php echo $active_class === 'nyheter' ? 'Blog__NavItem--Selected' : null ?>">
            <a href="<?php echo esc_url(site_url('/nyheter')); ?>" class="Blog__NavLink"></a>
            <span class="Blog__NavLinkText Blog__NavLinkText--Blue <?php echo $active_class === 'nyheter' ? 'Blog__NavLinkText--BlueSelected' : null ?>">Nyheter</span>
        </li>
    </ul>
</nav>