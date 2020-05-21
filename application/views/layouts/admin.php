<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/style/admin.css">
    <title><?php echo $title ?></title>
</head>
<body>
    <header class="main-header">
        <nav class="main-menu">
            <ul>
                <li><a href="/">Главная</a></li>
                <li>Заявок: <span id="num_app"></span></li>
                <li>Время: <span id="time"></span></li>
                <li>Привет, admin</li>
                <li><a href="/user/logout">Выход</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-container">
        <button class="open-nav"></button>
        <section class="main-navigation">
            <ul>
                
                <li <?php if($this->route['action'] == "users") echo 'class="active"'  ?> ><a href="/admin/users">Пользователи</a></li>
                <li <?php if($this->route['action'] == "posts") echo 'class="active"'  ?> ><a href="/admin/posts">Посты</a></li>
                <li <?php if($this->route['action'] == "applications") echo 'class="active"'  ?> ><a href="/admin/applications">Заявки</a></li>
                <li <?php if($this->route['action'] == "new") echo 'class="active"'  ?> ><a href="/admin/new">Создать новый пост</a></li>
                <li <?php if($this->route['action'] == "tourNew") echo 'class="active"'  ?> ><a href="/admin/tourNew">Создать Тур</a></li>
                <li <?php if($this->route['action'] == "tourEdit") echo 'class="active"'  ?> ><a href="/admin/tourEdit">Cписок туров</a></li>
                <li id="hide"><a href="#">Скрыть панель</a></li>
            </ul>
        </section>
        <?php echo $content; ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../../public/js/form.js"></script>
    <script>

        setInterval(() => {
            $("#time").text(new Date().getHours() + ":" + new Date().getMinutes() + ":" +new Date().getSeconds());
        }, 1000);

        update_num();
        $("#hide").click(function(){
            $(".main-navigation").addClass("hide")
            $(".main-body").addClass("full")
            $(".open-nav").addClass("show")
        })
        $(".open-nav").click(function(){
            $(".main-navigation").removeClass("hide")
            $(".main-body").removeClass("full")
            $(".open-nav").removeClass("show")
        })
        $(".app-delete").click(function(){

            $.ajax({
            type: "POST",
            url: "/admin/applications",
            data: { delete: $(this).attr("item_id")}
            })

            update_num()
            $(this).parent().remove() 
            if($(".app-item").length < 1) {
                $(".main-body__title").text("Заявок от пользователей нет")
            }
        })

        function update_num(){
            $.ajax({
            type: "POST",
            url: "/admin/applications",
            data: { num: "num"}
            }).done(function( num ) {
                $("#num_app").text(num);
            });  
        }

        
    </script>
</body>
</html>