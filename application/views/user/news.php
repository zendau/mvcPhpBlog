<section class="main-header-logo main-header-logo--small wrapper">
        <h1 class="main-header__title">Седона</h1>
        <img class="main-header__end" src="../../../public/img/intro-triangle.svg.png" alt="">
    </section>

    <section class="section-news wrapper">
    </form>
        <h2 class="section-news__title">Новости</h2>
        <div class="section-news__search-container">
            <div class="section-news_search">
                <input placeholder="Введите имя новости" type="text" class="section-news__search-input">
            </div>
            <ul class="section-news__search-list section-news__search-list--active">
            </ul>
        </div>
        <?php foreach ($test as $key => $value): ?>
        <div class="section-news__item">
            <img src="../../../public/img/news/<?php echo $value['img'] ?>" class="section-news__logo">
            <h3 class="section-news__news-title"><?php echo $value['title'] ?></h3>
            <?php if(strlen($value['body']) > 200): ?>
            <p class="section-news__text"><?php echo substr($value['body'], 0, 200).'...'; ?></p>
            <?php else: ?>
            <p class="section-news__text"><?php echo $value['body']; ?></p>
            <?php endif; ?>
            <a href="/user/post/<?php echo $value['id']; ?>" class="section-news__btn-read btn">Читать далее</a>
        </div>
        <?php endforeach; ?>
        
        <ul class="pagination">
            <!-- <li class="page-item"><a href="#" class="page-link">Назад</a></li>
            <li class="page-item active"><a href="#" class="page-link">1</a></li>
            <li class="page-item"><a href="#" class="page-link">2</a></li>
            <li class="page-item"><a href="#" class="page-link">3</a></li>
            <li class="page-item"><a href="#" class="page-link">Вперед</a></li> -->
            <?php foreach ($page as $key => $value) {
                echo $value;
            } ?>
        </ul>

    </section>