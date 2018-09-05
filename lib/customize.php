<?php
/**
 *
 * @package gen0
 * @author  Seggido, LLC
 * @license GPL-2.0+
 * @link    seggido.com
 */

add_action( 'customize_register', 'theme_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function theme_customizer_register( $wp_customize ) {

    $wp_customize->add_setting(
        'theme_link_color',
        array(
            'default'           => theme_customizer_get_default_link_color(),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_link_color',
            array(
                'description' => __( 'Change the color of post info links, hover color of linked titles, hover color of menu items, and more.', 'theme' ),
                'label'       => __( 'Link Color', 'theme' ),
                'section'     => 'colors',
                'settings'    => 'theme_link_color',
            )
        )
    );

    $wp_customize->add_setting(
        'theme_accent_color',
        array(
            'default'           => theme_customizer_get_default_accent_color(),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_accent_color',
            array(
                'description' => __( 'Change the default hovers color for button.', 'theme' ),
                'label'       => __( 'Accent Color', 'theme' ),
                'section'     => 'colors',
                'settings'    => 'theme_accent_color',
            )
        )
    );

}
