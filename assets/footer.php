<script>


  function numberToPersian(number) {
    const persian = {
      0: "۰",
      1: "۱",
      2: "۲",
      3: "۳",
      4: "۴",
      5: "۵",
      6: "۶",
      7: "۷",
      8: "۸",
      9: "۹"
    };
    number = number.toString().split("");
    let persianNumber = ""
    for (let i = 0; i < number.length; i++) {
      number[i] = persian[number[i]];
    }
    for (let i = 0; i < number.length; i++) {
      persianNumber += number[i];
    }
    return persianNumber;
  }

  setInterval(showTime, 1000)

  function showTime() {
    const time = new Date();
    hour = (time.getHours() < 10 ? '0' : '') + time.getHours();
    hour = numberToPersian(hour);
    minute = (time.getMinutes() < 10 ? '0' : '') + time.getMinutes();
    minute = numberToPersian(minute);
    second = (time.getSeconds() < 10 ? '0' : '') + time.getSeconds();
    second = numberToPersian(second);
    document.getElementById('clock').innerHTML = hour + ":" + minute + ":" + second;
  }

  showTime();

  function showDate() {
    const date = new Date();
    const option = {
      weekday: "long",
      year: "numeric",
      month: "long",
      day: "numeric"
    };
    var dateTime = date.toLocaleDateString("fa-IR", option);
    timeArray = dateTime.split(' ');
    year = timeArray[0];
    month = timeArray[1];
    dayFirst = timeArray[2];
    dayArray = dayFirst.split(',');
    day = dayArray[0];
    weekday = timeArray[3];

    document.getElementById('date1').innerHTML = year;
    document.getElementById('date3').innerHTML = day;
    document.getElementById('date2').innerHTML = month;
    document.getElementById('date4').innerHTML = weekday;
  }

  showDate();


  var objCal1 = new AMIB.persianCalendar('pcal1');

  var objCal2 = new AMIB.persianCalendar('pcal2', {
      initialDate: '1301/1/1',
    }
  );

  var objCal3 = new AMIB.persianCalendar('pcal3', {
      defaultDate: '1401/12/12'
    }
  );

  var objCal4 = new AMIB.persianCalendar('pcal4', {
      onchange: function (pdate) {
        if (pdate) {
          alert(pdate.join('/'));
        } else {
          alert('تاریخ واردشده نادرست است');
        }
      }
    }
  );

  var objCal5 = new AMIB.persianCalendar('pcal5', {
      extraInputID: 'extra',
      extraInputFormat: 'YYYY/MM/DD - yyyy/mm/dd - JD'
    }
  );

</script>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>