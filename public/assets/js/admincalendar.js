$(document).ready(function () {
    var bool = true;
    (function($){
        $.fn.calendar = function(reservedHours){
            var currentLangCode = 'bg';

            $('#admincalendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                dayClick:function(date, jsEvent, view){

                    var myDate = moment(new Date());
                    myDate = myDate.format();
                    date = date.format();

                    if(myDate > date){
                        var customModal = $('<div class="modal fade bs-example-modal-sm in" id="pastHour" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: block; padding-right: 17px;"> <div class="modal-dialog modal-sm"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close cancle-event" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> <h4 class="modal-title" id="mySmallModalLabel">Грешка</h4> </div> <div class="modal-body">Не може да запазите отминал час ! </div> <div class="modal-footer"> <button type="button" class="btn btn-default cancle-event" data-dismiss="modal">Затвори</button></div> </div> </div> </div>');
                        $('body').append(customModal);
                        $('#pastHour').modal({
                            backdrop    : 'static',
                            keyboard    : false,
                        });
                        $('#pastHour').modal('show');
                        $('.cancle-event').click(function(e){

                            $('#pastHour').on('hide.bs.modal', function () {
                                $(this).remove();
                            });

                        });
                    }else{
                        $('#hourElements').modal('show');
                        data.start = date;
                    }



                    if(!bool){
                        $('.eventMenu').remove();
                        bool = true;
                    }
                },
                events: reservedHours,
                defaultDate: $('#calendar').fullCalendar( 'today' ),
                lang: currentLangCode,
                defaultView: 'agendaWeek',
                weekNumbers: true,
                editable: false,
                allDaySlot: false,
                slotDuration: '00:15:01',
                scrollTime: '10:00:00',
                minTime: "08:00:00",
                maxTime: "23:00:00",
                axisFormat: 'H:mm',
                eventLimit: true, // allow "more" link when too many events
                eventBorderColor: '#fff',
                eventDrop: function(event, delta, revertFunc) {

                    console.log(event.start.format());
                    console.log(event.end.format());
                    event.editable = false;
                    $('.qtip').hide();
                },
                droppable: false,
                eventRender: function(event, element, view) {
                    element.qtip({
                        content: event.description,
                        position: {
                            my: 'bottom center',
                            at: 'top center'
                        },
                        show: {
                            event: 'click',
                            solo: true
                        },
                        hide: {
                            event: 'unfocus click'
                        },
                        style: {
                            classes: 'myQtip'
                        },
                        onHide: function() { $(this).qtip('destroy'); }
                    });
                    element.bind('click', function() {
                        //event.startEditable = true;
                        if(event._id !=  $('.eventMenu').data('eventID')){
                            $('.eventMenu').remove();
                            bool = true;
                        }
                        if(bool){
                            bool = false;
                            element.append('<div data-eventID="'+event._id+'" class="eventMenu"></div>');
                            $('.eventMenu').html('<div id="edit-event" class="event-menu-icon icon icon-pencil"></div><div id="trash"  class="event-menu-icon icon icon-trash"></div>');
                            $('.eventMenu').css('background-color',event.backgroundColor);
                            $('.eventMenu').css('border-color','#fff');
                            delEvent(event);
                            editEvent(event,element);
                        }
                    });

                },
                eventClick: function(event, jsEvent, view) {

                },
                eventAfterRender: function(event, element, view) {
                    var width = $(element).width();
                    $(element).width(width/1.3+'px');
                    var el = element.find('.fc-content');
                    el.css('height',$(element).height());
                    el.css('overflow','hidden');
                    view.backgroundColor = '#ddd';

                },

            });


            var data = $('.select-service').select({
                name:'Услуга',
                dataName:'service'
            });

            data._token = Globals._token;

            $('#hourElements button[type="submit"]').on('click',function(e){
                $('#hourElements').modal('hide');
                data.user_id = $('.selected-user :selected').val();
                data.client_name =  $('input[name="client"]').val();
                if(data.service_id != null){

                    data.end = getEnd();
                    $.post('/calendar/hourreservation',data).error(function(er){
                        console.log(er);
                    }).success(function(e){
                        data.hour_id = e.id;
                        data.backgroundColor = $('.selected-user :selected').data('color');
                        addEvent();
                        cleanmodal();
                    });


                }else{
                    console.log('Изберете процедура!');
                }

            });

            function getEnd(){

                var duration = moment.duration(data.time,'m');
                var end = moment(data.start);
                end.add(duration, 'milliseconds');
                end = end.format();
                return end;
            }

            function addEvent(){
                $("#admincalendar").fullCalendar('renderEvent',
                    {
                        hour_id:data.hour_id,
                        title: data.name.substr(1,data.name.indexOf(')')-1),
                        description:$('.selected-user :selected').text()+'</br>'+data.name+'<br>'+data.client_name,
                        backgroundColor: data.backgroundColor,
                        start: data.start,
                        end: data.end
                    }, true);
                $.fn.taskpluginreload();
            }

            function cleanmodal(){

                data.service_id = null;
                $('.service-fill').val('');
                $('.selected-user').html('<option>Изберете услуга!</option>');
                $('input[name="client"]').val('');
            };
        }
    })(jQuery);


    (function($){
        $.fn.loadcalendar = function(){

            $.post('calendar/html',{_token:Globals._token}).error(function(er){
                console.log(er);
            }).success(function(html){
                av(html);
            });

            function av(html){
                $.post('calendar/reservedhours',{_token:Globals._token}).error(function(er){
                    console.log(er);
                }).success(function(e){
                    $('.admin-cal-ajax').html(html);
                    $.fn.calendar(e);
                });
            }
        }
    })(jQuery);

    function delEvent(event){
        $("#trash").on("click", function () {
            var customModal = $('<div class="modal fade bs-example-modal-sm in delEvent"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: block; padding-right: 17px;"> <div class="modal-dialog modal-sm"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close cancle-event" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> <h4 class="modal-title" id="mySmallModalLabel">Изтриване</h4> </div> <div class="modal-body">Потвърдете изтриването? </div> <div class="modal-footer"> <button type="button" class="btn btn-default cancle-event" data-dismiss="modal">Затвори</button> <button type="button" class="btn btn-danger delete-event" data-dismiss="modal">Изтрии</button> </div> </div> </div> </div>');
            $('body').append(customModal);
            $('.delEvent').modal({
                backdrop    : 'static',
                keyboard    : false,
            }).modal('show');
        });
        $('.cancle-event').click(function(e){

            $('.delEvent').on('hide.bs.modal', function () {
                $(this).remove();
            });
            $('.qtip').hide();

        });

        $('.delete-event').click(function(e){

            $('.delEvent').on('hide.bs.modal', function () {
                $(this).remove();
            });
            $('.qtip').hide();
            $.post('/calendar/delevent',{_token:Globals._token,hour_id:event.hour_id}).error(function(er){
                console.log(er);
            }).success(function(e){
                $('#admincalendar').fullCalendar('removeEvents',event._id);
                $.fn.taskpluginreload();
            });
        });
    }

    function editEvent(event,element){
        $('#edit-event').click(function(e){
            event.editable = true;
            element.draggable();
            alert('true');
        });

    }

    $.fn.loadcalendar();

});


