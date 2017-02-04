<?php

  // is_blank('abcd')
  function is_blank($value='') {
    // TODO
    return $value == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    // TODO
    $len = strlen($value);
    if ($len < empty($options['min']) ? 0 : $options['min'] ||
    $len > empty($options['max']) ? 255 : $options['max']) {
      return false;
    } else return true;

  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    // TODO
    $regexp = '\/A[A-Za-z]+@[A-Za-z]+.[A-Za-z]\\';
  }

?>
