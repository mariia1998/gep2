var data = [];
function Recette() {
var d1 =  $('#d1').val();
var d2 =  $('#d2').val();
var prof=  $('[name="profs"]').val();

  $.ajax({
    dataType: "json",
    url: 'json/jsonrecette.php?d1='+d1+'&d2='+d2+'&idp='+prof,
    success: function(resultats){
      console.log(resultats);
 data = resultats;
 afficher();
    }
  });


}

function afficher() {
var total = 0 , res = '' , type = $('[name="types"]').val() ,gr =  $('[name="groupes"]').val();

if (data && data.length) {

for (var i = 0; i < data.length;i++) {
  if ((type== data[i].type || type== '0') && (gr== data[i].id_groupe || gr== '0') ){
    total +=  parseInt(data[i].montant);
    res +='<tr><td>'+data[i].id+'</td><td>'+data[i][10] +' '+data[i].prenom +'</td><td>'+data[i].nom+'</td><td>'+data[i].montant+'</td><td>'+data[i].date+'</td></tr>';

  }


}
}


$('#total').html(total);
$('#resultat').html(res);

}
Recette();
