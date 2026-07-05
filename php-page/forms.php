<?php

echo "<link rel='stylesheet' type='text/css' href='form-style.css'>";

$nome = $_POST['nome'];
$email = $_POST['email'];

$data = [
    'nome' => $nome,
    'email' => $email
];

echo "<main>";
echo "<h2>Formulário enviado, ". $nome . "!</h2>";
echo "<h4> Confira a caixa de entrada no seu email em " . $email . ", entraremos em contato." ."</h4>";
echo "</main>";

try {
    $webhook = curl_init('http://n8n:5678/webhook/check-email');
    curl_setopt($webhook, CURLOPT_POST, true);
    curl_setopt($webhook, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($webhook, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($webhook, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($webhook, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($webhook);
} catch (Exception $e) {
    error_log("N8N webhook error: " . $e->getMessage() . "\n cURL error: " . curl_error($webhook));
}

