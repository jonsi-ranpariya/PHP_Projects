<!DOCTYPE html>
<html>
<head>
    <title>jquery moment example - ItSolutionStuff.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
</head>
<body>
  <h1 id="dte"></h1>
  <h1 id="dte1"></h1>
</body>  
<script type="text/javascript">
  
    var startDateTime = '31/01/2021'
    var nextMonthDate = moment(startDateTime, "DD/MM/YYYY")
                        .add(1, 'months')
                        .format('DD/MM/YYYY');
  
    //console.log(nextMonthDate);
    document.getElementById('dte').innerHTML = startDateTime;
    document.getElementById('dte1').innerHTML = nextMonthDate;
  
</script>
  
</html>