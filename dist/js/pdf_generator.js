//region Initialisation
window.jsPDF = window.jspdf.jsPDF;

$(document).ready(function(){

    var inputAdditionalRules = document.getElementById("undaunted-input-additional-rules");
    var inputRules = document.getElementById("undaunted-input-rules");
    
    replaceEnterBehavior(inputAdditionalRules);
    replaceEnterBehavior(inputRules);

    previewPDF('undaunted');

    $(window).resize(function () {
        previewPDF('undaunted')
    });
});
//endregion Initialisation

//#region Fonctions de création du PDF
function createPDF(game){
    lang = '';
    page4 = '';
    previewPDF(game);
    
    savePDF($("#undaunted-input-title").val(), page4, lang);
}

function previewPDF(game){
    fillPDF(game);

    copyContent('page-1');    
    copyContent('page-2');    
    copyContent('page-3');

    if(page4){
        $('#undaunted-preview-page-4').removeClass('d-none');
        copyContent('page-4');
    }
    else if(!$('#undaunted-preview-page-4').hasClass("d-none")){
        $('#undaunted-preview-page-4').addClass("d-none");
    }
}

function fillPDF(game) {
    if(game=='undaunted'){
        lang = $("input[name='undaunted-lang']:checked").val();

        additional_rules_title = $('#undaunted-input-additional-rules-name').val().replaceAll("’", "'");
        additional_rules = $('#undaunted-input-additional-rules').html().replaceAll("’", "'");

        if(additional_rules_title || additional_rules){
            page4=true;
        }else{
            page4=false;
        }
        
        fillPage1(lang);        
        fillPage2(lang);
        fillPage3(lang);
        if(page4){
            fillPage4(additional_rules_title, additional_rules);
        }
    }
}

function copyContent(page){
    console.log('COPYCONTENT ' + page);
    ratio=1500/($("#undaunted-preview-"+page).width());
    $('#undaunted-preview-'+page).css("height", 2208/ratio);

    pageContent = $('#undaunted-'+page).html();
    $('#undaunted-preview-'+page).html(pageContent);

    var pageElements = $("#undaunted-preview-"+page+" *");

    // Loop through each element and divide its CSS sizes by the ratio
    pageElements.each(function() {
        var element = $(this);
        var width = element.width();
        var height = element.height();
        var top = element.css("top");        
        var bottom = element.css("bottom");  
        var left = element.css("left");
        var right = element.css("right");
        var fontSize = element.css("font-size");
        var lineHeight = element.css("line-height");
        var letterSpacing = element.css("letter-spacing");
        var paddingTop = element.css("padding-top");
        var paddingBottom = element.css("padding-bottom");
        var paddingLeft = element.css("padding-left");
        var paddingRight = element.css("padding-right");
        var marginTop = element.css("margin-top");
        var marginBottom = element.css("margin-bottom");
        var marginLeft = element.css("margin-left");
        var marginRight = element.css("margin-right"); 

        element.css({
            "width": width / ratio + "px",
            "height": height / ratio + "px",
            "top": top.replaceAll('px', '') / ratio + "px",
            "bottom": bottom.replaceAll('px', '') / ratio + "px",            
            "left": left.replaceAll('px', '') / ratio + "px",            
            "right": right.replaceAll('px', '') / ratio + "px",
            "font-size": fontSize.replaceAll('px', '') / ratio + "px",
            "line-height": lineHeight.replaceAll('px', '') / ratio + "px",
            "letter-spacing": letterSpacing.replaceAll('px', '') / ratio + "px",
            "padding-top": paddingTop.replaceAll('px', '') / ratio + "px",
            "padding-bottom": paddingBottom.replaceAll('px', '') / ratio + "px",
            "padding-left": paddingLeft.replaceAll('px', '') / ratio + "px",
            "padding-right": paddingRight.replaceAll('px', '') / ratio + "px",
            "margin-top": marginTop.replaceAll('px', '') / ratio + "px",
            "margin-bottom": marginBottom.replaceAll('px', '') / ratio + "px",
            "margin-left": marginLeft.replaceAll('px', '') / ratio + "px",
            "margin-right": marginRight.replaceAll('px', '') / ratio + "px"
        });
    });
}

