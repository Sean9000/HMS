document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar1');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev',
        center: 'title',
        right: 'next'
      },
      selectable: true,
      select: function(info){
  
        var checkin  = info.start;
        var selectedDate = checkin.toLocaleDateString();
        // var selectedDate = checkin.format('DD-MM-YYYY');
        document.getElementById('check_in').value = selectedDate;
       
      },
 
    });
  
    calendar.render();
  });

