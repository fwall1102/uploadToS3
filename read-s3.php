<?php

// Include the AWS SDK for PHP
require 'vendor/autoload.php';

// Create an S3 client
$s3 = new Aws\S3\S3Client([
    'region' => 'ap-southeast-1',
    'version' => 'latest',
    'credentials' => [
        'key' => 'AKIAIFYWLIS6ACJHDRXQ',
        'secret' => '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',
    ],
]);

// Set the name of the bucket and the file you want to read
$bucket_name = 'student-id';
$file_name = 'id-card/temp_49292022_154940_.webp';

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
