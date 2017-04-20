<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML Drag and Drop</title>
    <meta name="description" content="Drag-and-drop HTML elements into a GoJS Diagram using jQuery." />
    <!-- Copyright 1998-2017 by Northwoods Software Corporation. -->
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>

    <script src="../release/go.js"></script>
    <script src="../assets/js/goSamples.js"></script>  <!-- this is only for the GoJS Samples framework -->

    <script id="code">
        function init() {
            if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
            // Note that we do not use $ here as an alias for go.GraphObject.make because we are using $ for jQuery
            var $$ = go.GraphObject.make;  // for conciseness in defining templates
            myDiagram =
                    $$(go.Diagram, "myDiagramDiv",  // must name or refer to the DIV HTML element
                            { initialPosition: new go.Point(0, 0), "animationManager.isEnabled": false });
            myDiagram.nodeTemplate =
                    $$(go.Node, "Auto",
                            { locationSpot: go.Spot.Center },
                            new go.Binding("location", "loc", go.Point.parse),
                            $$(go.Shape, "Ellipse",
                                    { fill: "white" }),
                            $$(go.TextBlock,
                                    { margin: 5 },
                                    new go.Binding("text", "text").makeTwoWay()));
            $("li").draggable({
                stack: "#myDiagramDiv",
                revert: true,
                revertDuration: 0
            });
            $("#myDiagramDiv").droppable({
                activeClass: "ui-state-highlight",
                drop: function(event, ui) {
                    var elt = ui.draggable.first();
                    var text = elt[0].textContent;
                    var x = ui.offset.left - $(this).offset().left;
                    var y = ui.offset.top - $(this).offset().top;
                    var p = new go.Point(x, y);
                    var q = myDiagram.transformViewToDoc(p);
                    var model = myDiagram.model;
                    model.startTransaction("drop");
                    model.addNodeData({
                        text: text,
                        loc: go.Point.stringify(q)
                    });
                    model.commitTransaction("drop");
                }
            });
        }
    </script>
</head>
<body onload="init()">
<div id="sample">
    <div style="width:100%; white-space:nowrap;">
    <span style="display: inline-block; vertical-align: top; width:20%">
      <div id="myItems" style="border: solid 1px black; height: 700px">
          <ul>
              <li>First</li>
              <li>Second</li>
              <li>Third</li>
              <li>Fourth</li>
              <li>Fifth</li>
          </ul>
      </div>
    </span>
    <span style="display: inline-block; vertical-align: top; width:80%">
      <div id="myDiagramDiv" style="border: solid 1px black; height: 700px"></div>
    </span>
    </div>
    <div id ="description">
        <p>
            This demonstrates using jQuery drag-and-drop capability to allow the user to drag HTML list items into a GoJS diagram.
        </p>
    </div>
</div>
</body>
</html>