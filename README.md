![Dax Code logo](images/logo-projeto.png)

# TransRota - Landing Page de Logística

## O que é

Uma landing page para uma empresa fictícia de transporte/logística, feita como projeto do curso Dax Code. Tem um site simples (HTML/CSS/JS) e um formulário de contato que funciona de verdade, mandando um e-mail automático pra quem preenche.

## Stack

- **HTML** — estrutura da página
- **CSS** — estilo e responsividade
- **JavaScript (vanilla)** — validação do formulário no navegador
- **PHP** — processa o formulário e conversa com o n8n
- **n8n** — automação que recebe os dados e dispara o e-mail via SMTP

## Como o formulário funciona

1. A pessoa preenche nome e e-mail.
2. O `script.js` valida antes de deixar enviar.
3. O formulário dá um POST pro `forms.php`.
4. O `forms.php` sanitiza os dados, mostra uma mensagem de confirmação, e manda tudo via cURL pra um webhook do n8n.
5. O n8n recebe e dispara um e-mail automático pro endereço informado.

```
Formulário -> validação JS -> POST -> forms.php -> webhook n8n -> e-mail automático
```

## Validações

- **No front-end (JavaScript)**: `verifyFields()` confere se nome e e-mail não estão vazios antes de permitir o envio, mostrando uma mensagem de erro embaixo do campo caso esteja em branco.
- **No back-end (PHP)**:
    - `htmlspecialchars()` nos dois campos antes de exibi-los de volta na tela, pra evitar que alguém injete HTML/JavaScript na resposta.
    - Depois de chamar o webhook, o código confere o código de resposta HTTP (`200` ou `201`) antes de considerar que o e-mail foi enviado com sucesso — se vier outro código, mostra uma mensagem de erro em vez de fingir que deu tudo certo.

## Um comentário à parte

Esse foi o primeiro projeto em que usei **PHP no back-end**, e foi bem legal trabalhar com ele. Mesmo sendo um projeto simples, deu pra sentir como o PHP se encaixa bem nesse tipo de tarefa direta — receber um formulário, processar os dados e se comunicar com outro serviço (no caso, o n8n) via cURL. Ajudou a entender melhor a lógica de request/response do lado do servidor, que é diferente de só mexer com JavaScript no navegador.

## Status

Projeto de estudo, focado em praticar HTML/CSS/JS no front e um primeiro contato com PHP no back-end, incluindo integração com uma automação externa (n8n).