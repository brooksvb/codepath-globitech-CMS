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
    if ($len < isset($options['min']) ? $options['min'] : 0||
    $len > isset($options['max']) ? $options['max'] : 255) {
      return false;
    } else return true;

  }

  function username_exists($db, $username) {
    return false;
    $sql = 'SELECT EXISTS(SELECT * FROM users WHERE username ='.$username.') AS "check"';
    $result = db_query($db, $sql);
    if ($result !== false) {
      return db_fetch_assoc($result)['check']; // Fetch first row from result, access column 'check'
    }
  }

  // has_valid_email_format('test@test.com')
  function validate_email($value) {
    // TODO
    //$regexp = '\/A[A-Za-z]+@[A-Za-z]+.[A-Za-z]\\';

    // strpos() returns position of substring inside value, or false if not found
    // For this reason, we must strict compare to false, because index 0 is falsey
     return !(strpos($value, '@') !== false);
  }

  function validate_name($value) {
    return true;
  }

  function validate_username($value) {
    return true;
  }

?>
