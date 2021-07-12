<?php



?>


<!--Project definataion-SHOPPING CART APP using AJAX,JQUERY,PHP,MYSQLI-->
<!--I HAVE USED BOOTSTRAP FOR FRONT END-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odering...</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/1a40f3df8b.js" crossorigin="anonymous"></script>


    <script type="text/javascript">
   $(document).ready(function(){
            $('input[type="text"]').keyup(function () {
                var val1 = 250;
                var val2 = parseInt($('.value1').val());
                var amt1 = val1*val2;
                $("input#result1").val(amt1);

                var val3 = 350;
                var val4 = parseInt($('.value2').val());
                var amt2 = val3*val4;
                $("input#result2").val(amt2);

                var val5 = 500;
                var val6 = parseInt($('.value3').val());
                var amt3 = val5*val6;
                $("input#result3").val(amt3);
            });
        });

        function cal() {

            var val1 = parseInt($('.value4').val());
            var val2 = parseInt($('.value5').val());
            var val3 = parseInt($('.value6').val());

            var s1 = document.getElementById("p1").checked ? val1 : 0;
            var s2 = document.getElementById("p2").checked ? val2 : 0;
            var s3 = document.getElementById("p3").checked ? val3 : 0;
            var total = s1 + s2 + s3;
            $("input#result4").val(total);
        }
    </script>
</head>

<body>
<!-----------------------------------navbar start here----------------------------------------->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <a class="navbar-brand" href="#" >Odering...</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
          <a class="nav-link" href="#" >
            <i class="fas fa-home " style="font-size: larger;"></i>  Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#" >
            <i class="fab fa-algolia" style="font-size: larger;"></i>  Packages</a>
        </li>
      </ul>

      <ul class="navbar-nav mr-auto"  style="float: right;">

        <li class="nav-item dropdown active" >
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" 
          id="signindropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"  ></i>  Sign In </a>
           <div class="dropdown-menu" aria-labelledby="signindropdown">
               <div class="card text-left text-white bg-info" style="width: 300px;">
                   <div class="card-header ">Login</div>
                   <div class="card-body">
                       <form  onsubmit="return false" id="login">
                           <label for="loginemail">Email</label>
                           <input type="email" class="form-control" id="loginemail" name="loginemail" placeholder="Email">
                           <label for="Password">Password</label>
                           <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                           
                           <input type="submit" class="btn btn-success btn-xs" value="Login" style="display:block; margin-top:1%; margin-bottom:1%;">

                           <a href="#" style="border:none; display:block;color:white;">Forgotten Password?</a>
                           <a href="customer_register_form.php"  style="border:none; display:block;color:white;">Create New Account</a>
                           
                       </form>
                   </div>
                   <div class="card-footer"><div id="login_msg"></div></div>    
                  
               </div>
           </div> 
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="customer_register_form.php" >
              <i class="fas fa-user"></i>  Sign Up</a>
          </li>
      </ul>

    </div>
  </nav>
<br/><br/><br/>
<!-----------------------------------navbar ends here------------------------------------------>
<!-----------------------------------code for shopping cart start here----------------------->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div id="addtoproduct_msg"></div>
        <div class="card">
        <div class="card-header">Packages</div>
        <div class="card-body" >
             
        
        <div class="row">
            <form>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Package</th>
                      <th scope="col">UnitPrice</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">SubTotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"><input type="checkbox" id="p1" onclick="cal()" style="margin-right: 10px;">Pakage 1</th>
                      <td>LKR 250</td>
                      <td>Qty : <input type="text" class="input value1"/></td>
                      <td>Sub Total : <input type="text"  disabled="disabled" id="result1" class="input value4"/></td>
                    </tr>
                    <tr>
                      <th scope="row"><input type="checkbox" id="p2" onclick="cal()" style="margin-right: 10px;">Pakage 2</th>
                      <td>LKR 350</td>
                      <td>Qty : <input type="text" class="input value2"/></td>
                      <td>Sub Total : <input type="text"  disabled="disabled" id="result2" class="input value5"/></td>
                    </tr>
                    <tr>
                      <th scope="row"><input type="checkbox" id="p3" onclick="cal()" style="margin-right: 10px;">Pakage 3</th>
                      <td>LKR 500</td>
                      <td>Qty : <input type="text" class="input value3"/></td>
                     <td>Sub Total : <input type="text"  disabled="disabled" id="result3" class="input value6"/></td>
                    </tr>
                  </tbody>
                </table>
            </form>
            
    <div class="card-footer">
        <button class="btn btn-primary btn-xs" style="float: right; margin-left: 100px;">Place The Order</button>
            Total : <input type="text"  disabled="disabled" id="result4"/>
    </div>
    </div>


             </div>
             <div class="card-footer">
                 @2021 all rights reserved.
             </div>
           </div>
        </div>

        <div class="col-md-1"></div>
    </div>
</div>
<br/>

<!-------------------------CODE TO ENABLE BOOTSTRAP------------------------------------------>
<script src="jquery-3.5.1.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="index.js"></script>


</body>
</html>