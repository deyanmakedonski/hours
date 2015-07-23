(function($) {

    $.fn.select = function(options){
        var data = {id:null,category_id:null,name:null,time:null,price:null};
        var settings = $.extend({
             name : 'Име',
             dataName: 'service'
        },options);
        this.html('<label name="'+settings.dataName+'" for="'+settings.dataName+'-name" class="control-label">'+settings.name+':</label><div class="'+settings.dataName+'"> <input type="text" class="form-control service-fill" placeholder="Услуга"><div class="bodyservice col-md-12"><ol></ol><div></div>');

        $('.'+settings.dataName+' input[type="text"]').click(function(){
            $('.bodyservice').slideToggle(50);
        });

        var serviceclick = function(){
            $('.bodyservice ol li').click(function(){

                data.id = $(this).data('id');
                data.category_id = $(this).data('category_id');
                data.name = $(this).data('name');
                data.price = $(this).data('price');
                data.time = $(this).data('time')

                $('.active-service').removeClass('active-service');
                $('.service-active').removeClass('service-active');
                $(this).addClass('active-service');
                $('.bodyservice').slideToggle(50);
                $('.'+settings.dataName+' input[type="text"]').val($(this).text());
            });
        };

        var csssetings = function () {
            $('.bodyservice').css('border','solid 1px #AFCAF4');
            $('.bodyservice ol').css('margin','0px -15px 0px -15px');
            $('.bodyservice ol').css('padding','0');
            $('.bodyservice ol').css('list-style-type','none');
            $('.bodyservice ol').css('text-align','left');
            $('.bodyservice').css('display','none');
            $('.bodyservice ol li').css('padding-left','20px');
            $('.bodyservice ol li').css('cursor','pointer');
            $('.bodyservice ol li').hover(
                function() {
                    $(this).addClass( "hover-service" );
                }, function() {
                    $(this).removeClass( "hover-service" );
                }
            );
        };

        var serviceclick = function(){
            $('.bodyservice ol li').click(function(){

                data.id = $(this).data('id');
                data.category_id = $(this).data('category_id');
                data.name = $(this).data('name');
                data.price = $(this).data('price');
                data.time = $(this).data('time')

                $('.active-service').removeClass('active-service');
                $('.service-active').removeClass('service-active');
                $(this).addClass('active-service');
                $('.bodyservice').slideToggle(50);
                $('.'+settings.dataName+' input[type="text"]').val($(this).text());
            });

        };

        var mouseenter = function(){
            $('.bodyservice').mouseenter(function() {
                var enter = $('.active-service');
                enter.removeClass('active-service');
                enter.addClass('service-active');
            });
        };

        var mouseleave = function(){
            $('.bodyservice').mouseleave(function() {
                var enter = $('.service-active');
                enter.removeClass('service-active');
                enter.addClass('active-service');
            });
        };

        function findservices(value){
            var bool = false;
            $('.bodyservice ol').html('');
            services.forEach(function(service,index){
                service.name.toLowerCase();
                if(service.name.toLowerCase().indexOf(value) >= 0 ){
                    bool = true;
                    if($('.bodyservice ol li').length<8){
                        $('.bodyservice ol').append('<li data-id="'+service.id+'" data-category_id="'+service.category_id+'" data-name="'+service.name+'" data-price="'+service.price+'" data-time="'+service.time+'">'+service.name+'</li>');
                    }

                }
            });
            if(bool){
                csssetings();
                serviceclick();
                mouseenter();
                mouseleave();
                $('.bodyservice').show(0);
            }else{
                $('.bodyservice ol').append('<li >Няма нищо намерено!</li>');
                data.id = null;
                data.category_id = null;
                data.name = null;
                data.price = null;
                data.time = null;
                console.log('Няма нищо намерено');
            }

        }


        csssetings();
        serviceclick();
        mouseenter();
        mouseleave();



        $('body').click(function(e){
            if(e.target.className !== "form-control service-fill")
            {
                $('.bodyservice').hide(50);
            }
        });

        $('.'+settings.dataName+' input[type="text"]').keyup(function(e){
            var inputText = $(this).val().toLowerCase();
            findservices(inputText);
        });


        $( ".bodyservice ol" ).on( "click", "li", function() {
            $.get('/calendar/users',{category_id:data.category_id}).error(function(er){
                console.log(er);
            }).success(function(e){
                console.log(e);
            });
        });

        return data;
    };



})(jQuery);
