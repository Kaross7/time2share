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
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/begin.css'])


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
