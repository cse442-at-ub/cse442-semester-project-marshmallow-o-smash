var zoom=6;
var x=17;
var y=23;
var img = document.createElement("IMG");
img.setAttribute("src", "http://a.tile.openstreetmap.org/"+zoom+"/"+x+"/"+y+".png");
document.body.appendChild(img);
