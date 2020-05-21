<section class="main-body">
 <!-- Создание поста -->
 <h3 class="main-body__title">Редактирование тура</h3>
    <form method="post" action="/admin/tourSetting/<?php echo $data[0]['id'] ?>" class="post-edit" enctype='multipart/form-data'>
        <input class="post-edit__title" name="title" value="<?php echo $data[0]['title'] ?>" placeholder="Введите имя поста" required></input>
        <p class="post-img-text">Выберите изображение</p>
        <input class="edit-img" name="img[]" multiple type="file" required>
        <textarea class="post-edit__text" placeholder="Введите содержимое тура" name="body" required><?php echo $data[0]['body']; ?></textarea>
        <button class="post-save btn">Обновить тур</button>
    </form>
</section> 