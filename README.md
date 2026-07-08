![Dax Code logo](images/logo-projeto.png)

# TransRota - Logistics Landing Page

## What it is

A landing page for a fictional transport/logistics company, built as a Dax Code course project. It's a simple site (HTML/CSS/JS) with a contact form that actually works, sending an automatic email to whoever fills it in.

## Stack

- **HTML** — page structure
- **CSS** — styling and responsiveness
- **JavaScript (vanilla)** — form validation in the browser
- **PHP** — processes the form and talks to n8n
- **n8n** — automation that receives the data and triggers the email via SMTP

## How the form works

1. The person fills in name and email.
2. `script.js` validates before allowing the submit.
3. The form sends a POST to `forms.php`.
4. `forms.php` sanitizes the data, shows a confirmation message, and sends everything via cURL to an n8n webhook.
5. n8n receives it and triggers an automatic email to the address provided.

```
Form -> JS validation -> POST -> forms.php -> n8n webhook -> automatic email
```

## Validations

- **On the front-end (JavaScript)**: `verifyFields()` checks that name and email aren't empty before allowing submission, showing an error message under the field if it's blank.
- **On the back-end (PHP)**:
  - `htmlspecialchars()` on both fields before displaying them back on screen, to prevent someone from injecting HTML/JavaScript into the response.
  - After calling the webhook, the code checks the HTTP response code (`200` or `201`) before considering the email successfully sent — if a different code comes back, it shows an error message instead of pretending everything went fine.

## A side note

This was the first project where I used **PHP on the back-end**, and it was pretty fun to work with. Even being a simple project, it gave me a feel for how well PHP fits this kind of straightforward task — receiving a form, processing the data, and talking to another service (in this case, n8n) via cURL. It helped me understand server-side request/response logic better, which is different from just working with JavaScript in the browser.

## Status

Study project, focused on practicing HTML/CSS/JS on the front-end and a first hands-on experience with PHP on the back-end, including integration with an external automation tool (n8n).