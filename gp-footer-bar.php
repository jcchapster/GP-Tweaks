<?php

	// Setup for copyright text removal/replacement.
add_action( 'wp', 'gptweaks_remove_copyright' );

function gptweaks_remove_copyright() {
	remove_action( 'generate_credits', 'generate_add_footer_info', $priority = 10 );
}

	// Footer Bar Customizer Settings
function gptweaks_footer_bar( $wp_customize ) {
	// Section for customizer controls
	$wp_customize->add_section(
		'gptweaks_footer_bar_section',
		array(
			'title'    => __( 'Footer Bar', 'text-domain' ),
			'priority' => 30,
			'panel'    => 'gptweaks',
		)
	);

	// Hide (Disable) Footer Bar
	$wp_customize->add_setting(
		'gptweaks_toggle_display_footer_bar',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
);

	// Checkbox for toggle Footer Bar
	$wp_customize->add_control(
		'gptweaks_toggle_display_footer_bar',
		array(
			'type'    => 'checkbox',
			'section' => 'gptweaks_footer_bar_section',
			'label'   => __( 'Hide Footer Bar with CSS.' ),
		)
	);

	// Replacement Footer Bar Text Setting
	$wp_customize->add_setting(
		'gptweaks_replacement_text_footer_bar',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Checkbox control for Replacement Footer Bar Text Setting
	$wp_customize->add_control(
		'gptweaks_replacement_text_footer_bar',
		array(
			'type'        => 'textarea',
			'section'     => 'gptweaks_footer_bar_section',
			'label'       => __( 'Text for Footer Bar' ),
			'description' => __( 'Enter Footer/Copyright Text. HTML and Links are available.' ),
			'input_attrs' => array(
				'placeholder' => __( 'Example: This theme, <B>GeneratePress</B> is available at <A HREF="https://wordpress.org"> Wordpress.org</A>.' ),
			),
		)
	);

	// Footer Bar Color
	$wp_customize->add_setting(
		'gptweaks_footer_bar_color',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add color picker control for Footer Bar
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gptweaks_footer_bar_color',
			array(
				'label'    => 'Footer Bar Color',
				'section'  => 'gptweaks_footer_bar_section',
				'settings' => 'gptweaks_footer_bar_color',
			)
		)
	);

	// Footer Bar Text Color
	$wp_customize->add_setting(
		'gptweaks_footer_bar_text_color',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add color picker control for Footer Bar Text
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gptweaks_footer_bar_text_color',
			array(
				'label'    => 'Footer Bar Text Color',
				'section'  => 'gptweaks_footer_bar_section',
				'settings' => 'gptweaks_footer_bar_text_color',
			)
		)
	);

	// Footer Bar Text Color
	$wp_customize->add_setting(
		'gptweaks_footer_bar_text_color',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add color picker control for Footer Bar Text
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gptweaks_footer_bar_text_color',
			array(
				'label' => 'Footer Bar Text Color',
				'section' => 'gptweaks_footer_bar_section',
				'settings' => 'gptweaks_footer_bar_text_color',
			)
		)
	);

	// Footer Bar Link Text Color
	$wp_customize->add_setting(
		'gptweaks_footer_bar_link_color',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add color picker control for Footer Bar Link Text Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gptweaks_footer_bar_link_color',
			array(
				'label' => 'Footer Bar Link Text Color',
				'section' => 'gptweaks_footer_bar_section',
				'settings' => 'gptweaks_footer_bar_link_color',
			)
		)
	);

	// Footer Bar Visited Link Text Color
	$wp_customize->add_setting(
		'gptweaks_footer_bar_visited_link_color',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add color picker control for Footer Bar Visited Link Text
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gptweaks_footer_bar_visited_link_color',
			array(
				'label'    => 'Footer Bar Visited Link Color',
				'section'  => 'gptweaks_footer_bar_section',
				'settings' => 'gptweaks_footer_bar_visited_link_color',
			)
		)
	);

}
add_action( 'customize_register', 'gptweaks_footer_bar' );


	// Action on selected settings
function gptweaks_footer_bar_options_apply() {

	$gptweaks_footertoggle = get_theme_mod( 'gptweaks_toggle_display_footer_bar' );

	if ( '' !== $gptweaks_footertoggle ) :
		?>
		<style type="text/css">
			.site-info {
				display: none;
			}
		</style>

		<?php
	endif;

	$gptweaks_replacement_text = get_theme_mod( 'gptweaks_replacement_text_footer_bar' );

	if ( '' !== $gptweaks_replacement_text ) :
		add_filter( 'generate_credits', 'echo_replacement_text', $priority = 15 );

		function echo_replacement_text() {
			echo get_theme_mod( 'gptweaks_replacement_text_footer_bar' );
		}
	endif;

	$gptweaks_site_footer_bar_color = get_theme_mod( 'gptweaks_footer_bar_color' );
	?>
	<style type="text/css">
	.site-info {
		background-color: <?php echo esc_html( $gptweaks_site_footer_bar_color ); ?>;
	}
	</style>

	<?php
	$gptweaks_site_footer_bar_text_color = get_theme_mod( 'gptweaks_footer_bar_text_color' );
	?>
	<style type="text/css">
	.site-info{
		color: <?php echo esc_html( $gptweaks_site_footer_bar_text_color ); ?>;
	}
	</style>

	<?php
	$gptweaks_site_footer_bar_link_color = get_theme_mod( 'gptweaks_footer_bar_link_color' );
	?>

	<style type="text/css">
	.site-info a{
		color: <?php echo esc_html( $gptweaks_site_footer_bar_link_color ); ?>;
	}
	</style>

	<?php
	$gptweaks_site_footer_bar_visited_link_color = get_theme_mod( 'gptweaks_footer_bar_visited_link_color' );
	?>

	<style type="text/css">
	.site-info a:visited{
		color: <?php echo esc_html( $gptweaks_site_footer_bar_visited_link_color ); ?>;
	}
	</style>

	<?php
}

add_action( 'wp_head', 'gptweaks_footer_bar_options_apply' );
