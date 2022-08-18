<?php

require("GroupRepository.php");
require("GroupFilter.php");
require('ProductFilter.php');
require('ProductRepository.php');

$groupRepository = new GroupRepository();
$groupFilter = new GroupFilter();
$groupFilter->setParentId(0);
$groupResult = $groupRepository->findALlCategory($groupFilter);


$productFilter = new ProductFilter();
$productRepository = new ProductRepository();
$productResult = $productRepository->findAll($productFilter);


/*var_dump($sqlResult);*/


?>


<?php
switch ($_GET['name']) {
    case "Телевизоры":
        header(':http"//localhost/page2.php', true);
        break;
    case "Мультимедиа":
        include('page3.php');
        header(':http"//localhost/page2.php', true);
        break;
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Список всего говна</title>
    <style>
        .main {
            float: left;
            margin-left: 130px;
        }
    </style>
</head>
<body>
<div class="main">
    <?php
    foreach ($groupResult as $value): ?>
        <ul>
            <li>
                <a href="?name=<?= $value["name"] ?>"><?= $value["name"] ?></a>
            </li>
        </ul>
    <?php endforeach;
    ?>

</div>
<div class="main">
    <?php
    foreach ($productResult as $value): ?>
        <p><?= $value['name'] ?></p>
    <?php endforeach; ?>
</div>
</body>
</html>



