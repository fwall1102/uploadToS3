<?php

// Include the AWS SDK for PHP
require 'vendor/autoload.php';

// Create an S3 client
$s3 = new Aws\S3\S3Client([
    'region' => 'ap-southeast-1',
    'version' => 'latest',
    'credentials' => [
        'key' => '',
        'secret' => '',
    ],
]);

// Set the name of the bucket and the file you want to read
$bucket_name = '';
$file_name = '';

// Use the S3 client to read the file and store it in a variable
$result = $s3->getObject([
    'Bucket' => $bucket_name,
    'Key' => $file_name,
]);



// Print the URL of the file on S3"
$images_content = $result['Body'];

// Print the images to the browser
header('Content-Type: image/jpeg');
echo $images_content;
