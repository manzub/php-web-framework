<?php
// process any database actions for Home.php
class Home
{
  public $products;
  private $conn;
  public function __construct($conn)
  {
    $this->conn = $conn;
    $this->products = $this->fetchPopularProducts();
  }
  function fetchPopularProducts()
  {
    return array('1', '2', '3');
  }
}
