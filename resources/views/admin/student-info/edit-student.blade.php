@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admit-student'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
        <div class="row">
           
            <div class="col-md-12">
              
                    @csrf
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Admit Student') }}</h5>
                        </div>
                               
                    </div>
            
                <form  action="" method="">
                    @csrf
                    
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">{{ __('Please fill The form Below To Admit A New Student') }}</h6>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('students')}}" class="btn btn-info">Back</a>
                            </div>
                        </div>
                        <hr style="width:1000px; height: 2px; border: none; background-color:#c2c2c2;">

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Admission No.:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="admission_no" class="form-control" placeholder="Admission No" required>
                                        </div>
                                        @if ($errors->has('admission_no'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('admission_no') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('First Name:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                                        </div>
                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Last Name:') }}</label>

                                    <div class="form-group">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                                    </div>
                                    @if ($errors->has('full_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                                  
                               
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Phone:') }}</label>
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" placeholder="" required>
                                        </div>
                                        @if ($errors->has(''))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                     <label class="form-label" style="font-weight: 600;">{{ __('Email address:') }}</label>
  
                                      <div class="form-group">
                                          <input type="text" name="" class="form-control" placeholder="email address" required>
                                      </div>
                                      @if ($errors->has(''))
                                          <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <div class="col-md-3">
                                    <span style="color:red">*</span>
                                     <label class="form-label" style="font-weight: 600;">{{ __('Password:') }}</label>
  
                                      <div class="form-group">
                                          <input type="password" name="password" class="form-control"  required>
                                          <span style="font-size: 12px;">Default Password: 123456789</span>

                                      </div>
                                      @if ($errors->has('password'))
                                          <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                   
                                <div class="col-md-3">
                                        <label class="form-label" style="font-weight: 600;">{{ __('Class:') }}</label>
                                            <div class="form-group">
                                                <input type="text" name="class" class="form-control" placeholder="" required>
                                            </div>
                                            @if ($errors->has('class'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('class') }}</strong>
                                                </span>
                                            @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Section:</label>
                                        <select class="select form-control" id="section" name="section" required data-fouc data-placeholder="Choose.." name="section">
                                            <option value=""></option>
                                            <option value="A">A</option>
                                            <option  value="B">B</option>
                                            <option  value="C">C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Date of Birth:</label>
                                        <input name="dob" value="" type="date" class="form-control date-pick" placeholder="Select Date...">
        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Religion:</label>
                                        <select class="select form-control" id="section" name="section" required data-fouc data-placeholder="Choose.." name="section">
                                            <option value=""></option>
                                            <option value="Hindu">Hindu</option>
                                            <option  value="Muslim">Muslim</option>
                                            <option  value="Christian"> Christian</option>
                                            <option  value="Jain"> Jain</option>
                                            <option  value="Buddhist"> Buddhist</option>
                                            <option  value="Sikh">Sikh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Gender:</label>
                                        <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose.." name="gender">
                                            <option value=""></option>
                                            <option  value="Male">Male</option>
                                            <option  value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                                  
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Category:</label>
                                        <select class="select form-control" id="category" name="category" required data-fouc data-placeholder="Choose.." name="category">
                                            <option value=""></option>
                                            <option  value="General">General</option>
                                            <option  value="OBC">OBC</option>
                                            <option  value="SC">SC</option>
                                            <option  value="ST">ST</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Blood Group:</label>
                                        <select class="select form-control" id="category" name="blood_group" required data-fouc data-placeholder="Choose.." name="blood_group">
                                            <option value=""></option>
                                            <option  value="General">A+</option>
                                            <option  value="General">A-</option>
                                            <option  value="OBC">B+</option>
                                            <option  value="General">B-</option>
                                            <option  value="SC">AB+</option>
                                            <option  value="General">AB-</option>
                                            <option  value="ST">O+</option>
                                            <option  value="General">O-</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Admission Date</label>
                                        <input type="date" name="admission_date" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: 600;">Upload Passport Photo:</label>
                                        <span class="text-info" style="font-size: 12px;">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                        <input type="file" class="form-control-file" name="image" accept=".png,.jpg,.jpeg" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Parent Name:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="parent_name" class="form-control" placeholder="Parent Name" required>
                                        </div>
                                        @if ($errors->has('parent_name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('parent_name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Parent Mobile:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="parent_mobile" class="form-control" placeholder="Parent Mobile" required>
                                        </div>
                                        @if ($errors->has('parent_mobile'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('parent_mobile') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Place Of Birth:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="place_of_birth" class="form-control" placeholder="Place Of Birth" required>
                                        </div>
                                        @if ($errors->has('place_of_birth'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('place_of_birth') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Nationality: </label>
                                        <select data-placeholder="Choose..." required name="nal_id" id="nal_id" class="select-search form-control">
                                            <option value=""></option>
                                                                                    <option  value="1">Afghan</option>
                                                                                    <option  value="2">Albanian</option>
                                                                                    <option  value="3">Algerian</option>
                                                                                    <option  value="4">American</option>
                                                                                    <option  value="5">Andorran</option>
                                                                                    <option  value="6">Angolan</option>
                                                                                    <option  value="7">Antiguans</option>
                                                                                    <option  value="8">Argentinean</option>
                                                                                    <option  value="9">Armenian</option>
                                                                                    <option  value="10">Australian</option>
                                                                                    <option  value="11">Austrian</option>
                                                                                    <option  value="12">Azerbaijani</option>
                                                                                    <option  value="13">Bahamian</option>
                                                                                    <option  value="14">Bahraini</option>
                                                                                    <option  value="15">Bangladeshi</option>
                                                                                    <option  value="16">Barbadian</option>
                                                                                    <option  value="17">Barbudans</option>
                                                                                    <option  value="18">Batswana</option>
                                                                                    <option  value="19">Belarusian</option>
                                                                                    <option  value="20">Belgian</option>
                                                                                    <option  value="21">Belizean</option>
                                                                                    <option  value="22">Beninese</option>
                                                                                    <option  value="23">Bhutanese</option>
                                                                                    <option  value="24">Bolivian</option>
                                                                                    <option  value="25">Bosnian</option>
                                                                                    <option  value="26">Brazilian</option>
                                                                                    <option  value="27">British</option>
                                                                                    <option  value="28">Bruneian</option>
                                                                                    <option  value="29">Bulgarian</option>
                                                                                    <option  value="30">Burkinabe</option>
                                                                                    <option  value="31">Burmese</option>
                                                                                    <option  value="32">Burundian</option>
                                                                                    <option  value="33">Cambodian</option>
                                                                                    <option  value="34">Cameroonian</option>
                                                                                    <option  value="35">Canadian</option>
                                                                                    <option  value="36">Cape Verdean</option>
                                                                                    <option  value="37">Central African</option>
                                                                                    <option  value="38">Chadian</option>
                                                                                    <option  value="39">Chilean</option>
                                                                                    <option  value="40">Chinese</option>
                                                                                    <option  value="41">Colombian</option>
                                                                                    <option  value="42">Comoran</option>
                                                                                    <option  value="43">Congolese</option>
                                                                                    <option  value="44">Costa Rican</option>
                                                                                    <option  value="45">Croatian</option>
                                                                                    <option  value="46">Cuban</option>
                                                                                    <option  value="47">Cypriot</option>
                                                                                    <option  value="48">Czech</option>
                                                                                    <option  value="49">Danish</option>
                                                                                    <option  value="50">Djibouti</option>
                                                                                    <option  value="51">Dominican</option>
                                                                                    <option  value="52">Dutch</option>
                                                                                    <option  value="53">East Timorese</option>
                                                                                    <option  value="54">Ecuadorean</option>
                                                                                    <option  value="55">Egyptian</option>
                                                                                    <option  value="56">Emirian</option>
                                                                                    <option  value="57">Equatorial Guinean</option>
                                                                                    <option  value="58">Eritrean</option>
                                                                                    <option  value="59">Estonian</option>
                                                                                    <option  value="60">Ethiopian</option>
                                                                                    <option  value="61">Fijian</option>
                                                                                    <option  value="62">Filipino</option>
                                                                                    <option  value="63">Finnish</option>
                                                                                    <option  value="64">French</option>
                                                                                    <option  value="65">Gabonese</option>
                                                                                    <option  value="66">Gambian</option>
                                                                                    <option  value="67">Georgian</option>
                                                                                    <option  value="68">German</option>
                                                                                    <option  value="69">Ghanaian</option>
                                                                                    <option  value="70">Greek</option>
                                                                                    <option  value="71">Grenadian</option>
                                                                                    <option  value="72">Guatemalan</option>
                                                                                    <option  value="73">Guinea-Bissauan</option>
                                                                                    <option  value="74">Guinean</option>
                                                                                    <option  value="75">Guyanese</option>
                                                                                    <option  value="76">Haitian</option>
                                                                                    <option  value="77">Herzegovinian</option>
                                                                                    <option  value="78">Honduran</option>
                                                                                    <option  value="79">Hungarian</option>
                                                                                    <option  value="80">I-Kiribati</option>
                                                                                    <option  value="81">Icelander</option>
                                                                                    <option  value="82">Indian</option>
                                                                                    <option  value="83">Indonesian</option>
                                                                                    <option  value="84">Iranian</option>
                                                                                    <option  value="85">Iraqi</option>
                                                                                    <option  value="86">Irish</option>
                                                                                    <option  value="87">Israeli</option>
                                                                                    <option  value="88">Italian</option>
                                                                                    <option  value="89">Ivorian</option>
                                                                                    <option  value="90">Jamaican</option>
                                                                                    <option  value="91">Japanese</option>
                                                                                    <option  value="92">Jordanian</option>
                                                                                    <option  value="93">Kazakhstani</option>
                                                                                    <option  value="94">Kenyan</option>
                                                                                    <option  value="95">Kittian and Nevisian</option>
                                                                                    <option  value="96">Kuwaiti</option>
                                                                                    <option  value="97">Kyrgyz</option>
                                                                                    <option  value="98">Laotian</option>
                                                                                    <option  value="99">Latvian</option>
                                                                                    <option  value="100">Lebanese</option>
                                                                                    <option  value="101">Liberian</option>
                                                                                    <option  value="102">Libyan</option>
                                                                                    <option  value="103">Liechtensteiner</option>
                                                                                    <option  value="104">Lithuanian</option>
                                                                                    <option  value="105">Luxembourger</option>
                                                                                    <option  value="106">Macedonian</option>
                                                                                    <option  value="107">Malagasy</option>
                                                                                    <option  value="108">Malawian</option>
                                                                                    <option  value="109">Malaysian</option>
                                                                                    <option  value="110">Maldivan</option>
                                                                                    <option  value="111">Malian</option>
                                                                                    <option  value="112">Maltese</option>
                                                                                    <option  value="113">Marshallese</option>
                                                                                    <option  value="114">Mauritanian</option>
                                                                                    <option  value="115">Mauritian</option>
                                                                                    <option  value="116">Mexican</option>
                                                                                    <option  value="117">Micronesian</option>
                                                                                    <option  value="118">Moldovan</option>
                                                                                    <option  value="119">Monacan</option>
                                                                                    <option  value="120">Mongolian</option>
                                                                                    <option  value="121">Moroccan</option>
                                                                                    <option  value="122">Mosotho</option>
                                                                                    <option  value="123">Motswana</option>
                                                                                    <option  value="124">Mozambican</option>
                                                                                    <option  value="125">Namibian</option>
                                                                                    <option  value="126">Nauruan</option>
                                                                                    <option  value="127">Nepalese</option>
                                                                                    <option  value="128">New Zealander</option>
                                                                                    <option  value="129">Nicaraguan</option>
                                                                                    <option  value="130">Nigerian</option>
                                                                                    <option  value="131">Nigerien</option>
                                                                                    <option  value="132">North Korean</option>
                                                                                    <option  value="133">Northern Irish</option>
                                                                                    <option  value="134">Norwegian</option>
                                                                                    <option  value="135">Omani</option>
                                                                                    <option  value="136">Pakistani</option>
                                                                                    <option  value="137">Palauan</option>
                                                                                    <option  value="138">Panamanian</option>
                                                                                    <option  value="139">Papua New Guinean</option>
                                                                                    <option  value="140">Paraguayan</option>
                                                                                    <option  value="141">Peruvian</option>
                                                                                    <option  value="142">Polish</option>
                                                                                    <option  value="143">Portuguese</option>
                                                                                    <option  value="144">Qatari</option>
                                                                                    <option  value="145">Romanian</option>
                                                                                    <option  value="146">Russian</option>
                                                                                    <option  value="147">Rwandan</option>
                                                                                    <option  value="148">Saint Lucian</option>
                                                                                    <option  value="149">Salvadoran</option>
                                                                                    <option  value="150">Samoan</option>
                                                                                    <option  value="151">San Marinese</option>
                                                                                    <option  value="152">Sao Tomean</option>
                                                                                    <option  value="153">Saudi</option>
                                                                                    <option  value="154">Scottish</option>
                                                                                    <option  value="155">Senegalese</option>
                                                                                    <option  value="156">Serbian</option>
                                                                                    <option  value="157">Seychellois</option>
                                                                                    <option  value="158">Sierra Leonean</option>
                                                                                    <option  value="159">Singaporean</option>
                                                                                    <option  value="160">Slovakian</option>
                                                                                    <option  value="161">Slovenian</option>
                                                                                    <option  value="162">Solomon Islander</option>
                                                                                    <option  value="163">Somali</option>
                                                                                    <option  value="164">South African</option>
                                                                                    <option  value="165">South Korean</option>
                                                                                    <option  value="166">Spanish</option>
                                                                                    <option  value="167">Sri Lankan</option>
                                                                                    <option  value="168">Sudanese</option>
                                                                                    <option  value="169">Surinamer</option>
                                                                                    <option  value="170">Swazi</option>
                                                                                    <option  value="171">Swedish</option>
                                                                                    <option  value="172">Swiss</option>
                                                                                    <option  value="173">Syrian</option>
                                                                                    <option  value="174">Taiwanese</option>
                                                                                    <option  value="175">Tajik</option>
                                                                                    <option  value="176">Tanzanian</option>
                                                                                    <option  value="177">Thai</option>
                                                                                    <option  value="178">Togolese</option>
                                                                                    <option  value="179">Tongan</option>
                                                                                    <option  value="180">Trinidadian/Tobagonian</option>
                                                                                    <option  value="181">Tunisian</option>
                                                                                    <option  value="182">Turkish</option>
                                                                                    <option  value="183">Tuvaluan</option>
                                                                                    <option  value="184">Ugandan</option>
                                                                                    <option  value="185">Ukrainian</option>
                                                                                    <option  value="186">Uruguayan</option>
                                                                                    <option  value="187">Uzbekistani</option>
                                                                                    <option  value="188">Venezuelan</option>
                                                                                    <option  value="189">Vietnamese</option>
                                                                                    <option  value="190">Welsh</option>
                                                                                    <option  value="191">Yemenite</option>
                                                                                    <option  value="192">Zambian</option>
                                                                                    <option  value="193">Zimbabwean</option>
                                                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3" >
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('CPR Number:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="CPR_number" class="form-control" placeholder="CPR Number" required>
                                        </div>
                                        @if ($errors->has('CPR_number'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('CPR_number') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Student Language:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="student_language" class="form-control" placeholder="Student Language" required>
                                        </div>
                                        @if ($errors->has('student_language'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('student_language') }}</strong>
                                            </span>
                                        @endif
                                </div>
                              
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Residance Address:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="residance_address" class="form-control" placeholder="Residance Address" required>
                                        </div>
                                        @if ($errors->has('residance_address'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('residance_address') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" style="font-weight: 600;">Document</label>
                                    <input type="file" class="form-control" id="document" name="document">
                                </div>
                            </div>
                           
                            
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                   <button type="submit" class="btn btn-info">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
@endsection







