$( document ).ready(function(){

    setTimeout(function() {
        $(".success").fadeOut(500);
    }, 5000);

    /* ===COLLAPS MENU=== */
    // спрятать/показать
    $( ".open" ).click(function(e){
        e.preventDefault();
        // стрелка показать/скрыть
        if( $( ".collaps_menu i" ).hasClass( "fa-chevron-circle-right" ) ){
            $( ".collaps_menu i" ).removeClass( "fa-chevron-circle-right" ).addClass( "fa-chevron-circle-left" );
        }else{
            $( ".collaps_menu i" ).removeClass( "fa-chevron-circle-left" ).addClass( "fa-chevron-circle-right" );
        }
        // анимация для скрытия
        if( $( "aside" ).hasClass( "expanded" ) ){
            $( "aside" ).addClass( "animate-aside" );
            $( "main" ).addClass( "animate-aside" );
        }else{
            $( "aside" ).removeClass( "animate-aside" );
        }
        // скрыть/показать
        $( "aside" ).toggleClass( "expanded" );
        $( "main" ).toggleClass( "expand" );
        // добавление/удаление cookie
        if( $( "aside" ).hasClass( "expanded" ) ){
            $.cookie( "expanded", true );
        }else{
            $.cookie( "expanded", null );
        }

    });
    // проверка cookie
    if($.cookie("expanded")){
        if( $( ".collaps_menu i" ).hasClass( "fa-chevron-circle-right" ) ){
            $( ".collaps_menu i" ).removeClass( "fa-chevron-circle-right" ).addClass( "fa-chevron-circle-left" );
        }else{
            $( ".collaps_menu i" ).removeClass( "fa-chevron-circle-left" ).addClass( "fa-chevron-circle-right" );
        }
        //$( "aside" ).addClass( "expanded" );
        //$( "main" ).addClass( "expand" );
    }
    /* ===end collaps menu=== */

    /* ===ПОДСВЕТКА РАДИТЕЛЬСКИХ ПУНКТОВ МЕНЮ=== */
    $( "#menu > li > ul" ).hover(
        function(){
            $( this ).parent().children( "a" ).css({
                background: "#111",
                color: "#2ea2cc"
            });
            $( this ).parent().children( "a" ).children( "i" ).css({
                color: "#2ea2cc"
            });
        },
        function(){
            $( this ).parent().children( "a" ).css({
                background: "",
                color: ""
            });
            $( this ).parent().children( "a" ).children( "i" ).css({
                color: ""
            });
        }
    );
    /* ===end подсветка радительских пунктов меню=== */

    /* ===ADD NEW PHOTO=== */
    $( "#addNewPhoto" ).click(function(e){
        e.preventDefault();
        $( ".modal-overflow" ).fadeIn( 100 );
    });
    $( ".modal-close" ).click(function(e){
        e.preventDefault();
        $( ".modal-overflow" ).fadeOut( 100 );
    });
    /* ===end add new photo=== */

    /* ===CKEDITOR=== */
    //$( 'textarea#editor1' ).ckeditor();
    /* ===end ckeditor=== */

    /* ===УДАЛЕНИЕ=== */
    $(".del").click(function(){
        var res = confirm("Подтвердите удаление");
        if(!res) return false;
    });
    /* ===end удаление=== */

    /* ===БЛОКИРОВКА КНОПКИ ЗАГРУЗКИ=== */
    // view=main
    $( ".select-inf" ).change(function() {
        $( "input.button[disabled='disabled']" ).removeAttr("disabled");
    });

    // view=photos,main_slider
    $( '#madal-form input[type="file"]' ).change(function(){
        var file = $( '#madal-form input[type="file"]' ).val();
        if(file.length){
            $( '.button-large[type="submit"]' ).removeAttr("disabled");
        }
    });
    $( '#madal-form' ).submit(function(e){
        var file = $( 'input[type="file"]' ).val();
        if(file.length){
            $("#preloader").fadeIn(300);
            $( '.button-large[type="submit"]' ).attr("disabled", "disabled");
            return;
        }
        e.preventDefault();
    });
    /* ===end Блокировка кнопки загрузки=== */

    /* ===БЛОКИРОВКА КНОПКИ УДАЛИТЬ=== */
    $( ".del_photo_checkbox" ).change(function() {
        var button = $(this).parent().children( "button" );
        var checked = $( this ).prop( "checked" );
        if( checked ){
            button.show();
        }else{
            button.hide();
        }
    });
    /* ===end Блокировка кнопки удалить=== */

    /* ===СОРТИРОВКА ФОТОГРАФИЙ=== */
    $( "#photos-wrap" ).sortable({
        items: "> div:not(.ui-state-disabled)",
        opacity: 0.7,
        stop: function(){
            var arr = $('#photos-wrap').sortable("toArray");
            //alert(arr);
            $("#preloader").fadeIn(300);
            $.ajax({
                url: './',
                type: 'POST',
                data: {masiv:arr},
                error: function(){
                    $("#preloader").fadeOut(200);
                    var html = "<div class='error'>Ошибка!</div>";
                    $('#res').html('');
                    $('#res').html(html);
                },
                success: function(){
                    $("#preloader").fadeOut(200);
                    // var html = "<div class='success'>Сохранено!</div>";
                    // $('#res').html('');
                    // $('#res').html(html);
                    // setTimeout(function() {
                    //   $(".success").fadeOut(500);
                    // }, 5000);
                }
            });
        }
    });
    $( "#photos-wrap div" ).disableSelection();
    /* ===end Сортировка фотографий=== */



});