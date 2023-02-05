# uploadToS3
PHP Upload file to S3


##  Edit upload.php

// Create an S3 client
$s3 = new Aws\S3\S3Client([
    'region' => 'YOUR REGION', //ap-southeast-1
    'version' => 'latest',
    'credentials' => [
        'key' => 'YOUR KEY FOR S3 ACCESS',
        'secret' => 'YOUR SECRET FOR S3 ACCESS',
    ],
]);

// Upload an object to Amazon S3
$bucket = 'YOUR BUCKET NAME';
