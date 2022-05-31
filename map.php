<!--
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  

require __DIR__ . '/vendor/autoload.php';

$db = new \PDO('pgsql:dbname=geoserver;host=localhost;port=5432', 'geoserver', 'dreamofmirrors2501');


// include i18n class and initialize it
    require_once 'php/i18n.class.php';
    $i18n = new i18n('lang/lang_{LANGUAGE}.json', '/var/lib/php/sessions', 'en');
    $i18n->setForcedLang('en'); // force english, even if another user language is available, change for your language
    // Parameters: language file path, cache dir, default language (all optional)
    // init object: load language files, parse them if not cached, and so on.
    $i18n->init();

?>
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <script src="content/modals.js"></script>

    <link rel="stylesheet" type="text/css" href="css/mapa.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--  
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->
    <script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
  <!--   <link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' /> --> <!-- to musi wylecieć bo nakłada się na style leafleta --> 

    <script src="libs/leaflet-src.js"></script>
    <link rel="stylesheet" href="libs/leaflet.css" />

<script type="text/javascript">

/*
 * Leaflet.draw assumes that you have already included the Leaflet library.
 */

L.drawVersion = '0.3.0-dev';

L.drawLocal = {
  draw: {
    toolbar: {
      // #TODO: this should be reorganized where actions are nested in actions
      // ex: actions.undo  or actions.cancel
      actions: {
        title: '<?php echo L::cancel_drawing; ?>',
        text: '<?php echo L::cancel; ?>'
      },
      finish: {
        title: '<?php echo L::finish_drawing; ?>',
        text: '<?php echo L::finish; ?>'
      },
      undo: {
        title: '<?php echo L::delete_last_drawn; ?>',
        text: '<?php echo L::delete_last; ?>'
      },
      buttons: {
        marker: '<?php echo L::draw_button; ?>'
      }
    },
    handlers: {
      circle: {
        tooltip: {
          start: 'Kliknij i przeciągnij, aby narysować okrąg.'
        },
        radius: 'Promień'
      },
      marker: {
        tooltip: {
          start: '<?php echo L::marker_tooltip2; ?>'
        }
      },
      polygon: {
        tooltip: {
          start: 'Click to start drawing shape.',
          cont: 'Click to continue drawing shape.',
          end: 'Click first point to close this shape.'
        }
      },
      polyline: {
        error: '<strong>Error:</strong> shape edges cannot cross!',
        tooltip: {
          start: 'Click to start drawing line.',
          cont: 'Click to continue drawing line.',
          end: 'Click last point to finish line.'
        }
      },
      rectangle: {
        tooltip: {
          start: 'Click and drag to draw rectangle.'
        }
      },
      simpleshape: {
        tooltip: {
          end: 'Release mouse to finish drawing.'
        }
      }
    }
  },
  edit: {
    toolbar: {
      actions: {
        save: {
          title: '<?php echo L::save_changes; ?>',
          text: '<?php echo L::save; ?>'
        },
        cancel: {
          title: '<?php echo L::cancel_edits; ?>',
          text: '<?php echo L::cancel; ?>'
        }
      },
      buttons: {
        edit: '<?php echo L::move_markers; ?>',
        editDisabled: '<?php echo L::no_edit; ?>',
        remove: '<?php echo L::remove_markers; ?>',
        removeDisabled: '<?php echo L::no_delete; ?>'
      }
    },
    handlers: {
      edit: {
        tooltip: {
          text: '<?php echo L::drag_marker; ?>',
          subtext: '<?php echo L::undo; ?>'
        }
      },
      remove: {
        tooltip: {
          text: '<?php echo L::remove_tooltip; ?>'
        }
      }
    }
  }
};



</script>


    <link rel="stylesheet" href="dist/leaflet.draw.css" />

    <script src="src/Toolbar.js"></script>
    <script src="src/Tooltip.js"></script>

    <script src="src/ext/GeometryUtil.js"></script>
    <script src="src/ext/LatLngUtil.js"></script>
    <script src="src/ext/LineUtil.Intersect.js"></script>
    <script src="src/ext/Polygon.Intersect.js"></script>
    <script src="src/ext/Polyline.Intersect.js"></script>
    <script src="src/ext/TouchEvents.js"></script>

    <script src="src/draw/DrawToolbar.js"></script>
    <script src="src/draw/handler/Draw.Feature.js"></script>
    <script src="src/draw/handler/Draw.SimpleShape.js"></script>
    <script src="src/draw/handler/Draw.Polyline.js"></script>
    <script src="src/draw/handler/Draw.Circle.js"></script>
    <script src="src/draw/handler/Draw.Marker.js"></script>
    <script src="src/draw/handler/Draw.Polygon.js"></script>
    <script src="src/draw/handler/Draw.Rectangle.js"></script>


    <script src="src/edit/EditToolbar.js"></script>
    <script src="src/edit/handler/EditToolbar.Edit.js"></script>
    <script src="src/edit/handler/EditToolbar.Delete.js"></script>

    <script src="src/Control.Draw.js"></script>

    <script src="src/edit/handler/Edit.Poly.js"></script>
    <script src="src/edit/handler/Edit.SimpleShape.js"></script>
    <script src="src/edit/handler/Edit.Circle.js"></script>
    <script src="src/edit/handler/Edit.Rectangle.js"></script>
    <script src="src/edit/handler/Edit.Marker.js"></script> 
    <script src="src/Leaflet-WFST.alpha.js"></script>  <!-- WFS-T library --> 

    <script src="src/leaflet.geometryutil.js"></script>   <!-- needed for Leaflet-WFST --> 
<script src="node_modules/leaflet-toolbar/dist/leaflet.toolbar.js"></script>
<link rel="stylesheet" href="node_modules/leaflet-toolbar/dist/leaflet.toolbar.css"/>
   <script src="node_modules/sidebar-v2/js/leaflet-sidebar.js"></script>
  <link rel="stylesheet" href="node_modules/sidebar-v2/css/leaflet-sidebar.css" />
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

   <script src="node_modules/intro.js/intro.js"></script>
<link rel="stylesheet" href="node_modules/intro.js/introjs.css"/>

   <script src="node_modules/leaflet-search/src/leaflet-search.js"></script>
<link rel="stylesheet" href="node_modules/leaflet-search/src/leaflet-search.css"/>

<!-- translation -->
  <script src="js/CLDRPluralRuleParser.js"></script>
  <script src="js/jquery.i18n.js"></script>
  <script src="js/jquery.i18n.messagestore.js"></script>
  <script src="js/jquery.i18n.fallbacks.js"></script>
  <script src="js/jquery.i18n.language.js"></script>
  <script src="js/jquery.i18n.parser.js"></script>
  <script src="js/jquery.i18n.emitter.js"></script>
  <script src="js/jquery.i18n.emitter.bidi.js"></script>
   <script src="js/global.js"></script>


<style>
html {font-size:14px;} 
.box_pytania{
  display:block;
}
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 6px;
  width: 90%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 1rem;
  transition: 0.4s;
  margin-bottom: 4px;
  margin-top: 4px;
  font-weight: bold;
}

.accordion:hover { 
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.plus.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
.button-small{
  width:70%;
/*  background-color: #F0E68C;
*/}
#temperature_title {
   background-color: #ffbf80;
}
#water_title{
   background-color: #99b3ff;
}
#wind_title{
   background-color: #b3e6cc;
}
#air_title{
   background-color: #AFEEEE;
}
#soil_title{
   background-color: #F0E68C;
}



/*@media only screen and (min-width : 769px) {
*/
.leaflet-retina .leaflet-draw-toolbar a{

}
.leaflet-draw-toolbar .leaflet-draw-edit-edit{
    background: url('ikony/drag.png') no-repeat;
    background-color: white;
    text-align: center;
}
.leaflet-draw-toolbar .leaflet-draw-edit-remove{
     -webkit-appearance: none;
    background: url('ikony/delete.png') no-repeat;
    background-color: white;
    text-align: center;
}
.leaflet-draw-toolbar .leaflet-draw-draw-marker {
     -webkit-appearance: none;
  width:40px;
    height:40px;
    background: url('ikony/edit2.png') no-repeat;;
    background-color: white;
     text-align: center;
}
.leaflet-draw-toolbar .leaflet-bar a:hover{
     -webkit-appearance: none;
    width:40px;
    height:40px;
}
.leaflet-draw-draw-marker a:hover{
     -webkit-appearance: none;
    width:40px;
    height:40px;
}

.introjs-tooltiptext{
  font-size: 1.2rem;
}

.introjs-tooltip {
      max-width: 60%;
      min-width: 300px;
    }

.search-input {
  font-family:Courier
}
.search-input,
.leaflet-control-search {
  max-width:400px;
}

