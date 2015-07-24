var currentLangCode = 'bg';

$('#admincalendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    dayClick:function(date, jsEvent, view){
        $('#hourElements').modal('show');
        data.start = date.format();
    },
    events: reservedHours,
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
            console.log(e);
        });
        addEvent();
        cleanmodal();

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

};

function addEvent(){
    $("#admincalendar").fullCalendar('renderEvent',
        {
            title: data.name,
            description:$('.selected-user :selected').text()+'</br>'+data.name+'<br>'+data.client_name,
            start: data.start,
            end: data.end
        }, true);
}

function cleanmodal(){

    data.service_id = null;
    $('.service-fill').val('');
    $('.selected-user').html('<option>Изберете услуга!</option>');
    $('input[name="client"]').val('');
};