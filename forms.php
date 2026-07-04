<?php

$nome = $_POST['nome'];
$email = $_POST['email'];


echo "<h2>Formulário enviado, ". $nome . "!</h2>";
echo "<h4> Confira a caixa de entrada no seu email em " . $email . "</h4>";