@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row content">
            <div class="col-sm-2 panel panel-default">
                <div class="panel-heading text-center"><h3><b>Planos</b></h3></div>
                <div class="panel-body text-center">
                    @if(isset($planos))
                        @foreach($planos as $p)
                            <h4><b>{{ $p->nombre }}</b></h4>
                            <a class="{{$p->nombre_class}}"><img src="{{$p->icono_plano}}"/></a>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="panel col-sm-8 panel-default ">
                <div class="panel-heading text-center"><h3><b>Tipos de Componentes</b></h3></div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1default" data-toggle="tab">Cocina</a></li>
                        <li><a href="#tab2default" data-toggle="tab">Baño</a></li>
                        <li><a href="#tab3default" data-toggle="tab">Habitacion</a></li>
                        <li><a href="#tab4default" data-toggle="tab">Salon</a></li>
                        <li><a href="#tab5default" data-toggle="tab">Terraza</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                            <div id="myPaletteDiv1" style="border: solid 1px black; height: 100px"></div>
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            <div id="myPaletteDiv2" style="border: solid 1px black; height: 100px"></div>
                        </div>
                        <div class="tab-pane fade" id="tab3default">
                            <div id="myPaletteDiv3" style="border: solid 1px black; height: 100px"></div>
                        </div>
                        <div class="tab-pane fade" id="tab4default">
                            <div id="myPaletteDiv4" style="border: solid 1px black; height: 100px"></div>
                        </div>
                        <div class="tab-pane fade" id="tab5default">
                            <div id="myPaletteDiv5" style="border: solid 1px black; height: 100px"></div>
                        </div>
                    </div>
                </div>
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
                        <div id="myDiagramDiv" class="canvas-plano-1 canvas-casa-1" ></div>
                        <br>
                        <div class="form-group">
                            <textarea id="mySavedModel" name="configuracion"></textarea>
                        </div>
                        <input type="hidden" id="class-plano" value="canvas-plano-1" name="plano">
                        <input type="hidden" id="class-casa" value="canvas-casa-1" name="casa">
                        <input type="submit" value="Guardar Proyecto" class="btn btn-success">
                    </form>
                </div>
            </div>

            <div class="col-sm-2 panel panel-default">
                <div class="panel-body">
                    <a href="{{url('/proyectos')}}">
                        <button type="button" class="btn btn-primary btn-block">Mis Proyectos</button>
                    </a>
                    <br>
                    <a href="{{route('mensajeria.index')}}">
                        <button type="button" class="btn btn-success btn-block">Mensajeria</button>
                    </a>
                    <br>
                </div>
                <div class="panel-heading text-center"><h3><b>Cuenta</b></h3></div>
                <div class="panel-body">
                    <div class="well">
                        <p>ADS</p>
                    </div>
                    <div class="well">
                        <p>ADS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>

    function init() {
        var $ = go.GraphObject.make;  // for conciseness in defining templates
        myDiagram =
                $(go.Diagram, "myDiagramDiv",  // must name or refer to the DIV HTML element
                        {
                            allowDrop: true,   // must be true to accept drops from the Palette
                            // automatically show the state of the diagram's model on the page in a <PRE> element
                            "ModelChanged": function(e) {
                                if (e.isTransactionFinished) {
                                    document.getElementById("mySavedModel").textContent = myDiagram.model.toJson();
                                }
                            },
                            "undoManager.isEnabled": true
                        });
        myDiagram.nodeTemplateMap.add("",  // the default category
                $(go.Node, go.Panel.Auto,
                        // the entire node will have a light-blue background
                        {background: "#44CCFF"},
                        new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
                        $(go.Picture,
                                // Pictures should normally have an explicit width and height.
                                // This picture has a red background, only visible when there is no source set
                                // or when the image is partially transparent.
                                {margin: 10, width: 50, height: 50, background: "red"},
                                // Picture.source is data bound to the "source" attribute of the model data
                                new go.Binding("source")),
                        $(go.TextBlock,
                                "Default Text",  // the initial value for TextBlock.text
                                // some room around the text, a larger font, and a white stroke:
                                {margin: 12, stroke: "white", font: "bold 16px sans-serif"},
                                // TextBlock.text is data bound to the "name" attribute of the model data
                                new go.Binding("text", "name"))
                ));

        myDiagram.linkTemplate =
                $(go.Link,
                        $(go.Shape, { strokeWidth: 1.5 }),
                        $(go.Shape, { toArrow: "Standard", stroke: null }));
        // this DiagramEvent is raised when the user has drag-and-dropped something
        // from another Diagram (a Palette in this case) into this Diagram
        myDiagram.addDiagramListener("ExternalObjectsDropped", function(e) {
            // stop any ongoing text editing
            if (myDiagram.currentTool instanceof go.TextEditingTool) {
                myDiagram.currentTool.acceptText(go.TextEditingTool.LostFocus);
            }
            // expand any "macros"
            myDiagram.commandHandler.ungroupSelection();
            // start editing the first node that was dropped after ungrouping
            var tb = myDiagram.selection.first().findObject('TEXT');
            if (tb) myDiagram.commandHandler.editTextBlock(tb);
        });

        // initialize the Palette that is on the left side of the page
        myPaletteDiv1 =
                $(go.Palette, "myPaletteDiv1",  // must name or refer to the DIV HTML element
                        {
                            nodeTemplateMap: myDiagram.nodeTemplateMap,
                        });
        myPaletteDiv1.model = new go.GraphLinksModel(  [ // note that each node data object holds whatever properties it needs;
            // for this app we add the "name" and "source" properties
                @foreach($componentes as $c)

            {
                name: "{{$c->nombre}}", source: "{{$c->imagen}}"
            },

            @endforeach
        ]);


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
        });


    }


</script>

