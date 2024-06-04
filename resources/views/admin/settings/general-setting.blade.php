@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'general-setting'
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
            <div class="card ot-card">
                <div class="card-header">
                  <h4>General Settings</h4>
                </div>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Application Name <span class="fillable">*</span></label> <input type="text" name="application_name" class="form-control ot-input" value="School Management System" placeholder="Enter you application name">
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label for="inputname" class="form-label">Footer Text <span class="fillable">*</span></label> 
                            <input type="text" name="footer_text" class="form-control ot-input" value="© 2024, made with  by Tech Simba and UPDIVISION" placeholder="Enter your footer text">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                            <label class="form-label" for="light_logo">Light Logo (155 x 40 px)</label><br>
                            <div class="d-flex justify-content-center align-items-center">
                            <img class="img-thumbnail mb-10 ot-input full-logo setting-image" src="{{ asset('paper') }}/img/d.png" alt="light logo"></div>
                            <div class="ot_fileUploader left-side mb-3">
                              <input class="form-control" type="text" placeholder="Browse Light Logo" readonly id="placeholder"> <button class="primary-btn-small-input" type="button"><label class="btn btn-lg ot-btn-primary" for="fileBrouse">Browse</label> <input type="file" class="d-none form-control" name="light_logo" id="fileBrouse" accept="image/*"></button>
                            </div>
                          </div>
                          <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                              <label class="form-label" for="favicon">Favicon (40 x 40 px)</label><br>
                              <div class="d-flex align-items-center gap-3 justify-content-center">
                              <img class="img-thumbnail mb-10 ot-input full-logo setting-image" src="{{ asset('paper') }}/img/d.png" alt="favicon"></div>
                              <div class="ot_fileUploader left-side mb-3">
                                <input class="form-control" type="text" placeholder="Browse Favicon" readonly id="placeholder3"> 
                                <button class="primary-btn-small-input" type="button">
                                  <label class="btn btn-lg ot-btn-primary" for="fileBrouse3">Browse</label> 
                                  <input type="file" class="d-none form-control" name="favicon" id="fileBrouse3" accept="image/*">
                              </button>
                              </div>
                          </div>
                          {{-- <div class="col-12 col-md-6 col-xl-6 col-lg-6">
                            <label class="form-label" for="dark_logo">Dark Logo (155 x 40 px)</label><br>
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="img-thumbnail mb-10 ot-input full-logo setting-image" src="{{ asset('paper') }}/img/d.png" alt="dark logo"></div>
                            <div class="ot_fileUploader left-side mb-3">
                              <input class="form-control" type="text" placeholder="Browse Dark Logo" readonly id="placeholder2">
                               <button class="primary-btn-small-input" type="button">
                                <label class="btn btn-lg ot-btn-primary" for="fileBrouse2">Browse</label> 
                                <input type="file" class="d-none form-control" name="dark_logo" id="fileBrouse2" accept="image/*"></button>
                            </div>
                          </div> --}}
                          <div class="col-12">
                            <div class="">
                              <div class="row align-items-end">
                              
                                <div class="col-md-6 default-langauge mb-3">
                                  <div class="d-flex flex-column">
                                    <label for="default langauge" class="form-label">Default Langauge <span class="fillable">*</span></label> <select name="default_langauge" id="defaultlangaugeId" class="form-select ot-input flag_icon_list">
                                      <option value="en" data-icon="flag-icon flag-icon-us" selected>
                                        English
                                      </option>
                                      <option value="bn" data-icon="flag-icon flag-icon-bd">
                                        Bangla
                                      </option>
                                      <option value="ku" data-icon="flag-icon flag-icon-iq">
                                        kurdish
                                      </option>
                                      <option value="ar" data-icon="flag-icon flag-icon-sa">
                                        Arabic
                                      </option>
                                      <option value="fr" data-icon="flag-icon flag-icon-fr">
                                        French
                                      </option>
                                    </select>
                                  </div>
                                </div>
                                {{-- <div class="col-md-6 default-langauge mb-3">
                                  <div class="d-flex flex-column">
                                    <label for="currency_code" class="form-label">Currency <span class="fillable">*</span></label> <select name="currency_code" id="currency_code" class="form-select ot-input flag_icon_list">
                                      <option value="USD">
                                        USD — $
                                      </option>
                                      <option value="CAD">
                                        CAD — $
                                      </option>
                                      <option value="EUR">
                                        EUR — €
                                      </option>
                                      <option value="AED">
                                        AED — د.إ.‏
                                      </option>
                                      <option value="AFN">
                                        AFN — ؋
                                      </option>
                                      <option value="ALL">
                                        ALL — Lek
                                      </option>
                                      <option value="AMD">
                                        AMD — դր.
                                      </option>
                                      <option value="ARS">
                                        ARS — $
                                      </option>
                                      <option value="AUD">
                                        AUD — $
                                      </option>
                                      <option value="AZN">
                                        AZN — ман.
                                      </option>
                                      <option value="BAM">
                                        BAM — KM
                                      </option>
                                      <option value="BDT" selected>
                                        BDT — ৳
                                      </option>
                                      <option value="BGN">
                                        BGN — лв.
                                      </option>
                                      <option value="BHD">
                                        BHD — د.ب.‏
                                      </option>
                                      <option value="BIF">
                                        BIF — FBu
                                      </option>
                                      <option value="BND">
                                        BND — $
                                      </option>
                                      <option value="BOB">
                                        BOB — Bs
                                      </option>
                                      <option value="BRL">
                                        BRL — R$
                                      </option>
                                      <option value="BWP">
                                        BWP — P
                                      </option>
                                      <option value="BYN">
                                        BYN — руб.
                                      </option>
                                      <option value="BZD">
                                        BZD — $
                                      </option>
                                      <option value="CDF">
                                        CDF — FrCD
                                      </option>
                                      <option value="CHF">
                                        CHF — CHF
                                      </option>
                                      <option value="CLP">
                                        CLP — $
                                      </option>
                                      <option value="CNY">
                                        CNY — CN¥
                                      </option>
                                      <option value="COP">
                                        COP — $
                                      </option>
                                      <option value="CRC">
                                        CRC — ₡
                                      </option>
                                      <option value="CVE">
                                        CVE — CV$
                                      </option>
                                      <option value="CZK">
                                        CZK — Kč
                                      </option>
                                      <option value="DJF">
                                        DJF — Fdj
                                      </option>
                                      <option value="DKK">
                                        DKK — kr
                                      </option>
                                      <option value="DOP">
                                        DOP — RD$
                                      </option>
                                      <option value="DZD">
                                        DZD — د.ج.‏
                                      </option>
                                      <option value="EEK">
                                        EEK — kr
                                      </option>
                                      <option value="EGP">
                                        EGP — ج.م.‏
                                      </option>
                                      <option value="ERN">
                                        ERN — Nfk
                                      </option>
                                      <option value="ETB">
                                        ETB — Br
                                      </option>
                                      <option value="GBP">
                                        GBP — £
                                      </option>
                                      <option value="GEL">
                                        GEL — GEL
                                      </option>
                                      <option value="GHS">
                                        GHS — GH₵
                                      </option>
                                      <option value="GNF">
                                        GNF — FG
                                      </option>
                                      <option value="GTQ">
                                        GTQ — Q
                                      </option>
                                      <option value="HKD">
                                        HKD — $
                                      </option>
                                      <option value="HNL">
                                        HNL — L
                                      </option>
                                      <option value="HRK">
                                        HRK — kn
                                      </option>
                                      <option value="HUF">
                                        HUF — Ft
                                      </option>
                                      <option value="IDR">
                                        IDR — Rp
                                      </option>
                                      <option value="INR">
                                        INR — ₹
                                      </option>
                                      <option value="IQD">
                                        IQD — د.ع.‏
                                      </option>
                                      <option value="IRR">
                                        IRR — ﷼
                                      </option>
                                      <option value="ISK">
                                        ISK — kr
                                      </option>
                                      <option value="JMD">
                                        JMD — $
                                      </option>
                                      <option value="JOD">
                                        JOD — د.أ.‏
                                      </option>
                                      <option value="JPY">
                                        JPY — ￥
                                      </option>
                                      <option value="KES">
                                        KES — Ksh
                                      </option>
                                      <option value="KHR">
                                        KHR — ៛
                                      </option>
                                      <option value="KMF">
                                        KMF — FC
                                      </option>
                                      <option value="KRW">
                                        KRW — ₩
                                      </option>
                                      <option value="KWD">
                                        KWD — د.ك.‏
                                      </option>
                                      <option value="KZT">
                                        KZT — тңг.
                                      </option>
                                      <option value="LBP">
                                        LBP — ل.ل.‏
                                      </option>
                                      <option value="LKR">
                                        LKR — SL Re
                                      </option>
                                      <option value="LTL">
                                        LTL — Lt
                                      </option>
                                      <option value="LVL">
                                        LVL — Ls
                                      </option>
                                      <option value="LYD">
                                        LYD — د.ل.‏
                                      </option>
                                      <option value="MAD">
                                        MAD — د.م.‏
                                      </option>
                                      <option value="MDL">
                                        MDL — MDL
                                      </option>
                                      <option value="MGA">
                                        MGA — MGA
                                      </option>
                                      <option value="MKD">
                                        MKD — MKD
                                      </option>
                                      <option value="MMK">
                                        MMK — K
                                      </option>
                                      <option value="MOP">
                                        MOP — MOP$
                                      </option>
                                      <option value="MUR">
                                        MUR — MURs
                                      </option>
                                      <option value="MXN">
                                        MXN — $
                                      </option>
                                      <option value="MYR">
                                        MYR — RM
                                      </option>
                                      <option value="MZN">
                                        MZN — MTn
                                      </option>
                                      <option value="NAD">
                                        NAD — N$
                                      </option>
                                      <option value="NGN">
                                        NGN — ₦
                                      </option>
                                      <option value="NIO">
                                        NIO — C$
                                      </option>
                                      <option value="NOK">
                                        NOK — kr
                                      </option>
                                      <option value="NPR">
                                        NPR — नेरू
                                      </option>
                                      <option value="NZD">
                                        NZD — $
                                      </option>
                                      <option value="OMR">
                                        OMR — ر.ع.‏
                                      </option>
                                      <option value="PAB">
                                        PAB — B/.
                                      </option>
                                      <option value="PEN">
                                        PEN — S/.
                                      </option>
                                      <option value="PHP">
                                        PHP — ₱
                                      </option>
                                      <option value="PKR">
                                        PKR — ₨
                                      </option>
                                      <option value="PLN">
                                        PLN — zł
                                      </option>
                                      <option value="PYG">
                                        PYG — ₲
                                      </option>
                                      <option value="QAR">
                                        QAR — ر.ق.‏
                                      </option>
                                      <option value="RON">
                                        RON — RON
                                      </option>
                                      <option value="RSD">
                                        RSD — дин.
                                      </option>
                                      <option value="RUB">
                                        RUB — ₽.
                                      </option>
                                      <option value="RWF">
                                        RWF — FR
                                      </option>
                                      <option value="SAR">
                                        SAR — ر.س.‏
                                      </option>
                                      <option value="SDG">
                                        SDG — SDG
                                      </option>
                                      <option value="SEK">
                                        SEK — kr
                                      </option>
                                      <option value="SGD">
                                        SGD — $
                                      </option>
                                      <option value="SOS">
                                        SOS — Ssh
                                      </option>
                                      <option value="SYP">
                                        SYP — ل.س.‏
                                      </option>
                                      <option value="THB">
                                        THB — ฿
                                      </option>
                                      <option value="TND">
                                        TND — د.ت.‏
                                      </option>
                                      <option value="TOP">
                                        TOP — T$
                                      </option>
                                      <option value="TRY">
                                        TRY — TL
                                      </option>
                                      <option value="TTD">
                                        TTD — $
                                      </option>
                                      <option value="TWD">
                                        TWD — NT$
                                      </option>
                                      <option value="TZS">
                                        TZS — TSh
                                      </option>
                                      <option value="UAH">
                                        UAH — ₴
                                      </option>
                                      <option value="UGX">
                                        UGX — USh
                                      </option>
                                      <option value="UYU">
                                        UYU — $
                                      </option>
                                      <option value="UZS">
                                        UZS — UZS
                                      </option>
                                      <option value="VEF">
                                        VEF — Bs.F.
                                      </option>
                                      <option value="VND">
                                        VND — ₫
                                      </option>
                                      <option value="XAF">
                                        XAF — FCFA
                                      </option>
                                      <option value="XOF">
                                        XOF — CFA
                                      </option>
                                      <option value="YER">
                                        YER — ر.ي.‏
                                      </option>
                                      <option value="ZAR">
                                        ZAR — R
                                      </option>
                                      <option value="ZMK">
                                        ZMK — ZK
                                      </option>
                                      <option value="ZWL">
                                        ZWL — ZWL$
                                      </option>
                                    </select>
                                  </div>
                                </div> --}}
                                <div class="col-md-6 default-langauge mb-3">
                                  <div class="d-flex flex-column">
                                    <label for="session" class="form-label">Session <span class="fillable">*</span></label> <select name="session" id="session" class="form-select ot-input flag_icon_list">
                                      <option selected value="1">
                                        2024
                                      </option>
                                      <option value="2">
                                        2025
                                      </option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>   
    </div>
</div>
@endsection