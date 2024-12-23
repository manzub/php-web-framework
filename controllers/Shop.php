<?php
class cShop
{
  private $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  // handle POST function
  public function handlePost()
  {
    $conn = $this->conn;
    if (isset($_POST)) {
      # do something....
    }
  }

  // you can add more functions below
}
