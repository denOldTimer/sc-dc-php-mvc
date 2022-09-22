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

  public function createAction($args = array())
  {
    header('Content-Type: application/json');
    if (isset($_POST['title'])) {

      $movie = array();
      $movie["title"] = $_POST['title'];
      $movie["ptitle"] = str_replace(" ", "-", strtolower($_POST['title']));
      $movie["storyline"] = $_POST['storyline'];
      $movie["lang"] = $_POST['lang'];
      $movie["genre"] = $_POST['genre'];
      $movie["release_date"] = $_POST['release_date'];
      $movie["box_office"] = $_POST['box_office'];
      $movie["runtime"] = $_POST['runtime'];
      $movie["stars"] =  $_POST['stars'];

      $movies = new mMovie;
      $allMovies = $movies->movieCreateByTitle($movie);
      $response = array();
      if ($allMovies == "true") {
        //Successfully  
        $response['error'] = false;
        $response['message'] = "The Movie created successfully";
        $response['response_code'] = 201;
      } else {
        // There was an error
        $response['error'] = true;
        $response['message'] = "Failed to create the movie";
        $response['response_code'] = 400;
      }
    } else {

      // No movie title was provided, we cannot get the movie
      $response['error'] = true;
      $response['message'] = "Please provide a title?";
      $response['response_code'] = 400;
    }
    // Display Results
    echo (json_encode($response));
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
    header('Content-Type: application/json');
    if ($args["id"] && $args["id"] > 0) {
      $movies = new mMovie;
      $allMovies = $movies->movieReadById($args["id"]);
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
    } else {
      // No movie title was provided, we cannot get the movie
      $response['error'] = true;
      $response['message'] = "Please provide a exact movie id?";
      $response['response_code'] = 400;
    }
    // Display Results
    echo (json_encode($response));
  }

  public function readByTitleAction($args = array())
  {
    header('Content-Type: application/json');
    if ($args["ptitle"]) {
      $movies = new mMovie;
      $allMovies = $movies->movieReadByTitle($args["ptitle"]);
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
    } else {
      $response['error'] = true;
      $response['message'] = "Please provide a exact movie Title?";
      $response['response_code'] = 400;
    }
    // Display Results
    echo (json_encode($response));
  }

  public function updateAction($args = array())
  {
    header('Content-Type: application/json');
    if (isset($_POST['id'])) {

      $movie = array();
      $movie["id"] = $_POST['id'];
      $movie["title"] = $_POST['title'];
      $movie["ptitle"] = str_replace(" ", "-", strtolower($_POST['title']));
      $movie["storyline"] = $_POST['storyline'];
      $movie["lang"] = $_POST['lang'];
      $movie["genre"] = $_POST['genre'];
      $movie["release_date"] = $_POST['release_date'];
      $movie["box_office"] = $_POST['box_office'];
      $movie["runtime"] = $_POST['runtime'];
      $movie["stars"] =  $_POST['stars'];

      $movies = new mMovie;
      $allMovies = $movies->movieUpdateById($_POST['id'], $movie);
      $response = array();
      if ($allMovies == "true") {
        //Successfully  
        $response['error'] = false;
        $response['message'] = "The Movie updated successfully";
        $response['response_code'] = 201;
      } else {
        // There was an error
        $response['error'] = true;
        $response['message'] = "Failed to update the movie";
        $response['response_code'] = 400;
      }
    } else {

      // No movie title was provided, we cannot get the movie
      $response['error'] = true;
      $response['message'] = "Please provide a title?";
      $response['response_code'] = 400;
    }
    // Display Results
    echo (json_encode($response));
  }

  protected function after()
  {
  }

  //END-Class
}