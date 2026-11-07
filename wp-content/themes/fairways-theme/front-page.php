<?php
get_header();

function fairways_field_image_url( $field_name, $fallback = '' ) {
    $image = function_exists( 'get_field' ) ? get_field( $field_name ) : false;
    if ( is_array( $image ) && ! empty( $image['url'] ) ) {
        return $image['url'];
    }
    if ( is_numeric( $image ) ) {
        $url = wp_get_attachment_image_url( (int) $image, 'full' );
        if ( $url ) return $url;
    }
    return $fallback;
}

$hero_image = fairways_field_image_url( 'fw_hero_image', 'https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=2000&q=85' );
$hero_description = get_field( 'fw_hero_description' ) ?: 'FairWay Golf Lounge - nơi luyện tập và giải trí Golf sang trọng và đẳng cấp bậc nhất Việt Nam.';
$hero_button_text = get_field( 'fw_hero_button_text' ) ?: 'ĐẶT LỊCH NGAY';
$hero_button_url = get_field( 'fw_hero_button_url' ) ?: '#contact';
?>

<main>
    <section class="hero" id="home" style="--hero-image: url('<?php echo esc_url( $hero_image ); ?>');">
        <header class="main-header">
            <button class="menu-toggle" type="button" aria-label="Mở menu" aria-expanded="false"><span></span><span></span><span></span></button>
            <nav class="nav nav-left" aria-label="Điều hướng chính">
                <a href="#home">Trang chủ</a><a href="#about">Giới thiệu</a><a href="#services">Dịch vụ</a><a href="#news">Bài viết</a>
            </nav>
            <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="brand-mark">♜</span><strong>FAIRWAYS</strong><small>GOLF LOUNGE</small></a>
            <nav class="nav nav-right" aria-label="Điều hướng phụ">
                <a href="#events">Sự kiện</a><a href="#membership">Gói hội viên</a><a href="#offers">Khuyến mãi</a><a href="#contact">Liên hệ</a>
            </nav>
        </header>
        <div class="hero-copy">
            <p><?php echo wp_kses_post( nl2br( esc_html( $hero_description ) ) ); ?></p>
            <a class="button button-outline" href="<?php echo esc_url( $hero_button_url ); ?>"><?php echo esc_html( $hero_button_text ); ?></a>
        </div>
        <a class="scroll-cue" href="#about" aria-label="Cuộn xuống phần giới thiệu"><span></span></a>
    </section>

    <section class="intro-section" id="about">
        <div class="intro-copy">
            <p class="eyebrow"><?php echo esc_html( get_field( 'fw_about_eyebrow' ) ?: 'WELCOME TO FAIRWAYS' ); ?></p>
            <h1><?php echo esc_html( get_field( 'fw_about_title' ) ?: 'Về chúng tôi' ); ?></h1>
            <div class="about-description">
                <?php
                $about_content = get_field( 'fw_about_description' );
                if ( $about_content ) {
                    echo wp_kses_post( $about_content );
                } else {
                    echo '<p>Who said golf has to be punishing. We have included thoughtful touches to make the game a breeze. A soft grip and feel to play all your rounds in comfort.</p>';
                }
                ?>
            </div>
            <a class="text-link" href="<?php echo esc_url( get_field( 'fw_about_link_url' ) ?: '#contact' ); ?>"><?php echo esc_html( get_field( 'fw_about_link_text' ) ?: 'XEM THÊM' ); ?></a>
        </div>

        <div class="feature-grid" id="services">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $image = fairways_field_image_url( 'fw_service_' . $i . '_image',
                    $i === 1 ? 'https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=700&q=80' :
                    ( $i === 2 ? 'https://images.unsplash.com/photo-1587174486073-ae5e5cec7fb3?auto=format&fit=crop&w=700&q=80' :
                    'https://images.unsplash.com/photo-1519501025264-65ba15a82390?auto=format&fit=crop&w=700&q=80' )
                );
                $title = get_field( 'fw_service_' . $i . '_title' ) ?: ( $i === 1 ? 'Các dịch vụ nổi bật' : ( $i === 2 ? 'Sân tập golf' : 'Không gian thư giãn' ) );
                $description = get_field( 'fw_service_' . $i . '_description' ) ?: 'Khám phá trải nghiệm golf tiện nghi, hiện đại và đẳng cấp tại Fairways.';
                $url = get_field( 'fw_service_' . $i . '_url' ) ?: '#contact';
            ?>
                <article class="feature-card <?php echo $i === 1 ? 'feature-card-copy' : 'feature-card-image'; ?>" style="--card-image: url('<?php echo esc_url( $image ); ?>');">
                    <?php if ( $i === 1 ) : ?><div><?php endif; ?>
                    <p class="eyebrow"><?php echo esc_html( get_field( 'fw_services_eyebrow' ) ?: 'DISCOVER' ); ?></p>
                    <h2><?php echo esc_html( $title ); ?></h2>
                    <p><?php echo esc_html( $description ); ?></p>
                    <a class="text-link text-link-light" href="<?php echo esc_url( $url ); ?>">XEM THÊM</a>
                    <?php if ( $i === 1 ) : ?></div><?php endif; ?>
                </article>
            <?php endfor; ?>
        </div>
    </section>

