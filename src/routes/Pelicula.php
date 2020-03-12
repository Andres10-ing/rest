<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Get All Pelicula
$app->get('/api/Pelicula', function(Request $request, Response $response){
    $sql = "SELECT * FROM Pelicula";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $Pelicula = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($Pelicula);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get Single Pelicula
$app->get('/api/Pelicula/{id_pel}', function(Request $request, Response $response){
    $id = $request->getAttribute('id_pel');

    $sql = "SELECT * FROM Pelicula WHERE id_pel = $id_pel";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $Pelicula = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($Pelicula);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Add Pelicula
$app->post('/api/Pelicula/add', function(Request $request, Response $response){
    $titulo_pel = $request->getParam('titulo_pel');
    $director_pel = $request->getParam('director_pel');
    $Productora_pel = $request->getParam('Productora_pel');
    $year_pel = $request->getParam('year_pel');
    $Duracion_pel = $request->getParam('Duracion_pel');
    

    $sql = "INSERT INTO Pelicula (titulo_pel,director_pel,Productora_pel,year_pel,Duracion_pel,city,state) VALUES
    (:titulo_pel,:director_pel,:Productora_pel,:year_pel,:Duracion_pel,:city,:state)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':titulo_pel', $titulo_pel);
        $stmt->bindParam(':director_pel',  $director_pel);
        $stmt->bindParam(':Productora_pel',      $Productora_pel);
        $stmt->bindParam(':year_pel',      $year_pel);
        $stmt->bindParam(':Duracion_pel',    $Duracion_pel);
       

        $stmt->execute();

        echo '{"notice": {"text": "Pelicula Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update Pelicula
$app->put('/api/Pelicula/update/{id_pel}', function(Request $request, Response $response){
    $id_pel = $request->getAttribute('id_pel');
    $titulo_pel = $request->getParam('titulo_pel');
    $director_pel = $request->getParam('director_pel');
    $Productora_pel = $request->getParam('Productora_pel');
    $year_pel = $request->getParam('year_pel');
    $Duracion_pel = $request->getParam('Duracion_pel');
    

    $sql = "UPDATE Pelicula SET
				titulo_pel 	= :titulo_pel,
				director_pel 	= :director_pel,
                Productora_pel		= :Productora_pel,
                year_pel		= :year_pel,
                Duracion_pel 	= :Duracion_pel,
			WHERE id_pel = $id_pel";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':titulo_pel', $titulo_pel);
        $stmt->bindParam(':director_pel',  $director_pel);
        $stmt->bindParam(':Productora_pel',      $Productora_pel);
        $stmt->bindParam(':year_pel',      $year_pel);
        $stmt->bindParam(':Duracion_pel',    $Duracion_pel);
        

        $stmt->execute();

        echo '{"notice": {"text": "Pelicula Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Delete Pelicula
$app->delete('/api/Pelicula/delete/{id_pel}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "DELETE FROM Pelicula WHERE id_pel = $id_pel";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Pelicula Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
