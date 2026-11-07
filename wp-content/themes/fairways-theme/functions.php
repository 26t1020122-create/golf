<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function fairways_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    register_nav_menus( array( 'primary' => __( 'Primary Menu', 'fairways' ) ) );
}
add_action( 'after_setup_theme', 'fairways_theme_setup' );

function fairways_enqueue_assets() {
    wp_enqueue_style( 'fairways-home', get_template_directory_uri() . '/assets/css/home.css', array(), '1.1.0' );
    wp_enqueue_script( 'fairways-home', get_template_directory_uri() . '/assets/js/home.js', array(), '1.1.0', true );
    wp_enqueue_script( 'fairways-carousel', get_template_directory_uri() . '/assets/js/carousel.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'fairways_enqueue_assets' );

/**
 * Homepage fields are registered in code so they work with ACF Free.
 * Install and activate the Advanced Custom Fields plugin to edit them.
 */
function fairways_register_homepage_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key' => 'group_fairways_homepage',
        'title' => 'Fairways - Nội dung Homepage',
        'fields' => array(
            array(
                'key' => 'field_fw_tab_hero', 'label' => '01. Hero Banner', 'type' => 'tab',
                'placement' => 'top', 'endpoint' => 0,
            ),
            array(
                'key' => 'field_fw_hero_image', 'label' => 'Ảnh nền Hero', 'name' => 'fw_hero_image',
                'type' => 'image', 'return_format' => 'array', 'preview_size' => 'large', 'library' => 'all',
                'instructions' => 'Nên dùng ảnh ngang, độ phân giải lớn (khoảng 1920 x 1000 px).',
            ),
            array(
                'key' => 'field_fw_hero_description', 'label' => 'Mô tả Hero', 'name' => 'fw_hero_description',
                'type' => 'textarea', 'rows' => 3, 'new_lines' => 'br',
                'default_value' => 'FairWay Golf Lounge - nơi luyện tập và giải trí Golf sang trọng và đẳng cấp bậc nhất Việt Nam.',
            ),
            array(
                'key' => 'field_fw_hero_button_text', 'label' => 'Chữ nút Hero', 'name' => 'fw_hero_button_text',
                'type' => 'text', 'default_value' => 'ĐẶT LỊCH NGAY',
            ),
            array(
                'key' => 'field_fw_hero_button_url', 'label' => 'Đường dẫn nút Hero', 'name' => 'fw_hero_button_url',
                'type' => 'url',
            ),

            array(
                'key' => 'field_fw_tab_about', 'label' => '02. Giới thiệu', 'type' => 'tab',
                'placement' => 'top', 'endpoint' => 0,
            ),
            array(
                'key' => 'field_fw_about_eyebrow', 'label' => 'Dòng chữ nhỏ', 'name' => 'fw_about_eyebrow',
                'type' => 'text', 'default_value' => 'WELCOME TO FAIRWAYS',
            ),
            array(
                'key' => 'field_fw_about_title', 'label' => 'Tiêu đề', 'name' => 'fw_about_title',
                'type' => 'text', 'default_value' => 'Về chúng tôi',
            ),
            array(
                'key' => 'field_fw_about_description', 'label' => 'Nội dung giới thiệu', 'name' => 'fw_about_description',
                'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'basic', 'media_upload' => 0,
            ),
            array(
                'key' => 'field_fw_about_link_text', 'label' => 'Chữ liên kết', 'name' => 'fw_about_link_text',
                'type' => 'text', 'default_value' => 'XEM THÊM',
            ),
            array(
                'key' => 'field_fw_about_link_url', 'label' => 'Đường dẫn liên kết', 'name' => 'fw_about_link_url',
                'type' => 'url',
            ),

            array(
                'key' => 'field_fw_tab_services', 'label' => '03. Dịch vụ nổi bật', 'type' => 'tab',
                'placement' => 'top', 'endpoint' => 0,
            ),
            array(
                'key' => 'field_fw_services_eyebrow', 'label' => 'Dòng chữ nhỏ', 'name' => 'fw_services_eyebrow',
                'type' => 'text', 'default_value' => 'DISCOVER',
            ),
            array(
                'key' => 'field_fw_services_title', 'label' => 'Tiêu đề thẻ dịch vụ', 'name' => 'fw_services_title',
                'type' => 'text', 'default_value' => 'Các dịch vụ nổi bật',
            ),
            array(
                'key' => 'field_fw_service_1_image', 'label' => 'Ảnh dịch vụ 1', 'name' => 'fw_service_1_image',
                'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'library' => 'all',
            ),
            array(
                'key' => 'field_fw_service_1_title', 'label' => 'Tiêu đề dịch vụ 1', 'name' => 'fw_service_1_title',
                'type' => 'text', 'default_value' => 'Sân tập golf',
            ),
            array(
                'key' => 'field_fw_service_1_description', 'label' => 'Mô tả dịch vụ 1', 'name' => 'fw_service_1_description',
                'type' => 'textarea', 'rows' => 3,
            ),
            array(
                'key' => 'field_fw_service_1_url', 'label' => 'Link dịch vụ 1', 'name' => 'fw_service_1_url',
                'type' => 'url',
            ),
            array(
                'key' => 'field_fw_service_2_image', 'label' => 'Ảnh dịch vụ 2', 'name' => 'fw_service_2_image',
                'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'library' => 'all',
            ),
            array(
                'key' => 'field_fw_service_2_title', 'label' => 'Tiêu đề dịch vụ 2', 'name' => 'fw_service_2_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_fw_service_2_description', 'label' => 'Mô tả dịch vụ 2', 'name' => 'fw_service_2_description',
                'type' => 'textarea', 'rows' => 3,
            ),
            array(
                'key' => 'field_fw_service_2_url', 'label' => 'Link dịch vụ 2', 'name' => 'fw_service_2_url',
                'type' => 'url',
            ),
            array(
                'key' => 'field_fw_service_3_image', 'label' => 'Ảnh dịch vụ 3', 'name' => 'fw_service_3_image',
                'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'library' => 'all',
            ),
            array(
                'key' => 'field_fw_service_3_title', 'label' => 'Tiêu đề dịch vụ 3', 'name' => 'fw_service_3_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_fw_service_3_description', 'label' => 'Mô tả dịch vụ 3', 'name' => 'fw_service_3_description',
                'type' => 'textarea', 'rows' => 3,
            ),
            array(
                'key' => 'field_fw_service_3_url', 'label' => 'Link dịch vụ 3', 'name' => 'fw_service_3_url',
                'type' => 'url',
            ),

            array(
                'key' => 'field_fw_tab_cta', 'label' => '04. Liên hệ cuối trang', 'type' => 'tab',
                'placement' => 'top', 'endpoint' => 0,
            ),
            array(
                'key' => 'field_fw_cta_eyebrow', 'label' => 'Dòng chữ nhỏ', 'name' => 'fw_cta_eyebrow',
                'type' => 'text', 'default_value' => 'LET’S PLAY',
            ),
            array(
                'key' => 'field_fw_cta_title', 'label' => 'Tiêu đề liên hệ', 'name' => 'fw_cta_title',
                'type' => 'text', 'default_value' => 'Sẵn sàng cho buổi tập tiếp theo?',
            ),
            array(
                'key' => 'field_fw_cta_button_text', 'label' => 'Chữ nút liên hệ', 'name' => 'fw_cta_button_text',
                'type' => 'text', 'default_value' => 'LIÊN HỆ ĐẶT LỊCH',
            ),
            array(
                'key' => 'field_fw_cta_button_url', 'label' => 'Link nút liên hệ', 'name' => 'fw_cta_button_url',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array( 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
        'show_in_rest' => 0,
    ) );
}
add_action( 'acf/init', 'fairways_register_homepage_fields' );

/**
 * Get an ACF value with a fallback (safe when ACF is not active).
 */
function fairways_get( $name, $default = '' ) {
    $value = function_exists( 'get_field' ) ? get_field( $name ) : '';
    return $value ? $value : $default;
}

/**
 * Custom post types: Sự kiện (events) and Khuyến mãi (offers).
 * After activating the theme, go to Settings > Permalinks and click Save once.
 */
function fairways_register_post_types() {
    register_post_type( 'fw_event', array(
        'labels' => array(
            'name' => 'Sự kiện', 'singular_name' => 'Sự kiện', 'menu_name' => 'Sự kiện',
            'add_new_item' => 'Thêm sự kiện', 'edit_item' => 'Sửa sự kiện', 'all_items' => 'Tất cả sự kiện',
        ),
        'public' => true, 'has_archive' => true, 'show_in_rest' => true,
        'menu_icon' => 'dashicons-calendar-alt', 'menu_position' => 5,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'rewrite' => array( 'slug' => 'su-kien' ),
    ) );

    register_post_type( 'fw_offer', array(
        'labels' => array(
            'name' => 'Khuyến mãi', 'singular_name' => 'Khuyến mãi', 'menu_name' => 'Khuyến mãi',
            'add_new_item' => 'Thêm khuyến mãi', 'edit_item' => 'Sửa khuyến mãi', 'all_items' => 'Tất cả khuyến mãi',
        ),
        'public' => true, 'has_archive' => true, 'show_in_rest' => true,
        'menu_icon' => 'dashicons-tag', 'menu_position' => 6,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'rewrite' => array( 'slug' => 'khuyen-mai' ),
    ) );
}
add_action( 'init', 'fairways_register_post_types' );

/**
 * ACF fields for the new homepage sections + the Event / Offer post types.
 */
function fairways_register_more_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    $tab = function ( $slug, $label ) {
        return array( 'key' => 'field_fw_tab_' . $slug, 'label' => $label, 'type' => 'tab', 'placement' => 'top', 'endpoint' => 0 );
    };
    $field = function ( $name, $label, $type = 'text', $default = '', $extra = array() ) {
        return array_merge( array(
            'key' => 'field_' . $name, 'label' => $label, 'name' => $name, 'type' => $type, 'default_value' => $default,
        ), $extra );
    };
    $image = function ( $name, $label, $instructions = '' ) {
        return array(
            'key' => 'field_' . $name, 'label' => $label, 'name' => $name, 'type' => 'image',
            'return_format' => 'array', 'preview_size' => 'medium', 'library' => 'all', 'instructions' => $instructions,
        );
    };
    $head = function ( $slug, $title ) use ( $field ) {
        return array(
            $field( 'fw_' . $slug . '_title', 'Tiêu đề section', 'text', $title ),
            $field( 'fw_' . $slug . '_desc', 'Mô tả ngắn', 'textarea', "Who said golf has to be punishing. We've included some thoughtful touches to make the game a breeze.", array( 'rows' => 3 ) ),
            $field( 'fw_' . $slug . '_link_text', 'Chữ liên kết', 'text', 'XEM TẤT CẢ' ),
            $field( 'fw_' . $slug . '_link_url', 'Đường dẫn liên kết', 'url' ),
        );
    };

    $fields = array();
    $fields[] = $tab( 'events', '05. Sự kiện nổi bật' );
    $fields   = array_merge( $fields, $head( 'events', 'Sự kiện nổi bật' ) );

    $fields[] = $tab( 'main_services', '06. Dịch vụ chính' );
    $fields[] = $field( 'fw_main_services_title', 'Tiêu đề section', 'text', 'Dịch vụ chính' );
    $fields[] = $field( 'fw_main_services_desc', 'Mô tả ngắn', 'textarea', "Who said golf has to be punishing. We've included some thoughtful touches to make the game a breeze.", array( 'rows' => 3 ) );
    $service_defaults = array( '3D Golf Simulator', 'Club House ( Food and Beverage )', 'Golf Fitness & Swimming Pool' );
    for ( $i = 1; $i <= 3; $i++ ) {
        $fields[] = $image( 'fw_main_service_' . $i . '_image', 'Ảnh dịch vụ ' . $i );
        $fields[] = $field( 'fw_main_service_' . $i . '_title', 'Tên dịch vụ ' . $i, 'text', $service_defaults[ $i - 1 ] );
        $fields[] = $field( 'fw_main_service_' . $i . '_url', 'Link dịch vụ ' . $i, 'url' );
    }

    $fields[] = $tab( 'offers', '07. Khuyến mãi' );
    $fields   = array_merge( $fields, $head( 'offers', 'Khuyến mãi' ) );
    $fields[] = $field( 'fw_offers_hint', 'Lưu ý', 'message', '', array(
        'message' => 'Các thẻ khuyến mãi lấy từ menu "Khuyến mãi" ở thanh quản trị (mỗi bài viết = 1 thẻ).',
    ) );

    $fields[] = $tab( 'membership', '08. Gói hội viên' );
    $fields   = array_merge( $fields, $head( 'membership', 'Gói hội viên' ) );
    $member_defaults = array( 'VIP membership', 'Regular membership' );
    for ( $i = 1; $i <= 2; $i++ ) {
        $fields[] = $image( 'fw_member_' . $i . '_image', 'Ảnh thẻ hội viên ' . $i, 'Ảnh thẻ nằm giữa khung. Để trống sẽ hiển thị thẻ mẫu.' );
        $fields[] = $field( 'fw_member_' . $i . '_label', 'Tên gói ' . $i, 'text', $member_defaults[ $i - 1 ] );
        $fields[] = $field( 'fw_member_' . $i . '_url', 'Link gói ' . $i, 'url' );
    }

    $fields[] = $tab( 'testimonial', '09. Đánh giá khách hàng' );
    $fields[] = $image( 'fw_testimonial_bg', 'Ảnh nền' );
    $fields[] = $field( 'fw_testimonial_quote', 'Nội dung đánh giá', 'textarea', "Who said golf has to be punishing. We've included some thoughtful touches to make the game a breeze. A soft grip and feel to play all your rounds in comfort. A slim, lightweight, durable bag for easy carrying. Plus, these clubs are plain sleek and beautiful. You'll be the envy of the course.", array( 'rows' => 5 ) );
    $fields[] = $field( 'fw_testimonial_author', 'Tên khách hàng', 'text', 'Nguyen Anh Hong' );
    $fields[] = $field( 'fw_testimonial_role', 'Chức danh', 'text', 'Entrepreneur' );

    $fields[] = $tab( 'news', '10. Tin tức' );
    $fields   = array_merge( $fields, $head( 'news', 'Tin tức' ) );
    $fields[] = $field( 'fw_news_hint', 'Lưu ý', 'message', '', array(
        'message' => 'Tin tức lấy tự động từ 7 bài viết (Posts) mới nhất: 1 bài nổi bật, 4 bài bên phải, 2 bài dạng liên kết.',
    ) );

    acf_add_local_field_group( array(
        'key' => 'group_fairways_homepage_more',
        'title' => 'Fairways - Homepage (phần tiếp theo)',
        'fields' => $fields,
        'location' => array( array( array( 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ) ) ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
        'show_in_rest' => 0,
    ) );

    acf_add_local_field_group( array(
        'key' => 'group_fairways_event',
        'title' => 'Thông tin sự kiện',
        'fields' => array(
            $field( 'fw_event_date', 'Ngày tổ chức', 'date_picker', '', array( 'display_format' => 'd/m/Y', 'return_format' => 'd/m/y', 'first_day' => 1 ) ),
            $field( 'fw_event_time', 'Giờ bắt đầu', 'text', '08:00 AM' ),
            $field( 'fw_event_button_text', 'Chữ nút', 'text', 'ĐĂNG KÝ NGAY' ),
            $field( 'fw_event_url', 'Link đăng ký', 'url' ),
        ),
        'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'fw_event' ) ) ),
        'active' => true,
    ) );

    acf_add_local_field_group( array(
        'key' => 'group_fairways_offer',
        'title' => 'Thông tin khuyến mãi',
        'fields' => array(
            $field( 'fw_offer_button_text', 'Chữ nút', 'text', 'ĐĂNG KÝ NGAY' ),
            $field( 'fw_offer_url', 'Link đăng ký', 'url' ),
        ),
        'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'fw_offer' ) ) ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'fairways_register_more_fields' );
