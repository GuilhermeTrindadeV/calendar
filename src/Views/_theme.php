<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= url("themes/soft-ui/assets/img/apple-icon.png") ?>">
    <link rel="icon" type="image/png" href="<?= url("MyThemes/icons8-calendar-64.png") ?>">
    <title><?= $title ?></title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= url("themes/soft-ui/assets/css/nucleo-icons.css") ?>" rel="stylesheet" />
    <link href="<?= url("themes/soft-ui/assets/css/nucleo-svg.css") ?>" rel="stylesheet" />
    <link href="<?= url("public/css/modal.css") ?>" rel="stylesheet" />
    <link href="<?= url("public/css/style.css") ?>" rel="stylesheet" />
    <link href="<?= url("public/css/home.css") ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= url("themes/soft-ui/assets/css/nucleo-svg.css") ?>" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= url("themes/soft-ui/assets/css/soft-ui-dashboard.css?v=1.0.3") ?>" rel="stylesheet" />
    <?= $this->section("styles") ?>
</head>

<body class="g-sidenav-show  bg-dark">
    <?php require(__DIR__ . "/templates/left.php"); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <?php require(__DIR__ . "/templates/header.php"); ?>
        <div class="container-fluid py-4">
            <?php echo $this->insert("templates/message") ?>
            <?= $this->section("content") ?>
            <script src="<?= url("node_modules/fullcalendar/index.global.js"); ?>"></script>
            <script> const salvar = <?php echo json_encode(url('eventos/salvar')) ?>; </script>
            <script> const edit = <?php echo json_encode(url("eventos/edit")) ?>; </script>
            <script> const route = <?php echo json_encode(url('eventos/list')) ?>; </script>
            <script src="<?= url("public/js/jquery.js"); ?>"></script>
            <script src="<?= url("public/js/jquery-ui.js"); ?>"></script>
            <script src="<?= url("public/js/js.js"); ?>"></script>
            <?php require(__DIR__ . "/templates/footer.php"); ?> 
        </div>
    </main>
    <?php 
        require(__DIR__ . "/templates/right.php"); 
        require(__DIR__ . "/templates/scripts.php"); 
    ?>
    <?= $this->section("scripts") ?>
</body>
</html>