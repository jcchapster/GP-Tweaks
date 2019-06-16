<?php

// Header settings


function gptweaks_back_to_top( $wp_customize ) {

	// Section for customizer controls
	$wp_customize->add_section(
		'gptweaks_back_to_top_section',
		array(
			'title'    => __( 'Back To Top', 'text-domain' ),
			'priority' => 30,
			'panel'    => 'gptweaks',
		)
	);

	// Back To Top Color Setting
	$wp_customize->add_setting(
		'gptweaks_back_to_top_color',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Back To Top Color Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gptweaks_back_to_top_color',
			array(
				'label'    => 'Back To Top Color',
				'section'  => 'gptweaks_back_to_top_section',
				'settings' => 'gptweaks_back_to_top_color',
			)
		)
	);

	// Back To Top Hover Color Setting
	$wp_customize->add_setting(
		'gptweaks_back_to_top_hover_color',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Back To Top Hover Color Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gptweaks_back_to_top_hover_color',
			array(
				'label'    => 'Back To Top Hover Color',
				'section'  => 'gptweaks_back_to_top_section',
				'settings' => 'gptweaks_back_to_top_hover_color',
			)
		)
	);

	// Back To Top Opacity Setting
	$wp_customize->add_setting(
		'gptweaks_back_to_top_opacity',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	// Back To Top Opacity  Control
	$wp_customize->add_control(
		'gptweaks_back_to_top_opacity',
		array(
			'label'    => __( 'Back To Top Transparency' ),
			'section'  => 'gptweaks_back_to_top_section',
			'settings' => 'gptweaks_back_to_top_opacity',
			'type'     => 'select',
			'choices'  => array(
				'.1' => '.1',
				'.2' => '.2',
				'.3' => '.3',
				'.4' => '.4',
				'.5' => '.5',
				'.6' => '.6',
				'.7' => '.7',
				'.8' => '.8',
				'.9' => '.9',
				'1'  => '1',
			),
		)
	);

}
add_action( 'customize_register', 'gptweaks_back_to_top' );


function gptweaks_back_to_top_color_apply() {

	$back_to_top_opacity = get_theme_mod( 'gptweaks_back_to_top_opacity' );
	$gptweaks_btt_color  = get_theme_mod( 'gptweaks_back_to_top_color' );
	?>

	<style type="text/css">
	.generate-back-to-top, .generate-back-to-top:focus {
		background-color: <?php echo esc_html( $gptweaks_btt_color ); ?>;
		opacity: <?php echo esc_html( $back_to_top_opacity ); ?>!important;
			}
	</style>

	<?php
	$gptweaks_btt_hover_color = get_theme_mod( 'gptweaks_back_to_top_hover_color' );
	?>
		<style type="text/css">
		.generate-back-to-top:hover {
			background-color: <?php echo esc_html( $gptweaks_btt_hover_color ); ?>;
			opacity: <?php echo esc_html( $back_to_top_opacity ); ?>!important;
			}
		</style>

	<?php

}
add_action( 'wp_head', 'gptweaks_back_to_top_color_apply' );
