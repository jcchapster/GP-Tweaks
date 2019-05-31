<?php

// Header settings


function gptweaks_header_color( $wp_customize ) {

   // Section for customizer controls
    $wp_customize->add_section( 'gptweaks_header_section' , array(
        'title'      => __( 'Header Settings', 'text-domain' ),
		'priority' => 30,
		'panel'=>'gptweaks',
    ) );

    // Header Color
    $wp_customize->add_setting( 'gptweaks_header_color' , array(
        'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Add color picker control for Header
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gptweaks_header_color', array(
	'label' => 'Header Color',
	'section' => 'gptweaks_header_section',
	'settings' => 'gptweaks_header_color',
	) ) );


}
add_action( 'customize_register', 'gptweaks_header_color' );


function gptweaks_header_color_apply() {
	$gptweaks_header_color = get_theme_mod( 'gptweaks_header_color' );


	?>
		<style type="text/css">
			.site-header {
				background-color: <?php echo $gptweaks_header_color; ?>;
			}
		</style>
	<?php

}
add_action( 'wp_head', 'gptweaks_header_color_apply' );
