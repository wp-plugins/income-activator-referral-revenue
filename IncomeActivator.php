<?php

/*
Plugin Name: Income Activator Referral Revenue
Plugin URI: http://IncomeActivator.com/
Description: This plugin allows you to add an Income Activator Referral Form to a WordPress page or theme.
Author: Rupesh Dinkar Gharat & Lee Romanov & Myles Shuttleworth
Version: 1.0
Author URI: https://plus.google.com/104308382382479297040
*/

function incomeactivator_embedscriptform() {
    ob_start ();

     // $val = get_option( 'canonical' );
      echo "<!--<embed script by Rupesh Gharat>-->";
     // if($val == 1)  {
        $ga = get_option('ga');

$ga = esc_textarea ( $ga );

 
$options = get_option('ga');
// $options = esc_html( $options );
echo stripslashes ( "{$options}" );
return ob_get_clean();
}

     // }
     //  else
     // {}


add_shortcode( 'addform', 'incomeactivator_embedscriptform' );
// add_action( 'wp_head', 'jollyc' );
ob_end_clean(); 

// $robots = get_option('robots');
// $robo = fopen(ABSPATH . "robots.txt", 'w' );
// fwrite($robo, $robots);
// fclose($robo);

// $xmlsitemap = get_option('xmlsitemap');
// $xml = fopen(ABSPATH . "sitemap.xml", 'w' );
// fwrite($xml, $xmlsitemap);
// fclose($xml);



// create custom plugin settings menu
add_action('admin_menu', 'incomeactivator_embed_script_create_menu');

function incomeactivator_embed_script_create_menu() {

  //create new top-level menu
  add_menu_page('Incomeactivator Embed Script Settings', 'Income Activator', 'administrator', __FILE__, 'incomeactivator_embed_script_settings_page',plugins_url('/images/icon.png', __FILE__));

  //call register settings function
  add_action( 'admin_init', 'incomeactivator_register_mysettings' );
}


function incomeactivator_register_mysettings() {
  //register our settings
 
  register_setting( 'incomeactivator-settings-group', 'canonical' );

    register_setting( 'incomeactivator-settings-group', 'ga' );
  

}
function incomeactivator_embed_script_settings_page() {
?>
<div class="wrap">
<h2>Income Activator Referral Revenue</h2>
<p>Income Activator (IA) allows you to send leads to companies that pay you.</p>
<p> Using Income Activator, you  choose the companies you want to send referrals to.<br />
  You set the cost per lead. Leads are tracked and invoices are automatically created.</p>
<p>This plug-in allows you to add an IA Referral Form  to your WordPress website, <a href="http://www.printakey.com" target="_blank">here's an example</a>.<br />
  An IA account is required to use this plug-in. To register for an IA account, <a href="http://incomeactivator.com/" target="_blank">click here</a>.</p>
<p><strong>For Questions:</strong> Email Support@IncomeActivator.com or call 647-693-1436.</p>
<h2>How To Embed Your IA Referral Form</h2>
<p><strong>Step 1: </strong>Create a <strong>Referral Form </strong>on your IA account.</p>
<p><strong>Step 2:</strong> Copy the<strong> Embed Form Code</strong> from your IA Referral Form.</p>
<p><strong>Step 3:</strong> Paste the code into the <strong>IA Referral Form Code </strong> box.</p>
<p><strong>Step 4:</strong> Click <strong>Save Changes</strong>.</p>
<p><strong>Step 5: </strong>You have a choice of adding your Referral Form to a website page, or to your theme.</p>
<p><strong>  Add To Page: </strong>Copy the <strong>Form Short Code </strong>into your website page, and the form will show up when you view your page.</p>
<p> <strong>Add To Theme:</strong> Copy the <strong>Theme Short Code </strong>into your theme, and the form will show up within your theme.</p>
<style>
.wide { width:800px;
}
p.submit {
	  margin-top: 0;
  padding-top: 0;
  padding-bottom: 0;
	}
</style>

<form method="post" action="options.php">
      <?php settings_fields( 'incomeactivator-settings-group' ); ?>
    <?php do_settings_sections( 'incomeactivator-settings-group' ); ?>
    <table width="100%" border="0" cellpadding="8" cellspacing="0">
         


        

        

        
        <tr valign="top">
        <th width="180" align="left" scope="row">IA Referral Form Code</th>
        <!--<td><input type="text" name="ga" value="<?php echo get_option('ga'); ?>" /></td>-->
        <td><textarea class="wide" name="ga" rows="1" value="<?php // echo get_option('ga'); ?>" placeholder="Paste Your Script Here" /><?php
$options = get_option('ga');
echo stripslashes ( "{$options}" );
?></textarea>    </td>
        </tr>
      <tr valign="top">
        <th align="left" scope="row">&nbsp;</th>
          <td><?php submit_button(); ?></td>
      </tr>
      <tr valign="top">
          <th align="left" scope="row">Form Short Code</th>
          <td> <textarea cols="40" rows="1" name="link">[addform]</textarea>
          </td>
        </tr>
       
  <tr valign="top">
    <th align="left" scope="row">Theme Short Code</th>
    <td align="left"><textarea cols="40" rows="1" name="link2">&lt;?php echo do_shortcode('[addform]'); ?&gt;</textarea></td>
  </tr>



    </table>

  


</form>


</div>

<p>

<?php } ?>