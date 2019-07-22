
var liste =[];


function Actualiser() {
  var search = $('#search').val() ,
  groupe = $('[name="filtreParGroupe"]').val();

  $.ajax({
    dataType: "json",
    url: 'json/etudiants.php?search='+search+'&gr='+groupe,
    success: function(resultats){
console.log(resultats);
      liste=resultats;
      AfficherResultats();


    }
  });
}


function setTr(el) {
  $('tr.active').removeClass('active');
el.classList.add('active')
}

function AfficherResultats() {
  var html = '', nombre=0  , niveau = $('[name="annee"]').val();
 
  for (var i = 0; i < liste.length; i++) {
if  (niveau == '-1' || niveau == liste[i].niveau)   html +='<tr onclick="setTr(this)" data-id="'+liste[i].id+'" ><td>'+liste[i].id+'</td><td>'+liste[i].nom+'</td><td>'+liste[i].prenom+'</td><td>'+liste[i].tel+'</td></tr>';
   nombre++;
  }

  $('#res').html(html);
  $('#count').html(nombre);
}

function Ajouter (){
window.open('ajout-etudiant.php?id=0', '', 'width=800px,height=540px');
}


function Editer(id) {
  window.open('ajout-etudiant.php?id='+id, '', 'width=800px,height=540px');
}

function EditActive(){
  var trActive = $('tr.active') ,
idActive = trActive.attr('data-id');
if (idActive == undefined) return;
Editer(idActive);
}

function supprimer() {
  var trActive =$('tr.active'),
  idActive = trActive.attr('data-id');
  if (idActive == undefined) return;

  var r = confirm("Voulez vous supprimer ?");
  if (r) {
// delete
$.ajax({
  type: "POST",
  url: 'post/supprimer-etudiant.php',
  data: {id:idActive},
  success: function(reponse){
 //alert(reponse);
 console.log(reponse);
 Actualiser();
  }
});



  }



}


window.addEventListener('keyup',function(e){
// e.keyCode
console.log(e);
if(e.keyCode == 46)
supprimer();
 if( e.keyCode == 107)
 Ajouter();
})




Actualiser();
