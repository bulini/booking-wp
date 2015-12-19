<?php
/**
 * CMB Theme Options
 * @version 0.1.0
 */
class ThemeSettings {

    /**
     * Option key, and option page slug
     * @var string
     */
    protected static $key = 'bstheme_options';

    /**
     * Array of metaboxes/fields
     * @var array
     */
    protected static $theme_options = array();

    /**
     * Options Page title
     * @var string
     */
    protected $title = '';

    /**
     * Constructor
     * @since 0.1.0
     */
    public function __construct() {
        // Set our title
        $this->title = __( 'Site Options', 'wpbooking' );
    }

    /**
     * Initiate our hooks
     * @since 0.1.0
     */
    public function hooks() {
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
    }

    /**
     * Register our setting to WP
     * @since  0.1.0
     */
    public function init() {
        register_setting( self::$key, self::$key );
    }

    /**
     * Add menu options page
     * @since 0.1.0
     */
    public function add_options_page() {
        $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', self::$key, array( $this, 'admin_page_display' ) );
    }

    /**
     * Admin page markup. Mostly handled by CMB
     * @since  0.1.0
     */
    public function admin_page_display() {
        ?>
        <div class="wrap cmb_options_page <?php echo self::$key; ?>">
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
            <?php cmb_metabox_form( self::option_fields(), self::$key ); ?>
        </div>
        <?php
    }

    /**
     * Defines the theme option metabox and field configuration
     * @since  0.1.0
     * @return array
     */
    public static function option_fields() {

        // Only need to initiate the array once per page-load
        if ( ! empty( self::$theme_options ) )
            return self::$theme_options;

        self::$theme_options = array(
            'id'         => 'theme_options',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( self::$key, ), ),
            'show_names' => true,
            'fields'     => array(
                array(
                    'name' => __( 'Place Name', 'wpbooking' ),
                    'desc' => __( 'field description (optional)', 'wpbooking' ),
                    'id'   => 'place_name',
                    'type' => 'text_medium',
                ),
                array(
                    'name' => __( 'City', 'wpbooking' ),
                    'desc' => __( 'field description (optional)', 'wpbooking' ),
                    'id'   => 'city_name',
                    'type' => 'text_medium',
                ),


                array(
                    'name' => __( 'Phone number', 'wpbooking' ),
                    'desc' => __( 'field description (optional)', 'wpbooking' ),
                    'id'   => 'phone',
                    'type' => 'text_medium',
                ),

                 array(
                    'name' => __( 'place address', 'wpbooking' ),
                    'desc' => __( 'es via roma 10, 00100 Roma', 'wpbooking' ),
                    'id'   => 'place_address',
                    'type' => 'text_medium',
                ),



                array(
                    'name' => __( 'email', 'wpbooking' ),
                    'desc' => __( 'field description (optional)', 'wpbooking' ),
                    'id'   => 'email',
                    'type' => 'text_email',
                ),

				array(
				    'name' => __( 'Facebook page URL', 'cmb' ),
				    'id'   => $prefix . 'facebook_url',
				    'type' => 'text_url',
				    // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
				),
				array(
				    'name' => __( 'Twitter URL', 'cmb' ),
				    'id'   => $prefix . 'twitter_url',
				    'type' => 'text_url',
				    // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
				),
                array(
                    'name'    => __( 'Test Color Picker', 'wpbooking' ),
                    'desc'    => __( 'field description (optional)', 'wpbooking' ),
                    'id'      => 'test_colorpicker',
                    'type'    => 'colorpicker',
                    'default' => '#ffffff'
                ),
                 array(
                    'name' => __( 'Footer Text', 'wpbooking' ),
                    'desc' => __( 'field description (optional)', 'wpbooking' ),
                    'id'   => 'footer_text',
                    'type' => 'text',
                ),
                 array(
                    'name' => __( 'Amenities IT', 'wpbooking' ),
                    'desc' => __( 'servizi (separati da virgola)', 'wpbooking' ),
                    'id'   => 'custom_services_list_it',
                    'type' => 'text',
                ),

                 array(
                    'name' => __( 'Amenities EN', 'wpbooking' ),
                    'desc' => __( 'servizi (separati da virgola)', 'wpbooking' ),
                    'id'   => 'custom_services_list_en',
                    'type' => 'text',
                ),

            ),
        );
        return self::$theme_options;
    }

    /**
     * Make public the protected $key variable.
     * @since  0.1.0
     * @return string  Option key
     */
    public static function key() {
        return self::$key;
    }

}

// Get it started
$ThemeSettings = new ThemeSettings();
$ThemeSettings->hooks();

/**
 * Wrapper function around cmb_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function mytheme_get_option( $key = '' ) {
    return cmb_get_option( ThemeSettings::key(), $key );
}


?>
