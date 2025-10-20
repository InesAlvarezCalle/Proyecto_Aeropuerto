<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        use Slim\Factory\AppFactory;

        require __DIR__ . '/../vendor/autoload.php';

        require __DIR__ . '/db/db.php';

        $db = new Database();
        $pdo = $db->connect();
        $app = AppFactory::create();

        require __DIR__ . '/routes/routes.php';

        $app->run();
    ?>
</body>
</html>