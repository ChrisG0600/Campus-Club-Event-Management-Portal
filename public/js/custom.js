$(document).ready(function () {
  $("#announcement_date").datepicker({
    dateFormat: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    minDate: new Date(), // Set the minimum date to today
  });
});
