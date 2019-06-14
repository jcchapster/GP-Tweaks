<?php

function gptweaks_typography_settings( $wp_customize ) {


    // Section for customizer controls
    $wp_customize->add_section( 'gptweaks_typography_settings_section', array(
        'title'      => __( 'Typography Settings', 'text-domain' ),
		'priority' => 30,
		'panel'=>'gptweaks',
    ) );

    // Menu Font Size(s) Setting
    $wp_customize->add_setting( 'gptweaks_menu_fontsize_setting', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	// Dropdown selector for Menu Font Sizes Control
	$wp_customize->add_control( 'gptweaks_menu_fontsize_setting', array(
	'settings' => 'gptweaks_menu_fontsize_setting',
	'section' => 'gptweaks_typography_settings_section',
	'label' => __( 'Menu Font Size' ),
	'type'    => 'select',
    'choices' => array(
        '13px' =>  '13 px',
		    '14px' =>  '14 px (Default)',
        '15px' =>  '15 px',
        '16px' =>  '16 px',
        '17px' =>  '17 px',
        '18px' =>  '18 px',
        '19px' =>  '19 px',
        '20px' =>  '20 px',
        '21px' =>  '21 px',
        '22px' =>  '22 px',
        '23px' =>  '23 px',
        '24px' =>  '24 px',
        '25px' =>  '25 px',

    ) ) );

    // Menu Normal or Bold Setting
    $wp_customize->add_setting( 'gptweaks_menu_normal_or_bold_setting', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	// Dropdown selector for Menu Font Sizes Control
	$wp_customize->add_control( 'gptweaks_menu_normal_or_bold_setting', array(
	'settings' => 'gptweaks_menu_normal_or_bold_setting',
	'section' => 'gptweaks_typography_settings_section',
	'label' => __( 'Menu Normal/Bold' ),
	'type'    => 'select',
    'choices' => array(
        'normal' =>  'Normal (default)',
		    'bold' =>  'Bold',

  ) ) );

    // Menu Text Transform
    $wp_customize->add_setting( 'gptweaks_menu_text_transform_setting', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	// Dropdown selector for Menu Text Transform Control
	$wp_customize->add_control( 'gptweaks_menu_text_transform_setting', array(
	'settings' => 'gptweaks_menu_text_transform_setting',
	'section' => 'gptweaks_typography_settings_section',
	'label' => __( 'Menu Text Transform' ),
	'type'    => 'select',
    'choices' => array(
        'none' =>  'None (default)',
        'capitalize' => 'Capitalize First Letter',
        'uppercase' => 'ALL UPPERCASE',
        'lowercase' => 'all lowercase',

  ) ) );

  }

  add_action( 'customize_register', 'gptweaks_typography_settings' );

    // Action on selected settings

    function gptweaks_typography_settings_apply() {

    	$menu_fontsize_selected = get_theme_mod( 'gptweaks_menu_fontsize_setting' );
            ?>
    		<style type="text/css">
    			.main-navigation a, .main-navigation .main-nav ul ul li a {
    				font-size: <?php echo $menu_fontsize_selected; ?>;
    			}
    		</style>


        <?php

    	$menu_fontweight_selected = get_theme_mod( 'gptweaks_menu_normal_or_bold_setting' );
            ?>
    		<style type="text/css">
    			.main-navigation a, .main-navigation .main-nav ul ul li a {
    				font-weight: <?php echo $menu_fontweight_selected; ?>;
    			}
    		</style>

        <?php
      	$menu_text_transform_selected = get_theme_mod( 'gptweaks_menu_text_transform_setting' );
            ?>
    		<style type="text/css">
    			.main-navigation a, .main-navigation .main-nav ul ul li a {
    				text-transform: <?php echo $menu_text_transform_selected; ?>;
    			}
    		</style>

        <?php

      }

add_action( 'wp_head', 'gptweaks_typography_settings_apply' );
