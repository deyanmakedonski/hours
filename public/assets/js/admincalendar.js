
var currentLangCode = 'bg';
$('#admincalendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    dayClick:function(date, jsEvent, view){
        $('#hourElements').modal('show');
        $('#start').val(date.format());
    },
    defaultDate: $('#calendar').fullCalendar( 'today' ),
    lang: currentLangCode,
    defaultView: 'agendaWeek',
    weekNumbers: true,
    editable: true,
    allDaySlot: false,
    slotDuration: '00:15:01',
    scrollTime: '10:00:00',
    minTime: "08:00:00",
    maxTime: "23:00:00",
    axisFormat: 'H:mm',
    eventLimit: true, // allow "more" link when too many events

    editable:false,
        drop: function(date) {
    },
    droppable: true,
        eventRender: function(event, element) {
        element.qtip({
            content: event.description,
            position: {
                my: 'bottom center',
                at: 'top center'
            },
            style: {
                classes: 'myQtip'
            }
        });
        console.log();
    },
    eventClick: function(event, element) {

        console.log(event);
    }

});

$('#hourElements button[type="submit"]').on('click',function(e){
    $.post('/test',{_token:Globals._token,id:1}).error(function(er){
        console.log(er);
    }).success(function(e){
        console.log(e);
    });
});

var data = $('.select-service').select({
    name:'Услуга',
    dataName:'service'
});
