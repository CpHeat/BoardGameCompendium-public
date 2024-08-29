var boxes = "any-box";
var playersNb = "any-players";
var difficulty = "any-difficulty";
var length = "any-length";
var timer;
var previousNbMissions = 0;
var foreignLanguageCheck = document.getElementById("foreign-language-check");
var exclusiveBoxesCheck = document.getElementById("exclusive-boxes-check");

/* Associations des éléments nécessaires aux sliders */
/* Difficulté */
difficultySliderProgress = $("#difficulty-slider-progress");
difficultyRangeMin = $("#difficulty-range-min");
difficultyRangeMax = $("#difficulty-range-max");
difficultyHint = $("#difficulty-hint");
const difficultyRangeInput = document.querySelectorAll("#difficulty-range-input input");
let difficultyValueGap = 0;

/* Durée */
lengthSliderProgress = $("#length-slider-progress");
lengthRangeMin = $("#length-range-min");
lengthRangeMax = $("#length-range-max");
lengthHint = $("#length-hint");
const lengthRangeInput = document.querySelectorAll("#length-range-input input");
let lengthValueGap = 0;

/* Joueurs */
playersNbSliderProgress = $("#players-nb-slider-progress");
playersNbRangeMin = $("#players-nb-range-min");
playersNbRangeMax = $("#players-nb-range-max");
playersNbHint = $("#players-nb-hint");
const playersNbRangeInput = document.querySelectorAll("#players-nb-range-input input");
let playersNbValueGap = 0;

// Initialisation Difficulté, Durée et Joueurs
if(choseDifficulty){
  setDifficulty();
}
if(choseLength){
  setLength();
}
if(chosePlayersNb){
  setPlayersNb();
}

if(lang=="fr")
{
  var noMission = "Aucune mission";
}
else
{
  var noMission = "No mission";
}


$(document).ready(function() {

  nbMissions = $('#missions-list').find('.show').length;
  animateValue(0, nbMissions);


  $('#gridview-selector').click(function() {
    console.log('CLICK GRID');
    if($('#gridview-selector').hasClass('unselected-view')){
      $('#missions-list').addClass('collapse');
      $('#missions-grid').removeClass('collapse');
      $('#listview-selector').addClass('unselected-view');
      $('#listview-selector').removeClass('selected-view');
      $('#gridview-selector').addClass('selected-view');
      $('#gridview-selector').removeClass('unselected-view');
    }
  });
  $('#listview-selector').click(function() {
    console.log('CLICK LIST');
    if($('#listview-selector').hasClass('unselected-view')){
      $('#missions-grid').addClass('collapse');
      $('#missions-list').removeClass('collapse');
      $('#gridview-selector').addClass('unselected-view');
      $('#gridview-selector').removeClass('selected-view');
      $('#listview-selector').addClass('selected-view');
      $('#listview-selector').removeClass('unselected-view');
    }
  });

  // Fonction de sélection de la boite
  $('a.box-choice').click(function() {
    choseBoxes($(this));
    check();
  });

  $('#foreign-language-check').click(function() {
    check();
  });

  $('#exclusive-boxes-check').click(function() {
    check();
  });

  $('#show-campaigns-check').click(function() {
    check();
  });

  $('#show-missions-check').click(function() {
    check();
  });

  $('#show-official-check').click(function() {
    check();
  });

  $('#show-fanmade-check').click(function() {
    check();
  });

  // Slider difficulté
  difficultyRangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let difficultyMin = parseInt(difficultyRangeMin.val()),
        difficultyMax = parseInt(difficultyRangeMax.val());

        // Si le nouvel écart entre la valeur min et la valeur max est inférieure au gap maximum défini alors bloquer le changement
        if((difficultyMax - difficultyMin) < difficultyValueGap){
            if(e.target.id === "difficulty-range-min"){
                difficultyRangeMin.val(difficultyMax - difficultyValueGap)
            }
            // Sinon définir la nouvelle valeur
            else{
                difficultyRangeMax.val(difficultyMin + difficultyValueGap);
            }
        }else{
            setDifficulty();
            check();
        }
    });
  });

  // Slider durée
  lengthRangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let lengthMin = parseInt(lengthRangeMin.val()),
        lengthMax = parseInt(lengthRangeMax.val());

        // Si le nouvel écart entre la valeur min et la valeur max est inférieure au gap maximum défini alors bloquer le changement
        if((lengthMax - lengthMin) < lengthValueGap){
            if(e.target.id === "length-range-min"){
              lengthRangeMin.val(lengthMax - lengthValueGap)
            }
            // Sinon définir la nouvelle valeur
            else{
              lengthRangeMax.val(lengthMin + lengthValueGap);
            }
        }else{
            setLength();
            check();
        }
    });
  });

  // Slider joueurs
  playersNbRangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let playersNbMin = parseInt(playersNbRangeMin.val()),
        playersNbMax = parseInt(playersNbRangeMax.val());

        // Si le nouvel écart entre la valeur min et la valeur max est inférieur au gap maximum défini alors bloquer le changement
        if((playersNbMax - playersNbMin) < playersNbValueGap){
            if(e.target.id === "players-nb-range-min"){
              playersNbRangeMin.val(playersNbMax - playersNbValueGap)
            }
            // Sinon définir la nouvelle valeur
            else{
              playersNbRangeMax.val(playersNbMin + playersNbValueGap);
            }
        }else{
            setPlayersNb();
            check();
        }
    });
  });

  check();
});

