@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant-list'
])
@section('content')

  
<link rel="stylesheet" type="text/css" href="https://demo.easyappointments.org/assets/ext/bootstrap/css/bootstrap.min.css?6398SW">
<link rel="stylesheet" type="text/css" href="https://demo.easyappointments.org/assets/ext/jquery-ui/jquery-ui.min.css?6398SW">
<link rel="stylesheet" type="text/css" href="https://demo.easyappointments.org/assets/ext/cookieconsent/cookieconsent.min.css?6398SW">
<link rel="stylesheet" type="text/css" href="https://demo.easyappointments.org/assets/css/frontend.min.css?6398SW">
<link rel="stylesheet" type="text/css" href="https://demo.easyappointments.org/assets/css/general.min.css?6398SW">


@section('content')

<div class="content">
<div class="row">
    <div id="book-appointment-wizard" class="col-12 col-xl-8">
      
             <!-- FRAME TOP BAR -->

             <div id="header">
                <span id="company-name">School Name</span>

                <div id="steps">
                    <div id="step-1" class="book-step active-step"
                         data-tippy-content="Service & Provider">
                        <strong>1</strong>
                    </div>

                    <div id="step-2" class="book-step" data-toggle="tooltip"
                         data-tippy-content="Appointment Date & Time">
                        <strong>2</strong>
                    </div>
                    <div id="step-3" class="book-step" data-toggle="tooltip"
                         data-tippy-content="Customer Information">
                        <strong>3</strong>
                    </div>
                    <div id="step-4" class="book-step" data-toggle="tooltip"
                         data-tippy-content="Appointment Confirmation">
                        <strong>4</strong>
                    </div>
                </div>
           
            </div>          
              <!-- SELECT SERVICE AND PROVIDER -->

            <div id="wizard-frame-1" class="wizard-frame">
                <div class="frame-container">
                    <h2 class="frame-title">Service & Provider</h2>

                    <div class="row frame-content">
                        <div class="col">
                            <div class="form-group">
                                <label for="select-service">
                                    <strong>Service</strong>
                                </label>

                                <select id="select-service" class="nice-select niceSelect bordered_style wide"required>
                                    <option value="1">Service</option>                                </select>
                            </div>

                            <div class="form-group">
                                <label for="select-provider">
                                    <strong>Provider</strong>
                                </label>

                                <select id="select-provider" class="nice-select niceSelect bordered_style wide" required>
                                    <option value="1">John Doe</option>  
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="select-provider" style="margin-bottom:0;">
                                    <strong>Service</strong>
                                </label><br>
                                <label for="select-provider">
                                    [Duration 30 Minutes]
                                </label>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="command-buttons">
                    <span>&nbsp;</span>

                    <button type="button" id="button-next-1" class="btn btn-lg ot-btn-primary"
                            data-step_index="1">
                        Next <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        <div id="wizard-frame-2" class="wizard-frame" style="display:none;">
            <div class="frame-container">

                    <h2 class="frame-title">Appointment Date & Time</h2>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div id="calendar"></div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div id="select-time">
                                <div class="form-group">
                                    <label for="select-timezone">Timezone</label>
                                <select id="select-timezone" class="nice-select niceSelect bordered_style wide" value="UTC">
                                    <optgroup label="UTC">
                                            <option value="UTC">UTC</option>
                                    </optgroup>
                                    <optgroup label="America">
                                            <option value="America/Adak">Adak (-10:00)</option>
                                            <option value="America/Atka">Atka (-10:00)</option>
                                            <option value="America/Anchorage">Anchorage (-9:00)</option>
                                            <option value="America/Juneau">Juneau (-9:00)</option>
                                            <option value="America/Nome">Nome (-9:00)</option>
                                            <option value="America/Yakutat">Yakutat (-9:00)</option>
                                            <option value="America/Dawson">Dawson (-8:00)</option>
                                            <option value="America/Ensenada">Ensenada (-8:00)</option>
                                            <option value="America/Los_Angeles">Los_Angeles (-8:00)</option>
                                            <option value="America/Tijuana">Tijuana (-8:00)</option>
                                            <option value="America/Vancouver">Vancouver (-8:00)</option>
                                            <option value="America/Whitehorse">Whitehorse (-8:00)</option>
                                            <option value="America/Boise">Boise (-7:00)</option>
                                            <option value="America/Cambridge_Bay">Cambridge_Bay (-7:00)</option>
                                            <option value="America/Chihuahua">Chihuahua (-7:00)</option>
                                            <option value="America/Dawson_Creek">Dawson_Creek (-7:00)</option>
                                            <option value="America/Denver">Denver (-7:00)</option>
                                            <option value="America/Edmonton">Edmonton (-7:00)</option>
                                            <option value="America/Hermosillo">Hermosillo (-7:00)</option>
                                            <option value="America/Inuvik">Inuvik (-7:00)</option>
                                            <option value="America/Mazatlan">Mazatlan (-7:00)</option>
                                            <option value="America/Phoenix">Phoenix (-7:00)</option>
                                            <option value="America/Shiprock">Shiprock (-7:00)</option>
                                            <option value="America/Yellowknife">Yellowknife (-7:00)</option>
                                            <option value="America/Belize">Belize (-6:00)</option>
                                            <option value="America/Cancun">Cancun (-6:00)</option>
                                            <option value="America/Chicago">Chicago (-6:00)</option>
                                            <option value="America/Costa_Rica">Costa_Rica (-6:00)</option>
                                            <option value="America/El_Salvador">El_Salvador (-6:00)</option>
                                            <option value="America/Guatemala">Guatemala (-6:00)</option>
                                            <option value="America/Knox_IN">Knox_IN (-6:00)</option>
                                            <option value="America/Managua">Managua (-6:00)</option>
                                            <option value="America/Menominee">Menominee (-6:00)</option>
                                            <option value="America/Merida">Merida (-6:00)</option>
                                            <option value="America/Mexico_City">Mexico_City (-6:00)</option>
                                            <option value="America/Monterrey">Monterrey (-6:00)</option>
                                            <option value="America/Rainy_River">Rainy_River (-6:00)</option>
                                            <option value="America/Rankin_Inlet">Rankin_Inlet (-6:00)</option>
                                            <option value="America/Regina">Regina (-6:00)</option>
                                            <option value="America/Swift_Current">Swift_Current (-6:00)</option>
                                            <option value="America/Tegucigalpa">Tegucigalpa (-6:00)</option>
                                            <option value="America/Winnipeg">Winnipeg (-6:00)</option>
                                            <option value="America/Atikokan">Atikokan (-5:00)</option>
                                            <option value="America/Bogota">Bogota (-5:00)</option>
                                            <option value="America/Cayman">Cayman (-5:00)</option>
                                            <option value="America/Coral_Harbour">Coral_Harbour (-5:00)</option>
                                            <option value="America/Detroit">Detroit (-5:00)</option>
                                            <option value="America/Fort_Wayne">Fort_Wayne (-5:00)</option>
                                            <option value="America/Grand_Turk">Grand_Turk (-5:00)</option>
                                            <option value="America/Guayaquil">Guayaquil (-5:00)</option>
                                            <option value="America/Havana">Havana (-5:00)</option>
                                            <option value="America/Indianapolis">Indianapolis (-5:00)</option>
                                            <option value="America/Iqaluit">Iqaluit (-5:00)</option>
                                            <option value="America/Jamaica">Jamaica (-5:00)</option>
                                            <option value="America/Lima">Lima (-5:00)</option>
                                            <option value="America/Louisville">Louisville (-5:00)</option>
                                            <option value="America/Montreal">Montreal (-5:00)</option>
                                            <option value="America/Nassau">Nassau (-5:00)</option>
                                            <option value="America/New_York">New_York (-5:00)</option>
                                            <option value="America/Nipigon">Nipigon (-5:00)</option>
                                            <option value="America/Panama">Panama (-5:00)</option>
                                            <option value="America/Pangnirtung">Pangnirtung (-5:00)</option>
                                            <option value="America/Port-au-Prince">Port-au-Prince (-5:00)</option>
                                            <option value="America/Resolute">Resolute (-5:00)</option>
                                            <option value="America/Thunder_Bay">Thunder_Bay (-5:00)</option>
                                            <option value="America/Toronto">Toronto (-5:00)</option>
                                            <option value="America/Caracas">Caracas (-4:-30)</option>
                                            <option value="America/Anguilla">Anguilla (-4:00)</option>
                                            <option value="America/Antigua">Antigua (-4:00)</option>
                                            <option value="America/Aruba">Aruba (-4:00)</option>
                                            <option value="America/Asuncion">Asuncion (-4:00)</option>
                                            <option value="America/Barbados">Barbados (-4:00)</option>
                                            <option value="America/Blanc-Sablon">Blanc-Sablon (-4:00)</option>
                                            <option value="America/Boa_Vista">Boa_Vista (-4:00)</option>
                                            <option value="America/Campo_Grande">Campo_Grande (-4:00)</option>
                                            <option value="America/Cuiaba">Cuiaba (-4:00)</option>
                                            <option value="America/Curacao">Curacao (-4:00)</option>
                                            <option value="America/Dominica">Dominica (-4:00)</option>
                                            <option value="America/Eirunepe">Eirunepe (-4:00)</option>
                                            <option value="America/Glace_Bay">Glace_Bay (-4:00)</option>
                                            <option value="America/Goose_Bay">Goose_Bay (-4:00)</option>
                                            <option value="America/Grenada">Grenada (-4:00)</option>
                                            <option value="America/Guadeloupe">Guadeloupe (-4:00)</option>
                                            <option value="America/Guyana">Guyana (-4:00)</option>
                                            <option value="America/Halifax">Halifax (-4:00)</option>
                                            <option value="America/La_Paz">La_Paz (-4:00)</option>
                                            <option value="America/Manaus">Manaus (-4:00)</option>
                                            <option value="America/Marigot">Marigot (-4:00)</option>
                                            <option value="America/Martinique">Martinique (-4:00)</option>
                                            <option value="America/Moncton">Moncton (-4:00)</option>
                                            <option value="America/Montserrat">Montserrat (-4:00)</option>
                                            <option value="America/Port_of_Spain">Port_of_Spain (-4:00)</option>
                                            <option value="America/Porto_Acre">Porto_Acre (-4:00)</option>
                                            <option value="America/Porto_Velho">Porto_Velho (-4:00)</option>
                                            <option value="America/Puerto_Rico">Puerto_Rico (-4:00)</option>
                                            <option value="America/Rio_Branco">Rio_Branco (-4:00)</option>
                                            <option value="America/Santiago">Santiago (-4:00)</option>
                                            <option value="America/Santo_Domingo">Santo_Domingo (-4:00)</option>
                                            <option value="America/St_Barthelemy">St_Barthelemy (-4:00)</option>
                                            <option value="America/St_Kitts">St_Kitts (-4:00)</option>
                                            <option value="America/St_Lucia">St_Lucia (-4:00)</option>
                                            <option value="America/St_Thomas">St_Thomas (-4:00)</option>
                                            <option value="America/St_Vincent">St_Vincent (-4:00)</option>
                                            <option value="America/Thule">Thule (-4:00)</option>
                                            <option value="America/Tortola">Tortola (-4:00)</option>
                                            <option value="America/Virgin">Virgin (-4:00)</option>
                                            <option value="America/St_Johns">St_Johns (-3:-30)</option>
                                            <option value="America/Araguaina">Araguaina (-3:00)</option>
                                            <option value="America/Bahia">Bahia (-3:00)</option>
                                            <option value="America/Belem">Belem (-3:00)</option>
                                            <option value="America/Buenos_Aires">Buenos_Aires (-3:00)</option>
                                            <option value="America/Catamarca">Catamarca (-3:00)</option>
                                            <option value="America/Cayenne">Cayenne (-3:00)</option>
                                            <option value="America/Cordoba">Cordoba (-3:00)</option>
                                            <option value="America/Fortaleza">Fortaleza (-3:00)</option>
                                            <option value="America/Godthab">Godthab (-3:00)</option>
                                            <option value="America/Jujuy">Jujuy (-3:00)</option>
                                            <option value="America/Maceio">Maceio (-3:00)</option>
                                            <option value="America/Mendoza">Mendoza (-3:00)</option>
                                            <option value="America/Miquelon">Miquelon (-3:00)</option>
                                            <option value="America/Montevideo">Montevideo (-3:00)</option>
                                            <option value="America/Paramaribo">Paramaribo (-3:00)</option>
                                            <option value="America/Recife">Recife (-3:00)</option>
                                            <option value="America/Rosario">Rosario (-3:00)</option>
                                            <option value="America/Santarem">Santarem (-3:00)</option>
                                            <option value="America/Sao_Paulo">Sao_Paulo (-3:00)</option>
                                            <option value="America/Noronha">Noronha (-2:00)</option>
                                            <option value="America/Scoresbysund">Scoresbysund (-1:00)</option>
                                            <option value="America/Danmarkshavn">Danmarkshavn (+0:00)</option>
                                    </optgroup>
                                    <optgroup label="Europe">
                                            <option value="Europe/Belfast">Belfast (+0:00)</option>
                                            <option value="Europe/Dublin">Dublin (+0:00)</option>
                                            <option value="Europe/Guernsey">Guernsey (+0:00)</option>
                                            <option value="Europe/Isle_of_Man">Isle_of_Man (+0:00)</option>
                                            <option value="Europe/Jersey">Jersey (+0:00)</option>
                                            <option value="Europe/Lisbon">Lisbon (+0:00)</option>
                                            <option value="Europe/London">London (+0:00)</option>
                                            <option value="Europe/Amsterdam">Amsterdam (+1:00)</option>
                                            <option value="Europe/Andorra">Andorra (+1:00)</option>
                                            <option value="Europe/Belgrade">Belgrade (+1:00)</option>
                                            <option value="Europe/Berlin">Berlin (+1:00)</option>
                                            <option value="Europe/Bratislava">Bratislava (+1:00)</option>
                                            <option value="Europe/Brussels">Brussels (+1:00)</option>
                                            <option value="Europe/Budapest">Budapest (+1:00)</option>
                                            <option value="Europe/Copenhagen">Copenhagen (+1:00)</option>
                                            <option value="Europe/Gibraltar">Gibraltar (+1:00)</option>
                                            <option value="Europe/Ljubljana">Ljubljana (+1:00)</option>
                                            <option value="Europe/Luxembourg">Luxembourg (+1:00)</option>
                                            <option value="Europe/Madrid">Madrid (+1:00)</option>
                                            <option value="Europe/Malta">Malta (+1:00)</option>
                                            <option value="Europe/Monaco">Monaco (+1:00)</option>
                                            <option value="Europe/Oslo">Oslo (+1:00)</option>
                                            <option value="Europe/Paris">Paris (+1:00)</option>
                                            <option value="Europe/Podgorica">Podgorica (+1:00)</option>
                                            <option value="Europe/Prague">Prague (+1:00)</option>
                                            <option value="Europe/Rome">Rome (+1:00)</option>
                                            <option value="Europe/San_Marino">San_Marino (+1:00)</option>
                                            <option value="Europe/Sarajevo">Sarajevo (+1:00)</option>
                                            <option value="Europe/Skopje">Skopje (+1:00)</option>
                                            <option value="Europe/Stockholm">Stockholm (+1:00)</option>
                                            <option value="Europe/Tirane">Tirane (+1:00)</option>
                                            <option value="Europe/Vaduz">Vaduz (+1:00)</option>
                                            <option value="Europe/Vatican">Vatican (+1:00)</option>
                                            <option value="Europe/Vienna">Vienna (+1:00)</option>
                                            <option value="Europe/Warsaw">Warsaw (+1:00)</option>
                                            <option value="Europe/Zagreb">Zagreb (+1:00)</option>
                                            <option value="Europe/Zurich">Zurich (+1:00)</option>
                                            <option value="Europe/Athens">Athens (+2:00)</option>
                                            <option value="Europe/Bucharest">Bucharest (+2:00)</option>
                                            <option value="Europe/Chisinau">Chisinau (+2:00)</option>
                                            <option value="Europe/Helsinki">Helsinki (+2:00)</option>
                                            <option value="Europe/Istanbul">Istanbul (+2:00)</option>
                                            <option value="Europe/Kaliningrad">Kaliningrad (+2:00)</option>
                                            <option value="Europe/Kiev">Kiev (+2:00)</option>
                                            <option value="Europe/Mariehamn">Mariehamn (+2:00)</option>
                                            <option value="Europe/Minsk">Minsk (+2:00)</option>
                                            <option value="Europe/Nicosia">Nicosia (+2:00)</option>
                                            <option value="Europe/Riga">Riga (+2:00)</option>
                                            <option value="Europe/Simferopol">Simferopol (+2:00)</option>
                                            <option value="Europe/Sofia">Sofia (+2:00)</option>
                                            <option value="Europe/Tallinn">Tallinn (+2:00)</option>
                                            <option value="Europe/Tiraspol">Tiraspol (+2:00)</option>
                                            <option value="Europe/Uzhgorod">Uzhgorod (+2:00)</option>
                                            <option value="Europe/Vilnius">Vilnius (+2:00)</option>
                                            <option value="Europe/Zaporozhye">Zaporozhye (+2:00)</option>
                                            <option value="Europe/Moscow">Moscow (+3:00)</option>
                                            <option value="Europe/Volgograd">Volgograd (+3:00)</option>
                                            <option value="Europe/Samara">Samara (+4:00)</option>
                                    </optgroup>
                                    <optgroup label="Asia">
                                            <option value="Asia/Amman">Amman (+2:00)</option>
                                            <option value="Asia/Beirut">Beirut (+2:00)</option>
                                            <option value="Asia/Damascus">Damascus (+2:00)</option>
                                            <option value="Asia/Gaza">Gaza (+2:00)</option>
                                            <option value="Asia/Istanbul">Istanbul (+2:00)</option>
                                            <option value="Asia/Jerusalem">Jerusalem (+2:00)</option>
                                            <option value="Asia/Nicosia">Nicosia (+2:00)</option>
                                            <option value="Asia/Tel_Aviv">Tel_Aviv (+2:00)</option>
                                            <option value="Asia/Aden">Aden (+3:00)</option>
                                            <option value="Asia/Baghdad">Baghdad (+3:00)</option>
                                            <option value="Asia/Bahrain">Bahrain (+3:00)</option>
                                            <option value="Asia/Kuwait">Kuwait (+3:00)</option>
                                            <option value="Asia/Qatar">Qatar (+3:00)</option>
                                            <option value="Asia/Tehran">Tehran (+3:30)</option>
                                            <option value="Asia/Baku">Baku (+4:00)</option>
                                            <option value="Asia/Dubai">Dubai (+4:00)</option>
                                            <option value="Asia/Muscat">Muscat (+4:00)</option>
                                            <option value="Asia/Tbilisi">Tbilisi (+4:00)</option>
                                            <option value="Asia/Yerevan">Yerevan (+4:00)</option>
                                            <option value="Asia/Kabul">Kabul (+4:30)</option>
                                            <option value="Asia/Aqtau">Aqtau (+5:00)</option>
                                            <option value="Asia/Aqtobe">Aqtobe (+5:00)</option>
                                            <option value="Asia/Ashgabat">Ashgabat (+5:00)</option>
                                            <option value="Asia/Ashkhabad">Ashkhabad (+5:00)</option>
                                            <option value="Asia/Dushanbe">Dushanbe (+5:00)</option>
                                            <option value="Asia/Karachi">Karachi (+5:00)</option>
                                            <option value="Asia/Oral">Oral (+5:00)</option>
                                            <option value="Asia/Samarkand">Samarkand (+5:00)</option>
                                            <option value="Asia/Tashkent">Tashkent (+5:00)</option>
                                            <option value="Asia/Yekaterinburg">Yekaterinburg (+5:00)</option>
                                            <option value="Asia/Calcutta">Calcutta (+5:30)</option>
                                            <option value="Asia/Colombo">Colombo (+5:30)</option>
                                            <option value="Asia/Kolkata">Kolkata (+5:30)</option>
                                            <option value="Asia/Katmandu">Katmandu (+5:45)</option>
                                            <option value="Asia/Almaty">Almaty (+6:00)</option>
                                            <option value="Asia/Bishkek">Bishkek (+6:00)</option>
                                            <option value="Asia/Dacca">Dacca (+6:00)</option>
                                            <option value="Asia/Dhaka">Dhaka (+6:00)</option>
                                            <option value="Asia/Novosibirsk">Novosibirsk (+6:00)</option>
                                            <option value="Asia/Omsk">Omsk (+6:00)</option>
                                            <option value="Asia/Qyzylorda">Qyzylorda (+6:00)</option>
                                            <option value="Asia/Thimbu">Thimbu (+6:00)</option>
                                            <option value="Asia/Thimphu">Thimphu (+6:00)</option>
                                            <option value="Asia/Rangoon">Rangoon (+6:30)</option>
                                            <option value="Asia/Bangkok">Bangkok (+7:00)</option>
                                            <option value="Asia/Ho_Chi_Minh">Ho_Chi_Minh (+7:00)</option>
                                            <option value="Asia/Hovd">Hovd (+7:00)</option>
                                            <option value="Asia/Jakarta">Jakarta (+7:00)</option>
                                            <option value="Asia/Krasnoyarsk">Krasnoyarsk (+7:00)</option>
                                            <option value="Asia/Phnom_Penh">Phnom_Penh (+7:00)</option>
                                            <option value="Asia/Pontianak">Pontianak (+7:00)</option>
                                            <option value="Asia/Saigon">Saigon (+7:00)</option>
                                            <option value="Asia/Vientiane">Vientiane (+7:00)</option>
                                            <option value="Asia/Brunei">Brunei (+8:00)</option>
                                            <option value="Asia/Choibalsan">Choibalsan (+8:00)</option>
                                            <option value="Asia/Chongqing">Chongqing (+8:00)</option>
                                            <option value="Asia/Chungking">Chungking (+8:00)</option>
                                            <option value="Asia/Harbin">Harbin (+8:00)</option>
                                            <option value="Asia/Hong_Kong">Hong_Kong (+8:00)</option>
                                            <option value="Asia/Irkutsk">Irkutsk (+8:00)</option>
                                            <option value="Asia/Kashgar">Kashgar (+8:00)</option>
                                            <option value="Asia/Kuala_Lumpur">Kuala_Lumpur (+8:00)</option>
                                            <option value="Asia/Kuching">Kuching (+8:00)</option>
                                            <option value="Asia/Macao">Macao (+8:00)</option>
                                            <option value="Asia/Macau">Macau (+8:00)</option>
                                            <option value="Asia/Makassar">Makassar (+8:00)</option>
                                            <option value="Asia/Manila">Manila (+8:00)</option>
                                            <option value="Asia/Shanghai">Shanghai (+8:00)</option>
                                            <option value="Asia/Singapore">Singapore (+8:00)</option>
                                            <option value="Asia/Taipei">Taipei (+8:00)</option>
                                            <option value="Asia/Ujung_Pandang">Ujung_Pandang (+8:00)</option>
                                            <option value="Asia/Ulaanbaatar">Ulaanbaatar (+8:00)</option>
                                            <option value="Asia/Ulan_Bator">Ulan_Bator (+8:00)</option>
                                            <option value="Asia/Urumqi">Urumqi (+8:00)</option>
                                            <option value="Asia/Dili">Dili (+9:00)</option>
                                            <option value="Asia/Jayapura">Jayapura (+9:00)</option>
                                            <option value="Asia/Pyongyang">Pyongyang (+9:00)</option>
                                            <option value="Asia/Seoul">Seoul (+9:00)</option>
                                            <option value="Asia/Tokyo">Tokyo (+9:00)</option>
                                            <option value="Asia/Yakutsk">Yakutsk (+9:00)</option>
                                            <option value="Asia/Sakhalin">Sakhalin (+10:00)</option>
                                            <option value="Asia/Vladivostok">Vladivostok (+10:00)</option>
                                            <option value="Asia/Magadan">Magadan (+11:00)</option>
                                            <option value="Asia/Anadyr">Anadyr (+12:00)</option>
                                            <option value="Asia/Kamchatka">Kamchatka (+12:00)</option>
                                    </optgroup>
                                    <optgroup label="Indian">
                                            <option value="Indian/Antananarivo">Antananarivo (+3:00)</option>
                                            <option value="Indian/Comoro">Comoro (+3:00)</option>
                                            <option value="Indian/Mayotte">Mayotte (+3:00)</option>
                                            <option value="Indian/Mahe">Mahe (+4:00)</option>
                                            <option value="Indian/Mauritius">Mauritius (+4:00)</option>
                                            <option value="Indian/Reunion">Reunion (+4:00)</option>
                                            <option value="Indian/Kerguelen">Kerguelen (+5:00)</option>
                                            <option value="Indian/Maldives">Maldives (+5:00)</option>
                                            <option value="Indian/Chagos">Chagos (+6:00)</option>
                                            <option value="Indian/Cocos">Cocos (+6:30)</option>
                                            <option value="Indian/Christmas">Christmas (+7:00)</option>
                                    </optgroup>
                                </select>
                                </div>

                                <div id="available-hours"></div>
                            </div>
                         </div>
                    </div>
            </div>
            <div class="command-buttons">
                <button type="button" id="button-back-2" class="btn btn-lg ot-btn-primary"
                        data-step_index="2">
                    <i class="fas fa-chevron-left mr-2"></i>
                    Back
                </button>
                <button type="button" id="button-next-2" class="btn btn-lg ot-btn-primary"
                        data-step_index="2">
                    Next <i class="fas fa-chevron-right ml-2"></i>
                </button>
            </div>
        </div>
        <div id="wizard-frame-3" class="wizard-frame" style="display:none;">
            <div class="frame-container">

                <h2 class="frame-title">Parent Information</h2>

                <div class="row frame-content">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="first-name" class="control-label">
                                First Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="first-name" class="required form-control" maxlength="100"/>
                        </div>
                        <div class="form-group">
                            <label for="last-name" class="control-label">
                                Last Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="last-name" class="required form-control" maxlength="120"/>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">
                                Email  <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="email" class="required form-control" maxlength="120"/>
                        </div>
                        <div class="form-group">
                            <label for="phone-number" class="control-label">
                                Phone Number   <span class="text-danger">*</span>                                </label>
                            <input type="text" id="phone-number" maxlength="60"
                                   class="required form-control"/>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="address" class="control-label">
                                Address  
                            </label>
                            <input type="text" id="address" class="form-control" maxlength="120"/>
                        </div>
                        <div class="form-group">
                            <label for="city" class="control-label">
                                City  
                            </label>
                            <input type="text" id="city" class="form-control" maxlength="120"/>
                        </div>
                        <div class="form-group">
                            <label for="zip-code" class="control-label">
                                Zip Code  
                            </label>
                            <input type="text" id="zip-code" class="form-control" maxlength="120"/>
                        </div>
                        <div class="form-group">
                            <label for="notes" class="control-label">
                                Notes  
                            </label>
                            <textarea id="notes" maxlength="500" class="form-control" rows="1"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="command-buttons">
                <button type="button" id="button-back-3" class="btn btn-lg ot-btn-primary"
                        data-step_index="3">
                    <i class="fas fa-chevron-left mr-2"></i>
                    Back  
                </button>
                <button type="button" id="button-next-3" class="btn btn-lg ot-btn-primary"
                        data-step_index="3">
                    Next  <i class="fas fa-chevron-right ml-2"></i>
                </button>
            </div>
        </div>

        <div id="wizard-frame-4" class="wizard-frame" style="display:none;">
            <div class="frame-container">
                <h2 class="frame-title">Appointment Confirmation</h2>
                <div class="row frame-content">
                    <div id="appointment-details" class="col-12 col-md-6">
                        <h4>Appointment</h4>
                        <p class="mb-0">Service: Service</p>
                        <p class="mb-0">Provider: Jane Doe</p>
                        <p class="mb-0">Start: 01/07/2024 12:00 pm</p>
                        <p class="mb-0"> Timezone: Damascus (+2:00)</p>               
                    </div>
                    <div id="customer-details" class="col-12 col-md-6">
                        <h4>Customer</h4>
                        <p class="mb-0">Customer: demo</p>
                        <p class="mb-0">Provider: Jane Doe</p>
                        <p class="mb-0">Phone Number: 1234567890</p>
                        <p class="mb-0"> Email: admin@gmail.com
                        </p>     

                    </div>
                </div>
            </div>
            <div class="command-buttons">
                <button type="button" id="button-back-4" class="btn btn-lg ot-btn-primary"
                        data-step_index="4">
                    <i class="fas fa-chevron-left mr-2"></i>
                    Back 
                </button>
                <form id="book-appointment-form" style="display:inline-block" method="">
                    @csrf
                    <button id="book-appointment-submit" type="button" class="btn btn-lg ot-btn-primary">
                        <i class="fas fa-check-square mr-2"></i>
                        Confirm   
                     </button>
                  
                </form>
            </div>
        </div>
        
    </div>
