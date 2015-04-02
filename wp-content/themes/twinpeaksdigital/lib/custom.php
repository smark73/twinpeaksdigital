<?php
/**
 * Custom functions
 */

// function to set width 100% when hiding sidebar for specific files in config.php
function is_wrapper_template($templates) {  
  $main_template = basename(roots_template_path());

  if (is_array($templates)) {
    return in_array($main_template, $templates);
  } else {
    return $main_template === $templates;
  }
}
