


$('#addForm').on('submit',function(e){
e.preventDefault();
var  nom=$('[name="nom"]').val();

$.ajax({
  type: "POST",
  url: 'post/ajouterModifierMatiere.php',
  data: {nom:nom,eid:mid},
  success: function(reponse){
    console.log(reponse);
    // $('[name="eid"]').val(reponse);
    mid = reponse;
    window.opener.Actualiser();
    window.close();
  }
});

});
