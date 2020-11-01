<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина с товарами </title>
    <meta name="description" content="Корзина с товарами"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/products.css" type="text/css" charset="utf-8">
</head>
<body>
<?php require_once 'public/blocks/header.php'; ?>

<div class="container main">
    <h1>Корзина с товарами</h1>
    <?php if (count($data['products']) == 0): ?>
        <p><?= $data['empty'] ?></p>
    <?php else: ?>
        <div class="products">
            <?php
            $sum = 0;
            for ($i = 0; $i < count($data['products']); $i++):
                $sum += $data['products'][$i]['price']; ?>

                <div class="row ">
                    <img src="/public/img/<?= $data['products'][$i]['img'] ?>"
                         alt="<?= $data['products'][$i]['title'] ?>">
                    <h4><?= $data['products'][$i]['title'] ?></h4>
                    <span><?= $data['products'][$i]['price'] ?> гривен</span>
                </div>
            <?php endfor; ?>
            <button class="btn">Купить(<b><?=$sum?> гривен</b>)</button>
        </div>
    <?php endif; ?>

</div>
<?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>