//
/************************************************** FONCTIONS ***********************************************************************/
//

function setDifficulty() {
  
  let difficultyMin = parseInt(difficultyRangeMin.val()),
  difficultyMax = parseInt(difficultyRangeMax.val());
  $('#difficulty-range-max').removeClass('collapse');

  if(difficultyMin==difficultyMax){
    difficultyHint.text(difficulties[difficultyMin]);
    if(difficultyMin==difficultyRangeMin.attr('max')){
      $('#difficulty-range-max').addClass('collapse');
    }
  }
  else{
    difficultyHint.text(difficulties[difficultyMin]+' - '+difficulties[difficultyMax]);
  }
  difficultySliderProgress.css("left", ((difficultyMin / difficultyRangeMin.attr('max') * 100) + "%"));
  difficultySliderProgress.css("right", 100 - (difficultyMax / difficultyRangeMax.attr('max')) * 100 + "%");
}

function setLength() {
  let lengthMin = parseInt(lengthRangeMin.val()),
  lengthMax = parseInt(lengthRangeMax.val());
  $('#length-range-max').removeClass('collapse');

  if(lengthMin==lengthMax){
    lengthHint.text(lengthMin);
    if(lengthMin==lengthRangeMin.attr('max')){
      $('#length-range-max').addClass('collapse');
    }
  }
  else{
    lengthHint.text(lengthMin+' - '+lengthMax);
  }
  lengthSliderProgress.css("left", ((lengthMin / lengthRangeMin.attr('max') * 100) + "%"));
  lengthSliderProgress.css("right", 100 - (lengthMax / lengthRangeMax.attr('max')) * 100 + "%");
}

function setPlayersNb() {
  let playersNbMin = parseInt(playersNbRangeMin.val()),
  playersNbMax = parseInt(playersNbRangeMax.val());
  $('#players-nb-range-max').removeClass('collapse');

  if(playersNbMin==playersNbMax){
    playersNbHint.text(playersNbMin);
    if(playersNbMin==playersNbRangeMin.attr('max')){
      $('#players-nb-range-max').addClass('collapse');
    }
  }
  else{
    playersNbHint.text(playersNbMin+' - '+playersNbMax);
  }
  playersNbSliderProgress.css("left", ((playersNbMin-1) / (playersNbRangeMin.attr('max')-1)) * 100 + "%");
  playersNbSliderProgress.css("right", 100 - ((playersNbMax-1) / (playersNbRangeMin.attr('max')-1)) * 100 + "%");
}

// Fonction pour le choix de la boîte
function choseBoxes(chosenBoxes)
{
  // Quand on clique sur "Tout" dans matériel on déselectionne les autres boites
  if(chosenBoxes.attr('id')=="any-box")
  {
    if(!chosenBoxes.children('li').attr("class").includes("selected"))
    {
      $('.box-choice').children('li').removeClass('selected');
      chosenBoxes.children('li').addClass("selected");

      boxes = "any-box";
    }
  }
  // Sinon on active la boite sélectionnée
  else
  {
    // On enlève la sélection de "Tout"
    $("#any-box").children('li').removeClass('selected');

        // Si la boite n'est pas encore sélectionnée on la sélectionne
        if(!chosenBoxes.children('li').attr("class").includes("selected"))
        {
          chosenBoxes.children('li').addClass("selected");

          boxes = boxes.replace("any-box",'');
          boxes += " " + chosenBoxes.attr('id');
        }
        //Sinon on la déselectionne
        else
        {
          chosenBoxes.children('li').removeClass("selected");

          boxes = boxes.replace(" " + chosenBoxes.attr('id'),'');

          // Si c'était la seule boîte sélectionnée on resélectionne "Tout"
          if(boxes == "")
          {
            $("#any-box").children('li').addClass('selected');
            boxes = "any-box";
          }
        }
        check();
      }
}

