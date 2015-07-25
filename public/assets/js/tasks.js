$(document).ready(function () {

    $.get('/tasks').error(function(er){
        console.log(er);
    }).success(function(e){
        $('.ajax-tasks').html(e);
        $('input[type="checkbox"]').clickOnCheck();

    });

});


