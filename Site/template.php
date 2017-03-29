<!DOCTYPE html>
<html>
<head>
    <title> <?php echo $module->getControleur()->getVue()->getTitre(); ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<?php echo $module->getControleur()->getVue()->getContenu();
echo '
<body>
    <footer>
            <p>&copy; My-Planif. All rights reserved.</p>
    </footer>
</body>';

?>
</html>
