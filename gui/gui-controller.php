<?php
/**
 * Title: GUI
 * Description: Adds a interface the plugin
 * 
 * */

//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
add_action('media_buttons_context', 'lcp_add_my_custom_button');

//add some content to the bottom of the page 
//This will be shown in the inline modal
add_action('admin_footer', 'lcp_add_inline_popup_content');

//action to add a custom button to the content editor
function lcp_add_my_custom_button($context) {
    
    //path to my icon
    $img = plugins_url( 'images/icon.png' , __FILE__ );
    
    //the id of the container I want to show in the popup
    $container_id = 'lcp_container';
    
    //our popup's title
    $title = 'List Category Posts';

    //append the icon
    $context .= "<a class='thickbox button ' title='{$title}'
    href='#TB_inline?width=640&height=750&inlineId={$container_id}'>
    <img src='{$img}' />List Category Posts</a>";
    
    return $context;
}

add_action('init','load_scripts_and_styles');
function load_scripts_and_styles()
{
    wp_enqueue_style('lcp_gui_css',plugins_url('css/gui.css',__FILE__));
    wp_enqueue_script('lcp_gui_js',plugins_url('js/gui.js',__FILE__));
}

function lcp_add_inline_popup_content() {require_once('views/main-view.php');}
?>