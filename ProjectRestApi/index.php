<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/$class.php";
});

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");
header("Content-type: application/json; charset=UTF-8");

$parts = explode('/', $_SERVER["REQUEST_URI"]);

if ($parts[1] != "ProjectRestApi") {
    echo $parts[1];
    http_response_code(404);
    exit;
}

$dni = $parts[2] ?? null;

$database = new Database("localhost", 'boxingevents', 'boxeruser', 'abc123.');
$operation = new Operations($database);
$controller = new BoxerController($operation);
$controller->processRequest($_SERVER["REQUEST_METHOD"], $dni);


?>