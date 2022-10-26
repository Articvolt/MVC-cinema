<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">accueil</a></li>
                <li><a href="index.php?action=listFilms">films</a></li>
                <li><a href="index.php?action=listActeurs">acteurs</a></li>
                <li><a href="index.php?action=listRealisateurs">realisateurs</a></li>
                <li><a href="index.php?action=listGenres">genres</a></li>
                <li><a href="index.php?action=listRoles">roles</a></li>
                <li><a href="index.php?action=addGenre||action=addRole">ajouts</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="arrayResult">
            <h2><?= $titre_secondaire ?></h2>
            <?= $contenu ?>
            </div>
    </main>  
</body>
</html>
