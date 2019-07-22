



$('#loginform').on('submit',function(e){
e.preventDefault();
var username = $('#username').val();
var password = $('#password').val();
if (password.length < 3 || username.length < 3) return;

$.ajax({
  type: "POST",
  url: 'login.php',
  data: { utilisateur: username, motdepasse: password },
  success: function(response){
    // alert(response)

if (response == '0') {
// alert('mot  de passe incorrect');
$('#loginform').addClass('bg-danger');
$('#loginform').removeClass('bg-dark');
window.setTimeout(function(){
$('#loginform').removeClass('bg-danger');
$('#loginform').addClass('bg-dark');
$('#password').focus();
},1000);
$('#password').val('');

} else {

// window.location.href = 'admin.php';
$.ajax({
  type:'POST',
  url:'setcookie.php',
  data :{data:response} ,
  success :function(c){
    // alert(c);return;
 window.location.href = 'admin.php';
  }
})



}

  }
});


});
