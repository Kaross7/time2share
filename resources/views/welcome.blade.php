<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Time2share.nl</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Figtree', sans-serif; background-color: #f3f4f6; margin: 0; padding: 0; }
        .header { 
            background: linear-gradient(135deg, #4CAF50, #2196F3); 
            color: white; 
            padding: 4rem 2rem; 
            text-align: center;
            position: relative;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
        }
        .header h1 { font-size: 3rem; margin-bottom: 1rem; font-weight: 700; letter-spacing: 2px; }
        .header p { font-size: 1.5rem; line-height: 1.6; margin-top: 1rem; font-weight: 300; }
        .header .icon { font-size: 4rem; margin-top: 1.5rem; }

        .content { max-width: 900px; margin: 3rem auto; padding: 0 1rem; }
        
        .intro { background-color: #e0f2fe; padding: 2rem; border-radius: 8px; box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1); text-align: center; margin-bottom: 3rem; color: #1e3a8a; }
        .intro p { font-size: 1.2rem; line-height: 1.6; font-weight: 400; }
        .intro-icon { font-size: 3rem; color: #0284c7; margin-bottom: 1rem; }

        .buttons { display: flex; justify-content: space-between; margin-top: 3rem; }
        .button { display: inline-block; padding: 1rem 2rem; color: white; border-radius: 25px; font-weight: 600; text-decoration: none; width: 48%; text-align: center; transition: all 0.3s ease; }
        .button-login { background-color: #10b981; }
        .button-login:hover { background-color: #059669; }
        .button-register { background-color: #3b82f6; }
        .button-register:hover { background-color: #2563eb; }

        .features { margin-top: 3rem; }
        .features h2 { text-align: center; font-size: 1.8rem; margin-bottom: 2rem; color: #1f2937; }
        .feature-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; }
        .feature-item { background-color: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); font-size: 1.2rem; color: #374151; font-weight: 400; }
    </style>
</head>

<body>
    <div class="header">
        <h1>Welkom bij Time2share.nl</h1>
        <p>Maak het eenvoudig om jouw spullen veilig uit te lenen, met overzicht en gemak.</p>
        <div class="icon">🚀</div>
    </div>

    <div class="content">
        <div class="intro">
            <div class="intro-icon">🔄</div>
            <p>Heb jij iets uitgeleend, maar weet je niet meer aan wie? Of ben je iets kwijtgeraakt? Time2share.nl helpt je het overzicht te bewaren en maakt het eenvoudig om je spullen veilig uit te lenen en terug te ontvangen. Jij hebt de controle!</p>
        </div>

        <div class="buttons">
            <a href="{{ route('login') }}" class="button button-login">Inloggen</a>
            <a href="{{ route('register') }}" class="button button-register">Registreren</a>
        </div>

        <div class="features">
            <h2>Wat biedt Time2share.nl?</h2>
            <div class="feature-grid">
                <div class="feature-item">Beheer uitgeleende en geleende producten eenvoudig op één plek.</div>
                <div class="feature-item">Voeg productinformatie toe inclusief foto's, beschrijvingen, en categorieën.</div>
                <div class="feature-item">Stel deadlines in voor terugontvangst van uitgeleende spullen.</div>
                <div class="feature-item">Plaats reviews voor betrouwbare leengebruikers.</div>
                <div class="feature-item">Gebruik filters om snel specifieke producten te vinden.</div>
                <div class="feature-item">Toegang tot een persoonlijk profiel met al jouw leengegevens.</div>
            </div>
        </div>
    </div>
</body>
</html>
