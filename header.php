<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/min-style.css">
    <link rel="stylesheet" href="css/middle-style.css">
    <link rel="stylesheet" href="css/max-style.css">
    <title>Галактический вестник</title>
</head>
<body>
<header class="main-container">
    <?php include("menu.php");?>
    <div class="left-block">
        <img src="img/logo.svg" alt="logo planet">
        <div class="title-logo">Галактический<br>вестник</div>
    </div>
    <nav class="navigation">
    <ul class="navigation-list">
        <?php foreach ($menu_data as $menu_item) { ?>
            <li class="navigation-item">
                <a class="button-news" href="<?=$menu_item["url"]?>"><?=$menu_item["title"]?></a>
            </li>
        <?php } ?>
    </ul>
    </nav>
</header>