function makeDraggable(evt) {
  var svg = evt.target;
  svg.addEventListener("mousedown", startDrag);
  svg.addEventListener("mousemove", drag);
  svg.addEventListener("mouseup", endDrag);
  svg.addEventListener("mouseleave", endDrag);
  

 
  

  function getMousePosition(evt) {
    var CTM = svg.getScreenCTM();
    return {
      x: (evt.clientX - CTM.e) / CTM.a,
      y: (evt.clientY - CTM.f) / CTM.d,
    };
  }

  var selectedElement, offset;

  function startDrag(evt) {
    if (evt.target.classList.contains("draggable")) {
      selectedElement = evt.target;
      offset = getMousePosition(evt);
      offset.x -= parseFloat(selectedElement.getAttributeNS(null, "x"));
      offset.y -= parseFloat(selectedElement.getAttributeNS(null, "y"));
    }
  }

  function drag(evt) {
    if (evt.target.classList.contains("draggable")) {
      if (selectedElement) {
        evt.preventDefault();
        var coord = getMousePosition(evt);
        selectedElement.setAttributeNS(null, "x", coord.x - offset.x);
        selectedElement.setAttributeNS(null, "y", coord.y - offset.y);
      }
    }
  }

  function endDrag(evt) {
    if (evt.target.classList.contains("draggable")) {
      var id = selectedElement.getAttribute("id");
      var x = selectedElement.getAttribute("x");
      var y = selectedElement.getAttribute("y");

      console.log("ID: " + id + ", X: " + x + ", Y: " + y);
      xajax_changePosition(id, x, y);
      console.log("xajax_changePosition done");
      selectedElement = null;
    }
  }
}