function savePDF(filename, page4, lang){
    $('#undaunted-input-create').html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>'+generating_pdf);
    $('#undaunted-input-create').prop('disabled', true);

    var pl = new Preloader();
    if(lang=="en"){
        pl.setPicture("../assets/pdf/undaunted/page_1_en.png");
    }else{
        pl.setPicture("../assets/pdf/undaunted/page_1_fr.png");
    }    
    pl.setPicture('../assets/pdf/undaunted/page_2_'+page_class.replaceAll("-", "_")+'.png');
    pl.setPicture("../assets/pdf/undaunted/page_3.png");
    if(page4){
        pl.setPicture("../assets/pdf/undaunted/page_4.png");
    }
    pl.setPicture("../assets/pdf/undaunted/page_5.png");
    
    pl.onpicturesloaded = function(){
        addHTMLToPDFPage(filename, page4, lang);
    };  
    pl.loadPictures();
}

// Functions to fill pages
// Fonction qui vérifie les cartes et met à jour le layout en conséquence
function checkAllCards() {
    var all_cards = true;
    cards = getCards();

    cards.forEach((card) => {
        deck_nb=0;
        supply_nb=0;
        html='';

        for (var i = 0; i < card[1].length; i++) {
            var value = card[1][i];
            if (value == 'box') {
                all_cards = false;
            }else if(value=='deck'){
                deck_nb++;
            }else if(value=='supply'){
                supply_nb++;
            }
        }

        j=0;
        for(i=0; i<deck_nb; i++ && j++){
            if(j==4){
                html+='</br>';
            }
            if(lang=='fr'){
                html+='<img class="undaunted-deck" src="../assets/pdf/undaunted/p_pdf.png">';
            }else if(lang=='es'){
                html+='<img class="undaunted-deck" src="../assets/pdf/undaunted/i_pdf.png">';
            }else{
                html+='<img class="undaunted-deck" src="../assets/pdf/undaunted/d_pdf.png">';
            }
        }

        for(i=0; i<supply_nb; i++ && j++){
            if(j==4){
                html+='</br>';
            }
            if(lang=='en'){
                html+='<img class="undaunted-deck" src="../assets/pdf/undaunted/s_pdf.png">';
            }else{
                html+='<img class="undaunted-deck" src="../assets/pdf/undaunted/r_pdf.png">';
            }
        }

        $('#undaunted-page-2 #undaunted_'+card[0]).html(html);

      });
    return all_cards;
}

