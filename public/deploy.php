<?php
// Set your GitHub secret here
define("WEB_HOOK_SECRET_KEY", "b8a96b4a-2c69-11ef-a56d-b8aeedb590fb");
$deployDir = '/home/yf88lwcuzbfc/public_html/ths.ind.in';
$userEmail = 'your-email@example.com'; // Set this to your email
$userName = 'Your Name'; // Set this to your name

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

    // Define commands
    $commands = [
        "cd $deployDir && git config user.email '$userEmail' 2>&1", // Set user email
        "cd $deployDir && git config user.name '$userName' 2>&1", // Set user name
        "cd $deployDir && git checkout -b $branchName 2>&1", // Create and switch to the new branch
        "cd $deployDir && git add . 2>&1", // Add changes
    ];

    // Execute initial commands
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

    // Check for uncommitted changes
    $checkChangesCommand = "cd $deployDir && git status --porcelain";
    exec($checkChangesCommand, $statusOutput, $statusReturnCode);

    if (empty($statusOutput)) {
        // No changes to commit
        // Clean up branch
        $cleanupCommands = [
            "cd $deployDir && git checkout $master_branch 2>&1", // Switch back to master branch
            "cd $deployDir && git branch -D $branchName 2>&1" // Delete the temporary branch
        ];

        foreach ($cleanupCommands as $command) {
            $output = [];
            $returnCode = null;
            exec($command, $output, $returnCode);

            // Check for errors during cleanup
            if ($returnCode !== 0) {
                http_response_code(500);
                echo 'Cleanup failed: ' . implode("\n", $output);
                exit;
            }
        }

        http_response_code(200);
        echo 'No changes to commit. Deployment skipped.';
        exit;
    }

    // Commit changes
    $commitCommand = "cd $deployDir && git commit -m 'Server changes before update' 2>&1";
    exec($commitCommand, $commitOutput, $commitReturnCode);

    if ($commitReturnCode !== 0) {
        http_response_code(500);
        echo 'Commit failed: ' . implode("\n", $commitOutput);
        exit;
    }

    // Push the new branch
    $pushCommand = "cd $deployDir && git push origin $branchName 2>&1";
    exec($pushCommand, $pushOutput, $pushReturnCode);

    if ($pushReturnCode !== 0) {
        http_response_code(500);
        echo 'Push to origin failed: ' . implode("\n", $pushOutput);
        exit;
    }

    // Merge changes into master
    $mergeCommands = [
        "cd $deployDir && git checkout $master_branch 2>&1", // Switch back to master branch
        "cd $deployDir && git pull origin $master_branch 2>&1", // Pull the latest changes from GitHub
        "cd $deployDir && git merge $branchName 2>&1", // Merge server changes into master
        "cd $deployDir && git push origin $master_branch 2>&1" // Push the updated master branch to GitHub
    ];

    foreach ($mergeCommands as $command) {
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

    // Cleanup: Delete the temporary branch
    $cleanupBranchCommand = "cd $deployDir && git branch -D $branchName 2>&1";
    exec($cleanupBranchCommand, $cleanupBranchOutput, $cleanupBranchReturnCode);

    if ($cleanupBranchReturnCode !== 0) {
        http_response_code(500);
        echo 'Branch cleanup failed: ' . implode("\n", $cleanupBranchOutput);
        exit;
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
