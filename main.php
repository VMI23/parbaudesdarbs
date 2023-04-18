<?php

use GuzzleHttp\Client;

require "ApiResponse.php";
require "vendor/autoload.php";


$app = new ApiResponse();
$amount = readline("Enter Amount :");
$app->run($amount);