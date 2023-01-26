<!DOCTYPE html>
<html lang="fr" data-theme="light">
    <head>
        <script src="https://kit.fontawesome.com/067ace0f2b.js" crossorigin="anonymous"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-QV+Q2sW2KvNgBq3PRhq3zghvd/oFvjA14rZfKMBpUuH6KLmBQF+krspzG7Kj8jlYcJ7wKz2vr5NG5vm5P+l5Q==" crossorigin="anonymous">
        <title>SweetSpot</title>
    </head>
    <body class="h-screen">
        <?php
        $db = new PDO("mysql:host=mysql-sweet-spot.alwaysdata.net;dbname=sweet-spot_db", "296154","sweetspot123");
        $admin = new Compte($db);
        $isAdmin = $admin->isAdmin();
         Vue::montrer('standard/navbar', array('isAdmin' => $isAdmin)); ?>
        <?php echo $A_vue['body'] ?>
        <?php Vue::montrer('standard/pied'); ?>
    </body>
</html>