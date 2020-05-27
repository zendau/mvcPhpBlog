<section class="main-header-logo main-header-logo--small wrapper">
    <h1 class="main-header__title">Седона</h1>
    <img class="main-header__end" src="../../../public/img/intro-triangle.svg.png" alt="">
</section>

<section class="section-choice wrapper"> 
    <h2 class="section-choice__main-title">Выбор поездки</h2>
    <div class="section-choice__flex-container">

    <?php foreach ($data as $key => $value): ?>
        <div class="section-news__item">
            <h3 class="section-choice__title"><?php echo $value['title'] ?></h3>
            <img src="../../../public/img/tour/<?php echo explode(" ",$value['img'])[0] ?>"  alt="" class="section-choice__logo">
            <?php if(strlen($value['body']) > 200): ?>
            <p class="section-choice__text"><?php mb_internal_encoding('UTF-8'); echo mb_substr($value['body'], 0, 200).'...'; ?></p>
            <?php else: ?>
            <p class="section-choice__text"><?php echo $value['body']; ?></p>
            <?php endif; ?>
            <a href="/user/tour/<?php echo $value['id']; ?>" class="section-choice__link btn">Читать далее</a>
        </div>
        <?php endforeach; ?>
            
    </div>
</section>