.leaflet-control-layers-toggle{
  width: 40px;
  height: 40px;
}

.leaflet-control-search .search-button{
    width: 36px;
  height: 36px;
      background: url('ikony/search2.png') no-repeat;

}
.switch {
  position: relative;
  display: inline-block;
  width: 300px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #CD5C5C;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #3CB371;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(265px);
  -ms-transform: translateX(265px);
  transform: translateX(265px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: black;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
  text-align: center;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}

.ytlink {

    text-decoration: none;
    color: white;
    font-weight: bold;
    display: inline;
}

</style>



</head>

    
    <body>

        <div class="container">
           

<div id="sidebar" class="sidebar collapsed">
        <!-- Nav tabs -->
        <div class="sidebar-tabs">
            <ul role="tablist">
                <li><a href="#home" role="tab" onclick=""><i class="fa fa-bars"></i></a></li>
<!--                 <li><a href="#edit" role="tab"><i class="fa fa-edit"></i></a></li> -->
                <li><a href="#profile" role="tab"><i class="fa fa-user"></i></a></li>
                <li><a href="#help" role="tab"><i class="fa fa-question-circle"></i></a></li>
            </ul>

           <!--  <ul role="tablist">
                <li><a href="#settings" role="tab"><i class="fa fa-gear"></i></a></li>
            </ul> -->
        </div>

        <!-- Tab panes -->
<div class="sidebar-content">
<div class="sidebar-pane" id="home">
  <h1 class="sidebar-header">
    <span  data-i18n="map_home_title"></span>
    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
  </h1> 

  <p id="categories_intro" data-i18n="[html]map_categories_intro" ></p>
 
 <hr/>

<div class="small accordion plus active" id="temperature_title"><img style="vertical-align:middle;" src="ikony/przyciski/temperature.png"/> <span  style="font-size: 15px; vertical-align:middle;" data-i18n="temperature_title"></span></div>
  <div class="panel" style="max-height:112px;">
    <button  class="button1 intro1" onclick="editing=true; zamknijSidebar(); editLayer(q1aEdit,icon_q1a); qid='q1a';"><img src="ikony/temperature_positive.png"/> <span data-i18n="results_temperature_texta"></span> </button>
    <br>
    <button class="button1" onclick="editing=true; zamknijSidebar(); editLayer(q1bEdit,icon_q1b); qid='q1b';"><img src="ikony/temperature_negative.png"/> <span data-i18n="results_temperature_textb"> </span> </button>
    </br>
    </br>
  </div>

<div class="small accordion plus" id="water_title"><img style="vertical-align:middle;" src="ikony/przyciski/water.png"/> <span style="font-size: 15px; vertical-align:middle;" data-i18n="water_title"></span></div>
<div class="panel">
  <button class="button1" onclick="editing=true; zamknijSidebar(); editLayer(q2aEdit,icon_q2a); qid='q2a';"><img src="ikony/water_positive.png"/> <span data-i18n="results_water_texta">  </span>  </button>
  <button class="button1" onclick="editing=true; zamknijSidebar(); editLayer(q2bEdit,icon_q2b); qid='q2b';"><img src="ikony/water_negative.png"/> <span data-i18n="results_water_textb">  </span>  </button>
  </br>
  </br>
</div>

<div class="small accordion plus" id="wind_title"><img style="vertical-align:middle;" src="ikony/przyciski/wind.png"/> <span style="font-size: 15px; vertical-align:middle;" data-i18n="wind_title" ></span></div>
<div class="panel">
  <button class="button1" onclick="editing=true; zamknijSidebar(); editLayer(q3aEdit,icon_q3a); qid='q3a';"><img src="ikony/wind_positive.png"/> <span data-i18n="results_wind_texta">  </span>  </button>
  <button class="button1" onclick="editing=true; zamknijSidebar(); editLayer(q3bEdit,icon_q3b); qid='q3b';"><img src="ikony/wind_negative.png"/> <span data-i18n="results_wind_textb"> Negative effects of extreme winds </span>  </button>
  </br>
  </br>
</div>

<div class="small accordion plus" id="air_title"><img style="vertical-align:middle;" src="ikony/przyciski/air.png"/> <span style="font-size: 15px; vertical-align:middle;" data-i18n="air_title"></span></div>
<div class="panel">
  <button class="button1" onclick="editing=true; zamknijSidebar(); editLayer(q4aEdit,icon_q4a); qid='q4a';"><img src="ikony/air_positive.png"/> <span data-i18n="results_air_texta"> </span>  </button>
  <button class="button1" onclick="editing=true; zamknijSidebar(); editLayer(q4bEdit,icon_q4b); qid='q4b';"><img src="ikony/air_negative.png"/> <span data-i18n="results_air_textb">  </span>  </button>
  </br>
  </br>
</div>

<div class="small accordion plus" id="soil_title"><img style="vertical-align:middle;" src="ikony/przyciski/soil.png"/> <span style="font-size: 15px; vertical-align:middle;" data-i18n="soil_title"></span></div>
<div class="panel">
  <button class="button1" onclick="editing=true; zamknijSidebar(); editLayer(q5aEdit,icon_q5a); qid='q5a';"><img src="ikony/soil_positive.png"/> <span data-i18n="results_soil_texta">  </span>  </button>    
  <button class="button1" onclick="editing=true; zamknijSidebar(); editLayer(q5bEdit,icon_q5b); qid='q5b';"><img src="ikony/soil_negative.png"/> <span data-i18n="results_soil_textb">  </span>  </button>
  </br>
  </br>
</div>

<hr>
<center>
<label class="switch"><input type="checkbox" id="togBtn" checked><div class="slider round"><!--ADDED HTML --><span class="on" data-i18n="[html]draw_mode"></span><span class="off" data-i18n="[html]edit_mode"></span><!--END--></div></label>
</center>
<hr>
<center>
  <button class="button1 button-small" onclick="feedbackForm('index.php');"><img src="ikony/arrow.png"/> <span data-i18n="finish_main_page"></span>  </button>
  <button class="button1 button-small" onclick="feedbackForm('logout.php')"><img src="ikony/logout.png"/> <span data-i18n="finish_logout"></span>  </button>
</center>
      </div>

 

            <div class="sidebar-pane" id="profile">
                <h1 class="sidebar-header"> <span  data-i18n="results_profile_title"></span><span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
                <button class="button1" onclick="window.location.href = 'logout.php';"> <span data-i18n="logout"> </span> </button>
                <button class="button1" onclick="window.location.href = 'index.php';"> <span data-i18n="go_back"> </span> </button>
                 <button class="button1" onclick="window.location.href = 'results.php';"> <span data-i18n="go_results"></span> </button>
                 <button class="button1" onclick="feedback_modal.style.display = 'block';"> <span data-i18n="feedback_button"></span> </button>

              </br>
            </div>



            <div class="sidebar-pane" id="help">


                <h1 class="sidebar-header"  > <span  data-i18n="map_help_title"></span><span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
                       <center>

<!-- <button class="button1 button-small" onclick="contact_modal.style.display = 'block';"> <span data-i18n="contact_button"></span> </button>
 --><button class="button1 button-small" onclick="window.location.href = 'mailto:XXXXX';"><span data-i18n="contact_button"></span> </button>


<button class="button1 button-small" onclick="localStorage.setItem('EventTour', 'notCompleted'); window.location.reload();"> <img src="ikony/tutorial.png"/><span data-i18n="restart_tutorial"> </span> </button>
</center>
<hr/>
 <label data-i18n="map_help_video1"></label>
    <div class="col-sm text-center embed-responsive embed-responsive-16by9 m-2">
      <iframe  src="https://www.youtube.com/embed/Q8fufqKIR48" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
<hr/>
 <label data-i18n="map_help_video2"></label>
        <div class="col-sm text-center embed-responsive embed-responsive-16by9 m-2">
<iframe  src="https://www.youtube.com/embed/dTLHcRWoPeg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    
    </div>


<hr/>
 <label data-i18n="map_help_subtitle1"></label>
              <div class="help text-justify"  data-i18n="[html]map_help_text1a" >

       </div>
 <label data-i18n="map_help_subtitle2"></label>
              <div class="help text-justify"  data-i18n="[html]map_help_text2a">

       </div>

            </div>
        </div>
    </div>
           
                    <div id="map" class="sidebar-map" ></div>
                    <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                      <span class="close">&times;</span>
                      <p id="modal_content"></p>
                    </div>

                  </div>
                  <div id="feedback_form" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                      <span class="close close_feedback">&times;</span>
                      <p id="feedback_form_content">
                        <span data-i18n="[html]feedback_intro"></span>
                        <div class="wrap"><form action="feedback.php"  method="post">
                        </br><label class="statement"  data-i18n="feedback_how_easy"></label> <br/>
                         <select name="how_easy">
                          <option value="no_answer" data-i18n="feedback0" ></option>
                          <option value="very easy" data-i18n="feedback1"> </option>
                          <option value="easy" data-i18n="feedback2"> </option>
                          <option value="relatively easy" data-i18n="feedback3" ></option>
                          <option value="delatively difficult" data-i18n="feedback4"></option>
                          <option value="very difficult" data-i18n="feedback5"></option>
                        </select> 
                        </br> <br/>
                        <label class="statement" data-i18n="feedback_difficulty"></label>
                        <textarea name="feedback_difficulty"></textarea></br></br>
                        <label class="statement" data-i18n="feedback_improve"></label>
                        <textarea name="feedback_improve"></textarea></br></br><center>'
                        <input type="submit" id="saveBtn" data-i18n="[value]save_feedback" value="" onclick=""/>
                        <input type="button" id="cancelBtn" data-i18n="[value]skip_feedback"  value="" onclick="window.location.href = 'index.php';"/></center>
                        </ul></div>'
                      </form></div>


                      </p>
                    </div>

                  </div> 
        

         <div id="contact_form" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                      <span class="close close_contact">&times;</span>
                      <p id="contact_form_content">

                        <span data-i18n="[html]feedback_intro"></span>
                        <div class="wrap">
                        <form enctype="text/plain" method="get" action="mailto:mrzeszewski@o2.pl">
                        </br><label class="statement"  data-i18n="feedback_how_easy"></label> <br/>
                         <select name="how_easy">
                          <option value="no_answer" data-i18n="feedback0" ></option>
                          <option value="very easy" data-i18n="feedback1"> </option>
                          <option value="easy" data-i18n="feedback2"> </option>
                          <option value="relatively easy" data-i18n="feedback3" ></option>
                          <option value="delatively difficult" data-i18n="feedback4"></option>
                          <option value="very difficult" data-i18n="feedback5"></option>
                        </select> 
                        </br> <br/>
                        <label class="statement" data-i18n="feedback_difficulty"></label>
                        <textarea name="feedback_difficulty"></textarea></br></br>
                        <label class="statement" data-i18n="feedback_improve"></label>
                        <textarea name="feedback_improve"></textarea></br></br><center>'
                        <input type="submit" id="saveBtn" data-i18n="[value]save_feedback" value="" onclick=""/>
                        <input type="button" id="cancelBtn" data-i18n="[value]skip_feedback"  value="" onclick="window.location.href = 'index.php';"/></center>
                        </ul></div>'
                      </form></div>


                      </p>
                    </div>

                  </div> 
                      
        

        </div> 
        
 <script>


// Get the modal
var modal = document.getElementById('myModal');
var feedback_modal = document.getElementById('feedback_form');
var contact_modal = document.getElementById('contact_form');



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span_feedback = document.getElementsByClassName("close_feedback")[0];
var span_contact = document.getElementsByClassName("close_contact")[0];

span_feedback.onclick = function() {
  feedback_modal.style.display = "none";
}

span_contact.onclick = function() {
  contact_modal.style.display = "none";
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  eval('layer_'+qid).removeLayer(currentMarker); 

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
  modal.style.display = "none";
  eval('layer_'+qid).removeLayer(currentMarker); 
  }

  if (event.target == feedback_modal) {
  feedback_modal.style.display = "none";
  }
}
</script>


