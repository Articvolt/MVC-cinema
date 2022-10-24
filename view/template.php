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
                <li>films</li>
                <li>acteurs</li>
                <li>realisateurs</li>
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
