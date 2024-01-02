<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$datos['title']}}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
        }

        .header {
            background-color: #f5f5f5;
            padding: 20px;
        }

        .content {
            padding: 20px;
        }

        .footer {
            background-color: #f5f5f5;
            padding: 10px;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e0e0e0;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>{{$datos['title']}}</h2>
        </div>
        <div class="content">
            <p>{{$datos['body']}}</p>
            <p>
                <a class="button" href="{{$datos['url']}}">Restablecer Contraseña</a>
            </p>
            <p>Si no has solicitado este restablecimiento, puedes ignorar este mensaje.</p>
        </div>
        <div class="footer">
            <p>Gracias,</p>
            <p>Tu equipo de Talento Humano</p>
        </div>
    </div>
</body>
</html>
