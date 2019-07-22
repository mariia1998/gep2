
$('#addForm').on('submit',function(e){
e.preventDefault();
var  nom=$('[name="nom"]').val(),tel=$('[name="tel"]').val(), prenom=$('[name="prenom"]').val(), niveau=$('[name="niveau"]').val(),annee=$('[name="annee"]').val() , eid = $('[name="eid"]').val(),
inscr = (document.querySelector('[name="inscription"]').checked ? '1':'0') , groupe_id = $('[name="groupe_id"]').val(),montant = $('[name="montant"]').val(), nombre_seances = $('[name="nombre_seances"]').val(), carte = $('[name="carte"]').val();
 

$.ajax({
  type: "POST",
  url: 'post/etudiant.php',
  data: {nom:nom,prenom:prenom,niveau:niveau,annee:annee,montant:montant,eid:eid,tel:tel,inscr:inscr,groupe_id:groupe_id,nombre_seances:nombre_seances,carte:carte},
  success: function(reponse){
    console.log(reponse);
    $('[name="eid"]').val(reponse);
    if (window.opener)  window.opener.Actualiser();
  }
});


})


function afficherInscription(inp){
if (inp.checked) {
  $('#inscr').slideDown();
  calculerLePrix();
} else {
  $('#inscr').slideUp();
}
}




function calculerLePrix(){
var inscrGr  = document.querySelector('[name="groupe_id"]')  ,
prixParSeance = inscrGr.options[inscrGr.selectedIndex].getAttribute("data-s") ,
nombreDesSeances = document.querySelector('[name="nombre_seances"]').value ,
montant = parseFloat(prixParSeance) * parseFloat(nombreDesSeances);
document.querySelector('[name="montant"]').value = montant;
}