<script type="text/javascript">
 

</script>



<script type="text/javascript">
     L.Browser.touch=false;
</script>



<script>


var region="english";
var editControls=[]; 
var qid='none' 
var editing=true; 

    
    
var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});


map = new L.Map('map', {center: new L.LatLng(46.87521339672271,1.9555664062500002 ), zoom: 5, zoomControl:false});

OpenStreetMap_Mapnik.addTo(map);

var sidebar = L.control.sidebar('sidebar').addTo(map);

if ($(window).width()>780){
 sidebar.open("home") //domyślnie sidebar otwarty (uzależnić to od wielkości ekranu?) 
}



//definicja ikony
icon_q1a = L.icon({
            iconUrl: 'ikony/temperature_positive.png',iconSize:     [30, 30]
        });
icon_q1b = L.icon({
            iconUrl: 'ikony/temperature_negative.png',iconSize:     [30, 30]
        });
icon_q2a = L.icon({
            iconUrl: 'ikony/water_positive.png',iconSize:     [30, 30]
        });
icon_q2b = L.icon({
            iconUrl: 'ikony/water_negative.png',iconSize:     [30, 30]
        });
icon_q3a = L.icon({
            iconUrl: 'ikony/wind_positive.png',iconSize:     [30, 30]
        });
icon_q3b = L.icon({
            iconUrl: 'ikony/wind_negative.png',iconSize:     [30, 30]
        });
icon_q4a = L.icon({
            iconUrl: 'ikony/air_positive.png',iconSize:     [30, 30]
        });
icon_q4b = L.icon({
            iconUrl: 'ikony/air_negative.png',iconSize:     [30, 30]
        });
icon_q5a = L.icon({
            iconUrl: 'ikony/soil_positive.png',iconSize:     [30, 30]
        });
icon_q5b = L.icon({
            iconUrl: 'ikony/soil_negative.png',iconSize:     [30, 30]
        });


filtr_uid=new L.Filter.EQ().append('user_id', '<?php echo $username; ?>')


var layer_q1a = new L.WFST({
    url: 'GEOSERVER ADDRESS HERE',
    typeNS: "terrifica",
    typeName: "q1a",
    crs: L.CRS.EPSG4326,
    geometryField: "the_geom",
    filter:filtr_uid
  }).addTo(map)
    .once('load', function () {
      this.eachLayer(function(layer){layer.setIcon(icon_q1a)}); //TI musi byc w once('load') bo musi zaczekać aż elementy się załadują!
    })
    .on('click', function (event) {
     if (qid!="q1a") {  ///to jest obejście żebym nie musiał przekładać warunków. Jak nie jest warstwa w edycji to się popup wyświetla
   L.popup({minWidth:250})
      .setLatLng(event.latlng)
      .setContent(eval(popup_rank)+popup_info)
      .openOn(map);
      $('div.leaflet-popup-content').i18n();//to tłumaczy tylko popup
    }else if (qid=="q1a"){
      var content=modal_q1a+'<input type="button" id="saveBtn" data-i18n="[value]save_button" value="" onclick="savePropertiesSinglePoint(layer_q1a,\''+event.layer.feature.id+'\');"/>' // funckja nowa zapisu bierze id obiektu
                        +'<input type="button" id="cancelBtn" data-i18n="[value]cancel_button"  value="Cancel" onclick="closeModal()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';


    var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
    var new_element = old_element.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);

    
    modal_content.addEventListener( 'change', function () {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      var j1 = $("[name='j1']").val();
      var j2 = $("[name='j2']").val();
      var j3 = $("[name='j3']").val();
      event.layer.feature.properties.place_name = place_name;
      event.layer.feature.properties.j1 = j1; 
      event.layer.feature.properties.j2 = j2; 
      event.layer.feature.properties.j3 = j3;  
      event.layer.feature.properties.other = other; 
    });
    modal_content.innerHTML=content;
    modal.style.display = "block";
    setModalValues(event.layer);
    $('#myModal').i18n();
    };
  })
    .on('save:success', function(event) {this.eachLayer(function(layer){layer.setIcon(icon_q1a)});});


var layer_q1b = new L.WFST({
    url: 'GEOSERVER ADDRESS HERE',
    typeNS: "terrifica",
    typeName: "q1b",
    crs: L.CRS.EPSG4326,
    geometryField: "the_geom",
    filter: filtr_uid
  }).addTo(map)
    .once('load', function () {
      this.eachLayer(function(layer){layer.setIcon(icon_q1b)}); //TI musi byc w once('load') bo musi zaczekać aż elementy się załadują!
    })
    .on('click', function (event) {
      if (qid!="q1b") {
    L.popup({minWidth:250})
      .setLatLng(event.latlng)
      .setContent(eval(popup_rank_negative)+popup_info)
      .openOn(map);
      $('div.leaflet-popup-content').i18n();
    }else  if (qid=="q1b"){
     var content=modal_q1b+'<input type="button" id="saveBtn" data-i18n="[value]save_button" value="Save" onclick="savePropertiesSinglePoint(layer_q1b,\''+event.layer.feature.id+'\');"/>' // funckja nowa zapisu bierze id obiektu
                        +'<input type="button" id="cancelBtn" data-i18n="[value]cancel_button"  value="Cancel" onclick="closeModal()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';

    var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
    var new_element = old_element.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);

    
    modal_content.addEventListener( 'change', function () {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      var solutions = $('#solutions').val();
      var j1 = $("[name='j1']").val();
      var j2 = $("[name='j2']").val();
      var j3 = $("[name='j3']").val();
      event.layer.feature.properties.place_name = place_name;
      event.layer.feature.properties.j1 = j1; 
      event.layer.feature.properties.j2 = j2; 
      event.layer.feature.properties.j3 = j3;  
      event.layer.feature.properties.other = other;
      event.layer.feature.properties.s = solutions; 
 
    });
    modal_content.innerHTML=content;
    modal.style.display = "block";
    setModalValues(event.layer);
    $('#myModal').i18n();
    };
  })
    .on('save:success', function(event) {this.eachLayer(function(layer){layer.setIcon(icon_q1b)});});

