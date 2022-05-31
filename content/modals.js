content_minimal='"<b>" + event.layer.feature.properties.place_name + "</b>"';

content_negative='"<b>" + showProperty(event.layer.feature.properties.place_name) + "</b></br><b><span data-i18n=why_selected></span></b>" + showProperty(event.layer.feature.properties.j)+"</br></br><b><span data-i18n=proposed_solution></span></b>" + showProperty(event.layer.feature.properties.s)'

modal_intro="<span data-i18n=[html]modal_intro></span>"

popup_q1a='"<b>"+event.layer.feature.properties.place_name + "</b></br><span data-i18n=popup_justification></span>'
+' </br><b>1. "+showProperty(event.layer.feature.properties.j1)+", </b>' //tutaj do zmiany wszędzie na funkce ktora wyswietla tylko jak nie jest undefined 
+'</br><b>2. "+showProperty(event.layer.feature.properties.j2)+", </b>'
+'</br><b>3. "+showProperty(event.layer.feature.properties.j3)+"</b>"'

popup_rank='"<b>"+event.layer.feature.properties.place_name + "</b></br><span data-i18n=popup_justification></span>'
+' </br><b>1. "+showProperty(event.layer.feature.properties.j1)+" </b>' //tutaj do zmiany wszędzie na funkce ktora wyswietla tylko jak nie jest undefined 
+'</br><b>2. "+showProperty(event.layer.feature.properties.j2)+" </b>'
+'</br><b>3. "+showProperty(event.layer.feature.properties.j3)+"</b>"'

popup_rank_negative='"<b>"+event.layer.feature.properties.place_name + "</b></br><span data-i18n=popup_justification></span>'
+' </br><b>1. "+showProperty(event.layer.feature.properties.j1)+" </b>' //tutaj do zmiany wszędzie na funkce ktora wyswietla tylko jak nie jest undefined 
+'</br><b>2. "+showProperty(event.layer.feature.properties.j2)+" </b>'
+'</br><b>3. "+showProperty(event.layer.feature.properties.j3)+"</b>'
+'</br><br/> <span data-i18n=solutions_proposal></span> <b>"+event.layer.feature.properties.s+"</b>"'


// popup_q1a='"<b>"+event.layer.feature.properties.place_name + "</b></br><span data-i18n=why_selected></span>'
// +' </br> <span data-i18n=q1a1></span>: <b>"+showProperty(event.layer.feature.properties.j1)+"</b>' //tutaj do zmiany wszędzie na funkce ktora wyswietla tylko jak nie jest undefined 
// +'</br> <span data-i18n=pq1a2></span>: <b>"+showProperty(event.layer.feature.properties.j2)+"</b>'
// +'</br> <span data-i18n=pq1a3></span>: <b>"+showProperty(event.layer.feature.properties.j3)+"</b>'
// +'</br> <span data-i18n=pq1a4></span>: <b>"+showProperty(event.layer.feature.properties.j4)+"</b>'
// +'</br> <span data-i18n=pq1a5></span>: <b>"+showProperty(event.layer.feature.properties.j5)+"</b>"'

popup_q1b='"<b>"+event.layer.feature.properties.place_name + "</b></br><span data-i18n=why_selected></span>'
+' </br> <span data-i18n=q1a1></span>: <b>"+showProperty(event.layer.feature.properties.j1)+"</b>' //tutaj do zmiany wszędzie na funkce ktora wyswietla tylko jak nie jest undefined 
+'</br> <span data-i18n=pq1a2></span>: <b>"+showProperty(event.layer.feature.properties.j2)+"</b>'
+'</br> <span data-i18n=pq1a3></span>: <b>"+showProperty(event.layer.feature.properties.j3)+"</b>'
+'</br> <span data-i18n=pq1a4></span>: <b>"+showProperty(event.layer.feature.properties.j4)+"</b>'
+'</br> <span data-i18n=pq1a5></span>: <b>"+showProperty(event.layer.feature.properties.j5)+"</b>'
+'</br> <span data-i18n=solutions_proposal></span> <b>"+showProperty(event.layer.feature.properties.s)+"</b>"'

popup_info='<hr/></br><b><span style="background-color:#ffd699;" data-i18n=popup_edit_info></span></b>'

