var clndr = {};

$( function() {

  // PARDON ME while I do a little magic to keep these events relevant for the rest of time...
  var currentMonth = moment().format('YYYY-MM');
  var nextMonth    = moment().add('month', 1).format('YYYY-MM');

  var events = [
    { date: currentMonth + '-' + '10', title: 'Kartu Perlindungan Sosial Sasar Petani Kakao di Sulawesi Barat', location: 'at Jakarta' },
    { date: currentMonth + '-' + '19', title: 'Presiden Joko Widodo Menjalankan Penggiling Padi Hasil Karya Kabupaten Pinrang', location: 'Indonesia' },
    { date: currentMonth + '-' + '23', title: 'Presiden RI Umumkan Nama-nama Menteri Kabinet Kerja 2014 - 2019', location: '' },
    { date: nextMonth + '-' + '07',    title: 'Presiden Joko Widodo Melakukan Video Conference dengan 8 (delapan) Kota di Indonesia.', location: '' }
  ];

  clndr = $('#full-clndr').clndr({
    template: $('#full-clndr-template').html(),
    events: events
  });

  $('#mini-clndr').clndr({
    template: $('#mini-clndr-template').html(),
    events: events,
    clickEvents: {
      click: function(target) {
        if(target.events.length) {
          var daysContainer = $('#mini-clndr').find('.days-container');
          daysContainer.toggleClass('show-events', true);
          $('#mini-clndr').find('.x-button').click( function() {
            daysContainer.toggleClass('show-events', false);
          });
        }
      }
    },
    adjacentDaysChangeMonth: true
  });

  $('#clndr-3').clndr({
    template: $('#clndr-3-template').html(),
    events: events,
    showAdjacentMonths: false
  });
});