var layer_q2a = new L.WFST({
    url: 'GEOSERVER ADDRESS HERE',
    typeNS: "terrifica",
    typeName: "q2a",
    crs: L.CRS.EPSG4326,
    geometryField: "the_geom",
    filter:filtr_uid
  }).addTo(map)
    .once('load', function () {
      this.eachLayer(function(layer){layer.setIcon(icon_q2a)}); //TI musi byc w once('load') bo musi zaczekać aż elementy się załadują!
    })
    .on('click', function (event) {
      if (qid!="q2a") {  ///UWAGA TU trzeba warunke odwrotnie bi się edycja włacza  && qid=='q1a'
    L.popup({minWidth:250})
      .setLatLng(event.latlng)
      .setContent(eval(popup_rank)+popup_info)
      .openOn(map);
      $('div.leaflet-popup-content').i18n();
    }else{
    var content=modal_q2a+'<input type="button" id="saveBtn" data-i18n="[value]save_button" value="Save" onclick="savePropertiesSinglePoint(layer_q2a,\''+event.layer.feature.id+'\');"/>' // funckja nowa zapisu bierze id obiektu
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="closeModal()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';

    var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
    var new_element = old_element.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);

    modal_content.addEventListener( 'change', function () {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      var j1 = $("[name='j1']").val();
      var j2 = $("[name='j2']").val();
      var j3 = $("[name='j3']").val();
      event.layer.feature.properties.place_name = place_name;
      event.layer.feature.properties.j1 = j1; 
      event.layer.feature.properties.j2 = j2; 
      event.layer.feature.properties.j3 = j3; 
      event.layer.feature.properties.other = other; 
    });
    modal_content.innerHTML=content;
    modal.style.display = "block";
    setModalValues(event.layer);
    $('#myModal').i18n();
    };
  })
    .on('save:success', function(event) {this.eachLayer(function(layer){layer.setIcon(icon_q2a)});});


var layer_q2b = new L.WFST({
    url: 'GEOSERVER ADDRESS HERE',
    typeNS: "terrifica",
    typeName: "q2b",
    crs: L.CRS.EPSG4326,
    geometryField: "the_geom",
    filter: filtr_uid
  }).addTo(map)
    .once('load', function () {
      this.eachLayer(function(layer){layer.setIcon(icon_q2b)}); //TI musi byc w once('load') bo musi zaczekać aż elementy się załadują!
    })
    .on('click', function (event) {
    if (qid!="q2b" ) { ///patrz wyżej && qid=='q1b'
    L.popup({minWidth:250})
      .setLatLng(event.latlng)
      .setContent(eval(popup_rank_negative)+popup_info)
      .openOn(map);
      $('div.leaflet-popup-content').i18n();
    }else{
    var content=modal_q2b+'<input type="button" id="saveBtn" data-i18n="[value]save_button" value="Save" onclick="savePropertiesSinglePoint(layer_q2b,\''+event.layer.feature.id+'\');"/>' // funckja nowa zapisu bierze id obiektu
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="closeModal()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
  

    var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
    var new_element = old_element.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);

    modal_content.addEventListener( 'change', function () {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      var solutions = $('#solutions').val();
      var j1 = $("[name='j1']").val();
      var j2 = $("[name='j2']").val();
      var j3 = $("[name='j3']").val();
      event.layer.feature.properties.place_name = place_name;
      event.layer.feature.properties.j1 = j1; 
      event.layer.feature.properties.j2 = j2; 
      event.layer.feature.properties.j3 = j3; 
      event.layer.feature.properties.other = other;
      event.layer.feature.properties.s = solutions; 
 
    });
    modal_content.innerHTML=content;
    modal.style.display = "block";
    setModalValues(event.layer);
    $('#myModal').i18n();
    };
  })
    .on('save:success', function(event) {this.eachLayer(function(layer){layer.setIcon(icon_q2b)});});

var layer_q3a = new L.WFST({
    url: 'GEOSERVER ADDRESS HERE',
    typeNS: "terrifica",
    typeName: "q3a",
    crs: L.CRS.EPSG4326,
    geometryField: "the_geom",
    filter:filtr_uid
  }).addTo(map)
    .once('load', function () {
      this.eachLayer(function(layer){layer.setIcon(icon_q3a)}); //TI musi byc w once('load') bo musi zaczekać aż elementy się załadują!
    })
    .on('click', function (event) {
   if (qid!="q3a") {  ///UWAGA TU trzeba warunke odwrotnie bi się edycja włacza  && qid=='q1a'
    L.popup({minWidth:250})
      .setLatLng(event.latlng)
      .setContent(eval(popup_rank)+popup_info)
      .openOn(map);
      $('div.leaflet-popup-content').i18n();
    }else{
    var content=modal_q3a+'<input type="button" id="saveBtn" data-i18n="[value]save_button" value="Save" onclick="savePropertiesSinglePoint(layer_q3a,\''+event.layer.feature.id+'\');"/>' // funckja nowa zapisu bierze id obiektu
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="closeModal()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
    var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
    var new_element = old_element.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);

    modal_content.addEventListener( 'change', function () {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      var j1 = $("[name='j1']").val();
      var j2 = $("[name='j2']").val();
      var j3 = $("[name='j3']").val();
      event.layer.feature.properties.place_name = place_name;
      event.layer.feature.properties.j1 = j1; 
      event.layer.feature.properties.j2 = j2; 
      event.layer.feature.properties.j3 = j3;  
      event.layer.feature.properties.other = other; 
    });
    modal_content.innerHTML=content;
    modal.style.display = "block";
    setModalValues(event.layer);
    $('#myModal').i18n();
    };
  })
    .on('save:success', function(event) {this.eachLayer(function(layer){layer.setIcon(icon_q3a)});});


var layer_q3b = new L.WFST({
    url: 'GEOSERVER ADDRESS HERE',
    typeNS: "terrifica",
    typeName: "q3b",
    crs: L.CRS.EPSG4326,
    geometryField: "the_geom",
    filter: filtr_uid
  }).addTo(map)
    .once('load', function () {
      this.eachLayer(function(layer){layer.setIcon(icon_q3b)}); //TI musi byc w once('load') bo musi zaczekać aż elementy się załadują!
    })
    .on('click', function (event) {
    if (qid!="q3b" ) { ///patrz wyżej && qid=='q1b'
    L.popup({minWidth:250})
      .setLatLng(event.latlng)
      .setContent(eval(popup_rank_negative)+popup_info)
      .openOn(map);
      $('div.leaflet-popup-content').i18n();
    }else{
    var content=modal_q3b+'<input type="button" id="saveBtn" data-i18n="[value]save_button" value="Save" onclick="savePropertiesSinglePoint(layer_q3b,\''+event.layer.feature.id+'\');"/>' // funckja nowa zapisu bierze id obiektu
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="closeModal()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
  

    var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
    var new_element = old_element.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);

    modal_content.addEventListener( 'change', function () {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      var solutions = $('#solutions').val();
      var j1 = $("[name='j1']").val();
      var j2 = $("[name='j2']").val();
      var j3 = $("[name='j3']").val();
      event.layer.feature.properties.place_name = place_name;
      event.layer.feature.properties.j1 = j1; 
      event.layer.feature.properties.j2 = j2; 
      event.layer.feature.properties.j3 = j3;  
      event.layer.feature.properties.other = other;
      event.layer.feature.properties.s = solutions; 
 
    });
    modal_content.innerHTML=content;
    modal.style.display = "block";
    setModalValues(event.layer);
    $('#myModal').i18n();
    };
  })
    .on('save:success', function(event) {this.eachLayer(function(layer){layer.setIcon(icon_q3b)});});

