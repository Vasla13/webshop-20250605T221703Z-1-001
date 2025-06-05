function sendRequest(url, cb, params, HttpMethod = "POST") {
  // cb ist Callbackfunktion .. wird mehrmals aufgerufen
  var req;
  if (window.XMLHttpRequest) req = new XMLHttpRequest();
  else if (typeof ActiveXobject != "undefined")
    req = new ActiveXobject("Microsoft.XMLHTTP");

  if (!req) return;

  req.onreadystatechange = cb;
  req.open(HttpMethod, url, true);
  req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  req.send(params);
}