</div>
</div>   
 
@endsection
@push('scripts')
<script>
$('document').ready(function() {
    $('#wizard-frame-2').hide();
    $('#wizard-frame-3').hide();  
    $('#wizard-frame-4').hide(); 
   
    $('#button-next-1').click(function(e) {
        e.preventDefault(); 
        $('#wizard-frame-2').show(); 
        $('#wizard-frame-1').hide(); 
        $('#wizard-frame-3').hide();
        $('#wizard-frame-4').hide(); 
    });
    $('#button-next-2').click(function() {
       $('#wizard-frame-3').show();
        $('#wizard-frame-2').hide(); 
        $('#wizard-frame-1').hide(); 
        $('#wizard-frame-4').hide(); 
    });
    $('#button-next-3').click(function(e) {
        $('#wizard-frame-4').show(); 
        $('#wizard-frame-3').hide(); 
        $('#wizard-frame-2').hide(); 
        $('#wizard-frame-1').hide(); 
    });


         $('#button-back-2').click(function(e){
            e.preventDefault(); 
            $('#wizard-frame-2').hide(); 
            $('#wizard-frame-1').show(); 
            $('#wizard-frame-3').hide();
            $('#wizard-frame-4').hide(); 

        })

        $('#button-back-3').click(function(e){
            e.preventDefault(); 
            $('#wizard-frame-2').show();
            $('#wizard-frame-1').hide(); 
            $('#wizard-frame-3').hide();
            $('#wizard-frame-4').hide(); 

        })
       
        $('#button-back-4').click(function(e){
            e.preventDefault(); 
            $('#wizard-frame-2').hide(); 
            $('#wizard-frame-1').hide(); 
            $('#wizard-frame-3').show();
            $('#wizard-frame-4').hide(); 

        })
      
});
    
var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
       
    });
    calendar.render();

</script>
@endpush

