<?php
  require_once('../private/initialize.php');



  // Set default values for all variables the page needs.
  $error_messages = array(); // Initialize an array

  // if this is a POST request, process the form
  // Hint: private/functions.php can help
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Confirm that POST values are present before accessing them.
    if (!empty($_POST['first_name'])) {
      $first_name = process_input($_POST['first_name']);
      if (!has_length($first_name, ['min' => 2, 'max' => 255])) {
        array_push($error_messages, "First Name should be between 2 and 255 characters");
        $first_name_error = true;
      }
      if (!validate_name($first_name)) {
        array_push($error_messages, "Name fields must only contain letters, spaces, and the following symbols: - , . '");
        $first_name_error = true;
      }
    } else {
      array_push($error_messages, "First Name field cannot be empty");
      $first_name_error = true;
    }

    if (!empty($_POST['last_name'])) {
      $last_name = process_input($_POST['last_name']);
      if (!has_length($last_name, ['min' => 2, 'max' => 255])) {
        array_push($error_messages, "Last Name should be between 2 and 255 characters");
        $last_name_error = true;
      }
      if (!validate_name($last_name)) {
        array_push($error_messages, "Name fields must only contain letters, spaces, and the following symbols: - , . '");
        $last_name_error = true;
      }
    } else {
      array_push($error_messages, "Last Name field cannot be empty");
      $last_name_error = true;
    }

    if (!empty($_POST['email'])) {
      $email = process_input($_POST['email']);
      if (!has_length($email, ['max' => 255])) {
        array_push($error_messages, "Email cannot be more than 255 characters");
        $email_error = true;
      }
      if (!validate_email($email)) {
        array_push($error_messages, "Email must only contain letters, numbers, @ symbol, and underscores");
        $email_error = true;
      }

    } else {
      array_push($error_messages, "Email field cannot be empty");
      $email_error = true;
    }

    if (!empty($_POST['username'])) {
      $username = process_input($_POST['username']);
      if (!has_length($username, ['min' => 8, 'max' => 255])) {
        array_push($error_messages, "Username should be between 8 and 255 characters");
        $username_error = true;
      }
      if (!validate_username($username)) {
        array_push($error_messages, "Username must only contain letters, numbers, and underscores");
        $username_error = true;
      }
      if (username_exists($db, $username)) {
        array_push($error_messages, "Username already exists; please choose a different username");
        $username_error = true;
      }

    } else {
      array_push($error_messages, "Username field cannot be empty");
      $username_error = true;
    }


    // Perform Validations
    // Hint: Write these in private/validation_functions.php

    // if there were no errors, submit data to database

      // Write SQL INSERT statement
      // $sql = "";

      // For INSERT statments, $result is just true/false
      // $result = db_query($db, $sql);
      // if($result) {
      //   db_close($db);

      //   TODO redirect user to success page

      // } else {
      //   // The SQL INSERT statement failed.
      //   // Just show the error, not the form
      //   echo db_error($db);
      //   db_close($db);
      //   exit;
      // }

    }

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<style>
  .error {background-color: rgba(215, 101, 89, 0.75)};
</style>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php
    // TODO: display any form errors here
    // Hint: private/functions.php can help
    if (!empty($error_messages)) {
      echo display_errors($error_messages);
    }
  ?>

  <!-- TODO: HTML form goes here -->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <label>First Name:</label>
    <input type="text" name="first_name" value="<?php if(isset($first_name)) echo $first_name ?>"
      class="<?php if (isset($first_name_error) && $first_name_error)echo 'error';?>">
    <br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" value="<?php if(isset($last_name)) echo $last_name ?>"
      class="<?php if (isset($last_name_error) && $last_name_error)echo 'error';?>">
    <br><br>

    <label>Email:</label>
    <input type="text" name="email" value="<?php if(isset($email)) echo $email ?>"
      class="<?php if (isset($email_error) && $email_error)echo 'error';?>">
    <br><br>

    <label>Username:</label>
    <input type="text" name="username" value="<?php if(isset($username)) echo $username ?>"
      class="<?php if (isset($username_error) && $username_error) echo 'error';?>">

    <button type="submit">Submit</button>
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
