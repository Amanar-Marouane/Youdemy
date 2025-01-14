<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Online Learning Platform</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .form-container {
            transform-style: preserve-3d;
            transition: all 0.6s ease;
        }

        .form-container.flip {
            transform: rotateY(180deg);
        }

        .login-form,
        .register-form {
            backface-visibility: hidden;
            position: absolute;
            width: 100%;
        }

        .register-form {
            transform: rotateY(180deg);
        }
    </style>
</head>