var layer_q4a = new L.WFST({
    url: 'GEOSERVER ADDRESS HERE',
    typeNS: "terrifica",
    typeName: "q4a",
    crs: L.CRS.EPSG4326,
    geometryField: "the_geom",
    filter:filtr_uid
  }).addTo(map)
    .once('load', function () {
      this.eachLayer(function(layer){layer.setIcon(icon_q4a)}); //TI musi byc w once('load') bo musi zaczekać aż elementy się załadują!
    })
    .on('click', function (event) {
     if (qid!="q4a") {  ///UWAGA TU trzeba warunke odwrotnie bi się edycja włacza  && qid=='q1a'
    L.popup({minWidth:250})
      .setLatLng(event.latlng)
      .setContent(eval(popup_rank)+popup_info)
      .openOn(map);
      $('div.leaflet-popup-content').i18n();
    }else{
    var content=modal_q4a+'<input type="button" id="saveBtn" data-i18n="[value]save_button" value="Save" onclick="savePropertiesSinglePoint(layer_q4a,\''+event.layer.feature.id+'\');"/>' // funckja nowa zapisu bierze id obiektu
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="closeModal()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';

    var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
    var new_element = old_element.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);

    modal_content.addEventListener( 'change', function () {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      var j1 = $("[name='j1']").val();
      var j2 = $("[name='j2']").val();
      var j3 = $("[name='j3']").val();
      event.layer.feature.properties.place_name = place_name;
      event.layer.feature.properties.j1 = j1; 
      event.layer.feature.properties.j2 = j2; 
      event.layer.feature.properties.j3 = j3; 
      event.layer.feature.properties.other = other; 
    });
    modal_content.innerHTML=content;
    modal.style.display = "block";
    setModalValues(event.layer);
    $('#myModal').i18n();
    };
  })
    .on('save:success', function(event) {this.eachLayer(function(layer){layer.setIcon(icon_q4a)});});


var layer_q4b = new L.WFST({
    url: 'GEOSERVER ADDRESS HERE',
    typeNS: "terrifica",
    typeName: "q4b",
    crs: L.CRS.EPSG4326,
    geometryField: "the_geom",
    filter: filtr_uid
  }).addTo(map)
    .once('load', function () {
      this.eachLayer(function(layer){layer.setIcon(icon_q4b)}); //TI musi byc w once('load') bo musi zaczekać aż elementy się załadują!
    })
    .on('click', function (event) {
  if (qid!="q4b" ) { ///patrz wyżej && qid=='q1b'
    L.popup({minWidth:250})
      .setLatLng(event.latlng)
      .setContent(eval(popup_rank_negative)+popup_info)
      .openOn(map);
      $('div.leaflet-popup-content').i18n();
    }else{
    var content=modal_q4b+'<input type="button" id="saveBtn" data-i18n="[value]save_button" value="Save" onclick="savePropertiesSinglePoint(layer_q4b,\''+event.layer.feature.id+'\');"/>' // funckja nowa zapisu bierze id obiektu
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="closeModal()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
  

    var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
    var new_element = old_element.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);

    modal_content.addEventListener( 'change', function () {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      var solutions = $('#solutions').val();
      var j1 = $("[name='j1']").val();
      var j2 = $("[name='j2']").val();
      var j3 = $("[name='j3']").val();
      event.layer.feature.properties.place_name = place_name;
      event.layer.feature.properties.j1 = j1; 
      event.layer.feature.properties.j2 = j2; 
      event.layer.feature.properties.j3 = j3; 
      event.layer.feature.properties.other = other;
      event.layer.feature.properties.s = solutions; 
 
    });
    modal_content.innerHTML=content;
    modal.style.display = "block";
    setModalValues(event.layer);
    $('#myModal').i18n();
    };
  })
    .on('save:success', function(event) {this.eachLayer(function(layer){layer.setIcon(icon_q4b)});});

var layer_q5a = new L.WFST({
    url: 'GEOSERVER ADDRESS HERE',
    typeNS: "terrifica",
    typeName: "q5a",
    crs: L.CRS.EPSG4326,
    geometryField: "the_geom",
    filter:filtr_uid
  }).addTo(map)
    .once('load', function () {
      this.eachLayer(function(layer){layer.setIcon(icon_q5a)}); //TI musi byc w once('load') bo musi zaczekać aż elementy się załadują!
    })
    .on('click', function (event) {
      if (qid!="q5a") {  ///UWAGA TU trzeba warunke odwrotnie bi się edycja włacza  && qid=='q1a'
    L.popup({minWidth:250})
      .setLatLng(event.latlng)
      .setContent(eval(popup_rank)+popup_info)
      .openOn(map);
      $('div.leaflet-popup-content').i18n();
    }else{
    var content=modal_q5a+'<input type="button" id="saveBtn" data-i18n="[value]save_button" value="Save" onclick="savePropertiesSinglePoint(layer_q5a,\''+event.layer.feature.id+'\');"/>' // funckja nowa zapisu bierze id obiektu
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="closeModal()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';

    var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
    var new_element = old_element.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);

    modal_content.addEventListener( 'change', function () {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      var j1 = $("[name='j1']").val();
      var j2 = $("[name='j2']").val();
      var j3 = $("[name='j3']").val();
      event.layer.feature.properties.place_name = place_name;
      event.layer.feature.properties.j1 = j1; 
      event.layer.feature.properties.j2 = j2; 
      event.layer.feature.properties.j3 = j3; 
      event.layer.feature.properties.other = other; 
    });
    modal_content.innerHTML=content;
    modal.style.display = "block";
    setModalValues(event.layer);
    $('#myModal').i18n();
    };
  })
    .on('save:success', function(event) {this.eachLayer(function(layer){layer.setIcon(icon_q5a)});});


var layer_q5b = new L.WFST({
    url: 'GEOSERVER ADDRESS HERE',
    typeNS: "terrifica",
    typeName: "q5b",
    crs: L.CRS.EPSG4326,
    geometryField: "the_geom",
    filter: filtr_uid
  }).addTo(map)
    .once('load', function () {
      this.eachLayer(function(layer){layer.setIcon(icon_q5b)}); //TI musi byc w once('load') bo musi zaczekać aż elementy się załadują!
    })
    .on('click', function (event) {
  if (qid!="q5b" ) { ///patrz wyżej && qid=='q1b'
    L.popup({minWidth:250})
      .setLatLng(event.latlng)
      .setContent(eval(popup_rank_negative)+popup_info)
      .openOn(map);
      $('div.leaflet-popup-content').i18n();
    }else{
    var content=modal_q5b+'<input type="button" id="saveBtn" data-i18n="[value]save_button" value="Save" onclick="savePropertiesSinglePoint(layer_q5b,\''+event.layer.feature.id+'\');"/>' // funckja nowa zapisu bierze id obiektu
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="closeModal()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
  

    var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
    var new_element = old_element.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);

    modal_content.addEventListener( 'change', function () {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      var solutions = $('#solutions').val();
      var j1 = $("[name='j1']").val();
      var j2 = $("[name='j2']").val();
      var j3 = $("[name='j3']").val();
      event.layer.feature.properties.place_name = place_name;
      event.layer.feature.properties.j1 = j1; 
      event.layer.feature.properties.j2 = j2; 
      event.layer.feature.properties.j3 = j3; 
      event.layer.feature.properties.other = other;
      event.layer.feature.properties.s = solutions; 
 
    });
    modal_content.innerHTML=content;
    modal.style.display = "block";
    setModalValues(event.layer);
    $('#myModal').i18n();
    };
  })
    .on('save:success', function(event) {this.eachLayer(function(layer){layer.setIcon(icon_q5b)});});


//tablica z warstwami - nie moga być same znazwy ale obiekty
var warstwy_pytan = [layer_q1a,layer_q1b,layer_q2a,layer_q2b, layer_q3a,layer_q3b,layer_q4a,layer_q4b,layer_q5a,layer_q5b];

showLayers(warstwy_pytan);

