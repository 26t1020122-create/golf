<?php
get_header();
if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
else :
    echo '<main class="below-section"><h1>Chào mừng đến Fairways Golf Lounge</h1></main>';
endif;
get_footer();
