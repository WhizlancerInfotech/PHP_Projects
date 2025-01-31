<?php
$api_key = "YOUR_OPENAI_API_KEY";
$user_input = "Hello, how are you?";

$data = [
    "model" => "gpt-3.5-turbo",
    "messages" => [["role" => "user", "content" => $user_input]],
];

$options = [
    "http" => [
        "header" => "Content-Type: application/json\r\nAuthorization: Bearer $api_key\r\n",
        "method" => "POST",
        "content" => json_encode($data),
    ],
];

$context = stream_context_create(["http" => $options]);
$response = file_get_contents("https://api.openai.com/v1/chat/completions", false, $context);
echo json_decode($response, true)["choices"][0]["message"]["content"];
?>
