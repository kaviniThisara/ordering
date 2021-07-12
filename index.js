$(document).ready(function(){


//-------------------------user signup code as follows:---------------------------------------------

$("#signup").click(function(event){
event.preventDefault();

    $.ajax({
            url:'signup.php',
            method:'post',
            data:$("form").serialize(),
            success:function(data,success) {
              //console.log(data);
            $("#signupmsg").html(data);
            }
            
        })//$.ajax ends here

})//signup click ends here

//-----------------------------------user signup code ends here-----------------------------------

$("#login").on("submit",function(event) {
  event.preventDefault(event);
  //alert("login called");
  $.ajax({
        url:'login.php',
        method:'POST',
        data:$("#login").serialize(),
        success:function (data,success) {
          if(data == "login_success"){
            //alert(data)
            window.location.href="profile.php";
          }else if(data == "cart_login"){
            //alert(data)
           window.location.href="cart.php";
          }else{
           $("#login_msg").html(data);
           // alert(data)

          }
        }
  })//end of $.ajax({})
  
})//end of login

//---------------------------login code ends here---------------------------------------------

//----------------------------------add to cart code starts here-------------------------------

$("body").delegate("#product",'click',function(event){
               event.preventDefault();
              //alert("hiiiiii");
               var pid= $(this).attr('pid');
              // alert(pid);
               $.ajax({
                 url:'action.php',
                 method:'post',
                 data:{addtoproduct:1,productid:pid},
                 success:function(data,success){
                  // alert(data);
                  $("#addtoproduct_msg").html(data);
                  cart_count();
                 }

               })//end of ajax

         })//end of delegate class
//----------------------------------add to cart code ends here--------------------------------




//-------------------------------cart.php page-----get cart product list for checkout starts here--------------------------
cart_product_list();
function cart_product_list(){

                $.ajax({
                     url:'action.php',
                     method:'post',
                     data:{get_cart_products_list:1},
                     success:function(data,success) {
                      
                        $("#cart_product_list").html(data);
                     }
                })//end of ajax 
}


//-------------------------------cart.php page-----get cart product list sfor checkout ends here--------------------------

//------------------------------code for qty start here-----------------------------

$("body").delegate(".qty","keyup",function(e){
  e.preventDefault();
  //following both are lines for not allowing any string and not allowing any symbols and not allowing any negetive number in quantity field
  this.value = this.value.replace(/[^\d\\-]/g,'');//not allowing any characters or symbols except minus
  this.value =this.value.replace(/\-/g,'');//not allowing minus sign
  /*if($(this).val() < 1)
     {
       $(this).val('1');
     }*/

  var pid=$(this).attr('pid');
  //alert(pid);

  var qty=$("#qty-"+pid).val();
  console.log(qty);
 
  var price=$("#price-"+pid).val();
  console.log(price);

  var total= qty*price;
  console.log("total:"+total);

  $("#total-"+pid).val(total);

})


//--------------------------------------when page no is clicked starts here-----------------------------------

$("body").delegate("#page","click",function(){
  var pn= $(this).attr('page');
  //alert(pn);

  $.ajax({
    url:"action.php",
    method:"post",
    data:{products:1,setpage:1,pageno:pn},
    success:function(data,success){
     // alert(data);
     $("#get_products").html(data);

    }
  })
})

//--------------------------------------when page no is clicked ends here-----------------------------------
//-----------------------pagination code ends here-------------------------------------------------------


});//end of document.ready function