// likert_scale1='<li><input type="radio" name="j1"  value="are non existent"><label data-i18n=likert1></label></li>'
//                 +'<li><input type="radio" name="j1"  value="are barely present"><label data-i18n=likert2 ></label></li>'
//                 +'<li><input type="radio" name="j1"  value="are present" ><label data-i18n=likert3 ></label></li>'
//                 +'<li><input type="radio" name="j1"  value="are numerous" ><label data-i18n=likert4 ></label></li>'
//                 +'<li><input type="radio" name="j1"  value="are very numerous" ><label data-i18n=likert5 ></label></li>'
// likert_scale2='<li><input type="radio" name="j2"  value="are non existent"><label data-i18n=likert1></label></li>'
//                 +'<li><input type="radio" name="j2"  value="are barely present"><label data-i18n=likert2 ></label></li>'
//                 +'<li><input type="radio" name="j2"  value="are present" ><label data-i18n=likert3 ></label></li>'
//                 +'<li><input type="radio" name="j2"  value="are numerous" ><label data-i18n=likert4 ></label></li>'
//                 +'<li><input type="radio" name="j2"  value="are very numerous" ><label data-i18n=likert5 ></label></li>'
// likert_scale3='<li><input type="radio" name="j3"  value="are non existent"><label data-i18n=likert1></label></li>'
//                 +'<li><input type="radio" name="j3"  value="are barely present"><label data-i18n=likert2 ></label></li>'
//                 +'<li><input type="radio" name="j3"  value="are present" ><label data-i18n=likert3 ></label></li>'
//                 +'<li><input type="radio" name="j3"  value="are numerous" ><label data-i18n=likert4 ></label></li>'
//                 +'<li><input type="radio" name="j3"  value="are very numerous" ><label data-i18n=likert5 ></label></li>'
// likert_scale4='<li><input type="radio" name="j4"  value="are non existent"><label data-i18n=likert1></label></li>'
//                 +'<li><input type="radio" name="j4"  value="are barely present"><label data-i18n=likert2 ></label></li>'
//                 +'<li><input type="radio" name="j4"  value="are present" ><label data-i18n=likert3 ></label></li>'
//                 +'<li><input type="radio" name="j4"  value="are numerous" ><label data-i18n=likert4 ></label></li>'
//                 +'<li><input type="radio" name="j4"  value="are very numerous" ><label data-i18n=likert5 ></label></li>'
// likert_scale5='<li><input type="radio" name="j5"  value="are non existent"><label data-i18n=likert1></label></li>'
//                 +'<li><input type="radio" name="j5"  value="are barely present"><label data-i18n=likert2 ></label></li>'
//                 +'<li><input type="radio" name="j5"  value="are present" ><label data-i18n=likert3 ></label></li>'
//                 +'<li><input type="radio" name="j5"  value="are numerous" ><label data-i18n=likert4 ></label></li>'
//                 +'<li><input type="radio" name="j5"  value="are very numerous" ><label data-i18n=likert5 ></label></li>'

// likert_scale5a='<li><input type="radio" name="j5"  value="is not organized/managed"><label data-i18n=[html]likert1a ></label></li>'
//                 +'<li><input type="radio" name="j5"  value="is poorly organized/managed"><label data-i18n=[html]likert2a ></label></li>'
//                 +'<li><input type="radio" name="j5"  value="is partly organized/managed" ><label data-i18n=[html]likert3a ></label></li>'
//                 +'<li><input type="radio" name="j5"  value="is well organized/managed" ><label data-i18n=[html]likert4a ></label></li>'
//                 +'<li><input type="radio" name="j5"  value="is very well organized/managed" ><label data-i18n=[html]likert5a ></label></li>'

// likert_scale1b='<li><input type="radio" name="j1"  value="is ineffective (non-existent)"><label data-i18n=likert1b ></label></li>'
//                 +'<li><input type="radio" name="j1"  value="is low effective"><label data-i18n=likert2b ></label></li>'
//                 +'<li><input type="radio" name="j1"  value="is medium effective" ><label data-i18n=likert3b ></label></li>'
//                 +'<li><input type="radio" name="j1"  value="is effective ><label data-i18n=likert4b ></label></li>'
//                 +'<li><input type="radio" name="j1"  value="is very effective" ><label data-i18n=likert5b ></label></li>'