//obsługa dodawania punktów do bazy przez WFST
map.on('draw:created', function(event) {
    console.log("test");
    var layer = event.layer;
    currentMarker=layer;
    var type = event.layerType;
    if(qid== 'q1a' && type === 'marker'){
        save_layer="layer_q1a";
        var content = modal_intro+modal_q1a+'<input type="button" data-i18n="[value]save_button" id="saveBtn" value="Save" onclick="saveData('+save_layer+'); "/>'
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="window.history.go()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
       
        var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element);      

        modal_content.innerHTML=content;
        $('#modal_content').i18n();
        modal.style.display = "block";
        layer.feature = {properties: {}};//inicjacja  miejsca na wpisanie atrybutów
        layer_q1a.addLayer(layer);
    }
    else if(qid== 'q1b' && type === 'marker'){
        save_layer="layer_q1b";
        var content = modal_intro+modal_q1b+'<input type="button" data-i18n="[value]save_button" id="saveBtn" value="Save" onclick="saveData('+save_layer+'); "/>'
                       +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="window.history.go()"/></center>'
                       +'</ul></div>'
                       +'</form></div>';
        
        var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element); 
        
        modal_content.innerHTML=content;
        $('#modal_content').i18n();
        modal.style.display = "block";
        layer.feature = {properties: {}};//inicjacja  miejsca na wpisanie atrybutów
        layer_q1b.addLayer(layer);
    }
    else if(qid== 'q2a' && type === 'marker'){
        save_layer="layer_q2a";
        var content =   modal_intro+modal_q2a +'<input type="button" data-i18n="[value]save_button" id="saveBtn" value="Save" onclick="saveData('+save_layer+'); "/>'
                        +'<input type="button" id="cancelBtn" data-i18n="[value]cancel_button"   value="Cancel" onclick="window.history.go()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';

        var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element); 
      
        modal_content.innerHTML=content;
        $('#modal_content').i18n();
        modal.style.display = "block";
        layer.feature = {properties: {}};//inicjacja  miejsca na wpisanie atrybutów
        layer_q2a.addLayer(layer);
    }
    else if(qid== 'q2b' && type === 'marker'){
        save_layer="layer_q2b";
       var content =   modal_intro+modal_q2b +'<input type="button" data-i18n="[value]save_button" id="saveBtn" value="Save" onclick="saveData('+save_layer+'); "/>'
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="window.history.go()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';

        var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element); 

        modal_content.innerHTML=content;
        modal.style.display = "block";
        $('#modal_content').i18n();
        layer.feature = {properties: {}};//inicjacja  miejsca na wpisanie atrybutów
        layer_q2b.addLayer(layer);
    }
    else if(qid== 'q3a' && type === 'marker'){
        save_layer="layer_q3a";
        var content =   modal_intro+modal_q3a +'<input type="button" data-i18n="[value]save_button" id="saveBtn" value="Save" onclick="saveData('+save_layer+'); "/>'
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="window.history.go()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
      
        var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element); 

        modal_content.innerHTML=content;
        $('#modal_content').i18n();
        modal.style.display = "block";
        layer.feature = {properties: {}};//inicjacja  miejsca na wpisanie atrybutów
        layer_q3a.addLayer(layer);
    }
    else if(qid== 'q3b' && type === 'marker'){
        save_layer="layer_q3b";
        var content =   modal_intro+modal_q3b +'<input type="button" data-i18n="[value]save_button" id="saveBtn" value="Save" onclick="saveData('+save_layer+'); "/>'
                        +'<input type="button" id="cancelBtn" data-i18n="[value]cancel_button"   value="Cancel" onclick="window.history.go()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
        
        var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element); 

        modal_content.innerHTML=content;
        $('#modal_content').i18n();
        modal.style.display = "block";
        layer.feature = {properties: {}};//inicjacja  miejsca na wpisanie atrybutów
        layer_q3b.addLayer(layer);
    }
   else if(qid== 'q4a' && type === 'marker'){
        save_layer="layer_q4a";
        var content =   modal_intro+modal_q4a +'<input type="button" data-i18n="[value]save_button" id="saveBtn" value="Save" onclick="saveData('+save_layer+'); "/>'
                        +'<input type="button" id="cancelBtn"  data-i18n="[value]cancel_button"  value="Cancel" onclick="window.history.go()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
      
        var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element); 

        modal_content.innerHTML=content;
        $('#modal_content').i18n();
        modal.style.display = "block";
        layer.feature = {properties: {}};//inicjacja  miejsca na wpisanie atrybutów
        layer_q4a.addLayer(layer);
    }
    else if(qid== 'q4b' && type === 'marker'){
        save_layer="layer_q4b";
        var content =   modal_intro+modal_q4b +'<input type="button" data-i18n="[value]save_button" id="saveBtn" value="Save" onclick="saveData('+save_layer+'); "/>'
                        +'<input type="button" id="cancelBtn" data-i18n="[value]cancel_button"   value="Cancel" onclick="window.history.go()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
        
        var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element); 

        modal_content.innerHTML=content;
        modal.style.display = "block";
        $('#modal_content').i18n();
        layer.feature = {properties: {}};//inicjacja  miejsca na wpisanie atrybutów
        layer_q4b.addLayer(layer);
    }
    else if(qid== 'q5a' && type === 'marker'){
        save_layer="layer_q5a";
        var content =  modal_intro+modal_q5a+'<input type="button" data-i18n="[value]save_button" id="saveBtn" value="Save" onclick="saveData('+save_layer+'); "/>'
                        +'<input type="button" id="cancelBtn" data-i18n="[value]cancel_button"   value="Cancel" onclick="window.history.go()"/></center>'
                        +'</ul></div>'
                        +'</form></div>';
      
        var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element); 

        modal_content.innerHTML=content;
        modal.style.display = "block";
        $('#modal_content').i18n();
        layer.feature = {properties: {}};//inicjacja  miejsca na wpisanie atrybutów
        layer_q5a.addLayer(layer);
    }
    else if(qid== 'q5b' && type === 'marker'){
        save_layer="layer_q5b";
        var content =  modal_intro+modal_q5b+'<input type="button" data-i18n="[value]save_button"  id="saveBtn" value="Save" onclick="saveData('+save_layer+'); "/>'
                        +'<input type="button" id="cancelBtn" data-i18n="[value]cancel_button"   value="Cancel" onclick="window.history.go()"/></center>'
                        +'</ul></div>'
                        +'</form></div>'
        
        var old_element = document.getElementById("modal_content");//te trzy linijki kodu usuwają listenery dodane wcześniej do modala
        var new_element = old_element.cloneNode(true);
        old_element.parentNode.replaceChild(new_element, old_element); 

        modal_content.innerHTML=content;
        modal.style.display = "block";
        $('#modal_content').i18n();
        layer.feature = {properties: {}};//inicjacja  miejsca na wpisanie atrybutów
        layer_q5b.addLayer(layer);
    };  

});

L.control.layers({
         '<?php echo L::satellite_title ?>':MapTilerSattelite,
         '<?php echo L::topo_title ?>':OpenStreetMap_Mapnik.addTo(map),

         
        },{},{position:'topleft'}).addTo(map);//musi być pusty obiekt żeby rozpoznał opcje

map.addControl( new L.Control.Search({
    url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
    jsonpParam: 'json_callback',
    propertyName: 'display_name',
    propertyLoc: ['lat','lon'],
    marker: L.circleMarker([0,0],{radius:20}),
    autoCollapse: true,
    autoType: false,
    minLength: 2,
    position: 'topleft',
    textPlaceholder: '<?php echo L::search_tooltip ?>'
  }) );

L.control.zoom({position:'topleft'}).addTo(map);

L.control.scale().addTo(map);



map.on('draw:edited', function(event) {
    var layers = event.layers;
    layer_to_save=eval('layer_'+qid); 
    layers.eachLayer( function (layer) {
        layer_to_save.addLayer(layer);
        layer_to_save.editLayer(layer);
        layer_to_save.save()
        });
});

map.on('draw:deleted', function(event) {
    var layers = event.layers;
    layer_to_save=eval('layer_'+qid); 
    layer_to_save.save()
});

map.on('draw:drawstop', function(event) {
   //editing=false;
   //window.history.go(); 
   // layer=event.layer;
   // console.log(event;
});
map.on('draw:editstart', function(event) {
   editing=true;
});


    var pointDrawer = new L.Draw.Marker(map);  
    function drawPoint(){   
    pointDrawer.enable();
    }

  
    var place_name = "";
    var justification = "";
    var solutions = "";
    var other = "";



    
function saveData(save_layer){
    var place_name = $('#place_name').val(); 
    var other = $('#other').val(); 
    var solutions = $('#solutions').val(); 
    var justification = $('#justification').val(); 
    var j1 = $("[name='j1']").val();
    var j2 = $("[name='j2']").val();
    var j3 = $("[name='j3']").val();

    console.log(j1);
        
    var drawings = save_layer.getLayers();  

    drawings[drawings.length - 1].feature.properties.region = region; 
    drawings[drawings.length - 1].feature.properties.place_name = place_name; 
    drawings[drawings.length - 1].feature.properties.s = solutions; 
    drawings[drawings.length - 1].feature.properties.j = justification; 
    drawings[drawings.length - 1].feature.properties.j1 = j1; 
    drawings[drawings.length - 1].feature.properties.j2 = j2; 
    drawings[drawings.length - 1].feature.properties.j3 = j3; 

    drawings[drawings.length - 1].feature.properties.other = other; 

    drawings[drawings.length - 1].feature.properties.qid = qid; 
    drawings[drawings.length - 1].feature.properties.add_time = aktualnyCzas();
    drawings[drawings.length - 1].feature.properties.zoom = zoom; 
    save_layer.save();
    map.closePopup();
    modal.style.display = 'none';
    sidebar.open("home");
    pointDrawer.enable();

  
    }

    
    function aktualnyCzas(){
    var currentdate = new Date(); 
    var czas =    currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
    return czas;
    }

