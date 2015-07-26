(function($) {

    $.fn.clickOnCheck = function() {
       return this.each(function(){
           var cb = $(this);
           cb.hide().wrap('<div></div>');
           cb.parent().append('<i></i>');
           if(cb.is(':checked')){
               cb.next().addClass('fa fa-check-square-o').css('margin-top','2px').css('font-size','22px');
           }else{
               cb.next().addClass('fa fa-square-o').css('margin-top','2px').css('font-size','22px');
           }
           cb.next().click(function(){
               taskNumberFix();
               $(this).toggleClass('fa-check-square-o fa-square-o');
               $(this).closest('li').hide(0);
               $.post('/tasks/finishedtask',{_token:Globals._token,hour_id:$(this).closest('li').data('id')}).error(function(er){
                   console.log(er);
               }).success(function(e){
                   $.fn.loadcalendar();
                   console.log(e);
               });
           });

       });
    };

    function taskNumberFix(){
        var taskNumber = $('.task-number').text()-1;
        $('.task-number').html(taskNumber);
        if(taskNumber == 1){
            $('.tasks-personal .drop-title').html('Вие имате '+taskNumber+' запазен час!');
        }else{
            $('.tasks-personal .drop-title').html('Вие имате '+taskNumber+' запазени часа!');
        }
    }

}( jQuery ));