// likert_scale2b= '<li><input type="radio" name="j2"  value="is ineffective (non-existent)"><label data-i18n=likert1b ></label></li>'
//                 +'<li><input type="radio" name="j2"  value="is low effective"><label data-i18n=likert2b ></label></li>'
//                 +'<li><input type="radio" name="j2"  value="is medium effective" ><label data-i18n=likert3b ></label></li>'
//                 +'<li><input type="radio" name="j2"  value="is effective ><label data-i18n=likert4b ></label></li>'
//                 +'<li><input type="radio" name="j2"  value="is very effective" ><label data-i18n=likert5b ></label></li>'

// likert_scale4c='<li><input type="radio" name="j4"  value="are not introduced (non-existent)"><label data-i18n=likert1c></label></li>'
//                 +'<li><input type="radio" name="j4"  value="are poorly introduced"><label data-i18n=likert2c ></label></li>'
//                 +'<li><input type="radio" name="j4"  value="are partly introduced" ><label data-i18n=likert3c ></label></li>'
//                 +'<li><input type="radio" name="j4"  value="are well introduced " ><label data-i18n=likert4c ></label></li>'
//                 +'<li><input type="radio" name="j4"  value="are very well introduced" ><label data-i18n=likert5c ></label></li>'

// likert_scale3d='<li><input type="radio" name="j3"  value="are not implemented (non-existent)"><label data-i18n=likert1d></label></li>'
//                 +'<li><input type="radio" name="j3"  value="are poorly implemented"><label data-i18n=likert2d ></label></li>'
//                 +'<li><input type="radio" name="j3"  value="are partly implemented" ><label data-i18n=likert3d ></label></li>'
//                 +'<li><input type="radio" name="j3"  value="are well implemented" ><label data-i18n=likert4d ></label></li>'
//                 +'<li><input type="radio" name="j3"  value="are very well implemented" ><label data-i18n=likert5d ></label></li>'


dropdown_q1a=   '<option value="trees and green areas" data-i18n="dropdownq1a1" ></option>'
                +'<option value="natural water areas (e.g. lakes, ponds, rivers, streams)" data-i18n="dropdownq1a2" > </option>'
                +'<option value="water installations (e.g. fountains, swimming pools, water dispensers, irrigating/sprinkling systems)" data-i18n="dropdownq1a3" ></option>'
                +'<option value="devices or installations that give shade/cover (sun umbrellas, roofs)" data-i18n="dropdownq1a4" ></option>'
                +'<option value="fresh air flow" data-i18n="dropdownq1a5" ></option>'                  

dropdown_q1b=   '<option value="lack of trees and green areas" data-i18n="dropdownq1b1" ></option>'
                +'<option value="limited access to natural water areas (e.g. lakes, ponds, rivers, streams)" data-i18n="dropdownq1b2" > </option>'
                +'<option value="insufficient number of installations (e.g. fountain, water dispensers, swimming pool)" data-i18n="dropdownq1b3" ></option>'
                +'<option value="insufficient number of devices or installations  that give shade/cover (sun umbrellas, roofs)" data-i18n="dropdownq1b4" ></option>'
                +'<option value="lack of fresh air flow" data-i18n="dropdownq1b5" ></option>' 

dropdown_q2a=   '<option value="natural water bodies and watercourses capturing and storing water (e.g. ponds, creeks, ditches)" data-i18n="dropdownq2a1" ></option>'
                +'<option value="tools or installations capturing and/or storing water (e.g. retention basins, rainwater drainage)" data-i18n="dropdownq2a2" > </option>'
                +'<option value="devices or installations of coastal, riverside and shore zones preventing erosion, floods(e.g. dams, dykes/embankments, riverbed vegetation)" data-i18n="dropdownq2a3" ></option>'
                +'<option value="natural areas protecting from sea rise/river flooding (e.g. permeable soils, forests)" data-i18n="dropdownq2a4" ></option>'
                +'<option value="vegetation reducing the occurrence of draughts and improving water retention" data-i18n="dropdownq2a5" ></option>'  

