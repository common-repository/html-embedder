<?php
/*
Plugin Name: Html Embedder
Plugin URI: http://jamestechnotes.com/wordpress/wordpress-plugins/html-embedder
Version: 0.05
Author: <a href="http://jamesr.biz">James Richardson</a>
Description: A plugin to allow arbitrary html code to be easily embedded into WordPress posts.
*/

if (!class_exists("HtmlEmbedder"))
{
  class HtmlEmbedder
    {
      function HtmlEmbedder()
        { //Constructor
        }

      function field_func($atts)
        {
          global $post;
          $name = $atts['name'];
          if (empty($name)) return;

          return get_post_meta($post->ID, $name, true);
	}
    }
}

if (class_exists("HtmlEmbedder"))
  {
    $htmlEmbedder = new HtmlEmbedder();
  }

/* use as [htmlembed name="NameOfCustomField"] */
if (isset($htmlEmbedder))
  {
    add_shortcode('htmlembed', array($htmlEmbedder, 'field_func'));
  }
