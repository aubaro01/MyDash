<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obrigado!</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Estilo personalizado -->
    <style>
        /* Estilo para a seção de agradecimento */
        #thank-you {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to right, #343a40, #6c757d);
            color: #fff;
        }

        .message-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .message-box h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .message-box p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .message-box .button {
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #343a40;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .message-box .button:hover {
            background-color: #495057;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .message-box {
                padding: 20px;
            }

            .message-box h1 {
                font-size: 2rem;
            }

            .message-box p {
                font-size: 1rem;
            }

            .message-box .button {
                font-size: 0.9rem;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <section id="thank-you">
        <div class="container">
            <div class="message-box">
                <h1>Obrigado!</h1>
                <p>Agradecemos por entrar em contato conosco. Recebemos sua mensagem e entraremos em contato em breve.</p>
                <a href="index.php" class="button">Voltar para a Home</a>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>