dropdown_q2b=   '<option value="insufficient number of water bodies and watercourses capturing and storing water (e.g. ponds, creeks, ditches)" data-i18n="dropdownq2b1" ></option>'
                +'<option value="limited access to tools or installations capturing and/or storing water (e.g. retention basins, rainwater drainage)" data-i18n="dropdownq2b2" > </option>'
                +'<option value="lack of devices or installations of coastal, riverside and shore zones preventing erosion, floods(e.g. dams, dykes/embankments, riverbed vegetation)" data-i18n="dropdownq2b3" ></option>'
                +'<option value="limited access to natural areas protecting from sea rise/river flooding (e.g. permeable soils, forests)" data-i18n="dropdownq2b4" ></option>'
                +'<option value="lack of vegetation reducing the occurrence of draughts and improving water retention" data-i18n="dropdownq2b5" ></option>'

dropdown_q3a=   '<option value="protection against wind damage through buildings " data-i18n="dropdownq3a1" ></option>'
                +'<option value="protection against wind damage through bushes, hedges, trees " data-i18n="dropdownq3a2" > </option>'
                +'<option value="solutions preventing wind erosion (e.g. permanent vegetation, natural barriers, shelter belts) " data-i18n="dropdownq3a3" ></option>'
                +'<option value="promoted/visible wind energy solutions" data-i18n="dropdownq3a4" ></option>'
                +'<option value="wind event early warning systems" data-i18n="dropdownq3a5" ></option>'  

dropdown_q3b=   '<option value="insufficient protection against wind damage through buildings" data-i18n="dropdownq3b1" ></option>'
                +'<option value="bad condition or missing of trees, bushes or hedges" data-i18n="dropdownq3b2" > </option>'
                +'<option value="lack of solutions preventing wind erosion (e.g. natural barriers, shelter belts)" data-i18n="dropdownq3b3" ></option>'
                +'<option value="insufficiently promoted/visible wind energy solutions" data-i18n="dropdownq3b4" ></option>'
                +'<option value="lack of wind event early warning systems" data-i18n="dropdownq3b5" ></option>'  

dropdown_q4a=   '<option value="trees and green areas" data-i18n="dropdownq4a1" ></option>'
                +'<option value="devices or installations limiting the emission of pollutants (dust barriers, devices on chimneys)" data-i18n="dropdownq4a2" > </option>'
                +'<option value="modern, low-emission heating of surrounding buildings (heating network, gas heating, renewable energy sources)" data-i18n="dropdownq4a3" ></option>'
                +'<option value="policies and infrastructures reducing car traffic (public transport, bicycle roads, pedestrian zones)" data-i18n="dropdownq4a4" ></option>'
                +'<option value="lack of air pollutants (traffic, farming or industrial pollutants)" data-i18n="dropdownq4a5" ></option>'  

dropdown_q4b=   '<option value="insufficient number of trees and green areas" data-i18n="dropdownq4b1" ></option>'
                +'<option value="lack of devices or installations limiting the emission of pollutants (dust barriers, devices on chimneys)" data-i18n="dropdownq4b2" > </option>'
                +'<option value="limited access to modern, low-emission heating of surrounding buildings (heating network, gas heating, renewable energy sources)" data-i18n="dropdownq4b3" ></option>'
                +'<option value="insufficient number of policies and infrastructures reducing car traffic (public transport, bicycle roads, pedestrian zones)" data-i18n="dropdownq4b4" ></option>'
                +'<option value="presence of air pollutants (traffic, farming or industrial pollutants)" data-i18n="dropdownq4b5" ></option>'  

dropdown_q5a=   '<option value="actions against soil erosion/ landslides (permanent vegetation, tree planting, balks, mid-field afforestation and bushes)" data-i18n="dropdownq5a1" ></option>'
                +'<option value="actions for expansion of permeable soil surfaces in cities (protecting from flooding or heat waves)" data-i18n="dropdownq5a2" > </option>'
                +'<option value="no sealed ground (parking lots, asphalt, concrete)" data-i18n="dropdownq5a3" ></option>'
                +'<option value="sustainable agriculture techniques (crop rotation, organic farming, limited plowing, sustainable fertilisation)" data-i18n="dropdownq5a4" ></option>'  

