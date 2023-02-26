var http = require('http');
var url = require('url');
var fs = require('fs');
var path = require('path');

var port = 8080;

console.log("Starting server on port " + port);

http.createServer(function (req, res) {
  //not normally recommended to have an exit command for our web server, but a student wanted to know how!
  if(url.parse(req.url, true).pathname == '/exit') {
    process.exit();
  }else if(url.parse(req.url, true).pathname == '/') { //detect no specific page requested
    req.url = "/index.html"; //set default page to load
  }
  
  var q = url.parse(req.url, true);
  var filename = "." + q.pathname;
  var content_type = 'text/html';
  
  if(q.pathname.endsWith('.css')) {
	  content_type = 'text/css';
  }
  
  fs.readFile(filename, function(err, data) {
    if (err) {
      res.writeHead(404, {'Content-Type': 'text/html'});
      return res.end("404 Not Found");
    }
	
    res.writeHead(200, {'Content-Type': content_type});
    res.write(data);
    return res.end();
  });
}).listen(port);