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