function check() {
  $('.mission').removeClass('show');
  $('.mission').each(function(item) {
      e = $(this);

      checkMission(e);
      
      if (item === $('.mission').length - 1){
        // Récupération du nombre de missions affichées
        nbMissions = $('#missions-list').find('.show').length;
         // Lancement du compteur
        animateValue(previousNbMissions, nbMissions);
    }
  });
}

// FONCTION GERANT L'AFFICHAGE DES MISSIONS
function checkMission(e) {
  isOfficial = e.attr("class").includes(' official ');
  isCampaign = e.attr("class").includes(' campaign ');
  missionReqBoxes = e.attr("class").split(' req-boxes ').pop().split(' opt-boxes ')[0];
  missionOptBoxes = e.attr("class").split(' opt-boxes').pop().split(' players ')[0];
  missionOptBoxes = missionOptBoxes.replace(' ', '');
  missionPlayersNb = e.attr("class").split(' players ').pop().split(' length ')[0];
  missionLength = e.attr("class").split(' length ').pop().split(' difficulty ')[0];
  missionDifficulty = e.attr("class").split(' difficulty ').pop().split(' lang ')[0];
  missionLang = e.attr("class").split(' lang ').pop().split(' end|')[0];  

  if(checkDifficulty(missionDifficulty) && checkLength(missionLength) && checkPlayersNb(missionPlayersNb) && checkBoxes(missionReqBoxes, missionOptBoxes) && checkLang(missionLang) && checkType(isCampaign) && checkOfficial(isOfficial))
  {
    e.addClass("show");
  }
};

function checkDifficulty(missionDifficulty)
{
  if(missionDifficulty == 0 || !choseDifficulty)
  {
    return true;
  }
  else if ((difficultyRangeMin.val() <= missionDifficulty-1) && (missionDifficulty-1 <= difficultyRangeMax.val()))
  {
    return true;
  }
  else
  {
    return false;
  }
}

function checkLength(missionLength)
{
  if (missionLength.includes("-")) {
    minMissionLength = parseInt(missionLength.split('-')[0]);
    maxMissionLength = parseInt(missionLength.split('-')[1]);
  }
  else {
    minMissionLength = missionLength;
    maxMissionLength = missionLength;
  }

  if(missionLength == "special" || !choseLength)
  {
    return true;
  }
  else if((parseInt(minMissionLength, 10) <= lengthRangeMax.val()) && (parseInt(maxMissionLength, 10) >= lengthRangeMin.val()))
  {
    return true;
  }
  else
  {
    return false;
  }
}

function checkPlayersNb(missionPlayersNb)
{
  if (missionPlayersNb.includes("-")) {
    minMissionPlayersNb = parseInt(missionPlayersNb.split('-')[0]);
    maxMissionPlayersNb = parseInt(missionPlayersNb.split('-')[1]);
  }
  else {
    minMissionPlayersNb = missionPlayersNb;
    maxMissionPlayersNb = missionPlayersNb;
  }

  if(missionPlayersNb == "special" || !chosePlayersNb)
  {
    return true;
  }
  else if((parseInt(minMissionPlayersNb, 10) <= playersNbRangeMax.val()) && (parseInt(maxMissionPlayersNb, 10) >= playersNbRangeMin.val()))
  {
    return true;
  }
  else
  {
    return false;
  }
}

