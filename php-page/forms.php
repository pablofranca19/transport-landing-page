<?php

echo "<link rel='stylesheet' type='text/css' href='form-style.css'>";

$nome = htmlspecialchars($_POST['nome']);
$email = htmlspecialchars($_POST['email']);

$formData = [
    'nome' => $nome,
    'email' => $email
];

try {
    $webhook = curl_init('http://n8n:5678/webhook/check-email');

    $responsecode = trim(http_response_code(), characters: "int()");

    if (curl_getinfo($webhook, CURLINFO_HTTP_CODE) != 200 || curl_getinfo($webhook, CURLINFO_HTTP_CODE) != 201) {
        echo "<h2> Não foi possível enviar para o email " . $email . "</h2>";
        echo "<p> Erro código " . var_dump($responsecode) . "</p>";
        return;
    }

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
    error_log("Webhook error: " . $e->getMessage() . "\n cURL error: " . curl_error($webhook));
}

echo "<main>";
echo "<h2>Formulário enviado, ". $nome . "!</h2>";
echo "<h4> Confira a caixa de entrada no seu email em " . $email . ", entraremos em contato." ."</h4>";
echo "</main>";

