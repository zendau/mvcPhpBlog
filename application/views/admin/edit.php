<section class="main-body">
<!-- Редактирование поста -->
<h3 class="main-body__title">Редактирование поста</span></h3>
    <form method="post" action="/admin/edit/<?php echo $data[0]['id'] ?>" class="post-edit" enctype='multipart/form-data'>
        <input class="post-edit__title" name="title" value="<?php echo $data[0]['title'] ?>"></input>
        <img src="../../../public/img/news/<?php echo $data[0]['img'] ?>" class="section-news__logo">
        <input class="edit-img" type="file" accept="image/*" name="img">
        <textarea class="post-edit__text" name="body"><?php echo $data[0]['body']; ?></textarea>
        <button class="post-save btn" id="<?php echo $data[0]['id'] ?>">Сохранить</button>
    </form>
</section>