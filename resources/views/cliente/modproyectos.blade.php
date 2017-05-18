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
                        "isEnabled":false,
                        initialContentAlignment: go.Spot.Center,  // center the content
                        "ModelChanged": function(e) {
                            if (e.isTransactionFinished) {
                                document.getElementById("mySavedModel").textContent = myDiagram.model.toJson();
                            }
                        },
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
                                    {margin: 10, width: 60, height: 60, },
                                    // Picture.source is data bound to the "source" attribute of the model data
                                    new go.Binding("source")),
                            $$(go.TextBlock,
                                    {margin: 12, stroke: "white", font: "bold 10px sans-serif"},
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
            // myDiagram.model = new go.GraphObject(jsondata["nodeDataArray"]);

        }

        // initialize the Palette that is on the left side of the page
        myPaletteDiv1 =
                $(go.Palette, "myPaletteDiv1",  // must name or refer to the DIV HTML element
                        {
                            nodeTemplate: myDiagram.nodeTemplate,
                        });
        myPaletteDiv1.model = new go.GraphLinksModel(  [ // note that each node data object holds whatever properties it needs;
            // for this app we add the "name" and "source" properties
                @foreach($componentes as $c)
                 @if($c->validado == 1)
            {

                name: "{{$c->nombre}}", source: "{{$c->imagen}}", precio: "{{$c->precio}}"

            },
            @endif
            @endforeach
            ]);


        /*
         var casa_actual = 1;
         var casa_plano = 1;
         jQuery(".casa1").click(function () {
         jQuery("#myDiagramDiv").removeClass("canvas-casa-" + casa_actual);
         jQuery("#myDiagramDiv").removeClass("canvas-plano-" + casa_plano);
         jQuery("#myDiagramDiv").addClass("canvas-casa-1");
         jQuery("#myDiagramDiv").addClass("canvas-plano-1");
         document.getElementById("class-plano").value = "canvas-plano-1";
         document.getElementById("class-casa").value = "canvas-casa-1";
         casa_actual = 1;
         casa_plano = 1;
         });

         jQuery(".casa2").click(function () {
         jQuery("#myDiagramDiv").removeClass("canvas-casa-" + casa_actual);
         jQuery("#myDiagramDiv").removeClass("canvas-plano-" + casa_plano);
         jQuery("#myDiagramDiv").addClass("canvas-casa-2");
         jQuery("#myDiagramDiv").addClass("canvas-plano-2");
         document.getElementById("class-plano").value = "canvas-plano-2";
         document.getElementById("class-casa").value = "canvas-casa-2";
         casa_actual = 2;
         casa_plano = 2;
         });

         jQuery(".casa3").click(function () {
         jQuery("#myDiagramDiv").removeClass("canvas-casa-" + casa_actual);
         jQuery("#myDiagramDiv").removeClass("canvas-plano-" + casa_plano);
         jQuery("#myDiagramDiv").addClass("canvas-casa-3");
         jQuery("#myDiagramDiv").addClass("canvas-plano-3");
         document.getElementById("class-plano").value = "canvas-plano-3";
         document.getElementById("class-casa").value = "canvas-casa-3";
         casa_actual = 3;
         casa_plano = 3;
         });

         jQuery(".casa4").click(function () {
         jQuery("#myDiagramDiv").removeClass("canvas-casa-" + casa_actual);
         jQuery("#myDiagramDiv").removeClass("canvas-plano-" + casa_plano);
         jQuery("#myDiagramDiv").addClass("canvas-casa-4");
         jQuery("#myDiagramDiv").addClass("canvas-plano-4");
         document.getElementById("class-plano").value = "canvas-plano-4";
         document.getElementById("class-casa").value = "canvas-casa-4";
         casa_actual = 4;
         casa_plano = 4;
         });

         jQuery(".casa5").click(function () {
         jQuery("#myDiagramDiv").removeClass("canvas-casa-" + casa_actual);
         jQuery("#myDiagramDiv").removeClass("canvas-plano-" + casa_plano);
         jQuery("#myDiagramDiv").addClass("canvas-casa-5");
         jQuery("#myDiagramDiv").addClass("canvas-plano-5");
         document.getElementById("class-plano").value = "canvas-plano-5";
         document.getElementById("class-casa").value = "canvas-casa-5";
         casa_actual = 5;
         casa_plano = 5;
         });*/
    </script>

</head>
<body onload="init()">
<div id="app">
    <div class="container">
        <div class="row content">
            <div class="col-sm-2 panel panel-default">
                <form action="{{url('cambiarestado2cliente',$proyecto->id)}}" method="GET">
                    {!! csrf_field() !!}
                    <input type="submit" class="btn btn-success  btn-block"
                           value="Aceptar">
                </form><br>
                <form action="{{url('/home')}}" method="GET">
                    {!! csrf_field() !!}
                    <input type="submit" class="btn btn-primary btn-block"
                           value="Volver">
                </form>
            </div>
            <div class="panel col-sm-8 panel-default ">
                <div class="panel-body">
                    @foreach($users as $u)
                        @if($u->id == $proyecto->id_cliente)
                            <p><b>Cliente:  </b>{{$u->nombre}}&nbsp;&nbsp;{{$u->apellidos}}</p>
                        @endif
                    @endforeach
                    <p><b>Nombre de proyecto:  </b>{{$proyecto->nombre}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Precio:  </b>{{$proyecto->precio}}&euro;</p>
                </div>
                <div style="position: relative;">
                    <div class="{{$proyecto->class_plano}} {{$proyecto->class_casa}}" style="position: absolute;  width:100%; height: 100%; z-index: 1;"></div>
                    <div id="myDiagramDiv" style="position: absolute; width:100%; height:100%; z-index: 2;" >
                    </div>
                    <div class="form-group">
                        <textarea id="mySavedModel" name="configuracion"></textarea>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
            <div class="col-sm-2 panel panel-default">
                <form action="{{route('proyecto.destroy', $proyecto->id)}}" method="POST">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <input type="submit" class="btn btn-danger btn-block" value="Borrar">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>