function fillPage1(lang){

    author = $("#undaunted-input-author").val().replaceAll("’", "'");
    translation = $("#undaunted-input-translation").is(':checked');
    translator = $("#undaunted-input-translator").val().replaceAll("’", "'");

    if(lang=='fr'){
        $('#undaunted-page-1').addClass('fr');
        $('#undaunted-preview-page-1').addClass('fr');
        if ($('#undaunted-page-1').hasClass('es')) {
            $('#undaunted-page-1').removeClass('es');
            $('#undaunted-preview-page-1').removeClass('es');
        }
        if ($('#undaunted-page-1').hasClass('en')) {
            $('#undaunted-page-1').removeClass('en');
            $('#undaunted-preview-page-1').removeClass('en');
        }

        if(author){
            $('#undaunted-page-1 #undaunted-author').html(undaunted_created_fr+'</br>'+author);
        }
        else{
            $('#undaunted-page-1 #undaunted-author').html('');
        }

        if(!translation){
            $('#undaunted-page-1 #undaunted-credits').html('');
            $('#undaunted-page-1 #undaunted-bgc-credits').html(undaunted_layout_fr+'</br>BoardGameCompendium.com');
        }else{
            if(translator){
                $('#undaunted-page-1 #undaunted-credits').html(undaunted_translation_fr+'</br>'+translator);
                $('#undaunted-page-1 #undaunted-bgc-credits').html(undaunted_layout_fr+'</br>'+'BoardGameCompendium.com');
                
            }else{
                $('#undaunted-page-1 #undaunted-credits').html('');
                $('#undaunted-page-1 #undaunted-bgc-credits').html(undaunted_layout_translation_fr+'</br>BoardGameCompendium.com');
            }
        }
    }else if(lang=='es'){
        $('#undaunted-page-1').addClass('es');
        $('#undaunted-preview-page-1').addClass('es');
        if ($('#undaunted-page-1').hasClass('fr')) {
            $('#undaunted-page-1').removeClass('fr');
            $('#undaunted-preview-page-1').removeClass('fr');
        }
        if ($('#undaunted-page-1').hasClass('en')) {
            $('#undaunted-page-1').removeClass('en');
            $('#undaunted-preview-page-1').removeClass('en');
        }

        if(author){
            $('#undaunted-page-1 #undaunted-author').html(undaunted_created_es+'</br>'+author);
        }
        else{
            $('#undaunted-page-1 #undaunted-author').html('');
        }

        if(!translation){
            $('#undaunted-page-1 #undaunted-credits').html('');
            $('#undaunted-page-1 #undaunted-bgc-credits').html(undaunted_layout_es+'</br>BoardGameCompendium.com');
        }else{
            if(translator){
                $('#undaunted-page-1 #undaunted-credits').html(undaunted_translation_es+'</br>'+translator);
                $('#undaunted-page-1 #undaunted-bgc-credits').html(undaunted_layout_es+'</br>'+'BoardGameCompendium.com');
                
            }else{
                $('#undaunted-page-1 #undaunted-credits').html('');
                $('#undaunted-page-1 #undaunted-bgc-credits').html(undaunted_layout_translation_es+'</br>BoardGameCompendium.com');
            }
        }
    }else{
        $('#undaunted-page-1').addClass('en');
        $('#undaunted-preview-page-1').addClass('en');
        if ($('#undaunted-page-1').hasClass('fr')) {
            $('#undaunted-page-1').removeClass('fr');
            $('#undaunted-preview-page-1').removeClass('fr');
        }
        if ($('#undaunted-page-1').hasClass('es')) {
            $('#undaunted-page-1').removeClass('es');
            $('#undaunted-preview-page-1').removeClass('es');
        }


        if(author){
            $('#undaunted-page-1 #undaunted-author').html(undaunted_created_en+'</br>'+author);
        }else{
            $('#undaunted-page-1 #undaunted-author').html('');
        }

        if(!translation){
            $('#undaunted-page-1 #undaunted-credits').html('');
            $('#undaunted-page-1 #undaunted-bgc-credits').html(undaunted_layout_en+'</br>BoardGameCompendium.com');
        }else{
            if(translator){
                $('#undaunted-page-1 #undaunted-credits').html(undaunted_translation_en+'</br>'+translator);
                $('#undaunted-page-1 #undaunted-bgc-credits').html(undaunted_layout_en+'</br>'+'BoardGameCompendium.com');
                
            }else{
                $('#undaunted-page-1 #undaunted-credits').html('');
                $('#undaunted-page-1 #undaunted-bgc-credits').html(undaunted_layout_translation_en+'</br>BoardGameCompendium.com');
            }
        }
    }
}

function fillPage2(lang){
    title = $("#undaunted-input-title").val().replaceAll("’", "'");
    $setting = $("#undaunted-input-setting").val().replaceAll("’", "'");
    $location_date = $("#undaunted-input-location-date").val().replaceAll("’", "'");
    story = $("#undaunted-input-story").val().replaceAll("’", "'");
    story = $("#undaunted-input-story").val().replaceAll(/\n/g, "<br>");
    us_objective = $("#undaunted-input-us-objective").html().replaceAll("’", "'");
    ge_objective = $("#undaunted-input-ge-objective").html().replaceAll("’", "'");
    rules_title = $('#undaunted-input-rules-name').val().replaceAll("’", "'");
    rules = $('#undaunted-input-rules').html().replaceAll("’", "'");
    initiative = $("input[name='undaunted-initiative']:checked").val();

    $all_cards=checkAllCards();
    $("#undaunted-page-2").removeClass();    
    classes = $("#undaunted-preview-page-2").attr("class").split(" ");
    $("#undaunted-preview-page-2").removeClass(classes[classes.length-1]);

    page_class = '';

    if($setting || $location_date){
        if(!$setting){
            if(lang=="fr"){
                $setting=undaunted_setting_unknown_fr;
            }else if(lang=="es"){
                $setting=undaunted_setting_unknown_esn;
            }else{
                $setting=undaunted_setting_unknown_en;
            }
        }

        if(!$location_date){
            if(lang=="fr"){
                $location_date=undaunted_location_unknown_fr;
            }else if(lang=="es"){
                $location_date=undaunted_location_unknown_esn;
            }else{
                $location_date=undaunted_location_unknown_en;
            }
        }

        page_class +='setting-';
        $("#undaunted-page-2 #undaunted-story-no-setting").css('opacity', '0');
        $("#undaunted-page-2 #undaunted-story").css('opacity', '1');
    }else{
        page_class += 'no-setting-';            
        $("#undaunted-page-2 #undaunted-story-no-setting").css('opacity', '1');
        $("#undaunted-page-2 #undaunted-story").css('opacity', '0');
    }

    if(rules || rules_title){
        if(rules_title){
            $("#undaunted-page-2 #undaunted-rules-no-title").css('opacity', '0');
            $("#undaunted-page-2 #undaunted-rules-title").css('opacity', '1');
            $("#undaunted-page-2 #undaunted-rules").css('opacity', '1');
        }else{
            $("#undaunted-page-2 #undaunted-rules-no-title").css('opacity', '1');
            $("#undaunted-page-2 #undaunted-rules-title").css('opacity', '0');
            $("#undaunted-page-2 #undaunted-rules").css('opacity', '0');
        }
        page_class += 'rules-';
    }else{
        page_class += 'no-rules-';
    }
    if($all_cards){
        page_class += 'all-cards-';
    }else{
        page_class += 'not-all-cards-';
    }
    
    page_class += initiative+'-';
    page_class += lang;

    $("#undaunted-page-2").addClass(page_class);
    $("#undaunted-preview-page-2").addClass(page_class);
    $("#undaunted-page-2 #undaunted-title").html(title.toUpperCase());
    $("#undaunted-page-2 #undaunted-story-no-setting").html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+story);
    $("#undaunted-page-2 #undaunted-story").html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+story);
    $("#undaunted-page-2 #undaunted-setting").html($setting);
    $("#undaunted-page-2 #undaunted-location-date").html($location_date);
    $("#undaunted-page-2 #undaunted-us-objective").html(us_objective);
    $("#undaunted-page-2 #undaunted-ge-objective").html(ge_objective);
    $("#undaunted-page-2 #undaunted-rules-title").html(rules_title.toUpperCase());
    $("#undaunted-page-2 #undaunted-rules").html(rules);
    $("#undaunted-page-2 #undaunted-rules-no-title").html(rules);
}

