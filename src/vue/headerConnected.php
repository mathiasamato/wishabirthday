<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/medias/logo.png">
</head>

<body>
<header>
        <a href="index.php?uc=home"><h1 class="col-3">WishABirthday.com</h1></a>
        <nav class ="col-9" >
            <ul>
                <li><a href="index.php?uc=home"><h3>Accueil</h3></a></li>
                <li><a href="index.php?uc=userProfile&action=show&Id=<?=$_SESSION['connectedUserId']?>"><h3>Profil</h3></a></li>
                <li><a href="index.php?uc=disconnect"><h3>Déconnexion</h3></a></li>
            </ul>
        </nav>
</header>