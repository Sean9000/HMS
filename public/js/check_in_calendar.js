


document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev',
        center: 'title',
        right: 'next'
      },
      // weekends: false,
      selectable: true,
      selectAllow: function(info) {
        var start = moment(info.start);
        var end = moment(info.end);
  
        // Check if the selected range includes any past dates
        if (start.isBefore(moment(), 'day')) {
          return false;
        }
    
        return true;
      },
      eventDidMount: function(info) {
        var date = moment(info.event.start).startOf('day');
        var today = moment().startOf('day');
        if (date.isBefore(today) || date.day() === 0 || date.day() === 6) {
          info.el.classList.add('fc-day-disabled');
        }
      },

      select: function(info){
        // var checkin  = info.start;
        // var selectedDate = checkin.toLocaleDateString();
        // // var selectedDate = checkin.format('DD-MM-YYYY');
        // document.getElementById('check_in').value = selectedDate;
        if (info.startStr !== '') {
          var startDate = moment(info.startStr).format('YYYY-MM-DD');
          document.getElementById('check_in_date').value = startDate;
        }
        if (info.endStr !== '') {
          var endDate = moment(info.endStr).subtract(1, 'days').format('YYYY-MM-DD');
          document.getElementById('check_out_date').value = endDate;  
        }
        
        // if (info.startStr !== '') {
        //   setCheckinDate(info.startStr);
        // }
        // if (info.endStr !== '') {
        //   setCheckoutDate(info.endStr);
        // }
        calendar.unselect();
      },
    });
  
    calendar.render();
  });
  // var dateStr;
  // function setCheckinDate(dateStr) {
  //   document.getElementById('check_in_date').value = moment(dateStr).format('MM/DD/YYYY');
  // }
  
  // function setCheckoutDate(dateStr) {
    
  //   document.getElementById('check_out_date').value = moment(dateStr).subtract(1, 'days').format('MM/DD/YYYY');
  // }

