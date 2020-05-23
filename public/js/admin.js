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
