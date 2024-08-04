<?php

// Set your GitHub secret here
$secret = 'b8a96b4a-2c69-11ef-a56d-b8aeedb590fb';
$deployDir = '/home/yf88lwcuzbfc/public_html/ths.ind.in';

// Function to get the payload body
function getPayloadBody() {
    $payload = file_get_contents('php://input');
    return json_decode($payload, true);
}

// Function to verify the GitHub signature
function verifySignature($payload, $signature, $secret) {
    $hash = 'sha256=' . hash_hmac('sha256', $payload, $secret, true);
    return hash_equals($signature, $hash);
}

// Get the payload and headers
$payload = file_get_contents('php://input');
$headers = getallheaders();
$signature = isset($headers['X-Hub-Signature-256']) ? $headers['X-Hub-Signature-256'] : '';

// Verify the payload signature
// if (!verifySignature($payload, $signature, $secret)) {
//     header('HTTP/1.1 403 Forbidden');
//     echo 'Invalid signature';
//     exit;
// }

// Decode the payload
$data = json_decode($payload, true);

// Check if the payload is for a push event
if ($data['hook']['type'] !== 'Repository' || $data['hook']['events'][0] !== 'push') {
    header('HTTP/1.1 400 Bad Request');
    echo 'Invalid event type';
    exit;
}

// Extract relevant information from the payload
$repository = $data['repository'];
$branch = $data['ref'];
$branch = str_replace('refs/heads/', '', $branch);

// Define your deployment directory and script

// Ensure deployment directory exists
if (!is_dir($deployDir)) {
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Deployment directory does not exist';
    exit;
}

// Define the deployment command
$deployCommand = "cd $deployDir && git pull origin $branch";

// Execute the deployment command
exec($deployCommand, $output, $returnCode);

// Check for errors during execution
if ($returnCode !== 0) {
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Deployment failed';
    exit;
}

// Return success response
header('HTTP/1.1 200 OK');
echo 'Deployment successful';
?>
