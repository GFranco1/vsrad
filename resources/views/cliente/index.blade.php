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
                            @if(isset($componentes))
                                @foreach($componentes as $c)
                                    @if($c->zona == 1)
                                        <img src="{{$c->imagen}}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            @if(isset($componentes))
                                @foreach($componentes as $c)
                                    @if($c->zona == 2)
                                        <img src="{{$c->imagen}}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="tab3default">
                            @if(isset($componentes))
                                @foreach($componentes as $c)
                                    @if($c->zona == 3)
                                        <img src="{{$c->imagen}}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="tab4default">
                            @if(isset($componentes))
                                @foreach($componentes as $c)
                                    @if($c->zona == 4)
                                        <img src="{{$c->imagen}}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="tab5default">
                            @if(isset($componentes))
                                @foreach($componentes as $c)
                                    @if($c->zona == 5)
                                        <img src="{{$c->imagen}}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel-heading text-center"><h3><b>Configuracion</b></h3></div>
                <div class="panel-body text-center">
                    <div id="myDiagramDiv" class="canvas-plano-1 canvas-casa-1"></div>
                </div>
            </div>

            <div class="col-sm-2 panel panel-default">
                <div class="panel-heading text-center"><h3><b>Cuenta</b></h3></div>
                <div class="panel-body">
                    <div class="well">
                        <p>ADS</p>
                    </div>
                    <div class="well">
                        <p>ADS</p>
                    </div>
                </div>
                <div class="panel-body">

                    <a href="{{url(' ')}}">
                        <button type="button" class="btn btn-primary btn-block">Validar proyecto</button>
                    </a>
                    <br>
                    <a href="{{url(' ')}}">
                        <button type="button" class="btn btn-success btn-block">Guardar proyecto</button>
                    </a>
                    <br>
                    <a href="{{url(' ')}}">
                        <button type="button" class="btn btn-danger btn-block">Borrar proyecto</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>

    function init() {
        var $ = go.GraphObject.make;
        var myDiagram = $(go.Diagram, "myDiagramDiv");
        var model = $(go.Model);

        myDiagram.nodeTemplate =
                $(go.Node, "Vertical",
                        // the entire node will have a light-blue background
                        {background: "#44CCFF"},
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
                );

        model.nodeDataArray =
                [ // note that each node data object holds whatever properties it needs;
                    // for this app we add the "name" and "source" properties
                    {name: "Humo", source: "http://lorempixel.com/100/100"},
                    {name: "Puerta", source: "http://lorempixel.com/100/100"},
                    {name: "Centralita", source: "http://lorempixel.com/100/100"}
                ];

        myDiagram.model = model;

        var casa_actual = 1;
        var casa_plano = 1;
        jQuery(".casa1").click(function () {
            jQuery("#myDiagramDiv").removeClass("canvas-casa-" + casa_actual);
            jQuery("#myDiagramDiv").removeClass("canvas-plano-" + casa_plano);
            jQuery("#myDiagramDiv").addClass("canvas-casa-1");
            jQuery("#myDiagramDiv").addClass("canvas-plano-1");
            casa_actual = 1;
            casa_plano = 1;
        });

        jQuery(".casa2").click(function () {
            jQuery("#myDiagramDiv").removeClass("canvas-casa-" + casa_actual);
            jQuery("#myDiagramDiv").removeClass("canvas-plano-" + casa_plano);
            jQuery("#myDiagramDiv").addClass("canvas-casa-2");
            jQuery("#myDiagramDiv").addClass("canvas-plano-2");
            casa_actual = 2;
            casa_plano = 2;
        });

        jQuery(".casa3").click(function () {
            jQuery("#myDiagramDiv").removeClass("canvas-casa-" + casa_actual);
            jQuery("#myDiagramDiv").removeClass("canvas-plano-" + casa_plano);
            jQuery("#myDiagramDiv").addClass("canvas-casa-3");
            jQuery("#myDiagramDiv").addClass("canvas-plano-3");
            casa_actual = 3;
            casa_plano = 3;
        });

        jQuery(".casa4").click(function () {
            jQuery("#myDiagramDiv").removeClass("canvas-casa-" + casa_actual);
            jQuery("#myDiagramDiv").removeClass("canvas-plano-" + casa_plano);
            jQuery("#myDiagramDiv").addClass("canvas-casa-4");
            jQuery("#myDiagramDiv").addClass("canvas-plano-4");
            casa_actual = 4;
            casa_plano = 4;
        });

        jQuery(".casa5").click(function () {
            jQuery("#myDiagramDiv").removeClass("canvas-casa-" + casa_actual);
            jQuery("#myDiagramDiv").removeClass("canvas-plano-" + casa_plano);
            jQuery("#myDiagramDiv").addClass("canvas-casa-5");
            jQuery("#myDiagramDiv").addClass("canvas-plano-5");
            casa_actual = 5;
            casa_plano = 5;
        });

    }
    /*
     function init() {
     if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
     var $ = go.GraphObject.make;  // for conciseness in defining templates

     myDiagram = $(go.Diagram, "myDiagramDiv",  // create a Diagram for the DIV HTML element
     { initialContentAlignment: go.Spot.Center });  // center the content

     // define a simple Node template
     myDiagram.nodeTemplate =
     $(go.Node, "Auto",
     $(go.Shape, "RoundedRectangle",
     // Shape.fill is bound to Node.data.color
     new go.Binding("fill", "color")),
     $(go.TextBlock,
     { margin: 3 },  // some room around the text
     // TextBlock.text is bound to Node.data.key
     new go.Binding("text", "key"))
     );

     // but use the default Link template, by not setting Diagram.linkTemplate

     // create the model data that will be represented by Nodes and Links
     myDiagram.model = new go.GraphLinksModel(
     [
     { key: "Alpha", color: "lightblue" },
     { key: "Beta", color: "orange" },
     { key: "Gamma", color: "lightgreen" },
     { key: "Delta", color: "pink" }
     ],
     [
     { from: "Alpha", to: "Beta" },
     { from: "Alpha", to: "Gamma" },
     { from: "Beta", to: "Beta" },
     { from: "Gamma", to: "Delta" },
     { from: "Delta", to: "Alpha" }
     ]);

     // enable Ctrl-Z to undo and Ctrl-Y to redo
     // (should do this after assigning Diagram.model)
     myDiagram.undoManager.isEnabled = true;
     }*/
</script>