<?php
    /* ---------- Data preparation ---------- */
    $demo_images = array(
        'https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1587174486073-ae5e5cec7fb3?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1519501025264-65ba15a82390?auto=format&fit=crop&w=1200&q=80',
    );
    $demo_text = "Who said golf has to be punishing. We've included some thoughtful touches to make the game a breeze.";

    // Events
    $event_items = array();
    $event_posts = get_posts( array( 'post_type' => 'fw_event', 'posts_per_page' => 6 ) );
    foreach ( $event_posts as $p ) {
        $event_items[] = array(
            'title'  => get_the_title( $p ),
            'text'   => wp_trim_words( get_the_excerpt( $p ), 16 ),
            'image'  => get_the_post_thumbnail_url( $p, 'large' ) ?: $demo_images[ count( $event_items ) % 3 ],
            'date'   => function_exists( 'get_field' ) ? get_field( 'fw_event_date', $p->ID ) : '',
            'time'   => function_exists( 'get_field' ) ? get_field( 'fw_event_time', $p->ID ) : '',
            'button' => ( function_exists( 'get_field' ) ? get_field( 'fw_event_button_text', $p->ID ) : '' ) ?: 'ĐĂNG KÝ NGAY',
            'url'    => ( function_exists( 'get_field' ) ? get_field( 'fw_event_url', $p->ID ) : '' ) ?: get_permalink( $p ),
        );
    }
    if ( ! $event_items ) {
        for ( $i = 0; $i < 3; $i++ ) {
            $event_items[] = array(
                'title' => 'Fairway Golf Champion Ship 2020', 'text' => $demo_text, 'image' => $demo_images[ $i ],
                'date' => '22/01/22', 'time' => '08:00 AM', 'button' => 'ĐĂNG KÝ NGAY', 'url' => '#contact',
            );
        }
    }

    // Offers
    $offer_items = array();
    $offer_posts = get_posts( array( 'post_type' => 'fw_offer', 'posts_per_page' => 8 ) );
    foreach ( $offer_posts as $p ) {
        $offer_items[] = array(
            'title'  => get_the_title( $p ),
            'text'   => wp_trim_words( get_the_excerpt( $p ), 14 ),
            'image'  => get_the_post_thumbnail_url( $p, 'large' ) ?: $demo_images[ count( $offer_items ) % 3 ],
            'button' => ( function_exists( 'get_field' ) ? get_field( 'fw_offer_button_text', $p->ID ) : '' ) ?: 'ĐĂNG KÝ NGAY',
            'url'    => ( function_exists( 'get_field' ) ? get_field( 'fw_offer_url', $p->ID ) : '' ) ?: get_permalink( $p ),
        );
    }
    if ( ! $offer_items ) {
        for ( $i = 0; $i < 4; $i++ ) {
            $offer_items[] = array( 'title' => 'Giảm giá 10%', 'text' => $demo_text, 'image' => $demo_images[ $i % 3 ], 'button' => 'ĐĂNG KÝ NGAY', 'url' => '#contact' );
        }
    }

    // News (7 latest posts: 1 featured, 4 side, 2 links)
    $news_items = array();
    $news_posts = get_posts( array( 'post_type' => 'post', 'posts_per_page' => 7, 'ignore_sticky_posts' => true ) );
    foreach ( $news_posts as $p ) {
        $cats = get_the_category( $p->ID );
        $news_items[] = array(
            'title' => get_the_title( $p ),
            'text'  => wp_trim_words( get_the_excerpt( $p ), 14 ),
            'image' => get_the_post_thumbnail_url( $p, 'large' ) ?: $demo_images[ count( $news_items ) % 3 ],
            'cat'   => $cats ? mb_strtoupper( $cats[0]->name ) : '',
            'url'   => get_permalink( $p ),
        );
    }
    if ( ! $news_items ) {
        for ( $i = 0; $i < 7; $i++ ) {
            $news_items[] = array( 'title' => 'Max Homa lần thứ hai vô địch Wells Fargo', 'text' => $demo_text, 'image' => $demo_images[ $i % 3 ], 'cat' => 'KĨ THUẬT', 'url' => '#news' );
        }
    }
    $news_featured = $news_items[0];
    $news_side     = array_slice( $news_items, 1, 4 );
    $news_links    = array_slice( $news_items, 5, 2 );

    $member_defaults = array( 'VIP membership', 'Regular membership' );
