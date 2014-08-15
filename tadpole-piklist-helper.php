<?php
/*
Plugin Name: Tadpole Piklist Plugin
Plugin URI: https://tadpole.cc
Description: Adds User Taxonimies and Custom Post Types.
Version: 0.1.0
Author: Tadpole Collective 
Author URI: https://tadpole.cc
Plugin Type: Piklist
License: GPL2
*/

/*CPTS */

add_filter('piklist_post_types', 'tad_gwn_post_types');
function tad_gwn_post_types($post_types)
{
  $post_types = array_merge($post_types, array(
    'stories' => array(
      'labels' => piklist('post_type_labels', 'Stories')
      ,'title' => __('Enter a new Story Title')
      ,'public' => true
      ,'has_archive' => true
      ,'supports'           => array( 'title','revisions', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
      ,'taxonomies' => array('category', 'post_tag')
      ,'rewrite' => array(
        'slug' => 'stories'
      )
      ,'edit_columns' => array(
        'title' => __('Title')
        ,'author' => __('Mentee')
      )
    )
    ,'books' => array(
      'labels' => piklist('post_type_labels', 'Books')
      ,'title' => __('Enter a new Book Title')
      ,'public' => true
      ,'has_archive' => true
      ,'supports'           => array( 'title','revisions','editor', 'author', 'thumbnail', 'excerpt', 'comments' )
      ,'taxonomies' => array('category', 'post_tag')
      ,'rewrite' => array(
        'slug' => 'books'
      )
      ,'edit_columns' => array(
        'title' => __('Title')
      )
    )
    ,
    'people' => array(
      'labels' => piklist('post_type_labels', 'People')
      ,'title' => __('Enter a new Person')
      ,'public' => true
      ,'has_archive' => true
      ,'supports'           => array( 'title','revisions', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
      ,'taxonomies' => array('category', 'post_tag')
      ,'rewrite' => array(
        'slug' => 'people'
      )
      ,'edit_columns' => array(
        'title' => __('Title')
      )
    )
    ,'news' => array(
      'labels' => piklist('post_type_labels', 'News')
      ,'title' => __('Enter a new News Title')
      ,'supports' => array(
        'title'
        ,'revisions'
      )
      ,'public' => true
      ,'has_archive' => true
      ,'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
      ,'taxonomies' => array('category', 'post_tag')
      ,'rewrite' => array(
        'slug' => 'news'
      )
    )
  ));
 
  return $post_types;
}

/* Register Taxonomy */


add_filter('piklist_taxonomies', 'tadpole_genre_tax');
 function tadpole_genre_tax($taxonomies)
 {
   $taxonomies[] = array(
      'post_type' => 'stories'
      ,'name' => 'genres'
      ,'show_admin_column' => true
      ,'hide_meta_box' => true
      ,'configuration' => array(
        'hierarchical' => true
        ,'labels' => piklist('taxonomy_labels', 'Genres')
        ,'show_ui' => true
        ,'query_var' => true
        ,'rewrite' => array( 
          'slug' => 'genres' 
        )
      )
    );
return $taxonomies;
}

add_filter('piklist_taxonomies', 'tadpole_blog_cat_tax');
 function tadpole_blog_cat_tax($taxonomies)
 {
   $taxonomies[] = array(
      'post_type' => 'post'
      ,'name' => 'blog-categories'
      ,'show_admin_column' => true
      ,'hide_meta_box' => true
      ,'configuration' => array(
        'hierarchical' => true
        ,'labels' => piklist('taxonomy_labels', 'Blog Categories')
        ,'show_ui' => true
        ,'query_var' => true
        ,'rewrite' => array( 
          'slug' => 'blog-categories' 
        )
      )
    );
return $taxonomies;
}

add_filter('piklist_taxonomies', 'tadpole_badges_tax');
function tadpole_badges_tax($taxonomies)
  {
    $taxonomies[] = array(
      'object_type' => 'user'
      ,'name' => 'badges'
      ,'configuration' => array(
        'hierarchical' => true
        ,'labels' => piklist('taxonomy_labels', 'Badges')
        ,'show_ui' => true
        ,'query_var' => true
        ,'rewrite' => array(
          'slug' => 'badges'
        )
        ,'show_admin_column' => true
      )
    );

    return $taxonomies;
}

add_filter('piklist_taxonomies', 'tadpole_goals_tax');
function tadpole_goals_tax($taxonomies)
  {
    $taxonomies[] = array(
      'object_type' => 'user'
      ,'name' => 'goals'
      ,'configuration' => array(
        'hierarchical' => true
        ,'labels' => piklist('taxonomy_labels', 'Goals')
        ,'show_ui' => true
        ,'query_var' => true
        ,'rewrite' => array(
          'slug' => 'goals'
        )
        ,'show_admin_column' => true
      )
    );

    return $taxonomies;
}