dropdown_q5b=   '<option value="lack of actions against soil erosion/landslides (tree planting, balks, mid-field afforestation and bushes" data-i18n="dropdownq5b1" ></option>'
                +'<option value="high level of sealed surfaces (parking lots, asphalt, concrete)" data-i18n="dropdownq5b2" > </option>'
                +'<option value="insufficient number of actions for expansion of permeable soil surfaces in cities (protecting from flooding or heat waves)" data-i18n="dropdownq5b3" ></option>'
                 +'<option value="limited access to sustainable agriculture techniques, (crop rotation, organic farming, limited plowing, sustainable fertilisation)" data-i18n="dropdownq5b4" ></option>'  

var modal_q1a = '<div class="wrap"><form action="">'
                        +'</br><label class="statement"  data-i18n="intro_positive_temperature" >:</label> <br/>'
                        +'<img src="ikony/one.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j1">'
                        +'<option value="no_answer" data-i18n="dropdown1"></option>'
                        +dropdown_q1a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/two.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j2">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q1a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/three.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j3">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q1a
                        +'</select>'
                        +'</br></br>'
                        +'<label class="likert_statement" data-i18n="other_temperature_positive">:</label>'
                        +'<input id="other" type="text"/></br></br>'
                        +'<label class="statement" data-i18n="place_name_question"></label>'
                        +'<input id="place_name" type="text" /></br></br><center>'

var modal_q1b = '<div class="wrap"><form action="">'
                        +'</br><label class="statement"  data-i18n="intro_negative_temperature" >:</label> <br/>'
                        +'<img src="ikony/one.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j1">'
                        +'<option value="no_answer" data-i18n="dropdown1"></option>'
                        +dropdown_q1b
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/two.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j2">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q1b
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/three.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j3">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q1b
                        +'</select>'
                        +'</br></br>'
                        +'<label class="likert_statement" data-i18n="other_temperature_negative">:</label>'
                        +'<input id="other" type="text"/></br></br>'
                        +'<label class="statement" data-i18n=solutions_temperature2 ></label> <br/>'
                       +' <textarea id="solutions"></textarea> </br></br>'
                        +'<label class="statement" data-i18n="place_name_question"></label>'
                        +'<input id="place_name" type="text" /></br></br><center>'



var modal_q2a =   '<div class="wrap"><form action="">'
                        +'</br><label class="statement" data-i18n="intro_positive_water"></label> <br/>'
                        +'<img src="ikony/one.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j1">'
                        +'<option value="no_answer" data-i18n="dropdown1"></option>'
                        +dropdown_q2a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/two.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j2">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q2a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/three.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j3">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q2a
                        +'</select>'
                        +'</br></br>'
                        +'<label class="likert_statement" data-i18n="other_water_positive">:</label>'
                        +'<input id="other" type="text"/></br></br>'
                        +'<label class="statement" data-i18n="place_name_question"></label>'
                        +'<input id="place_name" type="text" /></br></br><center>'

var modal_q2b =   '<div class="wrap"><form action="">'
                        +'</br><label class="statement" data-i18n="intro_negative_water"></label> <br/>'
                        +'<img src="ikony/one.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j1">'
                        +'<option value="no_answer" data-i18n="dropdown1"></option>'
                        +dropdown_q2b
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/two.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j2">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q2b
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/three.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j3">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q2b
                        +'</select>'
                        +'</br></br>'
                        +'<label class="likert_statement" data-i18n="other_water_negative">:</label>'
                        +'<input id="other" type="text"/></br></br>'
                        +'<label class="statement" data-i18n=solutions_water2 ></label> <br/>'
                        +' <textarea id="solutions"></textarea> </br></br>'
                        +'<label class="statement" data-i18n="place_name_question"></label>'
                        +'<input id="place_name" type="text" /></br></br><center>'



var modal_q3a = '<div class="wrap"><form action="">'
                        +'</br><label class="statement" data-i18n="intro_positive_wind"></label> <br/>'
                        +'<img src="ikony/one.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j1">'
                        +'<option value="no_answer" data-i18n="dropdown1"></option>'
                        +dropdown_q3a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/two.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j2">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q3a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/three.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j3">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q3a
                        +'</select>'
                        +'</br></br>'
                        +'<label class="likert_statement" data-i18n="other_water_positive">:</label>'
                        +'<input id="other" type="text"/></br></br>'
                        +'<label class="statement" data-i18n="place_name_question"></label>'
                        +'<input id="place_name" type="text" /></br></br><center>'


