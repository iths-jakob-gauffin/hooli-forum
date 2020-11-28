  
<nav class="Blog__Nav">
    <a href="<?php echo esc_url(site_url('/blog')); ?>" class="Blog__Title">Bloggen</a>
    <ul class="Blog__NavList">
        <li class="Blog__NavItem <?php echo is_page('intervjuer') ? 'Blog__NavItem--Selected' : null ?>">
            <a href="<?php echo esc_url(site_url('/intervjuer')); ?>" class="Blog__NavLink"></a>
            <span class="Blog__NavLinkText Blog__NavLinkText--Pink <?php echo is_page('intervjuer') ? 'Blog__NavLinkText--PinkSelected' : null ?>">Intervjuer</span>
        </li>
        <li class="Blog__NavItem <?php echo is_page('events') ? 'Blog__NavItem--Selected' : null ?>">
            <a href="<?php echo esc_url(site_url('/events')); ?>" class="Blog__NavLink"></a>
            <span class="Blog__NavLinkText Blog__NavLinkText--Green <?php echo is_page('events') ? 'Blog__NavLinkText--GreenSelected' : null ?>">Events</span>
        </li>
        <li class="Blog__NavItem <?php echo is_page('recensioner') ? 'Blog__NavItem--Selected' : null ?>">
            <a href="<?php echo esc_url(site_url('/recensioner')); ?>" class="Blog__NavLink"></a>
            <span class="Blog__NavLinkText Blog__NavLinkText--Yellow <?php echo is_page('recensioner') ? 'Blog__NavLinkText--YellowSelected' : null ?>">Recensioner</span>
        </li>
        <li class="Blog__NavItem <?php echo is_page('nyheter') ? 'Blog__NavItem--Selected' : null ?>">
            <a href="<?php echo esc_url(site_url('/nyheter')); ?>" class="Blog__NavLink"></a>
            <span class="Blog__NavLinkText Blog__NavLinkText--Blue <?php echo is_page('nyheter') ? 'Blog__NavLinkText--BlueSelected' : null ?>">Nyheter</span>
        </li>
        <li id="blogSearchButton" class="Blog__NavItem--Search hoverState--hidden <?php echo is_page('nyheter') ? 'Blog__NavItem--Selected' : null ?>">
            <span class="Blog__NavLinkText Blog__NavLinkText--White <?php echo is_page('nyheter') ? 'Blog__NavLinkText--BlueSelected' : null ?>"><i class="fas fa-search"></i></span>
        </li>
        <form action="#" class="Blog__SearchForm Blog__SearchForm--hidden">
            <input type="search" placeholder="sök i bloggen" class="Blog__SearchInput">
        </form>
        <div class="Blog__NavOverlay  Blog__NavOverlay--hidden"></div>
    </ul>
</nav>

