<?php
function lateterm_setup() {
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_editor_style( 'style.css' );
    add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'lateterm_setup' );

function lateterm_enqueue_styles() {
    $stylesheet = get_stylesheet_directory() . '/style.css';
    $version    = file_exists( $stylesheet ) ? filemtime( $stylesheet ) : false;
    wp_enqueue_style( 'lateterm-style', get_stylesheet_uri(), array(), $version );
}
add_action( 'wp_enqueue_scripts', 'lateterm_enqueue_styles' );

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
        'sanitize_callback' => 'lateterm_sanitize_font_family',
    ) );
    $wp_customize->add_control( 'lateterm_font_family', array(
        'label'   => __( 'Font Family', 'lateterm' ),
        'section' => 'lateterm_options',
        'type'    => 'text',
    ) );
    
    // FONT SIZE
    $wp_customize->add_setting( 'lateterm_font_size', array(
        'default'           => '18px',
        'sanitize_callback' => 'lateterm_sanitize_css_length',
    ) );
    $wp_customize->add_control( 'lateterm_font_size', array(
        'label'   => __( 'Font Size', 'lateterm' ),
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
        'sanitize_callback' => 'lateterm_sanitize_css_length',
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

// Restrict font-family to a comma-separated list of family names / generic keywords.
// Strips anything that could break out of a CSS declaration ({}();/\ etc).
function lateterm_sanitize_font_family( $value ) {
    $value = (string) $value;
    if ( ! preg_match( '/^[A-Za-z0-9 ,_\'"\-]+$/', $value ) ) {
        return 'monospace';
    }
    return $value;
}

// Restrict CSS length values to <number><unit>, e.g. 18px, 1.5rem, 70em, 100%.
function lateterm_sanitize_css_length( $value ) {
    $value = trim( (string) $value );
    if ( ! preg_match( '/^\d+(?:\.\d+)?(?:px|em|rem|%|vh|vw|pt)$/', $value ) ) {
        return '';
    }
    return $value;
}

// Pass Customizer values into the block editor
function lateterm_editor_customizer_styles() {
    $bg_color    = esc_attr( get_theme_mod( 'lateterm_bg_color', '#000084' ) );
    $font_color  = esc_attr( get_theme_mod( 'lateterm_font_color', '#ffffff' ) );
    $font_family = esc_attr( get_theme_mod( 'lateterm_font_family', 'monospace' ) );
    $font_size   = esc_attr( get_theme_mod( 'lateterm_font_size', '18px' ) );
    $max_width   = esc_attr( get_theme_mod( 'lateterm_max_width', '70em' ) );

    $css = "
        .editor-styles-wrapper {
            background-color: {$bg_color} !important;
            color: {$font_color} !important;
            font-family: {$font_family} !important;
            font-size: {$font_size} !important;
        }
        .editor-styles-wrapper a {
            color: {$font_color} !important;
        }
        .editor-styles-wrapper h1,
        .editor-styles-wrapper h2,
        .editor-styles-wrapper h3,
        .editor-styles-wrapper h4,
        .editor-styles-wrapper h5,
        .editor-styles-wrapper h6 {
            color: {$font_color} !important;
        }
        .editor-styles-wrapper .wp-block {
            max-width: {$max_width};
        }
    ";

    wp_register_style( 'lateterm-editor-customizer', false );
    wp_enqueue_style( 'lateterm-editor-customizer' );
    wp_add_inline_style( 'lateterm-editor-customizer', $css );
}
add_action( 'enqueue_block_editor_assets', 'lateterm_editor_customizer_styles' );

// Add id attributes to content headers for anchor links
function lateterm_add_header_ids( $content ) {
    if ( is_feed() ) {
        return $content;
    }
    $used = array();
    return preg_replace_callback(
        '/<(h[1-6])([^>]*)>(.*?)<\/\1>/i',
        function ( $matches ) use ( &$used ) {
            $tag   = $matches[1];
            $attrs = $matches[2];
            $text  = $matches[3];
            // Skip if id already exists (only match a real id attribute, not e.g. grid=)
            if ( preg_match( '/(^|\s)id\s*=/i', $attrs ) ) {
                return $matches[0];
            }
            $base = sanitize_title( wp_strip_all_tags( $text ) );
            if ( '' === $base ) {
                return $matches[0];
            }
            $id = $base;
            $i  = 2;
            while ( isset( $used[ $id ] ) ) {
                $id = $base . '-' . $i++;
            }
            $used[ $id ] = true;
            return sprintf( '<%s%s id="%s">%s</%s>', $tag, $attrs, esc_attr( $id ), $text, $tag );
        },
        $content
    );
}
add_filter( 'the_content', 'lateterm_add_header_ids' );

// Inline script: clicking a header updates the URL hash
function lateterm_header_anchor_script() {
    if ( ! is_singular() ) return;
    ?>
    <script>
    document.addEventListener('click', function(e) {
        var h = e.target.closest('h1[id],h2[id],h3[id],h4[id],h5[id],h6[id]');
        if (h && document.querySelector('.main') && document.querySelector('.main').contains(h)) {
            history.replaceState(null, '', '#' + h.id);
            h.scrollIntoView();
        }
    });
    </script>
    <?php
}
add_action( 'wp_footer', 'lateterm_header_anchor_script' );