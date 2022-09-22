<?php

/** !!!! BE SPECIFIC WHEN CREATING ROUTES !!!!
 * 
 * The Generic examples is to give you an idea how to create routes
 * 
 */

return (object) array(


  //FRONTEND - GET REQUESTS
  //1. REQUEST_URI is empty,
  '/' => ['lang' => 'en', 'namespace' => 'Site', 'controller' => 'Home', 'action' => 'index'],
  //2. REQUEST_URI has no action => index
  '/home'            => ['namespace' => 'Site', 'controller' => 'Home', 'action' => 'index'],
  '/about'           => ['namespace' => 'Site', 'controller' => 'About', 'action' => 'index'],
  '/contact'         => ['namespace' => 'Site', 'controller' => 'Contact', 'action' => 'index'],
  '/contact/succes'  => ['namespace' => 'Site', 'controller' => 'Contact', 'action' => 'succes'],
  '/{lang}/home'            => ['namespace' => 'Site', 'controller' => 'Home', 'action' => 'index'],
  '/{lang}/about'           => ['namespace' => 'Site', 'controller' => 'About', 'action' => 'index'],
  '/{lang}/contact'         => ['namespace' => 'Site', 'controller' => 'Contact', 'action' => 'index'],
  '/{lang}/contact/succes'  => ['namespace' => 'Site', 'controller' => 'Contact', 'action' => 'succes'],

  //API BLOGPOST - GET REQUESTS 
  '/api/post/read/{id:\d+}'           => ['namespace' => 'Api', 'controller' => 'Post', 'action' => 'read'],
  '/api/post/read/{id:\d+}/{ptitle}'  => ['namespace' => 'Api', 'controller' => 'Post', 'action' => 'read'],

  //API MOVIES - GET/POST REQUESTS
  '/api/movie/read'  => ['namespace' => 'Api', 'controller' => 'Movie', 'action' => 'readAll'],
  '/api/movie/read/{id:\d+}'  => ['namespace' => 'Api', 'controller' => 'Movie', 'action' => 'readById'],
  '/api/movie/read/{ptitle}'  => ['namespace' => 'Api', 'controller' => 'Movie', 'action' => 'readByTitle'],
  '/api/movie/create'  => ['namespace' => 'Api', 'controller' => 'Movie', 'action' => 'create'],
  '/api/movie/update'  => ['namespace' => 'Api', 'controller' => 'Movie', 'action' => 'update'],

  //BACKEND - POST REQUESTS VIA FORMS
  '/admin/login' => ['namespace' => 'Admin', 'controller' => 'Login', 'action' => 'index'],




  //END-Object
);



/** GENERIC ROUTES BYPASS THE ERROR 404 PAGE NOT FOUND SO DO NOT USE IF POSABLE
 * 
 *   GENERIC ROUTES DO NOT NEED PARAMETERS THUS THE EMPTY ARRAY
 * 
 *   BACKEND ROUTES WITH NAMESPACES
 *    '/{namespace}/{controller}/{action}/{id:\d+}/{ptitle}' => [''],
 * 
 *   BACKEND ROUTES WITH PREDETERMINED NAMESPACES
 *    '/api/{controller}/{action}/{id:\d+}/{ptitle}' => ['namespace' => 'Api'],
 * 
 *   BACKEND ROUTES WITH NAMESPACES WITH TRANSLATION
 *    '/{lang}/{namespace}/{controller}/{action}/{id:\d+}/{ptitle}' => [''],
 * 
 * 
 * 
 * 
 * ---------------------- Router Samples ---- how to be more exact in your routing ------------------
 * 
 * '{lang}/{controller}/{action}/{data}', ['data => $data'] 
 * '{controller}/{action}/{name}' , [ 'controller' => 'Contact', 'action' => 'success' ] 
 * '{controller}/{action}/{id:\d+}/{title}' , [ 'controller' => 'BlogList', 'action' => 'index' ] 
 * '{controller}/{action}/{id:\d+}/{title}' , [ 'controller' => 'Blog', 'action' => 'page' ]
 * 
 * ---------------------- Router Samples ---- how to be more exact in your routing ------------------
 * 
 * 
 * 
 */