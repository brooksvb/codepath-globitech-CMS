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
    if ($len < (isset($options['min']) ? $options['min'] : 0) ||
    $len > (isset($options['max']) ? $options['max'] : 255) ) {
      return false;
    } else {
      return true;
    }

  }

  function username_exists($db, $username) {
    $sql = 'SELECT EXISTS(SELECT * FROM users WHERE username ="'.$username.'") AS "check";';
    $result = db_query($db, $sql);
    if ($result !== false) {
      $ret = db_fetch_assoc($result)['check']; // Fetch first row from result, access column 'check'
      db_free_result($result); // Free the returned object
      return $ret;
    }
  }

  // has_valid_email_format('test@test.com')
  function validate_email($value) {
    // TODO
    $regexp = '/\A[A-Za-z0-9\_\.]+\@[A-Za-z0-9\_\.]+\.[A-Za-z]+\Z/'; // Reg exp for a proper email format

    return preg_match($regexp, $value);
    // strpos() returns position of substring inside value, or false if not found
    // For this reason, we must strict compare to false, because index 0 is falsey
    // return (strpos($value, '@') !== false);
  }

  function validate_name($value) {
    $regexp = '/\A[A-Za-z\s\-\,\.\']+\Z/'; // Allowed characters
    return preg_match($regexp, $value);
  }

  function validate_username($value) {
    $regexp = '/\A[A-Za-z0-9\_]+\Z/'; // alphanumeric and underscores
    return preg_match($regexp, $value);
  }

?>
