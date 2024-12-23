<?php
//settings page for handling most general site functions
// define all site global functions to reference in all pages
include 'db.php';
$public = "public/"; // root location to assets and pages folder
session_start();
// connect database
$db = new Database();
$conn = $db->conn;

// function to get page render
// fetches controller and model file matching route name
function getPage($page, $category = null, $params = null)
{
  global $public, $conn;
  //get the model and controller constructors
  $modelClassname = ucfirst(explode(".", $page)[0]);
  $controllerClassname = "c" . ucfirst(explode(".", $page)[0]); // controller classname e.g 'cHome', 'cWelcome'
  // load model, controller file
  $model_filename = "models/" . ucfirst($page);
  $controller_filename = "controllers/" . ucfirst($page);
  if (file_exists($model_filename)) {
    include $model_filename;
    $model = new $modelClassname($conn, $category, $params);
    // run any init,constructor methods below before initialising pages.
    // model->fetchAll();
  }
  if (file_exists($controller_filename)) {
    include $controller_filename;
    $controller = new $controllerClassname($conn, $params);
    $req_method = $_SERVER['REQUEST_METHOD'];
    // if($params!=null){
    //     // if(array_key_exists('extra', $params)){
    //     //     $controller->handleSpecial($params['extra']);
    //     // }
    // }
    // handle post if request method is post
    if ($req_method == "POST") $controller->handlePost();
  }
  // load view
  include $public . "pages/$page";
}

function log_error($body, $date)
{
  // log error to local logs file or handle log
  //sample = Log: User #1 Logged In - Mozila Firefox - [2020-04-04]
}

function destroy_session($session)
{
  if (isset($_SESSION[$session])) {
    unset($_SESSION[$session]);
    session_destroy();
    header('location: /');
    return true;
  }
}

// error handler page
function display_error($error, $tag, $type = null)
{
  if ($type == "full") {
    $_SESSION['error_vars'] = array($error, $tag);
    header("location: /404.php");
  } else {
    include '404.php';
  }
  return true;
}

// success api page if needed
function display_success($success, $tag, $type = null)
{
  if ($type == "full") {
    $_SESSION['success_vars'] = array($success, $tag);
    header("location: /200.php");
  } else {
    include '200.php';
  }
  return true;
}

// load header config;
function display_header($title, $type)
{
  // $title and $type will be used in php header file
  // $type = if render type is html => show html headers; show api headers
  global $public;
  include $public . "includes/header.php";
}
function display_footer()
{
  global $public;
  include $public . "includes/footer.php";
}
// custom navbar if needed
function display_navbar()
{
  global $public;
  include $public . "includes/navbar.php";
}

// load your own custom include files
function getInclude($page)
{
  global $public;
  include $public . "inc/$page";
}

// misc function to generate random character/unique id
function generaterand($length)
{
  $res = "";
  $strs = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvXxYyZz";
  for ($i = 0; $i < $length; $i++) {
    $res .= $strs[rand(0, 49)];
  }
  return $res;
}

// custom splitstring function
function strsplit($var)
{
  $var1 = explode("-", $var);
  // $var2 = explode("%", $var1[1]);
  if (sizeof($var1) > 1)
    return $var1[1];
  else
    return $var1[0];
}

// write your custom functions below
// e.g custom function to construct menu items
// custom function to load all users in a db
// ** can be accessed from any page
function construct_menu() {
  return array('Home', 'Shop', 'Products');
}
