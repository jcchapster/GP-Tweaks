<?php

// Menu Customizer Settings

function gptweaks_menu_settings( $wp_customize ) {


    // Section for customizer controls
    $wp_customize->add_section( 'gptweaks_menu_settings_section', array(
        'title'      => __( 'Menu Settings', 'text-domain' ),
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
	'section' => 'gptweaks_menu_settings_section',
	'label' => __( 'Menu Font Size.' ),
	'type'    => 'select',
    'choices' => array(
        'default' => 'Set to default.',
		    '14px' =>  '14 px',
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

    // Menu Font Colors(s) Setting
    $wp_customize->add_setting( 'gptweaks_menu_font_color_setting', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Menu Font Colors(s) Control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_menu_font_color_setting', array(
	'settings' => 'gptweaks_menu_font_color_setting',
	'section' => 'gptweaks_menu_settings_section',
	'label' => __( 'Menu Font Colors(s)' ),
	) ) );

    // Full Width Menu Background Color Setting
    $wp_customize->add_setting( 'gptweaks_full_width_menu_setting', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Full Width Menu Background Color Control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_full_width_menu_setting', array(
	'settings' => 'gptweaks_full_width_menu_setting',
	'section' => 'gptweaks_menu_settings_section',
	'label' => __( 'Full Width Menu Background Color' ),
	) ) );

	// Constrained Width Menu Background Setting
    $wp_customize->add_setting( 'gptweaks_constrained_width_menu_setting' , array(
        'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Constrained Width Menu Background Control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_constrained_width_menu_setting', array(
	'label' => 'Contrained Width Menu Background Color',
	'section' => 'gptweaks_menu_settings_section',
	'settings' => 'gptweaks_constrained_width_menu_setting',
	) ) );

  	// Menu Item Color On Hover Setting
    $wp_customize->add_setting( 'gptweaks_menu_item_color_on_hover' , array(
        'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	// Menu Item Color On Hover Control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_menu_item_color_on_hover', array(
	'label' => 'Menu Item Color On Hover',
	'section' => 'gptweaks_menu_settings_section',
	'settings' => 'gptweaks_menu_item_color_on_hover',
	) ) );

	// Menu Item Selected Color
    $wp_customize->add_setting( 'gptweaks_menu_item_selected_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Menu Item Selected Color Control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_menu_item_selected_color', array(
	'settings' => 'gptweaks_menu_item_selected_color',
	'section' => 'gptweaks_menu_settings_section',
	'label' => __( 'Menu Item Selected Color' ),
	) ) );

	// Currently Selected Menu Item Hover Color
    $wp_customize->add_setting( 'gptweaks_menu_item_current_hover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Currently Selected Menu Item Hover Color Control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_menu_item_current_hover_color', array(
	'settings' => 'gptweaks_menu_item_current_hover_color',
	'section' => 'gptweaks_menu_settings_section',
	'label' => __( 'Menu Item Current Hover Color' ),
	) ) );

  // Dropdown Items Color Setting
  $wp_customize->add_setting( 'gptweaks_dropdown_menu_items_color', array(
  'default' => '',
  'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Dropdown Items Color Control
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_dropdown_menu_items_color', array(
  'settings' => 'gptweaks_dropdown_menu_items_color',
  'section' => 'gptweaks_menu_settings_section',
  'label' => __( 'Drop Down Menu Items Color' ),
  ) ) );


  // Dropdown Items Hover Color Setting
    $wp_customize->add_setting( 'gptweaks_dropdown_menu_items_hover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

  // Dropdown Items Hover Color Control
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_dropdown_menu_items_hover_color', array(
  'settings' => 'gptweaks_dropdown_menu_items_hover_color',
  'section' => 'gptweaks_menu_settings_section',
  'label' => __( 'Drop Down Menu Items Hover Color' ),
  ) ) );
}
add_action( 'customize_register', 'gptweaks_menu_settings' );



// Action on selected settings

function gptweaks_menu_settings_apply() {

	$menu_fontsize_selected = get_theme_mod( 'gptweaks_menu_fontsize_setting' );
        ?>
		<style type="text/css">
			.main-navigation a {
				font-size: <?php echo $menu_fontsize_selected; ?>;
			}
		</style>
	<?php
	$menu_item_color_settings = get_theme_mod( 'gptweaks_menu_font_color_setting' );
	?>
		<style type="text/css">
			.main-navigation .main-nav ul li a {
				color: <?php echo $menu_item_color_settings; ?>;
			}
		</style>

	<?php
	$menu_fw_settings = get_theme_mod( 'gptweaks_full_width_menu_setting' );
	?>
		<style type="text/css">
			.main-navigation {
				background-color: <?php echo $menu_fw_settings; ?>;
			}
		</style>
	<?php
	$menu_cw_settings = get_theme_mod( 'gptweaks_constrained_width_menu_setting' );
	?>
		<style type="text/css">
			.inside-navigation {
				background-color: <?php echo $menu_cw_settings; ?>;
			}
		</style>
	<?php
	$menu_item_hover_color = get_theme_mod( 'gptweaks_menu_item_color_on_hover' );
        ?>
		<style type="text/css">
			.main-navigation .main-nav ul li:hover > a, 
            .main-navigation .main-nav ul li:focus > a, 
            .main-navigation .main-nav ul li.sfHover > a {
				background-color: <?php echo $menu_item_hover_color; ?>;
			}
		</style>
	<?php
	$menu_item_selected_color = get_theme_mod( 'gptweaks_menu_item_selected_color' );
        ?>
		<style type="text/css">
			.main-navigation .main-nav ul li[class*="current-menu-"] > a {
				background-color: <?php echo $menu_item_selected_color; ?>;
			}
		</style>
	<?php
	$menu_item_current_hover_color = get_theme_mod( 'gptweaks_menu_item_current_hover_color' );
        ?>
		<style type="text/css">
			.main-navigation .main-nav ul li[class*="current-menu-"] > a:hover {
				background-color: <?php echo $menu_item_current_hover_color; ?>;
			}
		</style>
    <?php
    $menu_items_dropdown_color = get_theme_mod( 'gptweaks_dropdown_menu_items_color' );
          ?>
      <style type="text/css">
        .main-navigation ul ul li {
          background-color: <?php echo $menu_items_dropdown_color; ?>;
        }
      </style>
    <?php
$menu_item_dropdown_hover_color = get_theme_mod( 'gptweaks_dropdown_menu_items_hover_color' );
        ?>
		<style type="text/css">
			.main-navigation .main-nav ul ul li:hover > a, 
            .main-navigation .main-nav ul ul li:focus > a, 
            .main-navigation .main-nav ul ul li.sfHover > a {
				background-color: <?php echo $menu_item_dropdown_hover_color; ?>;
			}
		</style>

	<?php


}

add_action( 'wp_head', 'gptweaks_menu_settings_apply' );
