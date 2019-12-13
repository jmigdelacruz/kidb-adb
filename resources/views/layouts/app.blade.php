<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css" integrity="sha384-QokYePQSOwpBDuhlHOsX0ymF6R/vLk/UQVz3WHa6wygxI5oGTmDTv8wahFOSspdm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css" integrity="sha384-vd1e11sR28tEK9YANUtpIOdjGW14pS87bUBuOIoBILVWLFnS+MCX9T6MMf0VdPGq" crossorigin="anonymous">
    @yield('custom-styles')
</head>
<body>
    <div class="kia__brand">
        <img src="{{ url('imgs/adb-logo.svg') }}" class="kia__logo">
    </div>
    <nav class="kia__nav">
        <ul class="kia__ul">
            <li><a class="kia__brand--title">SDMX API</a></li>
            <li><a class="kia__brand--subtitle">The Key Indicators database presents the latest statistics on a comprehensive set of economic, financial, social, environmental, and SDG indicators for the 49 regional members of the Asian Development Bank (ADB). KI data can be programatically retrieved by specifying values for the API endpoints described below.</a></li>


            The Statistical Data and Metadata eXchange Application Programming Interface is a web service which allows users to programmatically access database records that are available in the Key Indicators Database. This API allows users to fetch non-SDMX data and receive it in SDMX-format from any computer language, operating system, or platform that can generate web requests.

            Data was last updated on XXX.

        </ul>
    </nav>

    <main>
        @yield('content')
    </main>
<script src="{{ url('js/jquery.min.js') }}"></script>
@yield('scripts')
</body>
</html>
