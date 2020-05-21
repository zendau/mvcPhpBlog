<section class="main-body">
    <!-- Список заявок -->
    <h3 class="main-body__title">Заявки пользователей</h3>
    <?php
    
    $data = null;

    
    ?>
    <?php foreach ($tour[0] as $key => $value):?>

    <?php
   
        foreach ($users[0] as $key2 => $value2) {
            if($value2['id'] == $value['user_id']){
                $data = $value2;
            }
        }    
    ?>
    <div class="app-item">
        <p class="app-text">Заявка от <?php echo $data['login'];?></span></p>
        <p class="app-text">Дата отправки <?php echo $value['date'];?></p>
        <p class="app-text">Моб. телефон <?php echo $data['phone'];?></p>
        <p class="app-text">Почта <?php echo $data['email'];?></p>
        <p class="app-text">Место путешествия <?php echo $value['tour_id'];?></p>
        <button class="app-delete" item_id="<?php echo $value['user_id']; ?>"></button>
    </div>
    <?php endforeach; ?>
</section>