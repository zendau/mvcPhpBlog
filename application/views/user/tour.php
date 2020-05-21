<section class="main-header-logo main-header-logo--small wrapper">
    <h1 class="main-header__title">Седона</h1>
    <img class="main-header__end" src="../../../public/img/intro-triangle.svg.png" alt="">
</section>
<section class="section-photo wrapper">


    <h3 class="section-photo__title">
        Путешествие в <?php echo $data[0]['title']; ?>
    </h3>
    <div class="section-photo__slider">
        <?php
        $arr = explode(" ", $data[0]['img']);
        for($i = 0; $i < count($arr)-1; $i++): ?>
        <div class="section-photo__slider-item">
            <img src="../../../public/img/tour/<?php echo $arr[$i];?>" class="slider-img">
            <p class="section-photo__name-foto">Изображение № <?php echo $i+1; ?></p>
        </div>
        <!-- <div class="section-photo__slider-item">
            <img src="../../../public/img/slider/Castle-Monastery of Calatrava La Nueva, La Mancha, Spain.jpg" alt="" srcset="">
            <p class="section-photo__name-foto">Замок №2</p>
        </div>
        <div class="section-photo__slider-item">
            <img src="../../../public/img/slider/Cawdor Castle, Highland, Scotland 1.jpg" alt="" srcset="">
            <p class="section-photo__name-foto">Замок №3</p>
        </div>
        <div class="section-photo__slider-item">
            <img src="../../../public/img/slider/Cawdor Castle, Highland, Scotland 2.jpg" alt="" srcset="">
            <p class="section-photo__name-foto">Замок №4</p>
        </div>
        <div class="section-photo__slider-item">
            <img src="../../../public/img/slider/Chambord Castle, France 3.jpg" alt="" srcset="">
            <p class="section-photo__name-foto">Замок №5</p>
        </div>
        <div class="section-photo__slider-item">
            <img src="../../../public/img/slider/Chantilly Castle, Chantilly, France.jpg" alt="" srcset="">
            <p class="section-photo__name-foto">Замок №6</p>
        </div> -->
        <?php endfor; ?>
    </div>
    <p class="section-photo__text">
    <?php echo $data[0]['body']; ?>
    </p>
    <p class="section-photo__info">Выберите дату для путешествия</p>
    <form method="post" action="/user/tour/<?php echo $this->route["id"]; ?>" class="section-photo__flex-container">
        <input type="date" class="section-photo__data" name="date" required>
        <input type="hidden" name="title" value=<?php echo $data[0]['title']; ?>>
        <input type="submit" class="section-photo__submit btn" value="Зарегистрироваться на тур">
    </form>
</section>

<div class="overlay"></div>

<section class="section-modal">
    <h3 class="section-modal__title">Регистрация на тур</h3>
    <p class="section-modal__text"></p>
    <a href="#" id="close" class="section-modal__close"></a>
</section>