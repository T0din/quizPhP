<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Reset CSS -->
        <link href="<?= url('css/reset.css'); ?>" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Google fonts CSS -->
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= url('css/main.css'); ?>" rel="stylesheet">


        <title>O'Quiz</title>
    </head>
    <body>

            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">

                <ul class="nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link d-inline text-blue" href="<?= route('home') ?>">
                        <h1 >O'Quiz</h1>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= route('home')?>">
                            <i class="fas fa-home"></i>
                            Accueil
                        </a>
                    </li>
                    <?php if($isConnected) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-blue" href="<?= route('account')?>">
                            <i class="fas fa-user"></i>
                            Mon compte
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-blue" href="<?= route('logout')?>">
                            <i class="fas fa-sign-out-alt"></i>
                            Déconnexion
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-blue" href="<?= route('signin')?>">
                            <i class="fas fa-user"></i>
                            Se connecter
                        </a>
                    </li>
                    <?php endif ?>
                </ul>
            </nav>
            <main class="container">
