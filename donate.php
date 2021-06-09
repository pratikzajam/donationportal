<!doctype html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="donate.css">
  <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
  <title>Hello, world!</title>

 


</head>

<body>
  <?php  include 'partials/navbar.php' ;  ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-8"></div>
      <div class="col-sm-4">



        <form class="mt7" method="post" action="donate.php">
          <div class="form-group">
            <label for="exampleInputEmail1 " class=" f4 "><b>Full Name</b></label>
            <input type="name" id="name" class="form-control mt2 br-pill  b--black bw1  " name="name" required 
              aria-describedby="emailHelp" placeholder="">

          </div>
          <div class="form-group mt2">
            <label for="exampleInputPassword1" class=" f4"><b>Amount to Donate</b></label>
            <input type="number" id="amount" class="form-control amountinput br-pill mt2 b--black bw1 " name="amount"
              required >
          </div>

          <button type="button" id="btn " name="btn" onclick="pay_now()" class="btn btn-dark yellow mt3 br-pill tc"> Pay Now
          </button><br>
        </form>

</div>
  </div>
  
  
 
   
   <script> 
   function pay_now(){
    var name= $('#name').val();
    var amount= $('#amount').val();

  var options = {
    "key": "rzp_test_W129PhRyXJr5vm", // Enter the Key ID generated from the Dashboard
    "amount": amount*100 , // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "MediSure",
    "description": "Donate",
    "image": "images/logo.png",
     //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
      jQuery.ajax({
       type:'post',
       url:'paymentprocess.php',
       data:"&amount="+amount+"&name="+name,

      })
       
        window.location.href="sucess.php";

    },
    "prefill": {
        "name": "",
        "email": "",
        "contact": ""
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
 };
var rzp1 = new Razorpay(options);
rzp1.open();
rzp1.on('payment.failed', function (response){

      

 window.location.href="fail.php";
 

});

   }

</script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>