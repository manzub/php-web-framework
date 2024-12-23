<?php

/**
 * Handles all database functions -  can write your own functions and encryptions below and reference in any pages
 * All database connect,fetch,insert,update,delete function
 */
class Database
{
  public $conn;
  public function __construct()
  {
    $this->conn = $this->connect();
  }

  // connect to database
  function connect()
  {
    try {
      return mysqli_connect("localhost", "root", "", "default_db");
    } catch (Exception $e) {
      die("Connection Error: " . $e->getMessage());
    }
    return false;
  }

  // select query for any table
  function select($query)
  {
    if ($query) {
      if ($result = mysqli_query($this->conn, $query)) {
        $row = mysqli_fetch_assoc($result);
        return $row;
      }
    }
    return false;
  }

  // insert query
  function insert($query)
  {
    if ($query) {
      if ($result = mysqli_query($this->conn, $query))
        return true;
    }
    return false;
  }

  // count rows
  function num_rows($query)
  {
    if ($query) {
      if ($result = mysqli_query($this->conn, $query))
        return mysqli_num_rows($result);
    }
    return false;
  }
}
