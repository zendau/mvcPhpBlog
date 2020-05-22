<section class="main-body">
 <!-- Создание поста -->
 <h3 class="main-body__title">Создание тура</h3>
    <form method="post" action="/admin/tourNew" class="post-edit" enctype='multipart/form-data'>
        <input class="post-edit__title" name="title" placeholder="Введите имя тура" required></input>
        <p class="post-img-text">Выберите изображение</p>
        <input class="edit-img" name="img[]" accept="image/*" multiple type="file" required>
        <textarea class="post-edit__text" placeholder="Введите описание" name="body" required></textarea>
        <button class="post-save btn">Создать тур</button>
    </form>
</section> 