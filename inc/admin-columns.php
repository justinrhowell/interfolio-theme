<?php
/**
 * Adds featured column and sets column order
 */
add_filter('manage_inf_resource_single_posts_columns', 'custom_resource_columns');
add_filter('manage_inf_news_and_events_posts_columns', 'custom_news_and_events_columns');
add_filter('manage_page_posts_columns', 'custom_page_columns');
add_filter('manage_inf_client_single_posts_columns', 'custom_client_columns');
add_filter('manage_inf_open_position_posts_columns', 'custom_open_position_columns');
add_filter('manage_inf_team_member_posts_columns', 'custom_team_member_columns');
add_filter('manage_inf_landing_single_posts_columns', 'custom_landing_columns');
function custom_resource_columns($columns){
  $columns = [
    'cb' => $columns['cb'],
    'title' => __('Title'),
    'featured' => __('Featured'),
    'is_hidden' => __('Hidden'),
    'taxonomy-inf_resources' => __('Resource Type'),
    'date' => __('Date'),
  ];
  return $columns;
}

function custom_news_and_events_columns($columns){
  $columns = [
    'cb' => $columns['cb'],
    'title' => __('Title'),
    'featured' => __('Featured'),
    'is_hidden' => __('Hidden'),
    'taxonomy-inf_news_and_events_categories' => __('News and Events Type'),
    'date' => __('Date'),
  ];
  return $columns;
}

function custom_page_columns($columns){
  $columns = [
    'cb' => $columns['cb'],
    'title' => __('Title'),
    'author' => __('Author'),
    'is_hidden' => __('Hidden'),
    'tags' => __('Tags'),
    'date' => __('Date'),
  ];
  return $columns;
}

function custom_client_columns($columns){
  $columns = [
    'cb' => $columns['cb'],
    'title' => __('Title'),
    'author' => __('Author'),
    'is_hidden' => __('Hidden'),
    'tags' => __('Tags'),
    'taxonomy-inf_client_types' => __('Client Types'),
    'date' => __('Date'),
  ];
  return $columns;
}

function custom_open_position_columns($columns){
  $columns = [
    'cb' => $columns['cb'],
    'title' => __('Title'),
    'author' => __('Author'),
    'is_hidden' => __('Hidden'),
    'tags' => __('Tags'),
    'taxonomy-inf_departments' => __('Department'),
    'date' => __('Date'),
  ];
  return $columns;
}

function custom_team_member_columns($columns){
  $columns = [
    'cb' => $columns['cb'],
    'title' => __('Title'),
    'is_hidden' => __('Hidden'),
    'tags' => __('Tags'),
    'taxonomy-inf_teams' => __('Team'),
    'date' => __('Date'),
  ];
  return $columns;
}

function custom_landing_columns($columns){
  $columns = [
    'cb' => $columns['cb'],
    'title' => __('Title'),
    'is_hidden' => __('Hidden'),
    'tags' => __('Tags'),
    'date' => __('Date'),
  ];
  return $columns;
}

/**
 * Allows featured column to be sortable
 */
add_filter('manage_edit-inf_resource_single_sortable_columns', 'featured_sortable_columns');
add_filter('manage_edit-inf_news_and_events_sortable_columns', 'featured_sortable_columns');
function featured_sortable_columns($columns){
  $columns['featured'] = 'is_featured';
  return $columns;
}

/**
 * Outputs a checkmark for featured posts
 */
add_action('manage_inf_resource_single_posts_custom_column', 'featured_column_value', 10, 2);
add_action('manage_inf_news_and_events_posts_custom_column', 'featured_column_value', 10, 2);
function featured_column_value($column, $post_id){
  if ($column == 'featured' && get_field('is_featured', $post_id)) {
    echo '<i class="fas fa-check"></i>';
  }
}

/**
 * Handles sorting by featured posts
 */
add_action('pre_get_posts', 'admin_featured_posts_orderby');
function admin_featured_posts_orderby($query){
  if (!is_admin() || !$query->is_main_query()) {
    return;
  }

  if ('is_featured' === $query->get('orderby')) {
    $query->set('orderby', 'meta_value');
    $query->set('meta_key', 'is_featured');
  }
}

/**
 * Allows hidden column to be sortable
 */
add_filter('manage_edit-inf_resource_single_sortable_columns', 'hidden_sortable_columns');
add_filter('manage_edit-inf_news_and_events_sortable_columns', 'hidden_sortable_columns');
add_filter('manage_edit-page_sortable_columns', 'hidden_sortable_columns');
add_filter('manage_edit-inf_client_single_sortable_columns', 'hidden_sortable_columns');
add_filter('manage_edit-inf_open_position_sortable_columns', 'hidden_sortable_columns');
add_filter('manage_edit-inf_team_member_sortable_columns', 'hidden_sortable_columns');
add_filter('manage_edit-inf_landing_single_sortable_columns', 'hidden_sortable_columns');
function hidden_sortable_columns($columns){
  $columns['is_hidden'] = 'is_hidden';
  return $columns;
}

/**
 * Outputs a checkmark for hidden posts
 */
add_action('manage_inf_resource_single_posts_custom_column', 'hidden_column_value', 10, 2);
add_action('manage_inf_news_and_events_posts_custom_column', 'hidden_column_value', 10, 2);
add_action('manage_page_posts_custom_column', 'hidden_column_value', 10, 2);
add_action('manage_inf_client_single_posts_custom_column', 'hidden_column_value', 10, 2);
add_action('manage_inf_open_position_posts_custom_column', 'hidden_column_value', 10, 2);
add_action('manage_inf_team_member_posts_custom_column', 'hidden_column_value', 10, 2);
add_action('manage_inf_landing_single_posts_custom_column', 'hidden_column_value', 10, 2);
function hidden_column_value($column, $post_id){
  if ($column == 'is_hidden' && get_field('is_hidden', $post_id)) {
    echo '<i class="fas fa-check"></i>';
  }
}

/**
 * Handles sorting by hidden posts
 */
add_action('pre_get_posts', 'admin_hidden_posts_orderby');
function admin_hidden_posts_orderby($query){
  if (!is_admin() || !$query->is_main_query()) {
    return;
  }

  if ('is_hidden' === $query->get('orderby')) {
    $query->set('orderby', 'meta_value');
    $query->set('meta_key', 'is_hidden');
  }
}