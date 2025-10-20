<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

// /* Rutas del api */
// //GET /cities

$app->get('/cities', function ($request, $response, $args) use ($pdo) {
    $consulta = $pdo->query("SELECT * FROM ciudad");
    $ciudades = $consulta->fetchAll(PDO::FETCH_ASSOC);

    $data = [
        'total' => count($ciudades),
        'ciudades' => $ciudades
    ];

    $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));

    return $response->withHeader('Content-Type', 'application/json');
});

//GET /cities/{id}

$app->get('/cities/{id}', function ($request, $response, $args) use ($pdo) {
    $id = $args['id'];
    $consulta = $pdo->prepare("SELECT * FROM ciudad WHERE id_ciudad = :id");
    $consulta->execute([':id' => $id]);

    $ciudad = $consulta->fetch(PDO::FETCH_ASSOC);

    if (!$ciudad) {
        echo ("No hay ninguna ciudad con ese id");
    } else {
        $data = [
            'ciudades' => $ciudad
        ];

        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    }
    return $response->withHeader('Content-Type', 'application/json');
});

//GET /airport

$app->get('/airports', function ($request, $response, $args) use ($pdo) {
    $consulta = $pdo->query("SELECT * FROM aeropuerto");
    $aeropuertos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    $data = [
        'total' => count($aeropuertos),
        'aeropuertos' => $aeropuertos
    ];

    $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));

    return $response->withHeader('Content-Type', 'application/json');
});

//GET /airport/{id}

$app->get('/airport/{id}', function ($request, $response, $args) use ($pdo) {
    $id = $args['id'];
    $consulta = $pdo->prepare("SELECT * FROM aeropuerto WHERE id_aeropuerto = :id");
    $consulta->execute([':id' => $id]);
    $aeropuerto = $consulta->fetch(PDO::FETCH_ASSOC);

    if (!$aeropuerto) {
        echo ("No hay ningún aeropuerto con ese id");
    } else {
        $data = [
            'aeropuertos' => $aeropuerto
        ];

        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    }
    return $response->withHeader('Content-Type', 'application/json');
});
