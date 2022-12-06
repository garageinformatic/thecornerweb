<?php
/*
Plugin Name: pluginCorner
Plugin URI: https://prueba1.server2.trinchera.dev/pluginCorner/v1
Description: Plugin para la utilizacion de bases de datos externas
Version: 1
Author: Marcel Farre / Jordi Mora
License: GPL2
*/

header("Access-Control-Allow-Origin: *");

add_action( 'rest_api_init', function () {
  register_rest_route( 'pluginCorner/v1', 'consultaAll', array(
    'methods' => 'GET',
    'callback' => 'getUsersAll',
  ) );

  register_rest_route( 'pluginCorner/v1', 'consultaById/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'getUsers',
  ) );

  register_rest_route( 'pluginCorner/v1', 'personalData', [
    'methods' => 'POST',
    'callback' => 'postPersUsers',
    'args' => [
      
      'nombre' => [
        'required' => true,
        'type' => 'text,'
      ],

      'nif' => [
        'required' => true,
        'type' => 'text,'
      ],

      'email' => [
        'required' => true,
        'type' => 'text,'
      ],

      'telefono' => [
        'required' => true,
        'type' => 'text,'
      ],

      'entidad' => [
        'required' => true,
        'type' => 'text,'           
      ],

      'denominacion' => [
        'required' => true,
        'type' => 'text,'
      ],

      'fechanacimiento' => [
        'required' => true,
        'type' => 'text,'
      ],

      'genero' => [
        'required' => true,
        'type' => 'text,'
      ],

      'nass' => [
        'required' => true,
        'type' => 'text,'
      ],

      'domicilio' => [
        'required' => true,
        'type' => 'text,'
      ],

      'cp' => [
        'required' => true,
        'type' => 'text,'
      ],

      'poblacion' => [
        'required' => true,
        'type' => 'text,'
      ],

    ],
    'permission_callback' => function(){
      return current_user_can( 'edit_others_posts' );
    } 
  ]);

  register_rest_route( 'pluginCorner/v1', 'leadData', [
    'methods' => 'POST',
    'callback' => 'postUsers',
    'args' => [
      
      'nombre' => [
        'required' => true,
        'type' => 'text,'
      ],

      'nif' => [
        'required' => true,
        'type' => 'text,'
      ],

      'email' => [
        'required' => true,
        'type' => 'text,'
      ],

      'telefono' => [
        'required' => true,
        'type' => 'text,'
      ],

    ],
    'permission_callback' => function(){
      return current_user_can( 'edit_others_posts' );
    } 
  ]);

  register_rest_route( 'pluginCorner/v1', 'additionalData', [
    'methods' => 'POST',
    'callback' => 'postAdiUsers',
    'args' => [

      'entidad' => [
        'required' => true,
        'type' => 'text,'           
      ],

      'denominacion' => [
        'required' => true,
        'type' => 'text,'
      ],

      'fechanacimiento' => [
        'required' => true,
        'type' => 'text,'
      ],

      'genero' => [
        'required' => true,
        'type' => 'text,'
      ],

      'nass' => [
        'required' => true,
        'type' => 'text,'
      ],

      'domicilio' => [
        'required' => true,
        'type' => 'text,'
      ],

      'cp' => [
        'required' => true,
        'type' => 'text,'
      ],

      'poblacion' => [
        'required' => true,
        'type' => 'text,'
      ],

    ],
    'permission_callback' => function(){
      return current_user_can( 'edit_others_posts' );
    } 
  ]);

  register_rest_route( 'pluginCorner/v1', 'companyData', [
    'methods' => 'POST',
    'callback' => 'postCompany',
    'args' => [
        
      'razonsocial' => [
        'required' => true,
        'type' => 'text,'
      ],

      'sector' => [
        'required' => true,
        'type' => 'text,'
      ],

      'convenio' => [
        'required' => true,
        'type' => 'text,'
      ],

      'cif' => [
        'required' => true,
        'type' => 'text,'
      ],

      'inscripcions' => [
        'required' => true,
        'type' => 'text,'
      ],

      'ntrabajadores' => [
        'required' => true,
        'type' => 'text,'
      ],

      'centrotrabajo' => [
        'required' => true,
        'type' => 'text,'
      ],

      'cp2' => [
        'required' => true,
        'type' => 'text,'
      ],

      'poblacion2' => [
        'required' => true,
        'type' => 'text,'
      ],

      'comarca2' => [
        'required' => true,
        'type' => 'text,'
      ],

      'conocurso' => [
        'required' => true,
        'type' => 'text,'
      ],
      
      'autorizconsorcio' => [
        'required' => true,
        'type' => 'text,'
      ],

      'facademica' => [
        'required' => true,
        'type' => 'text,'
      ],

      'arfuncional' => [
        'required' => true,
        'type' => 'text,'
      ],

      'categoriaso' => [
        'required' => true,
        'type' => 'text,'
      ],

    ],
    'permission_callback' => function(){
      return current_user_can( 'edit_others_posts' );
    } 
  ]);

});



