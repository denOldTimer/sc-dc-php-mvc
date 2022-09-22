<?php

namespace App\Controllers\Api;

use App\Core\Controller;

use App\Models\mMovie;


/**
 *  Api - Read - test namespaces
 */
class Movie extends Controller
{
  protected function before()
  {
  }

  public function indexAction($args = array())
  {
    echo ('in the post -> index action method <br>');
    var_dump($args);
  }

  public function readAllAction($args = array())
  {
    header('Content-Type: application/json');
    $movies = new mMovie;
    $allMovies = $movies->movieReadAll();

    //var_dump($allMovies);

    $response = array();
    if ($allMovies) {
      //Successfully  
      $response['error'] = false;
      $response['movies'] = $allMovies;
      $response['message'] = "movies returned successfully";
      $response['response_code'] = 200;
    } else {
      // There was an error
      $response['error'] = true;
      $response['message'] = "Could not execute query";
      $response['response_code'] = 400;
    }


    // Display Results
    echo (json_encode($response));
  }

  public function readByIdAction($args = array())
  {
    echo ('in the post -> read action method <br>');
    var_dump($args);
  }

  public function readByTitleAction($args = array())
  {
    echo ('in the post -> read action method <br>');
    var_dump($args);
  }

  protected function after()
  {
  }

  //END-Class
}