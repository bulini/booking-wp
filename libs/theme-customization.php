<?php

/*
*********** THEME CUSTOMIZATION *************************** ///////
*/


function wpbooking_customize_register($wp_customize){

    $wp_customize->add_section('wpbooking_color_scheme', array(
        'title'    => __('Layout Settings', 'wpbooking'),
        'priority' => 120,
    ));

    //  =============================
    //  = Text Input                =
    //  =============================

    $wp_customize->add_setting('wpbooking_theme_options[jumbotron_h1]', array(
        'default'        => 'Your jumbotron h1!',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('wpbooking_jumbotron_h1', array(
        'label'      => __('Jumbotron h1', 'wpbooking'),
        'section'    => 'wpbooking_color_scheme',
        'settings'   => 'wpbooking_theme_options[jumbotron_h1]',
    ));


    $wp_customize->add_setting('wpbooking_theme_options[city]', array(
        'default'        => 'City name!',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('wpbooking_jumbotron_city', array(
        'label'      => __('City', 'wpbooking'),
        'section'    => 'wpbooking_color_scheme',
        'settings'   => 'wpbooking_theme_options[city]',
    ));



    $wp_customize->add_setting('wpbooking_theme_options[jumbotron_text]', array(
        'default'        => 'Your jumbotron text!',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('wpbooking_jumbotron_text', array(
        'label'      => __('Jumbotron text', 'wpbooking'),
        'section'    => 'wpbooking_color_scheme',
        'settings'   => 'wpbooking_theme_options[jumbotron_text]',
    ));




    $wp_customize->add_setting('wpbooking_theme_options[footer_text]', array(
        'default'        => 'Your footer text!',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('wpbooking_footer_text', array(
        'label'      => __('Text Test', 'wpbooking'),
        'section'    => 'wpbooking_color_scheme',
        'settings'   => 'wpbooking_theme_options[footer_text]',
    ));

    //  =============================
    //  = Radio Input               =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[color_scheme]', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));


	$posts = get_posts();
	$posts_to_select = array();
	$i = 0;
	foreach($posts as $post){
	    if($i==0){
	        $default = $post->ID;
	        $i++;
	    }
	    $posts_to_select[$post->ID] = $post->ID;
	}



    $wp_customize->add_control('wpbooking_color_scheme', array(
        'label'      => __('Color Scheme', 'wpbooking'),
        'section'    => 'wpbooking_color_scheme',
        'settings'   => 'wpbooking_theme_options[color_scheme]',
        'type'       => 'dropdown',
        'choices'    => $posts_to_select
        ));

    //  =============================
    //  = Checkbox                  =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[checkbox_test]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));

    $wp_customize->add_control('display_header_text', array(
        'settings' => 'wpbooking_theme_options[checkbox_test]',
        'label'    => __('Display Header Text'),
        'section'  => 'wpbooking_color_scheme',
        'type'     => 'checkbox',
    ));

//$dir    = TEMPLATEPATH.'/assets/css/colors';
//$files = scandir($dir);

    //  =============================
    //  = Select Box css bootstrap               =
    //  =============================
     $wp_customize->add_setting('wpbooking_theme_options[css_select]', array(
        'default'        => 'bootstrap_default',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'css_select', array(
        'settings' => 'wpbooking_theme_options[css_select]',
        'label'   => 'Select Bootstrap Layout:',
        'section' => 'wpbooking_color_scheme',
        'type'    => 'select',
        'choices'    => $files,
    ));



    //  =============================
    //  = Select Box                =
    //  =============================
     $wp_customize->add_setting('wpbooking_theme_options[layout_select]', array(
        'default'        => 'header-left',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'layout_select', array(
        'settings' => 'wpbooking_theme_options[layout_select]',
        'label'   => 'Select Layout:',
        'section' => 'wpbooking_color_scheme',
        'type'    => 'select',
        'choices'    => array(
            'centered-logo' => 'Centered Logo',
            'left-logo' => 'Left logo',

        ),
    ));

    //  =============================
    //  = Select Box navbar default / inverse =
    //  =============================
     $wp_customize->add_setting('wpbooking_theme_options[navbar_select]', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'navbar_select', array(
        'settings' => 'wpbooking_theme_options[navbar_select]',
        'label'   => 'Select Navbar style:',
        'section' => 'wpbooking_color_scheme',
        'type'    => 'select',
        'choices'    => array(
            'default' => 'Default navbar',
            'inverse' => 'Inverse navbar',
        ),
    ));











    //  =============logo===============
    //  = Image Upload  logo            =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[image_upload_test]', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
        'label'    => __('Logo', 'wpbooking'),
        'section'  => 'wpbooking_color_scheme',
        'settings' => 'wpbooking_theme_options[image_upload_test]',
    )));


    //  =================background============
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[background_image]', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'background_image', array(
        'label'    => __('Background Image', 'wpbooking'),
        'section'  => 'wpbooking_color_scheme',
        'settings' => 'wpbooking_theme_options[background_image]',
    )));




    //  =============================
    //  = Color Picker Background            =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[background_color]', array(
        'default'           => 'efefef',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'label'    => __('Background Color', 'wpbooking'),
        'section'  => 'wpbooking_color_scheme',
        'settings' => 'wpbooking_theme_options[background_color]',
    )));

    //  =============================
    //  = Color Picker  LInk            =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[link_color]', array(
        'default'           => '336699',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Link Color', 'wpbooking'),
        'section'  => 'wpbooking_color_scheme',
        'settings' => 'wpbooking_theme_options[link_color]',
    )));

    //  =============================
    //  = Nav background  top            =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[nav_bg_color]', array(
        'default'           => '336699',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_bg_color', array(
        'label'    => __('Nav backgound Color', 'wpbooking'),
        'section'  => 'wpbooking_color_scheme',
        'settings' => 'wpbooking_theme_options[nav_bg_color]',
    )));

    //  =============================
    //  = Nav background  bottom            =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[nav_bg_color_bottom]', array(
        'default'           => '336699',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_bg_color_bottom', array(
        'label'    => __('Nav backgound bottom Color', 'wpbooking'),
        'section'  => 'wpbooking_color_scheme',
        'settings' => 'wpbooking_theme_options[nav_bg_color_bottom]',
    )));



    //  =============================
    //  = Button background color            =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[button_bg_color]', array(
        'default'           => '2BA6CB',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_bg_color', array(
        'label'    => __('Button background color', 'wpbooking'),
        'section'  => 'wpbooking_color_scheme',
        'settings' => 'wpbooking_theme_options[button_bg_color]',
    )));


    //  =============================
    //  = button_link_color         =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[button_link_color]', array(
        'default'           => 'ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_link_color', array(
        'label'    => __('Button link color', 'wpbooking'),
        'section'  => 'wpbooking_color_scheme',
        'settings' => 'wpbooking_theme_options[button_link_color]',
    )));





    //  =============================
    //  = Page Dropdown             =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[page_test]', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('wpbooking_page_test', array(
        'label'      => __('1 Widget', 'wpbooking'),
        'section'    => 'wpbooking_color_scheme',
        'type'    => 'dropdown-pages',
        'settings'   => 'wpbooking_theme_options[page_test]',
    ));

    $wp_customize->add_setting('wpbooking_theme_options[page_test2]', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('wpbooking_page_test2', array(
        'label'      => __('2 Widget', 'wpbooking'),
        'section'    => 'wpbooking_color_scheme',
        'type'    => 'dropdown-pages',
        'settings'   => 'wpbooking_theme_options[page_test2]',
    ));

    $wp_customize->add_setting('wpbooking_theme_options[page_test3]', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('wpbooking_page_test3', array(
        'label'      => __('3 Widget', 'wpbooking'),
        'section'    => 'wpbooking_color_scheme',
        'type'    => 'dropdown-pages',
        'settings'   => 'wpbooking_theme_options[page_test3]',
    ));

        //  =============================
    //  = File Upload               =
    //  =============================
    $wp_customize->add_setting('wpbooking_theme_options[upload_test]', array(
        'default'           => 'arse',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'upload_test', array(
        'label'    => __('Upload Test', 'wpbooking'),
        'section'  => 'wpbooking_color_scheme',
        'settings' => 'wpbooking_theme_options[upload_test]',
    )));
}

add_action('customize_register', 'wpbooking_customize_register');



?>