function showQuestion(question) {
  var x = document.getElementById(question);
  $(".box_pytania:not(#"+question+")").css("display", "none");
  $("#"+question).css("display", "block");
  
} 




  var draw_options={marker:false, polygon:false, circle:false, polyline:false, rectangle:false}

  var options = {position: 'topleft',draw: draw_options, edit: {featureGroup: layer_q1a,remove: true } };
  var q1aEdit = new L.Control.Draw(options);

  var options = {position: 'topleft',draw:  draw_options, edit: {featureGroup: layer_q1b,remove: true } };
  var q1bEdit = new L.Control.Draw(options);

  var options = {position: 'topleft',draw: draw_options, edit: {featureGroup: layer_q2a,remove: true } };
  var q2aEdit = new L.Control.Draw(options);

  var options = {position: 'topleft',draw: draw_options, edit: {featureGroup: layer_q2b,remove: true } };
  var q2bEdit = new L.Control.Draw(options);

  var options = {position: 'topleft',draw: draw_options, edit: {featureGroup: layer_q3a,remove: true } };
  var q3aEdit = new L.Control.Draw(options);

  var options = {position: 'topleft',draw: draw_options, edit: {featureGroup: layer_q3b,remove: true } };
  var q3bEdit = new L.Control.Draw(options);

  var options = {position: 'topleft',draw: draw_options, edit: {featureGroup: layer_q4a,remove: true } };
  var q4aEdit = new L.Control.Draw(options);

  var options = {position: 'topleft',draw: draw_options, edit: {featureGroup: layer_q4b,remove: true } };
  var q4bEdit = new L.Control.Draw(options);

  var options = {position: 'topleft',draw: draw_options, edit: {featureGroup: layer_q5a,remove: true } };
  var q5aEdit = new L.Control.Draw(options);

  var options = {position: 'topleft',draw: draw_options, edit: {featureGroup: layer_q5b,remove: true } };
  var q5bEdit = new L.Control.Draw(options);


var editControls=[q1aEdit, q1bEdit, q2aEdit,q2bEdit,q3aEdit,q3bEdit,q4aEdit,q4bEdit,q5aEdit,q5bEdit]; 

editLayer(q1aEdit); 
pointDrawer.disable();



function showLayers(layers){ 
    editControls.forEach(control=>map.removeControl(control)); //usuwa kontrolki edycji
    map.eachLayer(function (layer) {
      warstwy_pytan.forEach(layer=>map.removeLayer(layer));
    });
      layers.forEach(layer=>map.addLayer(layer));
}


function editLayer(editControl,icon){ 
      if (mode=="draw") {
      pointDrawer.disable();
      pointDrawer.setOptions( {icon:icon});
      pointDrawer.enable();
      } else {
      editControls.forEach(control=>map.removeControl(control));
      map.addControl(editControl);
      }
}
//chowa wszystkie kontrolki edycjij
function hideControls(){ 
      editControls.forEach(control=>map.removeControl(control));
}

$('.button1').click(function(){
    var $this = $(this);
    if (!$this.hasClass('button1Active')) {
        $('.button1').removeClass('button1Active')
        $this.addClass('button1Active'); 
    }
    else if ($this.hasClass('button1Active')){
        $this.removeClass('button1Active');
        qid="none";
        pointDrawer.disable();
    }
})

$('.btn').click(function(){
    var $this = $(this);
    if (!$this.hasClass('button1Active')) {
        $('.btn').removeClass('button1Active')
        $this.addClass('button1Active');
    }
})

$('#togBtn').click(function(){
    var $this = $(this);
    if ($this.is(':checked')) {
      console.log("draw");
      mode="draw";
      editControls.forEach(control=>map.removeControl(control));
      $('.button1').removeClass('button1Active')
      qid="none";
    } else {
      console.log("edit");
      pointDrawer.disable();
      mode="edit";
      $('.button1').removeClass('button1Active')
      qid="none";
    }
})



$(document).keyup(function(e) {
  if (e.keyCode === 27)  $('.button1').removeClass('button1Active'); qid="none"; // esc
});



function eventFire(el, etype){
  if (el.fireEvent) {
    el.fireEvent('on' + etype);
  } else {
    var evObj = document.createEvent('Events');
    evObj.initEvent(etype, true, false);
    el.dispatchEvent(evObj);
  }
}

function savePropertiesSinglePoint(layer,id) { 
  layer.eachLayer( function (point) {
       if(point.feature.id==id){
        layer.addLayer(point);
        layer.editLayer(point);
        layer.save();
    }
     });
    modal.style.display = "none";
};

function closeModal() {
  modal.style.display = "none";
}

function showProperty(property){
  if (typeof property !== 'undefined'){

    switch (property) {
    case 'trees and green areas':
    value=$.i18n( 'dropdownq1a1' );
    return value;
    break;
     
    case 'natural water areas (e.g. lakes, ponds, rivers, streams)':
    value=$.i18n( 'dropdownq1a2');
    return value;
    break;

    case 'water installations (e.g. fountains, swimming pools, water dispensers, irrigating/sprinkling systems)':
    value=$.i18n( 'dropdownq1a3');
    return value;
    break;

    case 'devices or installations that give shade/cover (sun umbrellas, roofs)':
    value=$.i18n( 'dropdownq1a4');
    return value;
    break;

    case 'fresh air flow':
    value=$.i18n( 'dropdownq1a5');
    return value;
    break;

    case 'lack of trees and green areas':
    value=$.i18n( 'dropdownq1b1');
    return value;
    break;

    case 'limited access to natural water areas (e.g. lakes, ponds, rivers, streams)':
    value=$.i18n( 'dropdownq1b2');
    return value;
    break;

    case 'insufficient number of installations (e.g. fountain, water dispensers, swimming pool)':
    value=$.i18n( 'dropdownq1b3');
    return value;
    break;

    case 'insufficient number of devices or installations  that give shade/cover (sun umbrellas, roofs)':
    value=$.i18n( 'dropdownq1b4');
    return value;
    break;

    case 'lack of fresh air flow':
    value=$.i18n( 'dropdownq1b5');
    return value;
    break;

    case 'natural water bodies and watercourses capturing and storing water (e.g. ponds, creeks, ditches)':
    value=$.i18n( 'dropdownq2a1');
    return value;
    break;

    case 'tools or installations capturing and/or storing water (e.g. retention basins, rainwater drainage)':
    value=$.i18n( 'dropdownq2a2');
    return value;
    break;

    case 'devices or installations of coastal, riverside and shore zones preventing erosion, floods(e.g. dams, dykes/embankments, riverbed vegetation)':
    value=$.i18n( 'dropdownq2a3');
    return value;
    break;

    case 'natural areas protecting from sea rise/river flooding (e.g. permeable soils, forests)':
    value=$.i18n( 'dropdownq2a4');
    return value;
    break;

    case 'vegetation reducing the occurrence of draughts and improving water retention':
    value=$.i18n( 'dropdownq2a5');
    return value;
    break;

    case 'insufficient number of water bodies and watercourses capturing and storing water':
    value=$.i18n( 'dropdownq2b1');
    return value;
    break;

    case 'limited access to tools or installations capturing and/or storing water (e.g. rainwater drainage, irrigating systems, dams)':
    value=$.i18n( 'dropdownq2b2');
    return value;
    break;

    case 'lack of devices or installations of coastal and riparian zones (preventing erosion, floods)':
    value=$.i18n( 'dropdownq2b3');
    return value;
    break;

    case 'limited access to natural areas protecting from sea rise/river flooding (e.g. permeable soils, forests)':
    value=$.i18n( 'dropdownq2b4');
    return value;
    break;

    case 'lack of vegetation reducing the occurrence of draughts and improving water retention':
    value=$.i18n( 'dropdownq2b5');
    return value;
    break;

    case 'protection against wind damage through buildings':
    value=$.i18n( 'dropdownq3a1');
    return value;
    break;

    case 'protection against wind damage through bushes, hedges, trees':
    value=$.i18n( 'dropdownq3a2');
    return value;
    break;

    case 'solutions preventing wind erosion (e.g. permanent vegetation, natural barriers, shelter belts)':
    value=$.i18n( 'dropdownq3a3');
    return value;
    break;

    case 'promoted/visible wind energy solutions':
    value=$.i18n( 'dropdownq3a4');
    return value;
    break;

    case 'wind event early warning systems':
    value=$.i18n( 'dropdownq3a5');
    return value;
    break;

    case 'insufficient protection against wind damage through buildings':
    value=$.i18n( 'dropdownq3b1');
    return value;
    break;

    case 'bad condition or missing of trees, bushes or hedges':
    value=$.i18n( 'dropdownq3b2');
    return value;
    break;

    case 'lack of solutions preventing wind erosion (e.g. natural barriers, shelter belts)':
    value=$.i18n( 'dropdownq3b3');
    return value;
    break;

    case 'insufficiently promoted/visible wind energy solutions':
    value=$.i18n( 'dropdownq3b4');
    return value;
    break;

    case 'lack of wind event early warning systems':
    value=$.i18n( 'dropdownq3b5');
    return value;
    break;

    case 'trees and green areas':
    value=$.i18n( 'dropdownq4a1');
    return value;
    break;

    case 'devices or installations limiting the emission of pollutants (dust barriers, devices on chimneys)':
    value=$.i18n( 'dropdownq4a2');
    return value;
    break;

    case 'modern, low-emission heating of surrounding buildings (heating network, gas heating, renewable energy sources)':
    value=$.i18n( 'dropdownq4a3');
    return value;
    break;

    case 'policies and infrastructures reducing car traffic (public transport, bicycle roads, pedestrian zones)':
    value=$.i18n( 'dropdownq4a4');
    return value;
    break;

    case 'lack of air pollutants (traffic, farming or industrial pollutants)':
    value=$.i18n( 'dropdownq4a5');
    return value;
    break;

    case 'insufficient number of trees and green areas':
    value=$.i18n( 'dropdownq4b1');
    return value;
    break;

    case 'lack of devices or installations limiting the emission of pollutants (dust barriers, devices on chimneys)':
    value=$.i18n( 'dropdownq4b2');
    return value;
    break;

    case 'limited access to modern, low-emission heating of surrounding buildings (heating network, gas heating, renewable energy sources)':
    value=$.i18n( 'dropdownq4b3');
    return value;
    break;

    case 'insufficient number of policies and infrastructures reducing car traffic (public transport, bicycle roads, pedestrian zones)':
    value=$.i18n( 'dropdownq4b4');
    return value;
    break;

    case 'presence of air pollutants (traffic, farming or industrial pollutants)':
    value=$.i18n( 'dropdownq4b5');
    return value;
    break;

    case 'actions against soil erosion/ landslides (permanent vegetation, tree planting, balks, mid-field afforestation and bushes)':
    value=$.i18n( 'dropdownq5a1');
    return value;
    break;

    case 'actions for expansion of permeable soil surfaces in cities (protecting from flooding or heat waves)':
    value=$.i18n( 'dropdownq5a2');
    return value;
    break;

    case 'no sealed ground (parking lots, asphalt, concrete)':
    value=$.i18n( 'dropdownq5a3');
    return value;
    break;

    case 'sustainable agriculture techniques (crop rotation, organic farming, limited plowing, sustainable fertilisation)':
    value=$.i18n( 'dropdownq5a4');
    return value;
    break;

    case 'lack of actions against soil erosion/landslides (tree planting, balks, mid-field afforestation and bushes':
    value=$.i18n( 'dropdownq5b1');
    return value;
    break;

    case 'high level of sealed surfaces (parking lots, asphalt, concrete)':
    value=$.i18n( 'dropdownq5b2');
    return value;
    break;

    case 'insufficient number of actions for expansion of permeable soil surfaces in cities (protecting from flooding or heat waves)':
    value=$.i18n( 'dropdownq5b3');
    return value;
    break;

    case 'limited access to sustainable agriculture techniques, (crop rotation, organic farming, limited plowing, sustainable fertilisation)':
    value=$.i18n( 'dropdownq5b4');
    return value;
    break;
     
    default:
    value="";
    return value;
    return property;
    }

  }else{
    puste="";
    return puste;
        // return property;

  }


}


