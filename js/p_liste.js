
var liste =[];


function Actualiser() {
  var search = $('#search').val();
  $.ajax({
    dataType: "json",
    url: 'json/jsonprof.php?search='+search,
    success: function(resultats){

      liste=resultats;
      AfficherResultats();


    }
  });
}

function AfficherResultats() {
  var html = '', nombre=0;
  for (var i = 0; i < liste.length; i++) {
    html +='<tr ondblclick="Editer('+liste[i].id+')"><td>'+liste[i].id+'</td><td>'+liste[i].nom+'</td><td>'+liste[i].prenom+'</td><td>'+liste[i].id_matiere+'</td></tr>';
   nombre++;
  }

  $('#res').html(html);
  $('#count').html(nombre);
}

function Ajouter (){
window.open('ajout-prof.php?id=0', '', 'width=800px,height=840px');
}


function Editer(id) {
  window.open('ajout-prof.php?id='+id, '', 'width=800px,height=840px');
}




Actualiser();