function fillPage3(lang){
    if(lang=='fr'){
        $('#undaunted-page-3 #undaunted-map-title').html(undaunted_map_title_fr);
        $('#undaunted-page-3 #undaunted-tiles-title').html(undaunted_tiles_title_fr);
    }else if(lang=='es'){
        $('#undaunted-page-3 #undaunted-map-title').html(undaunted_map_title_es);
        $('#undaunted-page-3 #undaunted-tiles-title').html(undaunted_tiles_title_es);
    }else{
        $('#undaunted-page-3 #undaunted-map-title').html(undaunted_map_title_en);
        $('#undaunted-page-3 #undaunted-tiles-title').html(undaunted_tiles_title_en);
    }

    tiles=[
        $('#undaunted-input-tile-1'),
        $('#undaunted-input-tile-2'),
        $('#undaunted-input-tile-3'),
        $('#undaunted-input-tile-4'),
        $('#undaunted-input-tile-5'),
        $('#undaunted-input-tile-6'),
        $('#undaunted-input-tile-7'),
        $('#undaunted-input-tile-8'),
        $('#undaunted-input-tile-9'),
        $('#undaunted-input-tile-10'),
        $('#undaunted-input-tile-11'),
        $('#undaunted-input-tile-12'),
        $('#undaunted-input-tile-13'),
        $('#undaunted-input-tile-14'),
        $('#undaunted-input-tile-15'),
        $('#undaunted-input-tile-16'),
        $('#undaunted-input-tile-17'),
        $('#undaunted-input-tile-18')
    ];

    for(i=1;i<=18;i++){
        if(tiles[i-1].hasClass('recto')){            
            $('#undaunted-page-3 #undaunted-tile-'+i).html(i+'A');
        }else if(tiles[i-1].hasClass('verso')){
            $('#undaunted-page-3 #undaunted-tile-'+i).html(i+'B');
        }else{
            $('#undaunted-page-3 #undaunted-tile-'+i).html('');
        }
    }
}

function fillPage4(additional_rules_title, additional_rules){
    if(additional_rules_title){
        $('#undaunted-page-4 #undaunted-additional-rules-title').css('opacity', '1');
        $('#undaunted-page-4 #undaunted-additional-rules').css('opacity', '1');
        $('#undaunted-page-4 #undaunted-additional-rules-no-title').css('opacity', '0');
    }else{
        $('#undaunted-page-4 #undaunted-additional-rules-title').css('opacity', '0');
        $('#undaunted-page-4 #undaunted-additional-rules').css('opacity', '0');
        $('#undaunted-page-4 #undaunted-additional-rules-no-title').css('opacity', '1');
    }

    $('#undaunted-page-4 #undaunted-additional-rules-title').html(additional_rules_title.toUpperCase());
    $('#undaunted-page-4 #undaunted-additional-rules-no-title').html(additional_rules);
    $('#undaunted-page-4 #undaunted-additional-rules').html(additional_rules);
}