function zamknijSidebar(){
  if ($(window).width()<780){
    sidebar.close() 
  }
}


function setModalValues(layer){
 
  $("[name='j1']").val(layer.feature.properties.j1);
  $("[name='j2']").val(layer.feature.properties.j2);
  $("[name='j3']").val(layer.feature.properties.j3);

  $("input[id=other]").val(layer.feature.properties.other);
  $("input[id=place_name]").val(layer.feature.properties.place_name);     
  $("#solutions").html(layer.feature.properties.s); 
}


function zmianaWartosci (layer) {
      var other = $('#other').val(); 
      var place_name = $('#place_name').val()
      //var solutions = $('#solutions').val();

      var pre_j1 = $("input[type='radio'][name='j1']:checked");
          if (pre_j1.length > 0) {
      j1 = pre_j1.val();
      }
      var pre_j2 = $("input[type='radio'][name='j2']:checked");
          if (pre_j2.length > 0) {
      j2 = pre_j2.val();
      }
      var pre_j3 = $("input[type='radio'][name='j3']:checked");
          if (pre_j3.length > 0) {
      j3 = pre_j3.val();
      }
      var pre_j4 = $("input[type='radio'][name='j4']:checked");
          if (pre_j4.length > 0) {
      j4 = pre_j4.val();
      } 
      var pre_j5 = $("input[type='radio'][name='j5']:checked");
          if (pre_j5.length > 0) {
      j5 = pre_j5.val();
      }
     layer.feature.properties.place_name = place_name;
     layer.feature.properties.j1 = j1; 
     layer.feature.properties.j2 = j2; 
     layer.feature.properties.j3 = j3; 
     layer.feature.properties.j4 = j4; 
     layer.feature.properties.j5 = j5; 
     layer.feature.properties.other = other;
     //layer.feature.properties.s = solutions;  
};

//akordeon
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

map.addControl(q1aEdit); 

        var intro = introJs();
          intro.setOptions({
            steps: [
              { 
                intro:'<center><h4><?php echo L::help_title; ?></h4></center>'+'<?php echo L::help1; ?><br/><br/><img style="vertical-align:middle;" src="ikony/yticon.png"/> <span style="font-size: 15px; vertical-align:middle;"><a class="ytlink" href="https://youtu.be/Q8fufqKIR48"><?php echo L::tutorial_video1; ?><a/></span>'
              },
              {
                element: document.querySelector('.sidebar-pane'),
                intro: '<?php echo L::help2; ?>',
                position:'right'
              },
              {
                element: document.querySelector('.intro1'),
                intro: '<?php echo L::help3a; ?>',
                position:'right'
              },
              {
                element: document.querySelector('.leaflet-control-zoom'),
                intro: '<?php echo L::help4 ?>',
                position:'right'
              },
              {
                element: document.querySelector('.search-button'),
                intro: '<?php echo L::help4a ?>',
                position:'right'
              },
              {
                element: document.querySelector('.leaflet-control-layers-toggle'),
                intro: '<?php echo L::help4b ?>',
                position:'right'
              },
              {
                element: document.querySelector('.slider'),
                intro: '<?php echo L::help5a ?>',
                position:'right'
              },
              {
                element: document.querySelector('.leaflet-draw-toolbar-top'),
                intro: '<?php echo L::help5b ?>',
                position:'right'
              },
              {
                element: document.querySelector('.leaflet-draw-edit-edit'),
                intro: '<?php echo L::help6a ?>',
                position:'right'
              },
              {
                element: document.querySelector('.leaflet-draw-edit-remove'),
                intro: '<?php echo L::help7 ?>',
                position:'right'
              },
              {
                element: document.querySelector('.sidebar-tabs'),
                intro: '<?php echo L::help8 ?>',
                position:'right'
              },
              {
                intro: '<?php echo L::help9 ?>'
              }
            ],
            nextLabel:'<?php echo L::intro_next ?>',
            prevLabel:'<?php echo L::intro_prev ?>',
            skipLabel:'<?php echo L::intro_skip ?>',
            doneLabel:'<?php echo L::intro_done ?>'
          });


window.addEventListener('load', function () {
    var doneTour = localStorage.getItem('EventTour') === 'Completed';
    if (doneTour) {
        editControls.forEach(control=>map.removeControl(control));
        return;
    }
    else {
        intro.start()
        intro.oncomplete(function () {
            localStorage.setItem('EventTour', 'Completed');
            editControls.forEach(control=>map.removeControl(control));

        });

        intro.onexit(function () {
            localStorage.setItem('EventTour', 'Completed');
            editControls.forEach(control=>map.removeControl(control));
        });
    }
});




function feedbackForm(target){
  var doneFeedback = localStorage.getItem('FeedbackForm') === 'Completed';
    if (doneFeedback) {
         window.location.href = target;  
    }
    else {
        feedback_modal.style.display = "block";
    }
  
};








</script>

</script>


    </body>
</html>
