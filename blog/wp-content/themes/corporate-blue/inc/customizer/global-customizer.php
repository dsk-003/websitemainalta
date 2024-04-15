<?php
/**
 * Global Customizer Options
 *
 * @package corporate_blue
 */

// Add Global section
$wp_customize->add_section( 'corporate_blue_global_section', array(
	'title'             => esc_html__( 'Global Setting','corporate-blue' ),
	'description'       => esc_html__( 'Global Setting Options', 'corporate-blue' ),
	'panel'             => 'corporate_blue_theme_options_panel',
) );

// header sticky setting and control.
$wp_customize->add_setting( 'corporate_blue_theme_options[enable_sticky_header]', array(
	'default'           => corporate_blue_theme_option( 'enable_sticky_header' ),
	'sanitize_callback' => 'corporate_blue_sanitize_switch',
) );

$wp_customize->add_control( new Corporate_Blue_Switch_Control( $wp_customize, 'corporate_blue_theme_options[enable_sticky_header]', array(
	'label'             => esc_html__( 'Make Header Sticky', 'corporate-blue' ),
	'section'           => 'corporate_blue_global_section',
	'on_off_label' 		=> corporate_blue_show_options(),
) ) );

// breadcrumb setting and control.
$wp_customize->add_setting( 'corporate_blue_theme_options[enable_breadcrumb]', array(
	'default'           => corporate_blue_theme_option( 'enable_breadcrumb' ),
	'sanitize_callback' => 'corporate_blue_sanitize_switch',
) );

$wp_customize->add_control( new Corporate_Blue_Switch_Control( $wp_customize, 'corporate_blue_theme_options[enable_breadcrumb]', array(
	'label'             => esc_html__( 'Enable Breadcrumb', 'corporate-blue' ),
	'section'           => 'corporate_blue_global_section',
	'on_off_label' 		=> corporate_blue_show_options(),
) ) );

// site layout setting and control.
$wp_customize->add_setting( 'corporate_blue_theme_options[site_layout]', array(
	'sanitize_callback'   => 'corporate_blue_sanitize_select',
	'default'             => corporate_blue_theme_option('site_layout'),
) );

$wp_customize->add_control(  new Corporate_Blue_Radio_Image_Control ( $wp_customize, 'corporate_blue_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'corporate-blue' ),
	'section'             => 'corporate_blue_global_section',
	'choices'			  => corporate_blue_site_layout(),
) ) );

// loader setting and control.
$wp_customize->add_setting( 'corporate_blue_theme_options[enable_loader]', array(
	'default'           => corporate_blue_theme_option( 'enable_loader' ),
	'sanitize_callback' => 'corporate_blue_sanitize_switch',
) );

$wp_customize->add_control( new Corporate_Blue_Switch_Control( $wp_customize, 'corporate_blue_theme_options[enable_loader]', array(
	'label'             => esc_html__( 'Enable Loader', 'corporate-blue' ),
	'section'           => 'corporate_blue_global_section',
	'on_off_label' 		=> corporate_blue_show_options(),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'corporate_blue_theme_options[loader_type]', array(
	'default'          	=> corporate_blue_theme_option('loader_type'),
	'sanitize_callback' => 'corporate_blue_sanitize_select',
) );

$wp_customize->add_control( 'corporate_blue_theme_options[loader_type]', array(
	'label'             => esc_html__( 'Loader Type', 'corporate-blue' ),
	'section'           => 'corporate_blue_global_section',
	'type'				=> 'select',
	'choices'			=> corporate_blue_get_spinner_list(),
) );
