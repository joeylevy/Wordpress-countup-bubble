<?php
/*
Plugin Name: JDL Javascript CountUp Bubble
description: a plugin to add countup bubbles to your website. You can modify colors and speed.
Based on Simon Shahriveri's https://codepen.io/hi-im-si/pen/uhxFn
Version: 1.0
Author: Joey Levy
Author URI: http://joeylevy.com
License: GPL2
*/

// Example 1 : WP Shortcode to display form on any page or post.
function JDL_countup_create($params = [])
{

    $duration = ($params['duration']) ? (int)$params['duration'] : 5;
    $start = ($params['start']) ? (int)$params['start'] : 0;
    $end = ($params['end']) ? (int)$params['end'] : 50;
    $suffix = ($params['suffix']) ? $params['suffix'] : "";
    $prefix = ($params['prefix']) ? $params['prefix'] : "";
    $bgcolor = ($params['bgcolor']) ? $params['bgcolor'] : "#FF6F6F";

    return '<div class="JDL_counter" data-duration="' . $duration . '" data-end="' . $end . '" data-suffix="' . $suffix . '" data-prefix="' . $prefix . '" data-bgcolor="' . $bgcolor . '">' . $start . '</div>';
}

add_shortcode('JDL_countup', 'JDL_countup_create');

wp_enqueue_script('JDL-countup', plugin_dir_url(__FILE__) . '/js/countup.js', ['jquery']);
wp_enqueue_style('JDL-countup', plugin_dir_url(__FILE__) . '/css/countup.css');


add_action('admin_menu', 'JDL_plugin_admin_add_page');
function JDL_plugin_admin_add_page()
{
    add_options_page('JDL CountUp', 'JDL CountUp', 'manage_options', 'JDL_plugin', 'JDL_plugin_options_page');
}

?>

<?php // display the admin options page
function JDL_plugin_options_page() {
?>
<div class="wrap">
    <h1>JDL CountUp Bubble</h1>
    <p>
        This is a fairly basic plugin. You can make a countup bubble with a few options. <br>
        Basic Example to put somewhere in your pages or posts or whatever: <pre>[JDL_countup end="1277"]</pre>
    This will count from 0 (default) to 1277, and it will take 5 seconds (default).<br>
    <h3>All Options</h3>
    <ul>
        <li>start - start number</li>
        <li>end - end number</li>
        <li>duration - time in seconds for countup to last</li>
        <li>prefix - after count, this appears above number</li>
        <li>suffix - after count, this appears below number</li>
        <li>bgcolor - override background color. It will add it as background-color css</li>
    </ul>

        I suggest you put the following HTML around the shortcode to make it centered and stuff.
    I did this so that you could have many counters in a row inside a single outer div.
    Here is an example including the wrapped html:

    <pre>
        &lt;div style="display: table;margin: 5px auto 0;
  text-align: center;"&gt;
            [JDL_countup start="0" duration="3" end="1277" suffix="Visitors" prefix="Over" bgcolor="#c19551"]
       &lt;/div&gt;
    </pre>

    </p>
</div>

    <?php
    } ?>
