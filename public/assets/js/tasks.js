$(document).ready(function () {

    $.fn.taskpluginreload = function(){
        $.post('/tasks',{_token:Globals._token}).error(function(er){
            console.log(er);
        }).success(function(e){
            $('.ajax-tasks').html(e);
            $('.check-plugin').clickOnCheck();

        });
    };

    $.fn.taskpluginreload();

});


