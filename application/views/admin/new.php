<section class="main-body">
 <!-- Создание поста -->
 <h3 class="main-body__title">Создание поста</h3>
    <form method="post" action="/admin/new" class="post-edit" enctype='multipart/form-data'>
        <input class="post-edit__title" name="title" placeholder="Введите имя поста" required></input>
        <p class="post-img-text">Выберите изображение</p>
        <input class="edit-img" name="img" type="file" required>
        <textarea class="post-edit__text" placeholder="Введите содержимое поста" name="body" required></textarea>
        <button class="post-save btn">Создать пост</button>
    </form>
</section>