// Fonction qui ajoute les pages au PDF
function addHTMLToPDFPage(filename, page4, lang) {
    var doc = new jsPDF({
        orientation: "portrait",
        unit: "px",
        format: [375, 552],
        compress: true,
        userUnit: 1
    });

    converHTMLToCanvas($('#pdf').find('#undaunted-page-1')[0], doc, false, false, null, null);
    converHTMLToCanvas($('#pdf').find('#undaunted-page-2')[0], doc, true, false, null, null);
    converHTMLToCanvas($('#pdf').find('#undaunted-page-3')[0], doc, true, false, null, null);
    if(page4){
        converHTMLToCanvas($('#pdf').find('#undaunted-page-4')[0], doc, true, false, null, null);
    }
    converHTMLToCanvas($('#pdf').find('#undaunted-page-5')[0], doc, true, true, filename, lang);
}

// Fonction qui convertit la page HTML en Canvas
function converHTMLToCanvas(element, jspdf, enableAddPage, enableSave, filename, lang) {
    html2canvas(element, {
        logging : true,
        useCORS: false,
        allowTaint: true,
        backgroundColor: '#ffffff',
        dpi: 1,
        scale:1,
        width:1500,
        height:2208,
    }).then(function(canvas) {
        if(enableAddPage == true) {
            jspdf.addPage({
                format: [375, 552],   
                compress: true,
            });
        }
        jspdf.scale(1, 1);
        image = canvas.toDataURL('image/png', 1.0);
        jspdf.addImage(image, 'PNG', 0, 0, 375, 552);
        
        if(enableSave == true) {
            jspdf.save(filename+' ('+lang+').pdf');

            $('#undaunted-input-create').html(generate_pdf);
            $('#undaunted-input-create').prop('disabled', false);
        }
    });
}
//#endregion Fonctions de création du PDF

//#region Fonctions d'interface
// Fonction de mise à jour de l'input traduction
function checkTranslation(){
    translation = !$("#undaunted-input-translation").is(':checked');
    if(translation){
        $('#translator').removeClass('disabled');
        $('#undaunted-input-translator').prop('disabled', false);
    }else{
        $('#translator').addClass('disabled');
        $('#undaunted-input-translator').prop('disabled', true);
        $('#undaunted-input-translator').val('');
    }
}

// Fonction de mise a jour des input tuiles
function switchTile(id){
    if($('#undaunted-input-tile-'+id).hasClass('recto')){
        $('#undaunted-input-tile-'+id).removeClass('recto');    
        $('#undaunted-input-tile-'+id).addClass('verso');
        $('#undaunted-input-tile-'+id).html(id+'B');
        $('#undaunted-input-sm-tile-'+id).removeClass('recto');    
        $('#undaunted-input-sm-tile-'+id).addClass('verso');
        $('#undaunted-input-sm-tile-'+id).html(id+'B');
    }else if($('#undaunted-input-tile-'+id).hasClass('verso')){
        $('#undaunted-input-tile-'+id).removeClass('verso');    
        $('#undaunted-input-tile-'+id).addClass('unused');
        $('#undaunted-input-tile-'+id).html(id);
        $('#undaunted-input-sm-tile-'+id).removeClass('verso');    
        $('#undaunted-input-sm-tile-'+id).addClass('unused');
        $('#undaunted-input-sm-tile-'+id).html(id);
    }else if($('#undaunted-input-tile-'+id).hasClass('unused')){
        $('#undaunted-input-tile-'+id).removeClass('unused');    
        $('#undaunted-input-tile-'+id).addClass('recto');
        $('#undaunted-input-tile-'+id).html(id+'A');
        $('#undaunted-input-sm-tile-'+id).removeClass('unused');    
        $('#undaunted-input-sm-tile-'+id).addClass('recto');
        $('#undaunted-input-sm-tile-'+id).html(id+'A');
    }
}

