<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Auto complete text book</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
  
   
</head>


<body>

<div class="main-div">
<div class="container">
  <div class="row">
    <div class="col-lg-6">
    <h2>Auto complete text-book</h2>
    <form>
      <div id="autocomplete">
     <input type="text" id="search-box" class="form-control" placeholder="Please Enter City..." autocomplete="off">
     <div id="cityList"></div>
      </div>
    <input type="submit" class="btn btn-primary mt-3" id="search-button">
    </form>

    <div id="load-data"></div>
    </div>
  </div>
</div>
</div>





<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("#search-box").keyup(function() {
    var city = $(this).val();

    if(city !='') {
        $.ajax({
          url : "load-city.php",
          method : "POST",
          data : {city: city},
          success: function(data) {
            $("#cityList").fadeIn("fast").html(data);
          }
        });
    }else {
      $("#cityList").fadeOut();
    }
  });

  $(docuemnt).on('click', '#cityList li', function(){
   $('#search-box').val($(this).text());
    $("#cityList").fadeOut();
  });


$("#search-button").on('click', function(e) {
  e.preventDefault();

  var city =  $('#search-box').val();
  

  if(city == "") {
  alert("Please enter the city name.");
  $("#load-data").html("");
  }else{
    $.ajax({
          url : "load-data.php",
          method : "POST",
          data : {city : city},
          success: function(data) {
            $("#load-data").html(data);
          }
        });

  }
});


});

</script>

</body>
</html>