



var inscriptions = {
 liste : [] ,
 actualiser : function(){
   $.ajax({
     dataType: "json",
     url: 'json/jsoninscriptions.php',
     success: function(resultats){
       console.log(resultats);
inscriptions.liste = resultats;
inscriptions.afficherLesResultats();
     }
   });
 } ,
 afficherLesResultats :function(){
   var resultat = inscriptions.liste , filtreParGroupe = $('[name="groupe"]').val() ,
e_recharche = $('[name="e_recharche"]').val() ;

if (e_recharche !== '') {
  resultat = inscriptions.liste.filter(function(enr){
return (enr.infosEtudiant.indexOf(e_recharche) > -1 );
  })
}


   var html = '';
   resultat.forEach(function(enregistrement) {
if (enregistrement.id_groupe == filtreParGroupe || filtreParGroupe == '0') html +=  '<tr data-id="'+enregistrement.id+'"  onclick="selectionner(this)" ondblclick="inscriptions.renouvler('+enregistrement.id+')"><td>'+enregistrement.id+'</td><td>'+enregistrement.infosGroupe+'</td><td>'+enregistrement.infosEtudiant+'</td><td>'+enregistrement.date+'</td><td>'+enregistrement.carte+'</td><td>'+enregistrement.nbr_s+'</td><td>'+enregistrement.derniere_s+'</td></tr>';

  });

  document.getElementById('resultats').innerHTML  = html;

} ,
ajouter : function(){
  window.open('ajout-inscription.php?id=0', '', 'width=800px,height=440px');
} ,
renouvler: function (i) {
  window.open('ajout-inscription.php?id='+i, '', 'width=800px,height=440px');

}
}


function selectionner(el){
  $('tr').removeClass('active');
  $(el).addClass('active');
}


function suppr() {
var id = $('tr.active').attr('data-id');
if (id == undefined) return;
      var r = confirm("Voulez vous supprimer ?");
      if (r) {
    // delete
    $.ajax({
      type: "POST",
      url: 'post/supprimer-inscription.php',
      data: {id:id},
      success: function(reponse){
     //alert(reponse);
     console.log(reponse);
     inscriptions.actualiser();
}
   });

}
}

function Actualiser(){
  inscriptions.actualiser();
}

inscriptions.actualiser();
