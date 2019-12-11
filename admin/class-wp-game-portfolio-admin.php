<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nabilsekirime.com
 * @since      1.0.0
 *
 * @package    Wp_Game_Portfolio
 * @subpackage Wp_Game_Portfolio/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Game_Portfolio
 * @subpackage Wp_Game_Portfolio/admin
 * @author     Nabil Sekirime <sekirimenabil@gmail.com>
 */
class Wp_Game_Portfolio_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Game_Portfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Game_Portfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-game-portfolio-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Game_Portfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Game_Portfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-game-portfolio-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register Games as a Custom Post Type
	 *
	 * @since    1.0.0
	 */
	function create_game_cpt() {

		$labels = array(
			'name' => _x( 'games', 'Post Type General Name', 'textdomain' ),
			'singular_name' => _x( 'game', 'Post Type Singular Name', 'textdomain' ),
			'menu_name' => _x( 'games', 'Admin Menu text', 'textdomain' ),
			'name_admin_bar' => _x( 'game', 'Add New on Toolbar', 'textdomain' ),
			'archives' => __( 'game Archives', 'textdomain' ),
			'attributes' => __( 'game Attributes', 'textdomain' ),
			'parent_item_colon' => __( 'Parent game:', 'textdomain' ),
			'all_items' => __( 'All games', 'textdomain' ),
			'add_new_item' => __( 'Add New game', 'textdomain' ),
			'add_new' => __( 'Add New', 'textdomain' ),
			'new_item' => __( 'New game', 'textdomain' ),
			'edit_item' => __( 'Edit game', 'textdomain' ),
			'update_item' => __( 'Update game', 'textdomain' ),
			'view_item' => __( 'View game', 'textdomain' ),
			'view_items' => __( 'View games', 'textdomain' ),
			'search_items' => __( 'Search game', 'textdomain' ),
			'not_found' => __( 'Not found', 'textdomain' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
			'featured_image' => __( 'Featured Image', 'textdomain' ),
			'set_featured_image' => __( 'Set featured image', 'textdomain' ),
			'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
			'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
			'insert_into_item' => __( 'Insert into game', 'textdomain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this game', 'textdomain' ),
			'items_list' => __( 'games list', 'textdomain' ),
			'items_list_navigation' => __( 'games list navigation', 'textdomain' ),
			'filter_items_list' => __( 'Filter games list', 'textdomain' ),
		);
		$args = array(
			'label' => __( 'game', 'textdomain' ),
			'description' => __( '', 'textdomain' ),
			'labels' => $labels,
			'menu_icon' => '',
			'supports' => array('title'),
			'taxonomies' => array(),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_rest' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'rewrite' => false,
		);
		register_post_type( 'game-portfolio', $args );

	

	//Add Fields to custom game post type
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_5df154523a0fe',
			'title' => 'Game Portfolio',
			'fields' => array(
				array(
					'key' => 'field_5df1550b30e70',
					'label' => 'Game Name',
					'name' => 'game_name',
					'type' => 'text',
					'instructions' => 'The name of your game',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5df1553c30e71',
					'label' => 'Game Year',
					'name' => 'game_year',
					'type' => 'text',
					'instructions' => 'The time period that the game was developed in',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5df1558e30e72',
					'label' => 'Project Role',
					'name' => 'game_project_role',
					'type' => 'text',
					'instructions' => 'The role you served on the project',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5df1586d30e76',
					'label' => 'Game Engine',
					'name' => 'game_engine',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5df1568630e73',
					'label' => 'Game Short Description',
					'name' => 'game_short_description',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5df158885a2d4',
					'label' => 'Game Project Description',
					'name' => 'game_project_description',
					'type' => 'textarea',
					'instructions' => 'A general overview of the project',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				),
				array(
					'key' => 'field_5df157d130e74',
					'label' => 'Game Full Banner Image',
					'name' => 'game_banner_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'full',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5df1580f30e75',
					'label' => 'Game Post Image',
					'name' => 'game_post_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'full',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5df15a675a2d5',
					'label' => 'Game Retrospective',
					'name' => 'game_retrospective',
					'type' => 'wysiwyg',
					'instructions' => 'Write about your contributions to the game project',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
				array(
					'key' => 'field_5df161760c598',
					'label' => 'Game Custom Shortcode 1',
					'name' => 'game_custom_shortcode_1',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5df161a70c599',
					'label' => 'Game Custom Shortcode 2',
					'name' => 'game_custom_shortcode_2',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5df161b20c59a',
					'label' => 'Game Custom Shortcode 3',
					'name' => 'game_custom_shortcode_3',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		endif;
	}
}
