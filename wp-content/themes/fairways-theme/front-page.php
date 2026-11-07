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

    <section class="below-section" id="events">
        <p class="eyebrow">EXPERIENCE MORE</p>
        <h2>Trải nghiệm Golf theo cách của bạn</h2>
        <p>Tập luyện, thư giãn và kết nối trong không gian golf hiện đại.</p>
        <div class="below-links"><a href="#membership">Gói hội viên</a><a href="#offers">Ưu đãi mới nhất</a><a href="#news">Tin tức & sự kiện</a></div>
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
