<?php
// Set your GitHub secret here
define("WEB_HOOK_SECRET_KEY", "b8a96b4a-2c69-11ef-a56d-b8aeedb590fb");
$deployDir = '/home/yf88lwcuzbfc/public_html/ths.ind.in';
$userEmail = 'shaileshjain925@gmail.com'; // Set this to your email
$userName = 'Shailesh Jain'; // Set this to your name

// Get headers and payload
$headers = getallheaders();
$event = isset($headers['X-GitHub-Event']) ? $headers['X-GitHub-Event'] : '';
$payload_raw = file_get_contents('php://input');
$signature = isset($headers['X-Hub-Signature-256']) ? $headers['X-Hub-Signature-256'] : '';

// Function to decode the payload
function getPayloadBody() {
    return json_decode(file_get_contents('php://input'), true);
}

// Function to verify the signature
function verifySignature($payload_raw) {
    $headers = getallheaders();
    $expected_signature = 'sha256=' . hash_hmac('sha256', $payload_raw, WEB_HOOK_SECRET_KEY);
    return hash_equals($expected_signature, $headers['X-Hub-Signature-256']);
}

// Handle push events
if ($event === 'push') {
    // Verify the payload signature
    if (!verifySignature($payload_raw)) {
        http_response_code(403);
        echo 'Invalid signature';
        exit;
    }

    // Ensure deployment directory exists
    if (!is_dir($deployDir)) {
        http_response_code(500);
        echo 'Deployment directory does not exist';
        exit;
    }
    
    // Decode the payload
    $data = getPayloadBody();
    $master_branch = $data['repository']['default_branch']; // Use the default branch if not specifically 'master'
    $ref_parts = explode('/', $data['ref']);
    $current_branch = end($ref_parts);

    // Check if the push is to the master branch
    if ($current_branch !== $master_branch) {
        http_response_code(200);
        echo 'Only master branch pushes trigger deployment';
        exit;
    }

    // Generate a unique branch name with current date and time
    $branchName = date('YmdHis') . '-ServerUpload';

    // Define the commands
    $commands = [
        "cd $deployDir && git config user.email '$userEmail' 2>&1", // Set user email
        "cd $deployDir && git config user.name '$userName' 2>&1", // Set user name
        "cd $deployDir && git checkout -b $branchName 2>&1", // Create and switch to the new branch
        "cd $deployDir && git add . 2>&1", // Add changes
        "cd $deployDir && git commit -m 'Server changes before update' 2>&1", // Commit changes
        "cd $deployDir && git push origin $branchName 2>&1", // Push the new branch to GitHub
        "cd $deployDir && git checkout $master_branch 2>&1", // Switch back to the master branch
        "cd $deployDir && git pull origin $master_branch 2>&1", // Pull the latest changes from GitHub
        "cd $deployDir && git merge $branchName 2>&1", // Merge server changes into master
        "cd $deployDir && git push origin $master_branch 2>&1" // Push the updated master branch to GitHub
    ];

    // Execute the deployment commands
    foreach ($commands as $command) {
        $output = [];
        $returnCode = null;
        exec($command, $output, $returnCode);

        // Check for errors during execution
        if ($returnCode !== 0) {
            http_response_code(500);
            echo 'Deployment failed: ' . implode("\n", $output);
            exit;
        }
    }

    // Return success response
    http_response_code(200);
    echo 'Deployment successful';
    exit;
} else {
    http_response_code(200);
    echo 'This webhook only handles push events';
    exit;
}
?>
