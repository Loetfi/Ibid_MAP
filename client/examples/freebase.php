<?php
/**
 * Grab some The Dead Weather albums from Freebase
 */
require(__DIR__ . '/../bootstrap.php');

$uri = "http://localhost/ibid_corporate/map/api/user_all";
$response = \Httpful\Request::get($uri)
    ->expectsJson()
    ->sendIt();

echo 'The Dead Weather has ' . count($response->body->result->user_list) . " albums.\n";