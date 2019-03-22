<?php

class DataObjects
{
  public $variableToCheck;

  // ####################################### Checks if the Input Registration Values are Valid #######################################
  public function register($firstName, $lastName, $username, $password, $email)
  {
    //if first and last names do not contain numbers and the others are strings
    if(is_string($firstName) && is_string($lastName) && is_string($username) && is_string($password) && is_string($email))
    {
      //checks the input email's format
      if (filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        echo "\r\nThe input values for the registration of $username are considered valid";
        $this->variableToCheck = 'true';
        return $this->variableToCheck;
      }
      echo "\r\nThe input email $email follows an invalid format";
      $this->variableToCheck = 'false';
      return $this->variableToCheck;
    }
    echo "\r\nSome registration inputs are not considered valid. Here are the following data types: ";
    echo "\r\nFirstname: ".gettype($firstName)."    Requires: String".
         "\r\nLastname: ".gettype($lastName)."    Requires: String".
         "\r\nUsername: ".gettype($username)."    Requires: String".
         "\r\nPassword: ".gettype($password)."    Requires: String".
         "\r\nEmail: ".gettype($email)."    Requires: String containing the email format";

    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }

  public function postQuack($userID, $quack, $date)
  {
    $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);

    if(is_int($userID) && !empty($quack) && (strlen($quack) < 256) && ($dateTime instanceof DateTime && $dateTime->format('Y-m-d H:i:s') == $date))
    {
      echo "\r\nThe input values for posting a Quack are considered valid";
      $this->variableToCheck = 'true';
      return $this->variableToCheck;
    }

    if(!($dateTime instanceof DateTime && $dateTime->format('Y-m-d H:i:s') == $date))
    {
      echo "\r\nThe input time and date $date is invalid";
      $this->variableToCheck = 'false';
      return $this->variableToCheck;
    }

    echo "\r\nSome post inputs are not considered valid. Here are the following data types: ";
    echo "\r\nUser ID: ".gettype($userID)."    Requires: Int".
         "\r\nQuack: ".gettype($quack)."    Requires: String with length between 1 to 255".
         "\r\nDate and Time: ".gettype($date)."    Requires: String containing the format Y-m-d H:i:s (YYYY-MM-DD HH:MM:SS)";

    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }

  public function followUser($loggedInUser, $userThatWillBeFollowed)
  {
    if(is_int($loggedInUser) && is_int($userThatWillBeFollowed))
    {
      $this->variableToCheck = 'true';
      return $this->variableToCheck;
    }
    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }

  public function likeQuack($quackID, $userID, $date)
  {
    $format = 'Y-m-d H:i:s';
    $dateTime = DateTime::createFromFormat($format, $date);

    if(is_int($quackID) && is_int($userID) && ($dateTime instanceof DateTime && $dateTime->format('Y-m-d H:i:s') == $date))
    {
      $this->variableToCheck = 'true';
      return $this->variableToCheck;
    }
    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }


  public function searchUser($username)
  {
    if(!empty($username) && is_string($username))
    {
      $this->variableToCheck = 'true';
      return $this->variableToCheck;
    }
    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }


  // ####################################### Object's toString to Print the Results #######################################
  public function __toString()
  {
    return (string) $this->variableToCheck;
  }
}
 ?>