function checkBoxes(missionReqBoxes, missionOptBoxes)
{
  missionReqBoxesArray = new Array();
  missionOptBoxesArray = new Array();

  // création des tableaux contenant les boités de la mission
  if (missionReqBoxes.includes(" "))
  {
    missionReqBoxesArray = missionReqBoxes.split(' ');
  }
  else
  {
    missionReqBoxesArray[0] = missionReqBoxes;
  }

  if (missionOptBoxes == "")
  {
    missionOptBoxesArray[0] = "";
  }
  else if (missionOptBoxes.includes(" "))
  {
    missionOptBoxesArray = missionOptBoxes.split(' ');
  }
  else
  {
    missionOptBoxesArray[0] = missionOptBoxes;
  }

  // créer un tableau contenant les boîtes sélectionnées
  boxesArray = boxes.split(' ');

  // Si on demande n'importe quelle boîte ne rien vérifier
  if(boxes == "any-box" || !choseBox)
  {
    return true;
  }  
  else if (exclusiveBoxesCheck.checked)
  {
    // Pour chaque boîte vérifier si elle est demandée. Arrêter dès qu'une boîte n'est pas demandée
    for (var i = 0; i < missionReqBoxesArray.length; ++i)
    {
      if(!boxesArray.includes(missionReqBoxesArray[i]))
      {
        return false;
        break;
      }
      else if (i == (missionReqBoxesArray.length - 1))
      {
        return true;
      }
    }
  }

  // Si la mission comporte plusieurs boîtes
  else if (missionReqBoxes.includes(" ") || missionOptBoxes.includes(" "))
  {    
    // Pour chaque boîte vérifier si elle est demandée. Arrêter dès qu'une boîte demandée est validée
    for (var i = 0; i < missionReqBoxesArray.length; ++i)
    {
      if(boxesArray.includes(missionReqBoxesArray[i]))
      {
        return true;
        break;
      }
      else if (i == (missionReqBoxesArray.length - 1))
      {
        if (missionOptBoxesArray[0] != "")
        {
          for (var j = 0; j < missionReqBoxesArray.length; ++j)
          {
            if(boxesArray.includes(missionOptBoxesArray[j]))
            {
              return true;
              break;
            }
            else if (j == (missionOptBoxesArray.length - 1))
            {
              return false;
            }
          }
        }
        else
        {
          return false;
        }
      }
    }
  }
  // Sinon comparer les boîtes de la mission à celles demandées
  else if ((boxesArray.includes(missionReqBoxes) && missionReqBoxes!="") || (boxesArray.includes(missionOptBoxes) && missionOptBoxes!=""))
  {
    return true;
  }
  // Sinon renvoyer false
  else
  {
    return false;
  }
}

function checkLang(missionLang)
{
  var foreignCheck = document.getElementById("foreign-language-check");  
  reqLang = $('#foreign-language-check').attr('class').split(' ');  

  if (foreignCheck.checked == true)
  {
    return true;
  }
  else if (missionLang == reqLang[1])
  {
    return true;
  }
  else
  {
    return false;
  }
}

function checkType(isCampaign)
{
  var showCampaignsCheck = document.getElementById("show-campaigns-check");
  var showMissionsCheck = document.getElementById("show-missions-check");

  if (showCampaignsCheck.checked && showMissionsCheck.checked)
  {
    return true;
  }
  else if (showCampaignsCheck.checked && isCampaign)
  {
    return true;
  }
  else if (showMissionsCheck.checked && !isCampaign)
  {
    return true;
  }
  else
  {
    return false;
  }
}

function checkOfficial(isOfficial)
{
  var showOfficialCheck = document.getElementById("show-official-check");
  var showFanmadeCheck = document.getElementById("show-fanmade-check");

  if (showOfficialCheck.checked && showFanmadeCheck.checked)
  {
    return true;
  }
  else if (showOfficialCheck.checked && isOfficial)
  {
    return true;
  }
  else if (showFanmadeCheck.checked && !isOfficial)
  {
    return true;
  }
  else
  {
    return false;
  }
}

// Fonction d'animation du compteur
function animateValue(start, end) {
  
  // Si le compteur est dans une animation le réinitialiser
  clearInterval(timer);

  let startTimestamp = null;

  if((end - start) <= 20)
  {
    duration = 100;
  }
  else
  {
    duration = 300;
  }

  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);

    if(Math.round(progress * (end - start) + start) == 1)
    {
      $('#mission-count').html(Math.floor(progress * (end - start) + start) + " mission");
    }
    else if(Math.round(progress * (end - start) + start) == 0)
    {
      $('#mission-count').html(noMission);
    }
    else
    {
      $('#mission-count').html(Math.floor(progress * (end - start) + start) + " missions");
    }
      
    if (progress < 1) {
      window.requestAnimationFrame(step);
      previousNbMissions = Math.round(progress * (end - start) + start);
    }
    else {
      previousNbMissions = end;
    }
  };
  window.requestAnimationFrame(step);
};