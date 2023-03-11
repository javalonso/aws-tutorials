<?php
header('Content-Type: application/json');
require "vendor/autoload.php";
use Aws\Ssm\SsmClient;
use Aws\Exception\AwsException;


$client = new SsmClient([
    'version'=> 'latest',
    'region' => "us-east-1",
    'credentials' => [
        'key'    => 'YOUR-KEY-HERE',
        'secret' => 'YOUR-SECRET-HERE',
    ],


]);



function GetParams($client) {
  try {

    $parameters = $client->getParameter([
            'Name' => 'Javier1',
            'WithDecryption' => true
    ]);
} catch (SsmException $e) {
        echo $e->getMessage() . "\n";
}
echo "Printing Param results: $parameters";
}

GetParams($client); // call the function



   





?>