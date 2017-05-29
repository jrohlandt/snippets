<?php

/**
 * Plugin Name: Tweet Plugin Tutorial
 * Plugin URI: http://danielpataki.com
 * Description: This plugin adds a simple tweet link below posts.
 * Version: 1.0.0
 * Author: Daniel Pataki
 * Author URI: http://danielpataki.com
 * License: GPL2
 */

global $tweeter_db_version;
$tweeter_db_version = '1.0';

function tweeter_install() {
    global $wpdb;
    global $tweeter_db_version;
    $table_name = $wpdb->prefix . "liveshoutbox";
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      name tinytext NOT NULL,
      text text NOT NULL,
      url varchar(55) DEFAULT '' NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( "tweeter_db_version", "1.0");
}

function tweeter_install_data() {
	global $wpdb;

	$welcome_name = 'Mr. WordPress';
	$welcome_text = 'Congratulations, you just completed the installation!';

	$table_name = $wpdb->prefix . 'liveshoutbox';

	$wpdb->insert(
		$table_name,
		array(
			'time' => current_time( 'mysql' ),
			'name' => $welcome_name,
			'text' => $welcome_text,
		)
	);
}

register_activation_hook( __FILE__, 'tweeter_install' );
register_activation_hook( __FILE__, 'tweeter_install_data' );


 function tweet_link( $content ) {
     $url = 'https://twitter.com/intent/tweet';
     $url .= '?url=' . get_permalink();

     $account = get_option( 'twitter_account' );
     if (!empty( $account )) {
         $url .= '&via=' . $account;
     }
     return $content . '<p><a href="'. $url .'">Tweet about this</a></p>';
 }
 add_action( 'the_content', 'tweet_link' );

 add_action('admin_menu', 'tweetlink_settings_menu');

 function tweetlink_settings_menu() {
     add_menu_page('Tweet Link Settings', 'Tweet Link', 'manage_options', 'tweetlink_settings', 'tweetlink_settings_page', 'dashicons-twitter');
 }

 function tweetlink_settings_page() {
?>
    <div class="wrap">
        <h2>Tweet Link Options</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'tweetlink_settings' ); ?>
            <?php do_settings_sections( 'tweetlink_settings' ); ?>
            <table class="form-table">
               <tr valign="top">
               <th scope="row">Twitter Account</th>
                    <td><input type="text" name="twitter_account" value="<?php echo esc_attr( get_option('twitter_account') ); ?>" /></td>
               </tr>
           </table>
           <?php submit_button(); ?>
        </form>
    </div>
<?php
 }

 add_action('admin_init', 'tweetlink_settings');
 function tweetlink_settings() {
     register_setting('tweetlink_settings', 'twitter_account');
 }
