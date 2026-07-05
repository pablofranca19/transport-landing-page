<?php

echo "<link rel='stylesheet' type='text/css' href='form-style.css'>";

$nome = $_POST['nome'];
$email = $_POST['email'];

$formData = [
    'nome' => $nome,
    'email' => $email
];

echo "<main>";
echo "<h2>Formulário enviado, ". $nome . "!</h2>";
echo "<h4> Confira a caixa de entrada no seu email em " . $email . ", entraremos em contato." ."</h4>";
echo "</main>";

try {
    $webhook = curl_init('http://n8n:5678/webhook/check-email');

    curl_setopt_array($webhook, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => http_build_query($formData),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json'
        ]
    ]);

    $response = curl_exec($webhook);
} catch (Exception $e) {
    error_log("N8N webhook error: " . $e->getMessage() . "\n cURL error: " . curl_error($webhook));
}

