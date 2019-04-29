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
            <li><a class="kia__brand--title">Key Indicators Database SDMX API</a></li>
            <li><a class="kia__brand--subtitle">The Key Indicators (KI) database presents the latest statistics on a comprehensive set of economic, financial, social, environmental, and SDG indicators for the 49 regional members of the Asian Development Bank (ADB). KI data can be programatically retrieved by specifying values for the API endpoints described below.</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>
<script src="{{ url('js/jquery.min.js') }}"></script>
@yield('scripts')
</body>
</html>
