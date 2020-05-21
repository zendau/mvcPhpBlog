<section class="main-body">
    <!-- Список постов -->
    <h3 class="main-body__title">Все посты</h3>

    <?php foreach ($data as $key => $value): ?>
        <div class="section-news__item">
            <img src="../../../public/img/news/<?php echo $value['img'] ?>" class="section-news__logo">
            <h3 class="section-news__news-title"><?php echo $value['title'] ?></h3>
            <?php if(strlen($value['body']) > 200): ?>
            <p class="section-news__text"><?php echo substr($value['body'], 0, 200).'...'; ?></p>
            <?php else: ?>
            <p class="section-news__text"><?php echo $value['body']; ?></p>
            <?php endif; ?>
            <a href="/admin/edit/<?php echo $value['id']; ?>" class="section-news__btn-read btn">Редактировать</a>
        </div>
    <?php endforeach; ?>
</section>