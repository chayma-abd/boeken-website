<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BoekenWereld</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        body {
            margin: 0;
            background: #e0f2fe;
        }
    </style>
</head>
<body>

<div style="max-width: 800px; margin: 0 auto; padding: 40px 20px;">

    <!-- Header -->
    <div style="background: white; padding: 12px 24px; border-radius: 12px; margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center;">
        <h1 style="color: #1e40af; font-size: 22px; font-weight: 600; margin: 0;">BoekenWereld</h1>
        <div>
            @auth
                <a href="{{ route('books.index') }}" style="background: #2563eb; color: white; padding: 6px 18px; border-radius: 20px; text-decoration: none; font-size: 13px; font-weight: 500;">Boeken</a>
            @else
                <a href="{{ route('login') }}" style="color: #2563eb; margin-right: 15px; text-decoration: none; font-size: 14px;">Inloggen</a>
                <a href="{{ route('register') }}" style="background: #2563eb; color: white; padding: 6px 18px; border-radius: 20px; text-decoration: none; font-size: 13px;">Registreren</a>
            @endauth
        </div>
    </div>

    <!-- Welkomst tekst -->
    <div style="background: white; padding: 40px 30px; border-radius: 16px; text-align: center;">
        <h2 style="color: #1e40af; font-size: 28px; font-weight: 600; margin: 0 0 12px 0;">Welkom bij BoekenWereld</h2>
        <p style="color: #374151; font-size: 16px; margin-bottom: 8px;">De plek waar je alle informatie vindt over jouw favoriete boeken.</p>
        <p style="color: #6b7280; font-size: 14px; margin-bottom: 30px;">Ontdek nieuwe auteurs, lees beschrijvingen en deel je mening.</p>
        
        @auth
            <a href="{{ route('books.index') }}" style="background: #2563eb; color: white; padding: 10px 24px; border-radius: 30px; text-decoration: none; font-size: 14px; font-weight: 500;">Bekijk boeken</a>
        @else
            <div>
                <a href="{{ route('register') }}" style="background: #2563eb; color: white; padding: 10px 24px; border-radius: 30px; text-decoration: none; font-size: 14px; font-weight: 500; margin-right: 10px;">Registreren</a>
                <a href="{{ route('books.index') }}" style="background: white; color: #2563eb; padding: 10px 24px; border-radius: 30px; text-decoration: none; font-size: 14px; font-weight: 500; border: 1px solid #2563eb;">Boeken</a>
            </div>
        @endauth
    </div>

    <!-- Footer -->
    <div style="text-align: center; margin-top: 30px; color: #1e40af; font-size: 12px; opacity: 0.7;">
        <p>© 2026 BoekenWereld</p>
    </div>

</div>

</body>
</html>