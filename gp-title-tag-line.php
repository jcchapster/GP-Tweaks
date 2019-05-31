<?php

// Title and Tagline settings

function gptweaks_customize_title_tagline( $wp_customize ) {

	// Create main panel for GP Tweaks
    $wp_customize->add_panel('gptweaks',array(
    'title'=>'GP Tweaks',
    'description'=> 'Additional options to modify settings for the GeneratePress theme.',
    'priority'=> 10,
	));

    // Section for customizer controls
    $wp_customize->add_section( 'gptweaks_title_tagline_section' , array(
        'title'      => __( 'Title / Tagline Settings', 'text-domain' ),
		'priority' => 30,
		'panel'=>'gptweaks',
    ) );

    // Set Title Color
    $wp_customize->add_setting( 'gptweaks_main_site_title_color' , array(
        'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Add color picker control for Title
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_main_site_title', array(
	'label' => 'Site Title Color',
	'section' => 'gptweaks_title_tagline_section',
	'settings' => 'gptweaks_main_site_title_color',
	) ) );

    // Set Tagline Color
    $wp_customize->add_setting( 'gptweaks_tagline_color' , array(
        'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Add color picker control for Tagline
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_tagline_color', array(
	'label' => 'Tagline Color',
	'section' => 'gptweaks_title_tagline_section',
	'settings' => 'gptweaks_tagline_color',
	) ) );

}
add_action( 'customize_register', 'gptweaks_customize_title_tagline' );




function gptweaks_title_color_apply() {
	$gp_title_color = get_theme_mod( 'gptweaks_main_site_title_color' );

		?>
		<style type="text/css">
			.main-title a, .main-title a:hover, .main-title a:visited {
				color: <?php echo $gp_title_color; ?>;
			}
		</style>
	<?php

}
add_action( 'wp_head', 'gptweaks_title_color_apply' );

function gptweaks_tagline_color_apply() {
	$gp_tagline_color = get_theme_mod( 'gptweaks_tagline_color' );

		?>
		<style type="text/css">
			.site-description {
				color: <?php echo $gp_tagline_color; ?>;
			}
		</style>
	<?php

}
add_action( 'wp_head', 'gptweaks_tagline_color_apply' );
