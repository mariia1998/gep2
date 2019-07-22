

$('#addForm').on('submit',function(e){
e.preventDefault();
var  nom=$('[name="nom"]').val(),niveau=$('[name="niveau"]').val(), prof=$('[name="prof"]').val(),special= document.querySelector('[name="special"]').checked ,
 nombre_max=$('[name="nombre_max"]').val(),prix_m=$('[name="prix_m"]').val(),prix_s=$('[name="prix_s"]').val() , eid = $('[name="eid"]').val();
special = (special?'1':'0');

$.ajax({
  type: "POST",
  url: 'post/groupe.php',
  data: {nom:nom,niveau:niveau,prof:prof,nombre_max:nombre_max,eid:eid,prix_m:prix_m,prix_s:prix_s,special:special},
  success: function(reponse){
    console.log(reponse);
    $('[name="eid"]').val(reponse);
      window.opener.Actualiser();
  }
});


})
