<?php
error_reporting(-1);
ini_set('display_errors', 1);
require __DIR__ . '/vendor/autoload.php';
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;



$db_shit = 'mysql:dbname=DTM;host=127.0.0.1';
$db_user = 'root';
$db_pass = 'root';
$SQL_query = 'SELECT * FROM items WHERE author_id = 1;';

try {
$db = new PDO($db_shit, $db_user, $db_pass);
}
 catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {

/*  $db_prepared = $db->prepare('SELECT * FROM items WHERE author_id = :id;', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$db_prepared->execute(array('id' => 1));
$query = $db_prepared->fetchAll();
$data = [];
foreach ($query as $sth) {
$data[] = ['item' => $sth['item']];
}
$json = json_encode($data); 
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response; */

$ran_bytes = random_bytes(20);

    $response->getBody()->write(bin2hex($ran_bytes));
    return $response;

});

$app->run();

