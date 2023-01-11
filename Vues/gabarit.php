<!DOCTYPE html>
<html lang="fr" data-theme="light">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <link rel="stylesheet" href="/css/styles.css">
        <title>My sweet MVC</title>
    </head>
    <body class="h-screen">
        <?php Vue::montrer('standard/navbar'); ?>
        <?php echo $A_vue['body'] ?>
        <?php Vue::montrer('standard/pied'); ?>
    </body>
</html>