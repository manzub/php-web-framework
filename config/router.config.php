<?php
include 'settings.php';
function routerFunction($route, $expected = null, $params = null)
{
  // define all routes and behaviours
  // e.g ['','/'] - render home page
  // key functions - display_header ** show header props, - getPage ** get page HTML from publics/pages folder
  switch ($route) {
    case '':
      if ($expected)
        return;
      display_header("Home", "html");
      getPage("home.php");
      break;
    case 'shop':
      if ($expected < sizeof($params)) return;
      if (isset($_GET['page'])) {
        $params['extra'] = $_GET['page'];
      }
      display_header("Shop", "html");
      getPage("shop.php", null, $params);
      break;
    default:
      # code...
      break;
  }
}
