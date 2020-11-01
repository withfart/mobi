<header>
    <div class="container top-menu">
        <div class="nav">
            <a href="/">Главная</a>
            <a href="/contact">Контакты</a>
            <a href="/contact/about">Про компанию</a>
        </div>
        <div class="tel"><i class="fas fa-phone"></i> +380 93 111 11 11</div>
    </div>
    <div class="container middle">
        <div class="logo">
            <img src="/public/img/logo_svg.svg" alt="Logo">
            <span>Мы знаем что вы хотите!</span>
        </div>
        <div class="auth-checkout">
            <a href="/basket">
                <?php
                         //require_once 'app/models/BasketModel.php';
                        // $basketModel = new BasketModel();
                ?>
                <button class="btn basket">Корзина <b>(0)</b></button>
            </a><br>
            <?php if ($_COOKIE['login'] == ''): ?>
                <a href="/user/auth">
                    <button class="btn auth">Войти</button>
                </a>
                <a href="/user/reg">
                    <button class="btn">Регистрация</button>
                </a>
            <?php else: ?>
                <a href="/user/dashboard">
                    <button class="btn dashboard ">Кабинет пользователя</button>
                </a>

            <?php endif; ?>
        </div>
    </div>
    <div class="container menu">
        <ul>
            <li><a href="/categories">Все товары</a></li>
            <li><a href="/categories/szu">Кабели/ЗУ</a></li>
            <li><a href="/categories/case">Чехлы</a></li>
            <li><a href="/categories/power_bank">Power Bank</a></li>
            <li><a href="/categories/auto">Автотовары</a></li>
        </ul>
    </div>
</header>