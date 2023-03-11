<?php
//for easy reading output, we will set the file type as a JSON application
header('Content-Type: application/json');
//We import the AWS PHP SDK
require "vendor/autoload.php";
use Aws\Ssm\SsmClient;
use Aws\Exception\AwsException;

//Create a new AWS connection and specify values
$client = new SsmClient([
    //Which version of our gathered parameters is being used? as example: 1, 2, 3, latest, etc.
    'version'=> 'latest',
    //We define the AWS region we are working with (as example: Virginia is us-east-1)
    'region' => "us-east-1",
    //WARNING: this IAM credentials are placed here for tutorial purposes only. You need to setup a better security implementation, such as an .env file or Github parameters.
    'credentials' => [
    //Generate your IAM Keys with role admin permissions for SSM 
        'key'    => 'YOUR-KEY-HERE',
        'secret' => 'YOUR-SECRET-HERE',
    ],


]);


//We create a function "GetParams" we will use to delete the parameters
function GetParams($client) {
  try {
//We create the array to be sent. In this case we identify the param by Name
    $parameters = $client->getParameter([
            'Name' => 'Javier1',
            'WithDecryption' => true
    ]);
    //print errors if fails
} catch (SsmException $e) {
        echo $e->getMessage() . "\n";
}
// we execute the function and print the output
echo "Printing Param results: $parameters";
}

GetParams($client); // call the function



   





?>