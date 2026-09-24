<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>@yield('title','Мой сайт')</title>

    <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    

    <style>
        body{
            font-family:'Press Start 2P',cursive;
            padding:30px;
            background:#fff;
            width:100%;
            max-width:1200px;
            margin:0 auto;
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }

        header{
            margin-bottom:30px;
        }

        nav{
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        main{
            margin-top:30px;
            flex:1;
        }

        footer{
            margin-top:30px;
        }
    </style>
</head>

<body>

<header>
    <div class="nes-container with-title">
        <p class="title">Мой сайт</p>

        <nav>
            <a href="/" class="nes-btn">Главная</a>
            <a href="/about" class="nes-btn">О нас</a>
            <a href="/contacts" class="nes-btn">Контакты</a>
            <!-- star -->
            <div class="stars">
                <i class="nes-icon is-medium star"></i>
                <i class="nes-icon is-medium star is-half"></i>
                <i class="nes-icon is-medium star is-transparent"></i>
            </div>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer>
    <div  class="nes-container is-dark with-title">
        <p>Баранова София Алексеевна - it's me ⎚-⎚</p>
        <p>251-321 - (ง •̀_•́)ง 𝗥⟐𝗕𝗟◘𝗫</p>
        <p>Git будет, честно ≽•⩊ •マ≼</p>
    </div>
</footer>
</body>
</html>