//Función Callback
  function getUsersAll($data) {
    global $wpdb;
  
    $table = $wpdb-> dbname.'preusers';
    $sql = "SELECT * FROM $table";
    $post_id = $data['id'];
  
    $result = $wpdb->get_results( $wpdb->prepare( $sql, $post_id ) );
  
    return $wpdb->dbname;
  }
  function getUsers($data) {
    global $wpdb;
  
    $table = $wpdb-> prefix .'preusers';
    $sql = "SELECT * FROM $table where id = %d";
    $post_id = $data['id'];
  
    $result = $wpdb->get_results( $wpdb->prepare( $sql, $post_id ) );
  
    return $result;
  }
  
  /*
  function postUsers($data) {
    global $wpdb;

    $table = $wpdb-> wp_9unxs.'preusers';
    $preparedStatement = $table->prepare('INSERT INTO table (nombre, nif, email, telefono) VALUES (:nombre, :nif, :email, :telefono)');

    $preparedStatement->execute([ 
      'nombre' => $data['nombre'],
      'nif' => $data['nif'],
      'email' => $data['email'],
      'telefono' => $data['telefono'],
   ]);
    
    return $wpdb;
  }

  function postAdiUsers($data) {
    global $wpdb;
    
    $table = $wpdb-> wp_9unxs.'preusers';
    $preparedStatement = $table->prepare('INSERT INTO table (entidad, denominacion, fnacimiento, genero, 
      nass, domicilio, cp, poblacion) VALUES (:entidad, :denominacion, :fnacimiento, :genero, :nass,
      :domicilio, :cp, :poblacion)');

    $preparedStatement->execute([ 
      'entidad' => $data['entidad'],
      'denominacion' => $data['denominacion'],
      'fnacimiento' => $data['fnacimiento'],
      'genero' => $data['genero'],
      'nass' => $data['nass'],
      'domicilio' => $data['domicilio'],
      'cp' => $data['cp'],
      'poblacion' => $data['poblacion'],
   ]);

    return $wpdb;
  }


  function postPersUsers($data) {
    global $wpdb;
    
    $table = $wpdb-> wp_9unxs.'preusers';
    
    $preparedStatement = $wpdb->prepare('INSERT INTO $table (nombre, nif, email, telefono, entidad, denominacion, fnacimiento, genero, 
      nass, domicilio, cp, poblacion, discapacidad, colectivo) 
      VALUES (:nombre, :nif, :email, :telefono, :entidad, :denominacion, :fnacimiento, :genero, 
      :nass, :domicilio, :cp, :poblacion, :discapacidad, :colectivo)');

    $preparedStatement->execute([ 
      'nombre' => $data['nombre'],
      'nif' => $data['nif'],
      'email' => $data['email'],
      'telefono' => $data['telefono'],
      'entidad' => $data['entidad'],
      'denominacion' => $data['denominacion'],
      'fnacimiento' => $data['fechanacimiento'],
      'genero' => $data['genero'],
      'nass' => $data['nass'],
      'domicilio' => $data['domicilio'],
      'cp' => $data['cp'],
      'poblacion' => $data['poblacion'],
      'discapacidad' => $data['discapacidad'],
      'colectivo' => $data['colectivo']
   ]);
   
    return $wpdb;
  }

  function postCompany($data) {
    global $wpdb;
    
    $table = $wpdb-> wp_9unxs.'precompany';

    $preparedStatement = $wpdb->prepare('INSERT INTO $table (razonsocial, sector, convenio, cif, inscripcions, 
    ntrabajadores, centrotrabajo, cp2, poblacion2, comarca2) VALUES (:razonsocial, :sector, :convenio, :cif, :inscripcions, 
    :ntrabajadores, :centrotrabajo, :cp2, :poblacion2, :comarca2)');

    $preparedStatement->execute([ 
      'razonsocial' => $data['razonsocial'],
      'sector' => $data['sector'],
      'convenio' => $data['convenio'],
      'cif' => $data['cif'],
      'inscripcions' => $data['inscripcions'],
      'ntrabajadores' => $data['ntrabajadores'],
      'centrotrabajo' => $data['centrotrabajo'],
      'cp2' => $data['cp2'],
      'poblacion2' => $data['poblacion2'],
      'comarca2' => $data['comarca2']
    ]);
    
    return $wpdb;
  }

  */

  function postUsers($data) {
    global $wpdb;
    
    $table = $wpdb-> wp_9unxs.'preusers';
    
    $wpdb->query( "INSERT INTO `$table` (`nombre`, `nif`, `email`, `telefono`) 
      VALUES ('$data[nombre]', '$data[nif]', '$data[email]', '$data[telefono]')");
    return $wpdb;
  }

  function postAdiUsers($data) {
    global $wpdb;
    
    $table = $wpdb-> wp_9unxs.'preusers';
    
    $wpdb->query( "INSERT INTO `$table` (`entidad`, `denominacion`, `fnacimiento`, `genero`, 
      `nass`, `domicilio`, `cp`, `poblacion`) 
      VALUES ('$data[entidad]', '$data[denominacion]', '$data[fechanacimiento]', '$data[genero]', '$data[nass]', 
      '$data[domicilio]', '$data[cp]', '$data[poblacion]')");

    return $wpdb;
  }

  function postPersUsers($data) {
    global $wpdb;
    
    $table = $wpdb-> wp_9unxs.'preusers';
    
    $wpdb->query( "INSERT INTO `$table` (`nombre`, `nif`, `email`, `telefono`, `entidad`, `denominacion`, `fnacimiento`, `genero`, 
      `nass`, `domicilio`, `cp`, `poblacion`, `discapacidad`, `colectivo`) 
      VALUES ('$data[nombre]', '$data[nif]', '$data[email]', '$data[telefono]', '$data[entidad]', '$data[denominacion]', '$data[fechanacimiento]', '$data[genero]', '$data[nass]', 
      '$data[domicilio]', '$data[cp]', '$data[poblacion]', '$data[discapacidad]', '$data[colectivo]')");

    return $wpdb;
  }

  function postCompany($data) {
    global $wpdb;
    
    $table = $wpdb-> wp_9unxs.'precompany';
    
    $wpdb->query( "INSERT INTO `$table` (`razonsocial`, `sector`, `convenio`, `cif`, `inscripcions`, `ntrabajadores`, 
      `centrotrabajo`, `cp2`, `poblacion2`, `comarca2`, `conocurso`, `autorizconsorcio`, `facademica`, `arfuncional`, 
      `categoriaso`) 
      VALUES ('$data[razonsocial]', '$data[sector]', '$data[convenio]', '$data[cif]', '$data[inscripcions]', '$data[ntrabajadores]', 
      '$data[centrotrabajo]', '$data[cp2]', '$data[poblacion2]', '$data[comarca2]', '$data[conocurso]', 
      '$data[autorizconsorcio]', '$data[facademica]', '$data[arfuncional]', '$data[categoriaso]')");

    return $wpdb;
  }
  
?>