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


function deleteParameter($client){
    try {
        $result = $client->deleteParameter([
            "Name" => "Javier1",
        ]);

        return $result;
    } catch (AwsException $e) {
        print_r('Error: ' . $e->getAwsErrorMessage());
    }
}


$result = deleteParameter($client);
print_r($result);



?>