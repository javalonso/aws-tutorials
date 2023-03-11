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


function putParameter($client){
    try {
        $result = $client->putParameter([
            "Name" => "Javier1",
            "Type" => "SecureString",
            "Value" => "This is a new value",
            "Overwrite" => true
        ]);

        return $result;
    } catch (AwsException $e) {
        print_r('Error: ' . $e->getAwsErrorMessage());
    }
}


$result = putParameter($client);
print_r($result);



?>