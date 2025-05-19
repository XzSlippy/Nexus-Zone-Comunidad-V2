<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim(htmlspecialchars($_POST['nombre'] ?? ''));
    $motivo_baneo = trim(htmlspecialchars($_POST['motivo_baneo'] ?? ''));
    $apelacion = trim(htmlspecialchars($_POST['apelacion'] ?? ''));

    if (empty($nombre) || empty($motivo_baneo) || empty($apelacion)) {
        $error = "Por favor completa todos los campos.";
    } else {
        $fecha = date('Y-m-d H:i:s');
        $linea = "[$fecha] Nombre: $nombre | Motivo del Baneo: $motivo_baneo | Apelación: $apelacion" . PHP_EOL;

        file_put_contents("apelaciones.txt", $linea, FILE_APPEND | LOCK_EX);
        $success = "Tu apelación ha sido enviada correctamente. Gracias por contactarnos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Formulario de Apelación de Baneo</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #b3d4fc;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            margin: 0;
            padding: 30px;
        }
        form {
            background: linear-gradient(135deg, #2a3b4d, #1c2533);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px #4a90e2;
            width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #74a9ff;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: none;
            background-color: #36495a;
            color: #c8d9ff;
            font-size: 16px;
            resize: vertical;
        }
        input[type="text"]::placeholder, textarea::placeholder {
            color: #8faad6;
        }
        button {
            background-color: #4a90e2;
            color: white;
            border: none;
            padding: 12px 0;
            width: 100%;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #3578d4;
        }
        .message {
            margin-bottom: 18px;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
        }
        .error {
            background-color: #e04646;
            color: white;
        }
        .success {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h1>Apelación de Baneo</h1>

        <?php if (!empty($error)) : ?>
            <div class="message error"><?= $error ?></div>
        <?php elseif (!empty($success)) : ?>
            <div class="message success"><?= $success ?></div>
        <?php endif; ?>

        <label for="nombre">Nombre o Nickname *</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre o nick" required value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>" />

        <label for="motivo_baneo">Motivo del Baneo *</label>
        <input type="text" id="motivo_baneo" name="motivo_baneo" placeholder="¿Por qué fuiste baneado?" required value="<?= htmlspecialchars($_POST['motivo_baneo'] ?? '') ?>" />

        <label for="apelacion">Tu Apelación *</label>
        <textarea id="apelacion" name="apelacion" rows="5" placeholder="Explica por qué debería levantarse tu baneo" required><?= htmlspecialchars($_POST['apelacion'] ?? '') ?></textarea>

        <button type="submit">Enviar Apelación</button>
    </form>
</body>
</html>
