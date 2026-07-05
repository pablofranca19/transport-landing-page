<?php

echo "<link rel='stylesheet' type='text/css' href='form-style.css'>";

$nome = $_POST['nome'];
$email = $_POST['email'];

echo "<main>";
echo "<h2>Formulário enviado, ". $nome . "!</h2>";
echo "<h4> Confira a caixa de entrada no seu email em " . $email . ", entraremos em contato." ."</h4>";
echo "</main>";