<?php
//for easy reading output, we will set the file type as a JSON application
header('Content-Type: application/json');
//We import the AWS PHP SDK for SSM and the Exception Handler
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

//We create a function "putParameter" we will use to create the parameters
function putParameter($client){
    try {
        //We create the array to be sent
        $result = $client->putParameter([
            //Name of the parameter REQUIRED
            "Name" => "Javier1",
            //Type REQUIRED - Always use SecureString
            "Type" => "SecureString",
            //New Value or Overwrite Value if updating
            "Value" => "This is a new value",
            //Overwrite if exists: true | false
            "Overwrite" => true
        ]);
        // we return the results of the execution
        return $result;
        //print errors if fails
    } catch (AwsException $e) {
        print_r('Error: ' . $e->getAwsErrorMessage());
    }
}

// we execute the function and print the output
$result = putParameter($client);
print_r($result);



?>