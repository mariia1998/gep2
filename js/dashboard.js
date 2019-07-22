const recherche = $('#search');
var liste = [];



window.addEventListener('keypress',function(e){

document.getElementById('search').focus();

});

recherche.on('keyup',function(r){
var valeur = parseInt(recherche.val());

 if (isNaN(valeur)) { RechercheParNom();return;}

if (r.keyCode == 13 && !isNaN(valeur)) RechercheParCarte();


});


function RechercheParCarte() {
  var carte = recherche.val();
  $.ajax({
    dataType: "json",
    url: 'json/carte.php?carte='+carte,
    success: function(r){

      console.log( r.id_inscription);
      $('#renouvler').attr('onclick','renouvler("'+r.id_inscription+'")');
      afficherAgenda();
      console.log(r.details);

if (r.details && r.details.length) {

for (var i = 0; i < r.details.length; i++) {
  afficherPresence(r.details[i]);
}
}




      recherche.val('');

if (r.status  == '1') {
$('#aff_seances').html(r.nbr_s);
$('#aff_nom').html(r.etudiant.nom);
$('#aff_prenom').html(r.etudiant.prenom);
$('#aff_niveau').html(r.etudiant.niveau);
$('#aff_carte').html(carte);

afficherInfos();
$('.infos-etud').removeClass('alerte');
if (r.bloque){
  notification("error","alerte");

}
else {
  notification("success");
}

} else {
  alert('not found');
}
    }
  });

}

function renouvler(idinsc) {
    window.open('ajout-inscription.php?id='+idinsc, '', 'width=800px,height=440px');
}

function RechercheParNom() {
var ss = recherche.val().toUpperCase(),
sr = $('#resultatDeRecherche');
if (ss == '') {sr.html('');return;}
var resultat ='' , nomprenom;

liste.forEach(function(etd){
nomprenom = etd.nom.toUpperCase() + ' '+ etd.prenom.toUpperCase();

if (nomprenom.indexOf(ss) > -1 ) resultat += '<li onclick="affInfoManual(\''+etd.nom+'\',\''+etd.prenom+'\')">'+nomprenom+'</li>';
})
sr.html(resultat);

}


function affInfoManual(nom,prenom) {
  $('#aff_nom').html(nom);
  $('#aff_prenom').html(prenom);
afficherInfos();
}



function afficherInfos(){
  document.querySelector('.infos-etud').classList.add('afficher')
}

function cacherInfos(){
  document.querySelector('.infos-etud').classList.remove('afficher')
}


function notification(arg,color){

  $('.infos-etud').addClass(color);

var audio = new Audio("audio/"+arg+".mp3");
audio.play();
}



function init(){
  agenda();
  $.ajax({
    dataType: "json",
    url: 'json/dashboard.php',
    success: function(r){


      // button P&u
console.log(r.seances);
for (var i = 0; i < r.seances.length; i++) {
 console.log(r.seances[i].id_groupe);
b_annuler(r.seances[i].id_groupe);
}



// r.nombreDesEturiants

$('.nombreDesEturiants').html('<h1>'+r.nombreDesEturiants+'</h1>');
$('.nombreDesProfs').html('<h1>'+r.nombreDesProfs+'</h1>');
$('.nombreDesGroupes').html('<h1>'+r.nombreDesGroupes+'</h1>');
$('.nombreDesSeances').html('<h1>'+r.nombreDesSeances+'</h1>');
liste= r.listeDesEtudiants;
    }

  });

}


window.onload = init;



function b_prog (gid) {
$('#g'+gid).addClass('btn-primary');
$('#g'+gid).removeClass('btn-warning');
$('#g'+gid).attr('onclick','prog('+gid+',1)');
$('#g'+gid).html('Programmer');
}


function b_annuler (gid) {
$('#g'+gid).removeClass('btn-primary');
$('#g'+gid).addClass('btn-warning');
$('#g'+gid).attr('onclick','prog('+gid+',0)');
$('#g'+gid).html('Annuler');
}



function prog (idgr,action) {

  $.ajax({
    type: "POST",
    url: 'post/programmer.php',
    data: {gid:idgr,action:action},
    success: function(reponse){
      console.log(reponse);
if (action == '1') {
  b_annuler(idgr);
} else {
  b_prog(idgr);
}

init();

    }
  });

}



var htmlagenda = '';
function agenda() {
  var date = new Date() , cemois = date.getMonth() + 1 ;
  var html = '' , moisel = ['','Jan','Fev','Mar','Avr','Mai','Jui','Jul','Aou','Sep','Oct','Nov','Dec'];

  if (cemois < 9) cemois += 12;
for (var i = 9; i <= cemois; i++) {
  var moi = (i > 12 ? i-12 : i);
html += '<div class="col col-2">'+moisel[moi]+'<div class="mois"  id="moi-'+moi+'">';
for (var j = 1; j < 31; j++) {
html += '<div class="jr jr'+j+'" ></div>';
}
html += '</div></div>';
}

htmlagenda = html;


}


function afficherAgenda(){
  $('.agenda').html(htmlagenda);
}

//afficherPresence('2019-07-10 15:34');
function afficherPresence(inf) {
  //

  var couleur = 'vert';
if (inf.date.length < 10) {
  couleur = 'rouge';
var split = inf.id_seance.split('') ,
 m = parseInt(split[4] + ''+split[5]) ,
 j = parseInt(split[6] + ''+split[7]) ,
date = m+'-'+j;
console.log(date);

} else {
  var dt = inf.date.split(' ')[0] ,
  m = parseInt(dt.split('-')[1]),
  j= parseInt(dt.split('-')[2]);

}
el=$('#moi-'+ m+ ' .jr'+j);
el.addClass(couleur);
el.attr('title',inf.date);
el.text(j);

//<img src='img1.png'
//m
// j


}
