<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/go-debug.js"></script>
    <script src="../assets/js/jquery.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script>
        function init() {
            var $$ = go.GraphObject.make;  // for conciseness in defining templates, avoid $ due to jQuery
            myDiagram = $$(go.Diagram, "myDiagramDiv", // create a Diagram for the DIV HTML element
                    {
                        initialContentAlignment: go.Spot.Center,  // center the content
                        "undoManager.isEnabled": true  // enable undo & redo
                    });
            // define a simple Node template
            myDiagram.nodeTemplate =
                    $$(go.Node, "Auto",  // the Shape will go around the TextBlock
                            new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
                            $$(go.Picture,
                                    // Pictures should normally have an explicit width and height.
                                    // This picture has a red background, only visible when there is no source set
                                    // or when the image is partially transparent.
                                    {margin: 10, width: 50, height: 50, background: "red"},
                                    // Picture.source is data bound to the "source" attribute of the model data
                                    new go.Binding("source")),
                            $$(go.TextBlock,
                                    {margin: 12, stroke: "white", font: "bold 16px sans-serif"},
                                    // TextBlock.text is bound to Node.data.key
                                    new go.Binding("text", "name"))
                    );
            // but use the default Link template, by not setting Diagram.linkTemplate
            // The previous initialization is the same as the minimal.html sample.
            // Here we request JSON-format text data from the server, in this case from a static file.

            jQuery.getJSON("../json/{{$proyecto->configuracion}}", load);
        }
        function load(jsondata) {
            // create the model from the data in the JavaScript object parsed from JSON text
            myDiagram.model = new go.GraphLinksModel(jsondata["nodeDataArray"]);

        }
    </script>

</head>
<body onload="init()">
<div id="app">

    <div class="panel-heading text-center"><h3><b>Configuracion</b></h3></div>
    <div class="panel-body text-center">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('proyecto.store')}}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="nombre" class="col-md-4 control-label">Nombre Proyecto</label>

                <div class="col-md-6">
                    <input id="nombre" type="text" class="form-control" name="nombre"
                           value="{{ old('nombre') }}" required>
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div id="myDiagramDiv" style="border: solid 1px black; width:1000px; height:1000px"></div>
            <br>
            <div class="form-group">
                <label for="configuracion">Configuracion</label>
                        <textarea id="mySavedModel" name="configuracion" class="form-control">{{ old('configuracion') }}
                        </textarea>
            </div>
            <input type="hidden" id="class-plano" value="canvas-plano-1" name="plano">
            <input type="hidden" id="class-casa" value="canvas-casa-1" name="casa">
            <input type="submit" value="Guardar Proyecto" class="btn btn-success">
        </form>
    </div>
</body>
</html>