// Fonction pour gérer le gras dans les editable divs
function toggleBold(divId) {
    // Check if the bold command is supported
    var isBoldSupported = document.queryCommandSupported("bold");
  
    // Toggle the boldness of the selected text
    if(window.getSelection().anchorNode.parentElement.id==divId || window.getSelection().anchorNode.parentElement.parentElement.id==divId){
        document.execCommand("bold");
    }

    // If the bold command is not supported, and the selected text was already bold, remove the boldness manually
    if (!isBoldSupported && document.queryCommandState("bold") && (window.getSelection().anchorNode.parentElement.id==divId || window.getSelection().anchorNode.parentElement.parentElement.id==divId)) {
      var selection = window.getSelection();
      var range = selection.getRangeAt(0);
      var node = range.commonAncestorContainer;
      while (node.nodeType !== Node.ELEMENT_NODE) {
        node = node.parentNode;
      }
      var newRange = document.createRange();
      newRange.selectNodeContents(node);
      newRange.setStart(range.startContainer, range.startOffset);
      newRange.setEnd(range.endContainer, range.endOffset);
      var span = document.createElement("span");
      span.innerHTML = range.toString();
      span.style.fontWeight = "normal";
      newRange.deleteContents();
      newRange.insertNode(span);
      selection.removeAllRanges();
      selection.addRange(range);
    }
}
//#endregion Fonctions d'interface

//region Fonctions périphériques
// Fonctions pour précharger les images
function Picture(src) {
    this.src = src;
    this.img = null;
}

function Preloader() {
    this.pictures = [];
    this.onpicturesloaded = null;
}

Preloader.prototype.setPicture = function(src) {
    var id = src.split("/").pop().split(".")[0].toLowerCase();
    this.pictures[id] = new Picture(src);
    return this.pictures[id];
};

Preloader.prototype.loadPictures = function() {
    var self = this, pictures = self.pictures, n = 0;
    for(var id in pictures) {
        if(pictures.hasOwnProperty(id)) {
            var pic = self.pictures[id];
            n++;
        }
    }
    for(var id in pictures) {
        if(pictures.hasOwnProperty(id)) {
            var pic = self.pictures[id];
            var decrease = function(e) {
                if(--n == 0) {
                    self.onpicturesloaded();
                }
            }
            var img = new Image();
            img.onload = function() {
                var pic = self.pictures[this.alt];
                pic.img = this;
                decrease();
            };
            img.alt = id;
            img.src = pic.src;
        }
    }
};

// Fonctions pour la drop zone
const undauntedDropZone = document.getElementById('undaunted-drop-zone');
const undauntedMapInput = document.getElementById('undaunted-map-input');
const imagePreview = document.getElementById('image-preview');

// prevent default behavior for drag and drop events
['dragover', 'dragenter', 'drop'].forEach(eventName => {
    undauntedDropZone.addEventListener(eventName, e => {
        e.preventDefault();
        e.stopPropagation();
    });
});

// highlight drop zone when file is dragged over it
['dragover', 'dragenter'].forEach(eventName => {
    undauntedDropZone.addEventListener(eventName, () => {
        undauntedDropZone.classList.add('highlight');
    });
});

// remove highlight when file is dragged out of drop zone
['dragleave', 'drop'].forEach(eventName => {
    undauntedDropZone.addEventListener(eventName, () => {
        undauntedDropZone.classList.remove('highlight');
    });
});

// handle dropped file
undauntedDropZone.addEventListener('drop', e => {
    const file = e.dataTransfer.files[0];
    handleFile(file);
});

// handle selected file
undauntedMapInput.addEventListener('change', () => {
    const file = undauntedMapInput.files[0];
    handleFile(file);
});

// handle image file
function handleFile(file) {    
    var imageUrl = URL.createObjectURL(file)
    $("#undaunted-page-3 #undaunted-map").css("background-image", "url(" + imageUrl + ")");
    $("#undaunted-filename").html(file.name);
}

function replaceEnterBehavior(div){
    div.addEventListener("keydown", function (e) {
        if (e.key === "Enter" && !e.shiftKey) {
            // Empêche le comportement par défaut (ajout de div)
            e.preventDefault();

            // Crée un <br>
            var br = document.createElement("br");            
            // Insère le <br> à l'endroit où se trouve le curseur
            var selection = window.getSelection();
            var range = selection.getRangeAt(0);
            range.insertNode(br);
            
            // Insère le deuxième qui deviendra la zone d'édition
            var br = document.createElement("br");
            var selection = window.getSelection();
            var range = selection.getRangeAt(0);
            range.insertNode(br);
            // Place le curseur après le <br>
            range.setStartAfter(br);
            range.setEndAfter(br);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    });
}
//endregion Fonctions périphériques