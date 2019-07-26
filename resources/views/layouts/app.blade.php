<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css" integrity="sha384-QokYePQSOwpBDuhlHOsX0ymF6R/vLk/UQVz3WHa6wygxI5oGTmDTv8wahFOSspdm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css" integrity="sha384-vd1e11sR28tEK9YANUtpIOdjGW14pS87bUBuOIoBILVWLFnS+MCX9T6MMf0VdPGq" crossorigin="anonymous">
    @yield('custom-styles')
</head>
<body>
    <header class="header is-hidden-touch" id="top">
        <div class="container">
            <p id="aux-menu" class="is-hidden-mobile">
                <a href="https://www.adb.org">ADB.org</a>
                
                
                <a href="/kidb/terms">Terms of Use</a>          
                <a href="/kidb/contact">Contact</a>
                
            </p>
            <div class="banner level is-mobile">
                <div class="level-left">
                    <a href="https://www.adb.org" class="level-item">
                        <img src="imgs/adblogo.png" alt="Key Indicators Database - Asian Development Bank" id="toplogo">
                    </a>
                    <a href="/kidb/">
                        <h2 class="title">Key Indicators Database</h2>
                    </a>
                </div>

            </div>
            
        </div>
    </header>
                


    <div class="navbar" id="topnav">
        <div class="container">
            <div class="navbar-brand is-hidden-desktop">
                <a href="/kidb/" class="navbar-item">
                    <img src="imgs/adblogo.png" alt="Asian Development Bank" id="mobile-logo">
                    <span class="site-title">Key Indicators Database</span>
                </a>
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    <a href="/kidb/" class="navbar-item" id="home">Home</a>
                    <a href="/kidb/onlineQuery" class="navbar-item" id="onlineQuery">Search Data</a>
                    <a href="/kidb/sdbsCountryView" class="navbar-item" id="sdbsCountryView">Country View</a>
                    <a href="/kidb/sdg" class="navbar-item" id="sdg">SDGs</a>
                    <a href="/kidb/regionalKI" class="navbar-item" id="regionalKI">Regional Tables</a>
                    <a href="/kidb/graphs/sdbsgraphs" class="navbar-item" id="statistical">Charts</a>
                    <a href="/kidb/downloads/gvc" class="navbar-item" id="gvc">GVCs</a>
                    <a href="/api" class="navbar-item" id="gvc">API</a>
                    <a href="/kidb/references" class="navbar-item" id="references">References</a>
                    <a href="/kidb/faq" class="navbar-item" id="faq">FAQs</a>
                </div>
                
            </div>
        </div>
    </div>

    <!-- <div class="kia__brand">
        <img src="{{ url('imgs/adb-logo.svg') }}" class="kia__logo">
    </div>
    <nav class="kia__nav">
        <ul class="kia__ul">
            <li><a class="kia__brand--title">Key Indicators Database SDMX API</a></li>
            <li><a class="kia__brand--subtitle">The Key Indicators (KI) database presents the latest statistics on a comprehensive set of economic, financial, social, environmental, and SDG indicators for the 49 regional members of the Asian Development Bank (ADB). KI data can be programatically retrieved by specifying values for the API endpoints described below.</a></li>
        </ul>
    </nav> -->

    <div class="container" style="margin-bottom: 5em;">
        <section class="section page-intro is-blue is-dark">
            <div class="content">
                <header>
                    <h1>Key Indicators Database SDMX API</h1>
                </header>
                <p>The Key Indicators (KI) database presents the latest statistics on a comprehensive set of economic, financial, social, environmental, and SDG indicators for the 49 regional members of the Asian Development Bank (ADB). KI data can be programatically retrieved by specifying values for the API endpoints described below.</p>
            </div>
        </section>
        @yield('content')
    </div>
<script src="{{ url('js/jquery.min.js') }}"></script>
@yield('scripts')
</body>
</html>
