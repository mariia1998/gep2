
var liste =[];


function Actualiser() {
  var search = $('#search').val();
  $.ajax({
    dataType: "json",
    url: 'json/jsonMatiere.php?search='+search,
    success: function(resultats){

      liste=resultats;
      AfficherResultats();


    }
  });
}

function AfficherResultats() {
  var html = '', nombre=0;
  for (var i = 0; i < liste.length; i++) {
    html +='<tr ondblclick="Editer('+liste[i].id+')"><td>'+liste[i].id+'</td><td>'+liste[i].nom+'</td><td><button class="btn btn-sm btn-danger " onclick="supprimer('+liste[i].id+')" ><i class="fa fa-trash"></i></button></td></tr>';
   nombre++;
  }

  $('#res').html(html);
  $('#count').html(nombre);
}

function Ajouter (){
window.open('ajout-matiere.php?id=0', '', 'width=800px,height=300px');
}


function Editer(id) {
  window.open('ajout-matiere.php?id='+id, '', 'width=800px,height=300px');
}


function supprimer(id) {

    var r = confirm("Voulez vous supprimer ?");
    if (r) {
  // delete
  $.ajax({
    type: "POST",
    url: 'post/supprimer-matiere.php',
    data: {id:id},
    success: function(reponse){
   //alert(reponse);
   console.log(reponse);
   Actualiser();
    }
  });
}

}

Actualiser();