var modal_q3b = '<div class="wrap"><form action="">'
                        +'</br><label class="statement" data-i18n="intro_negative_wind"></label> <br/>'
                       +'<img src="ikony/one.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j1">'
                        +'<option value="no_answer" data-i18n="dropdown1"></option>'
                        +dropdown_q3b
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/two.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j2">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q3b
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/three.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j3">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q3b
                        +'</select>'
                        +'</br></br>'
                        +'<label class="likert_statement" data-i18n="other_wind_negative">:</label>'
                        +'<input id="other" type="text"/></br></br>'
                        +'<label class="statement" data-i18n=solutions_wind2 ></label> <br/>'
                        +' <textarea id="solutions"></textarea> </br></br>'
                        +'<label class="statement" data-i18n="place_name_question"></label>'
                        +'<input id="place_name" type="text" /></br></br><center>'


var modal_q4a = '<div class="wrap"><form action="">'
                        +'</br><label class="statement" data-i18n="intro_positive_air"></label> <br/>'
                        +'<img src="ikony/one.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j1">'
                        +'<option value="no_answer" data-i18n="dropdown1"></option>'
                        +dropdown_q4a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/two.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j2">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q4a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/three.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j3">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q4a
                        +'</select>'
                        +'</br></br>'
                        +'<label class="likert_statement" data-i18n="other_air_positive">:</label>'
                        +'<input id="other" type="text"/></br></br>'
                        +'<label class="statement" data-i18n="place_name_question"></label>'
                        +'<input id="place_name" type="text" /></br></br><center>'

var modal_q4b = '<div class="wrap"><form action="">'
                        +'</br><label class="statement" data-i18n="intro_negative_air"></label> <br/>'
                        +'<img src="ikony/one.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j1">'
                        +'<option value="no_answer" data-i18n="dropdown1"></option>'
                        +dropdown_q4a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/two.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j2">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q4a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/three.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j3">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q4a
                        +'</select>'
                        +'</br></br>'
                        +'<label class="likert_statement" data-i18n="other_air_negative">:</label>'
                        +'<input id="other" type="text"/></br></br>'
                        +'<label class="statement" data-i18n=solutions_air ></label> <br/>'
                        +' <textarea id="solutions"></textarea> </br></br>'
                        +'<label class="statement" data-i18n="place_name_question"></label>'
                        +'<input id="place_name" type="text" /></br></br><center>'


var modal_q5a = '<div class="wrap"><form action="">'
                        +'</br><label class="statement" data-i18n="intro_positive_soil"></label> <br/>'
                        +'<img src="ikony/one.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j1">'
                        +'<option value="no_answer" data-i18n="dropdown1"></option>'
                        +dropdown_q5a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/two.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j2">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q5a
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/three.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j3">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q5a
                        +'</select>'
                        +'</br></br>'
                        +'<label class="likert_statement" data-i18n="other_soil_positive">:</label>'
                        +'<input id="other" type="text"/></br></br>'
                        +'<label class="statement" data-i18n="place_name_question"></label>'
                        +'<input id="place_name" type="text" /></br></br><center>'
var modal_q5b = '<div class="wrap"><form action="">'
                        +'</br><label class="statement" data-i18n="intro_negative_soil"></label> <br/>'
                        +'<img src="ikony/one.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j1">'
                        +'<option value="no_answer" data-i18n="dropdown1"></option>'
                        +dropdown_q5b
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/two.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j2">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q5b
                        +'</select>'
                        +'</br>'
                        +'<img src="ikony/three.png" style="display: inline-block; vertical-align: middle; padding-right:10px;" ><select style="display: inline-block; vertical-align: middle; width:90%" name="j3">'
                        +'<option value="no_answer" data-i18n="dropdown23"></option>'
                        +dropdown_q5b
                        +'</select>'
                        +'</br></br>'
                        +'<label class="likert_statement" data-i18n="other_soil_negative">:</label>'
                        +'<input id="other" type="text"/></br></br>'
                        +'<label class="statement" data-i18n=solutions_soil2 ></label> <br/>'
                        +' <textarea id="solutions"></textarea> </br></br>'
                        +'<label class="statement" data-i18n="place_name_question"></label>'
                        +'<input id="place_name" type="text" /></br></br><center>'


