
var liste =[];


function Actualiser() {
  var search = $('#search').val();
  $.ajax({
    dataType: "json",
    url: 'json/jsongroupes.php?search='+search,
    success: function(resultats){

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
  var html = '', nombre=0  , niv = $('[name="niveaux"]').val()  ;
  for (var i = 0; i < liste.length; i++) {
    //ondblclick="Editer('+liste[i].id+')"
if (niv == '-1' || niv == liste[i].niveau)  html +='<tr onclick="setTr(this)" data-id="'+liste[i].id+'" ><td>'+liste[i].id+'</td><td>'+liste[i].nom+'</td><td>'+liste[i].niveauText+'</td><td>'+liste[i].id_prof+'</td><td>'+liste[i].special+'</td><td>'+liste[i].prix_s+'</td><td>'+liste[i].prix_m+'</td><td>'+liste[i].nombre +'/ '+liste[i].nombre_max +'</td><td> <button type="button" class="btn btn-primary btn-sm" onclick="programmer('+liste[i].id+',this)" >programmer</button></td></tr>';
   nombre++;
  }

  $('#res').html(html);
  $('#count').html(nombre);
}

function Ajouter (){
window.open('ajout-groupe.php?id=0', '', 'width=800px,height=840px');
}


function Editer(id) {
  window.open('ajout-groupe.php?id='+id, '', 'width=800px,height=840px');
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
  url: 'post/supprimer-groupe.php',
  data: {id:idActive},
  success: function(reponse){
 //alert(reponse);
 console.log(reponse);
 Actualiser();

  }
});



  }



}

function programmer(g_id,button) {



  $.ajax({
    type: "POST",
    url: 'post/programmer.php',
    data: {gid:g_id},
    success: function(reponse){
      console.log(reponse);
      button.remove();

    }
  });
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
