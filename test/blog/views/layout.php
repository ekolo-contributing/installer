<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= !empty($title) ? $title : env('APP_NAME') ?>
        </title>
        <link rel="stylesheet" href="/public/css/style.css" />
    </head>
    <body>
        <?= $content ?>
    </body>
</html> 