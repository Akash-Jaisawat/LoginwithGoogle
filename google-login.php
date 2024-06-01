<?php
session_start();
include 'googlevariables.php'; // Ensure this file contains your client ID, client secret, and redirect URI

// Check if the code parameter is set
if (isset($_GET['code'])) {
    $code = $_GET['code'];
} else {
    die('Error: No code parameter found');
}

// Google OAuth 2.0 token endpoint
$token_url = "https://oauth2.googleapis.com/token";

// Prepare the POST fields
$post_fields = [
    'code' => $code,
    'client_id' => $google_client_id,
    'client_secret' => $google_client_secret,
    'redirect_uri' => $google_redirect_url,
    'grant_type' => 'authorization_code'
];

// Initialize cURL session for token exchange
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$result = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    die('Error: ' . curl_error($ch));
}

// Close the cURL session
curl_close($ch);

// Decode the JSON response to get the access token
$token_data = json_decode($result, true);

if (isset($token_data['access_token'])) {
    $access_token = $token_data['access_token'];
} else {
    die('Error: No access token found');
}

// Google OAuth 2.0 user info endpoint
$userinfo_url = "https://www.googleapis.com/oauth2/v1/userinfo?alt=json";

// Initialize cURL session for user info request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $userinfo_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $access_token]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    die('Error: ' . curl_error($ch));
}

// Close the cURL session
curl_close($ch);

// Decode the JSON response to get user information
$user_info = json_decode($response, true);
echo "<pre>";

print_r($user_info);

if (isset($user_info['email'])) {
    // User is authenticated
    $_SESSION['email'] = $user_info['email'];
    $_SESSION['name'] = $user_info['name'];
    $_SESSION['picture'] = $user_info['picture'];
    // Redirect to a secure page
    header('Location: student-listing.php');
    exit();
} else {
    die('Error: Failed to retrieve user information');
}
?>
