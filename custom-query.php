<?php
/*
  Plugin Name: Custom Query
  Plugin URI: http://eavasquez.com
  Description: This plugin will create a shortcode that will allow the user to insert a custom query anywhere on the page
  Version: 1.0
  Author: Efren Vasquez
  Author URI: http://eavasquez.com
  License: GPL2
*/

/* Copyright 2020 Custom Query (email : e.vasquez@ufl.edu)
Custom Queries is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Custom Queries is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/

/*=========================================


 Custom Plugin Stylesheet


===========================================*/
function customQueryStyling(){
  wp_enqueue_style('custom-query-styles', plugin_dir_url(__FILE__) . 'public/css/style.css');
}

add_action('wp_enqueue_scripts', 'customQueryStyling');

/*=========================================


 Custom Query Shortcode


===========================================*/
function customQueryShortcode($atts){
  extract( shortcode_atts(array(
    'category'    => '',
    'image'       => '',
    'excerpt'     => 'no',
    'totalposts'  => '10',
    'orderby'     => 'date',
    'order'       => 'ASC',
    'design'      => '',
  ), $atts));

  //Custom Query
  $args = array(
    'post_type'       => 'post',
    'post_status'     => 'published',
    'posts_per_page'  => "$totalposts",
    'order'           => "$order",
    'orderby'         => "$orderby",
    'category_name'   => "$category",
  );

  $query = new WP_Query($args);

  if($design == "blocks"){
      $output = "<div class='row custom-query-container'>";

      if($query->have_posts()){
        while($query->have_posts()){
          $query->the_post();

          //Open individual post container
          $output .= "<div class='col-lg-4 custom-query-single-post'>";

          //Featured Image
          if($image == "yes"){
            $output .= '<div class="custom-query-featured-image">' . get_the_post_thumbnail($query->ID, 'medium') . '</div>';
          }

          //Post Title
          $output .= "<div class='custom-query-post-title'>";
          $output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
          $output .= "</div>";

          //Excerpt
          if($excerpt == "yes"){
            $output .= '<p class="custom-query-excerpt">' . get_the_excerpt() . '</p>';
          }

          $output .= "</div>";
        }//End While Loop
      }//End If statement

      $output .= "</div>";

      return $output;
  }elseif($design == "list"){
    $output = "<div class='row custom-query-list-container'>";

    if($query->have_posts()){
      //Open individual post container
      $output .= "<ul class='col-lg-12 custom-query-list-single-post'>";

      while($query->have_posts()){
        $query->the_post();

        //Post Title
        $output .= "<li class='custom-query-list post-title'>";
        $output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
        $output .= "</li>";
      }//End While Loop

      $output .= "</ul>";
    }//End If statement

    $output .= "</div>";

    return $output;

  }
}//Ends Function

add_shortcode('ev-custom-query', 'customQueryShortcode');

?>
