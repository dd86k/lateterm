<?php
function lateterm_customize_theme_options_register( $wp_customize ) {
    // SECTION 1: Theme options
    $wp_customize->add_section( 'lateterm_options', array(
        'title'    => __( 'Theme Options', 'lateterm' ),
        'priority' => 30,
    ) );
    
    // BACKGROUND COLOR
    $wp_customize->add_setting( 'lateterm_bg_color', array(
        'default'           => '#000084',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lateterm_bg_color', array(
        'label'    => __( 'Background Color', 'lateterm' ),
        'section'  => 'lateterm_options',
    ) ) );
    
    // FONT FAMILY
    $wp_customize->add_setting( 'lateterm_font_family', array(
        'default'           => 'monospace',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lateterm_font_family', array(
        'label'   => __( 'Font Family', 'lateterm' ),
        'section' => 'lateterm_options',
        'type'    => 'text',
    ) );
    
    // FONT SIZE
    $wp_customize->add_setting( 'lateterm_font_size', array(
        'default'           => 'monospace',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lateterm_font_size', array(
        'label'   => __( 'Font Family', 'lateterm' ),
        'section' => 'lateterm_options',
        'type'    => 'text',
    ) );
    
    // FONT COLOR
    $wp_customize->add_setting( 'lateterm_font_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lateterm_font_color', array(
        'label'    => __( 'Font Color', 'lateterm' ),
        'section'  => 'lateterm_options',
    ) ) );
    
    // MAX-WIDTH
    $wp_customize->add_setting( 'lateterm_max_width', array(
        'default'           => '70em',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lateterm_max_width', array(
        'label'   => __( 'Content Max Width', 'lateterm' ),
        'section' => 'lateterm_options',
        'type'    => 'text',
    ) );
}
add_action( 'customize_register', 'lateterm_customize_theme_options_register' );

function lateterm_customize_theme_show_register( $wp_customize ) {
    // SECTION 2: Show
    $wp_customize->add_section( 'lateterm_visibility', array(
        'title'    => __( 'Visibility Options', 'lateterm' ),
        'priority' => 31,
    ) );
    
    // Show SEARCH
    $wp_customize->add_setting( 'lateterm_show_search', array(
        'default'           => true,
        'sanitize_callback' => 'lateterm_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'lateterm_show_search', array(
        'label'    => __( 'Show search', 'lateterm' ),
        'section'  => 'lateterm_visibility',
        'type'     => 'checkbox',
    ) );
    
    // LOGIN button
    $wp_customize->add_setting( 'lateterm_show_login_button', array(
        'default'           => true,
        'sanitize_callback' => 'lateterm_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'lateterm_show_login_button', array(
        'label'    => __( 'Show LOGIN button', 'lateterm' ),
        'section'  => 'lateterm_visibility',
        'type'     => 'checkbox',
    ) );
    
    // ATOM FEED button
    $wp_customize->add_setting( 'lateterm_show_atom_button', array(
        'default'           => true,
        'sanitize_callback' => 'lateterm_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'lateterm_show_atom_button', array(
        'label'    => __( 'Show ATOM button', 'lateterm' ),
        'section'  => 'lateterm_visibility',
        'type'     => 'checkbox',
    ) );
    
    // RSS 2.0 FEED button
    $wp_customize->add_setting( 'lateterm_show_rss20_button', array(
        'default'           => true,
        'sanitize_callback' => 'lateterm_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'lateterm_show_rss20_button', array(
        'label'    => __( 'Show RSS 2.0 button', 'lateterm' ),
        'section'  => 'lateterm_visibility',
        'type'     => 'checkbox',
    ) );
    
    // RDF/RSS 1.0 FEED button
    $wp_customize->add_setting( 'lateterm_show_rss10_button', array(
        'default'           => true,
        'sanitize_callback' => 'lateterm_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'lateterm_show_rss10_button', array(
        'label'    => __( 'Show RDF/RSS 1.0 button', 'lateterm' ),
        'section'  => 'lateterm_visibility',
        'type'     => 'checkbox',
    ) );
    
    // RSS 0.92 FEED button
    $wp_customize->add_setting( 'lateterm_show_rss092_button', array(
        'default'           => true,
        'sanitize_callback' => 'lateterm_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'lateterm_show_rss092_button', array(
        'label'    => __( 'Show RSS 0.92 button', 'lateterm' ),
        'section'  => 'lateterm_visibility',
        'type'     => 'checkbox',
    ) );
}
add_action( 'customize_register', 'lateterm_customize_theme_show_register' );

// Sanitization callback for checkboxes
function lateterm_sanitize_checkbox( $checked ) {
    return ( isset( $checked ) && true == $checked ) ? true : false;
}