<?php
namespace Inc\Cls;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class UserLocalPlace
{ 
    
    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      object
     */
    protected static $instance = null;

    protected int $user_id;

    protected string $user_ip;

    protected string $api_url;

    protected string $country_code;

    /**
     * Constructor.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->setTextDomain();
        add_action('wp_login', array($this, 'changeTheLanguageOnLogin'), 10, 2);
    }

    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance()
    {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Change the language on user login based on IP.
     *
     * @param string  $user_login The user's login username.
     * @param WP_User $user       The WP_User object of the logged-in user.
     *
     * @since 1.0.0
     */
    public function changeTheLanguageOnLogin($user_login, $user)
    {
        $this->user_id = $user->ID;
        $this->user_ip = $_SERVER['REMOTE_ADDR'];
        $this->api_url = 'http://www.geoplugin.net/php.gp?ip=' . $this->user_ip;

        $this->setUserLanguageFromIP();

        if ($this->country_code) {
            // Update the site language
            update_user_meta($this->user_id, 'locale', $this->country_code);
            // Optionally, set the site language if it's a global change
            update_option('WPLANG', $this->country_code);
        }
    }

    /**
     * Set the user's language based on IP geolocation.
     *
     * @since 1.0.0
     */
    public function setUserLanguageFromIP()
    {
        if (is_admin()) {
            return; // Exit if in admin panel
        }

        // Check if user language is already set (optional, based on your needs)
        if (get_user_locale()) {
            return;
        }

        $response = wp_remote_get($this->api_url);

        if (is_wp_error($response)) {
            return;
        }

        $body = wp_remote_retrieve_body($response);

        if ($body) {
            $data = unserialize($body);
            $this->country_code = $this->getLanguageCodeFromCountry($data['geoplugin_countryCode']);
        }
    }

    /**
     * Get language code based on country code.
     *
     * @param string $country_code The country code.
     * @return string The language code.
     *
     * @since 1.0.0
     */
    public function getLanguageCodeFromCountry($country_code)
    {
        // Replace with your logic to map country codes to language codes
        switch ($country_code) {
            case 'IL':
                return 'he_IL'; // Hebrew (Israel)
            case 'FR':
                return 'fr_FR'; // French (France)
            case 'ES':
                return 'es_ES'; // Spanish (Spain)
            // Add more cases for other countries as needed
            default:
                return 'en_US'; // English (United States)
        }
    }




    public function setTextDomain()
    {
        if(!is_admin())
        {
        $domain = 'Mtest-GT'; 
        $abs_rel_path = false; // Absolute path to your plugin directory, or false
        $plugin_rel_path = dirname( plugin_basename( __FILE__ ) ) . '/languages/'; 
        load_plugin_textdomain( $domain, $abs_rel_path, $plugin_rel_path );
        }
    }
}


