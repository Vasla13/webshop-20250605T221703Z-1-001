function zoomPicByID(sIDPic, target_width) {
  var img = document.getElementById(sIDPic);
  if (!img) return;
  var w = img.width;
  var h = img.height;

  if (target_width > w) {
    w += 2;
    h += 2;
    if (w >= target_width) return;
  } else {
    w += 2;
    h += 2;
    if (w >= target_width) return;
  }
  img.width = w;
  img.height = h;

  setTimeout(function () {
    zoomPicByID(sIDPic, target_width);
  }, 215);
}
