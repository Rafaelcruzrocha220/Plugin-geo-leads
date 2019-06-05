<?php

/**
 * Plugin Name: Plugin Geo leads
 * Description: Melhore seus resultados com a geolocalização do usuário.
 * Version:     1.5
 * Author:      Rafael Cruz Rocha
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: geo-leads
 * Domain Path: /languages
 */

require_once dirname( __FILE__ ) . "/libs/geo-user.php";
require_once dirname( __FILE__ ) . "/libs/geo-bar.php";
require_once dirname( __FILE__ ) . "/libs/geo-pages.php";
require_once dirname( __FILE__ ) . "/libs/geo-visitors.php";
require_once dirname( __FILE__ ) . "/libs/geo-shortcode.php";
require_once dirname( __FILE__ ) . "/templates/menu.php";

class geoleads{
    private static $instance;
    private const TEXT_DOMAIN = 'geo-leads';
    private static $number_visitors; 
    // Se não estiver setado, setar a classe, padrão singleton.
    
    public static function getInstance(){
        if(self::$instance == NULL) :
            self::$instance = new self();
        endif;
    }

    private function __construct(){
        self::$number_visitors = create_cookie_views();
       
        add_action( 'init', 'geoleads::delete_cookies' );
        add_action( 'wp_head', 'geoleads::bar_geo_leads' );
        add_action( 'wp_head', 'geoleads::add_scripts' );
        add_action( 'wp_enqueue_scripts', 'geoleads::add_styles' );
        add_action( 'admin_enqueue_scripts', array($this,'add_admin_styles') );
        add_action( 'admin_menu', array($this,'menu_geo_leads'));
        add_action('get_header', 'geoleads::remove_admin_login_header');
        
        add_action("wp_ajax_my_action", array($this,'ajax_views') );
        add_action("wp_ajax_nopriv_my_action", array($this,'ajax_views') );
        
        add_filter( 'the_title', 'do_shortcode' );
        add_filter( 'pre_get_document_title', 'geo_leads_title_shortcode' );

        add_shortcode('geo_leads_info','geo_leads_shortcode');
    }

    public function ajax_views(){
        if(isset($_POST['id'])){
            // return value to ajax called for views change
            echo create_cookie_views();
        }
    }
    
    public static function delete_cookies(){
        // unset cookies
        if (isset($_SERVER['HTTP_COOKIE'])) :
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            $path = parse_url(get_option('siteurl'), PHP_URL_PATH);
            $host = parse_url(get_option('siteurl'), PHP_URL_HOST);

            foreach($cookies as $cookie) :
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                
                if($name != "wordpress_logged_in_bbfa5b726c6b7a9cf3cda9370be3ee91" && $name != "visitors") :
                    setcookie($name, '', time()-1000, $path,$host);
                endif;
            endforeach;
        endif;
    }
 
    public static function remove_admin_login_header() {
        global $post;
        $page_allowed = get_page_allowed($post->ID);

        if($page_allowed == TRUE){
            remove_action('wp_head', '_admin_bar_bump_cb');
        }
    }
    
    public function menu_geo_leads(){
        add_menu_page( 'Geo leads', 'Geo leads', 'manage_options', 'geo-leads', 'template_menu_geo_leads', 'dashicons-admin-site', '2' );
    }
    
    public static function bar_geo_leads(){
        // Get info user premium by email
        global $current_user;
        global $post;

        $user = TRUE;
        $page_allowed = get_page_allowed($post->ID);
        
        if($user == TRUE && $page_allowed == TRUE){
            return geoleads::bar_geo_premium();
        }else if($user == FALSE && $page_allowed == TRUE){
            return geoleads::bar_geo_invalid();
        }else{
            return geoleads::bar_invalid();
        }

    }

    public static function bar_geo_premium(){
        global $post;

        // Gerar menu
        $createBar = create_bar(self::$number_visitors,$post->ID);;
        
        // Bar
        _e($createBar,self::TEXT_DOMAIN);
    }
    
    public static function bar_geo_invalid(){
        // Bar
        _e("<div class='geo-message geo-message--fixedtop'>Você ainda não é um usuário premium <b>Geo leads</b>. <a href='#' target='_blank'>Adquira agora!</a></div>", self::TEXT_DOMAIN);
    }

    public static function bar_invalid(){
        _e("<div style='display:none' class='geo-message'></div>");
    }

    public static function add_styles(){
        $version = rand(1,200);

        wp_register_style( 'default', plugin_dir_url(__FILE__) . 'assets/css/default.css', array(), $version );
        wp_enqueue_style( 'default' );
    }

    public static function add_scripts(){
        wp_register_script( 'fix-nav', plugin_dir_url(__FILE__) . 'assets/js/fix-header.js', array('jquery'), $version, TRUE );
        wp_enqueue_script( 'fix-nav' );

        require_once dirname( __FILE__ ) . "/views/views-ajax.php";
        
        // Efeito fadeout
        get_fade_out();
    }

    public function add_admin_styles(){
        $version = rand(1,200);

        wp_register_style( 'bootstrap', plugin_dir_url(__FILE__) . 'assets/css/bootstrap.min.css', array(), $version);
        wp_enqueue_style( 'bootstrap' );
        
        wp_register_style( 'menu', plugin_dir_url(__FILE__) . 'assets/css/menu.css',array(), $version);
        wp_enqueue_style( 'menu' );

        wp_register_script( 'adm', plugin_dir_url(__FILE__) . 'assets/js/admin-panel.js', array('jquery'), TRUE );
        wp_enqueue_script( 'adm' );
        
        wp_register_script( 'text_option', plugin_dir_url(__FILE__) . 'assets/js/text-widget.js', array('jquery'), TRUE );
        wp_enqueue_script( 'text_option' );

        wp_register_script( 'bootstrap', plugin_dir_url(__FILE__) . 'assets/js/bootstrap.min.js', array('jquery') );
        wp_enqueue_script( 'bootstrap' );
    }
} 

geoleads::getInstance();