<?php
// Include the AWS SDK for PHP
require 'vendor/autoload.php';

use Aws\Exception\AwsException;
use Aws\S3\Exception\S3Exception;

// Create an S3 client
$s3 = new Aws\S3\S3Client([
    'region' => 'ap-southeast-1',
    'version' => 'latest',
    'credentials' => [
        'key' => '',
        'secret' => '',
    ],
]);

// Upload an object to Amazon S3
$bucket = '';
try {
    //echo 'Create bucket';
    // Upload an object to Amazon S3
    $filename = explode(".", $_FILES['img']["name"]);
    $filenameext = $filename[count($filename) - 1];
    $filename = $_POST['path'] . 'img_' . time() . "." . $filenameext;
    echo $filename;
    // Upload to s3 bucket
    $result = $s3->putObject(array(
        'Bucket' => $bucket,
        'Key' => $filename,
        'SourceFile' => $_FILES['img']['tmp_name'],
    ));

    // Use the S3 client to read the file and store it in a variable



} catch (S3Exception $e) {
    // Catch an S3 specific exception.
    echo $e->getMessage();
} catch (AwsException $e) {
    // This catches the more generic AwsException. You can grab information
    // from the exception using methods of the exception object.
    echo $e->getAwsRequestId() . "\n";
    echo $e->getAwsErrorType() . "\n";
    echo $e->getAwsErrorCode() . "\n";
}

