<section class="main-body">
    <!-- Список всех пользователей -->
    <h3 class="main-body__title">Пользователи</h3>
    <?php $i = 0; foreach ($users as $key => $value): ?>
    <?php $i++; ?>
    <div class="user-item">
        <p class="user-num"><?php echo $i;?></p>
        <a href="/admin/info/<?php echo $value['id']; ?>" class="user-name"><?php echo $value["login"]; ?></a>
    </div>
    <? endforeach; ?>
   
</section>