?>

    <!-- ===== Sự kiện nổi bật ===== -->
    <section class="events-section" id="events">
        <div class="section-head section-head-light">
            <h2><?php echo esc_html( fairways_get( 'fw_events_title', 'Sự kiện nổi bật' ) ); ?></h2>
            <p><?php echo esc_html( fairways_get( 'fw_events_desc', $demo_text ) ); ?></p>
            <a class="text-link text-link-light" href="<?php echo esc_url( fairways_get( 'fw_events_link_url', get_post_type_archive_link( 'fw_event' ) ?: '#events' ) ); ?>"><?php echo esc_html( fairways_get( 'fw_events_link_text', 'XEM TẤT CẢ' ) ); ?></a>
        </div>
        <div class="carousel events-carousel" data-carousel>
            <button class="carousel-arrow carousel-prev" type="button" aria-label="Sự kiện trước"></button>
            <div class="carousel-track">
                <?php foreach ( $event_items as $e ) : ?>
                    <article class="carousel-slide event-card" style="--event-image:url('<?php echo esc_url( $e['image'] ); ?>');">
                        <div class="event-card-inner">
                            <div class="event-info">
                                <h3><?php echo esc_html( $e['title'] ); ?></h3>
                                <p><?php echo esc_html( $e['text'] ); ?></p>
                                <div class="event-meta">
                                    <span>NGÀY TỔ CHỨC</span>
                                    <?php if ( $e['date'] ) : ?><span><?php echo esc_html( $e['date'] ); ?></span><?php endif; ?>
                                    <?php if ( $e['time'] ) : ?><i></i><span><?php echo esc_html( $e['time'] ); ?></span><?php endif; ?>
                                </div>
                            </div>
                            <a class="button button-light" href="<?php echo esc_url( $e['url'] ); ?>"><?php echo esc_html( $e['button'] ); ?></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <button class="carousel-arrow carousel-next" type="button" aria-label="Sự kiện sau"></button>
        </div>
    </section>

    <!-- ===== Dịch vụ chính ===== -->
    <section class="main-services" id="main-services">
        <div class="section-head">
            <h2><?php echo esc_html( fairways_get( 'fw_main_services_title', 'Dịch vụ chính' ) ); ?></h2>
            <p><?php echo esc_html( fairways_get( 'fw_main_services_desc', $demo_text ) ); ?></p>
        </div>
        <div class="main-services-grid">
            <?php
            $service_titles = array( '3D Golf Simulator', 'Club House ( Food and Beverage )', 'Golf Fitness & Swimming Pool' );
            for ( $i = 1; $i <= 3; $i++ ) :
                $s_image = fairways_field_image_url( 'fw_main_service_' . $i . '_image', $demo_images[ $i - 1 ] );
                $s_title = fairways_get( 'fw_main_service_' . $i . '_title', $service_titles[ $i - 1 ] );
                $s_url   = fairways_get( 'fw_main_service_' . $i . '_url', '#contact' );
            ?>
                <a class="main-service-card<?php echo $i > 1 ? ' is-mono' : ''; ?>" href="<?php echo esc_url( $s_url ); ?>">
                    <span class="main-service-bg" style="background-image:url('<?php echo esc_url( $s_image ); ?>');"></span>
                    <span class="main-service-body">
                        <strong><?php echo esc_html( $s_title ); ?></strong>
                        <?php if ( $i === 1 ) : ?><em class="button button-outline">XEM THÊM</em><?php endif; ?>
                    </span>
                </a>
            <?php endfor; ?>
        </div>
    </section>

    <!-- ===== Khuyến mãi ===== -->
    <section class="offers-section" id="offers">
        <div class="offers-head">
            <div>
                <h2><?php echo esc_html( fairways_get( 'fw_offers_title', 'Khuyến mãi' ) ); ?></h2>
                <p><?php echo esc_html( fairways_get( 'fw_offers_desc', 'Xem các khuyến mãi nổi bật trong tháng.' ) ); ?></p>
            </div>
            <a class="text-link" href="<?php echo esc_url( fairways_get( 'fw_offers_link_url', get_post_type_archive_link( 'fw_offer' ) ?: '#offers' ) ); ?>"><?php echo esc_html( fairways_get( 'fw_offers_link_text', 'XEM TẤT CẢ' ) ); ?></a>
        </div>
        <div class="carousel offers-carousel" data-carousel>
            <button class="carousel-arrow carousel-prev" type="button" aria-label="Khuyến mãi trước"></button>
            <div class="carousel-track">
                <?php foreach ( $offer_items as $o ) : ?>
                    <article class="carousel-slide offer-card" style="--offer-image:url('<?php echo esc_url( $o['image'] ); ?>');">
                        <div class="offer-card-inner">
                            <h3><?php echo esc_html( $o['title'] ); ?></h3>
                            <p><?php echo esc_html( $o['text'] ); ?></p>
                            <a class="button button-outline" href="<?php echo esc_url( $o['url'] ); ?>"><?php echo esc_html( $o['button'] ); ?></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <button class="carousel-arrow carousel-next" type="button" aria-label="Khuyến mãi sau"></button>
        </div>
    </section>

    <!-- ===== Gói hội viên ===== -->
    <section class="membership-section" id="membership">
        <div class="membership-inner">
            <div class="membership-copy">
                <h2><?php echo esc_html( fairways_get( 'fw_membership_title', 'Gói hội viên' ) ); ?></h2>
                <p><?php echo esc_html( fairways_get( 'fw_membership_desc', $demo_text ) ); ?></p>
                <a class="text-link" href="<?php echo esc_url( fairways_get( 'fw_membership_link_url', '#membership' ) ); ?>"><?php echo esc_html( fairways_get( 'fw_membership_link_text', 'XEM THÊM' ) ); ?></a>
            </div>
            <div class="membership-cards">
                <?php for ( $i = 1; $i <= 2; $i++ ) :
                    $m_image = fairways_field_image_url( 'fw_member_' . $i . '_image', '' );
                    $m_label = fairways_get( 'fw_member_' . $i . '_label', $member_defaults[ $i - 1 ] );
                    $m_url   = fairways_get( 'fw_member_' . $i . '_url', '#contact' );
                ?>
                    <a class="member-card member-card-<?php echo (int) $i; ?>" href="<?php echo esc_url( $m_url ); ?>">
                        <?php if ( $m_image ) : ?>
                            <img src="<?php echo esc_url( $m_image ); ?>" alt="<?php echo esc_attr( $m_label ); ?>" loading="lazy">
                        <?php else : ?>
                            <span class="member-card-face"><small>★ ★ ★</small><?php echo esc_html( strtoupper( $m_label ) ); ?></span>
                        <?php endif; ?>
                        <span class="member-card-label"><?php echo esc_html( $m_label ); ?></span>
                    </a>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- ===== Đánh giá khách hàng ===== -->
    <?php $testimonial_bg = fairways_field_image_url( 'fw_testimonial_bg', $demo_images[0] ); ?>
    <section class="testimonial-section" style="--testimonial-image:url('<?php echo esc_url( $testimonial_bg ); ?>');">
        <div class="testimonial-inner">
            <span class="quote-mark" aria-hidden="true">&ldquo;</span>
            <blockquote><?php echo esc_html( fairways_get( 'fw_testimonial_quote', "Who said golf has to be punishing. We've included some thoughtful touches to make the game a breeze. A soft grip and feel to play all your rounds in comfort. A slim, lightweight, durable bag for easy carrying. Plus, these clubs are plain sleek and beautiful. You'll be the envy of the course." ) ); ?></blockquote>
            <p class="testimonial-author"><i></i><?php echo esc_html( fairways_get( 'fw_testimonial_author', 'Nguyen Anh Hong' ) ); ?>, <?php echo esc_html( fairways_get( 'fw_testimonial_role', 'Entrepreneur' ) ); ?></p>
        </div>
    </section>

    <!-- ===== Tin tức ===== -->
    <section class="news-section" id="news">
        <div class="section-head">
            <h2><?php echo esc_html( fairways_get( 'fw_news_title', 'Tin tức' ) ); ?></h2>
            <p><?php echo esc_html( fairways_get( 'fw_news_desc', $demo_text ) ); ?></p>
            <a class="text-link" href="<?php echo esc_url( fairways_get( 'fw_news_link_url', get_permalink( get_option( 'page_for_posts' ) ) ?: '#news' ) ); ?>"><?php echo esc_html( fairways_get( 'fw_news_link_text', 'XEM TẤT CẢ' ) ); ?></a>
        </div>
        <div class="news-grid">
            <div class="news-main">
                <a class="news-featured" href="<?php echo esc_url( $news_featured['url'] ); ?>" style="--news-image:url('<?php echo esc_url( $news_featured['image'] ); ?>');">
                    <span class="news-featured-body">
                        <strong><?php echo esc_html( $news_featured['title'] ); ?></strong>
                        <?php if ( $news_featured['cat'] ) : ?><small><?php echo esc_html( $news_featured['cat'] ); ?></small><?php endif; ?>
                        <span><?php echo esc_html( $news_featured['text'] ); ?></span>
                    </span>
                </a>
                <?php if ( $news_links ) : ?>
                    <ul class="news-links">
                        <?php foreach ( $news_links as $n ) : ?>
                            <li><a href="<?php echo esc_url( $n['url'] ); ?>"><?php echo esc_html( $n['title'] ); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <?php if ( $news_side ) : ?>
                <div class="news-side">
                    <?php foreach ( $news_side as $n ) : ?>
                        <a class="news-item" href="<?php echo esc_url( $n['url'] ); ?>">
                            <span class="news-thumb" style="background-image:url('<?php echo esc_url( $n['image'] ); ?>');"></span>
                            <span class="news-item-body">
                                <strong><?php echo esc_html( $n['title'] ); ?></strong>
                                <?php if ( $n['cat'] ) : ?><small><?php echo esc_html( $n['cat'] ); ?></small><?php endif; ?>
                                <span><?php echo esc_html( $n['text'] ); ?></span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="contact-strip" id="contact">
        <div>
            <p class="eyebrow"><?php echo esc_html( get_field( 'fw_cta_eyebrow' ) ?: 'LET’S PLAY' ); ?></p>
            <h2><?php echo esc_html( get_field( 'fw_cta_title' ) ?: 'Sẵn sàng cho buổi tập tiếp theo?' ); ?></h2>
        </div>
        <a class="button button-dark" href="<?php echo esc_url( get_field( 'fw_cta_button_url' ) ?: 'mailto:hello@fairways.example' ); ?>"><?php echo esc_html( get_field( 'fw_cta_button_text' ) ?: 'LIÊN HỆ ĐẶT LỊCH' ); ?></a>
    </section>
</main>
<?php get_footer(); ?>
