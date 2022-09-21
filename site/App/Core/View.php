<?php

namespace App\Core;

class View
{
  public function __construct()
  {
    echo ('test within the class');
  }


  /*
	* render the view
	* @params int 		$renderOption  (f0, f1, b0, b1) 0: noInclude, f: frontend, b: backend,
	* @params string 	$name
	* @params array 	$data
	* @params array 	$trans
	*/
  public static function render($renderOption, $path, $name, $data = array(), $trans  = array())
  {

    $paths = array(
      'f0' =>
      array(1 => $path . DS . $name . '.php'),
      'f1' =>
      array(
        1 => $path . DS  . 'header.php',
        3 => $path . DS  . $name . '.php',
        4 => $path . DS  . 'footer.php'
      ),
      'f2' =>
      array(
        1 => $path . DS  . 'header.php',
        2 => $path . DS  . 'navigation.php',
        3 => $path . DS  . $name . '.php',
        4 => $path . DS  . 'footer.php'
      )

    );

    /*renderPage() is in the Function.php file*/
    self::renderPage($renderOption, $paths, $data, $trans);
  }


  /*
    * rendering the page - View.php
    * @params   int    $renderOption 0,1,2
    * @params   array   $paths
    * @params   array   $data
    */
  public static function renderPage($renderOption, $paths = array(), $data = array(), $trans = array())
  {
    if (self::checkPath($renderOption, $paths)) {
      extract($data);
      extract($trans);
      foreach ($paths[$renderOption] as $path) {
        if (is_readable($path)) {
          require $path;
        } else {
          throw new \Exception("Functions.php : renderPage : NO such document exits : $path");
        }
      }
    } else
      throw new \Exception("Functions.php : renderPage : the checkPath : FAILED");
  } //END renderPage


  /*
    * Path checking at View base level - View.php
    * @params   int     $renderOption 0,1,2
    * @params   array   $paths
    */
  public static function checkPath($renderOption, $paths = array())
  {
    if (empty($renderOption))
      throw new \Exception("Functions.php : checkPath : renderOption required !");
    foreach ($paths[$renderOption] as $path)
      if (!is_readable($path))
        throw new \Exception("Functions.php : checkPath : File doesn't exist : $path");
      else
        return true;
  } //END checkPath








  //END-Class
}