
$('#addForm').on('submit',function(e){
e.preventDefault();
var  nom=$('[name="nom"]').val(),carte=$('[name="carte"]').val(), prenom=$('[name="prenom"]').val(), matiere=$('[name="matiere"]').val(), eid = $('[name="eid"]').val();


$.ajax({
  type: "POST",
  url: 'post/ajoutermodifierprof.php',
  data: {nom:nom,prenom:prenom,matiere:matiere,eid:eid,carte:carte},
  success: function(reponse){
    console.log(reponse);
    $('[name="eid"]').val(reponse);
    window.opener.Actualiser();
    window.close();
  }
});


})
