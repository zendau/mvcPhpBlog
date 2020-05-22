let data;

$.ajax({
    type: "POST",
    url: "/user/news/1",
    data: { num: "num"}
    }).done(function( num ) {
       data = JSON.parse(num)
});  


$(document).ready(function(){
    $('.section-photo__slider').slick();

    $("#login").click(function(){
        $(".overlay").addClass("active")
        $(".section-login").addClass("active")
    })

    $(".section-login__close").click(function(){
        $(".overlay").removeClass("active")
        $(".section-login").removeClass("active")
    })

    $("#close").click(function(){
        $(".overlay").removeClass("active")
        $(".section-modal").removeClass("active--block ")
    })
   
    $(".section-login__reset").click(function(){
        $(".section-login").removeClass("active")
        $(".section-reset").addClass("active")
    })

    $(".section-reset__close").click(function(){
        $(".section-reset").removeClass("active")
        $(".overlay").removeClass("active")
    })

    $.validator.addMethod("ruLet", function(value, element) {
        return /^[А-яЁё]{0,16}$/.test(value);
      },
      "Имя может содержать только русские буквы")

    $.validator.addMethod("enLet", function(value, element) {
    return /^[A-z0-9]{0,16}$/.test(value);
    },
    "Логин может содержать только латинские буквы и цифры ")
        
    $.validator.addMethod("pass", function(value, element) {
        return /^[a-z0-9]{10,30}$/.test(value);
        },
        "Пароль указан неверно (разрешены только латинские буквы и цифры от 10 до 30 символов")

    $('form').validate({
        rules: {
            email: {
                email: true,
                required: true
            },
            name: {
                minlength: 2,
                maxlength: 15,
                required: true,
                ruLet: true,
            },
            login: {
                minlength: 2,
                maxlength: 15,
                required: true,
                enLet: true,
            },
            pass: {
                minlength: 2,
                maxlength: 30,
                required: true,
                pass: true,
            }

        },
        messages: {
            email: {
              required: "Требуеться заполнить данное поле",
              email: "E-mail адресс введен не корректно"
            },
            name: {
                required: "Требуеться заполнить данное поле",
                minlength: "Длина имени должна быть больше 2 символов",
                maxlength: "Длина имени должна быть меньше 15 символов"
            },
            login: {
                required: "Требуеться заполнить данное поле",
                minlength: "Длина логина должна быть больше 2 символов",
                maxlength: "Длина логина должна быть меньше 15 символов"
            },
            pass: {
                required: "Требуеться заполнить данное поле",
                minlength: "Длина пароля должна быть больше 2 символов",
                maxlength: "Длина пароля должна быть меньше 30 символов"
            }
          }
      });


    $(".section-news__search-input").focus(()=>{
        $(".section-news__search-list").addClass("section-news__search-list--active")
    })
    $(".section-news__search-input").blur(()=>{
        $(".section-news__search-list").removeClass("section-news__search-list--active")
    })
    $(".section-news__search-list").hover(()=>{
        $(".section-news__search-list").addClass("section-news__search-list--active")
    })
   
    $("#phone").mask("(999) 999-9999");
  
    $(".section-news__search-input").keyup(()=>{ 
        let search = $(".section-news__search-input").val()
        if(search.trim()){
            search = search[0].toUpperCase()+search.substring(1)
            console.log(search)
            let res = data.map((x, i) => [x['title'].indexOf(search), i]).filter(x => x[0] == 0)
            $(".section-news__search-list-item").remove()
            if(res.length == 0){
                $(".section-news__search-list").append("<li class='section-news__search-list-item'><a href='#'>Результаты не найдены</a></li>");
            }
            else if(res.length > 5){
                let len = res.length - 4
                res = res.slice(0,4)
                res.forEach((x,i)=> {
                    $(".section-news__search-list").append("<li class='section-news__search-list-item'><a href='/user/post/"+data[x[1]]['id']+"'>"+data[x[1]]['title']+"</a></li>");
                })
                $(".section-news__search-list").append("<li class='section-news__search-list-item'><a href='#'>И ещё "+len+" результатов</a></li>");
            }else {
                res.forEach((x,i)=> {
                    $(".section-news__search-list").append("<li class='section-news__search-list-item'><a href='/user/post/"+data[x[1]]['id']+"'>"+data[x[1]]['title']+"</a></li>");
                    
                })
            }
        }else {
            $(".section-news__search-list-item").remove()
        }
    })    

});
