function Tile(zoom, x, y){
  this.zoom=zoom;
  this.x=x;
  this.y=y;
  this.getZoom=function(){return this.zoom;}
  this.getX=function(){return this.x;}
  this.getY=function(){return this.y;}
  this.getURL=function() {
  let x = "http://tile.openstreetmap.org/" + this.zoom + "/" + this.x + "/" + this.y + ".png";
  let url=null;
  try {
    url = new URL(x);
  }catch(err) {
  }
    return url;
}
}

let center = getTile(3, 42.8863889, -78.8786111);
var zoom=center.getZoom();
var x=center.getX();
var y=center.getY();
console.log(y);
console.log(x);
console.log(zoom);
var img = document.createElement("IMG");
//img.setAttribute("src", "http://a.tile.openstreetmap.org/"+zoom+"/"+x+"/"+y+".png");
img.setAttribute("src", center.getURL());
document.body.appendChild(img);

function getTile(zoom, long, lati){
  longitudeInRadians = Math.PI * long / 180.0;
  latitudeInRadians = Math.PI * lati / 180.0;

  let howManyTilesAtThisZoomLevel = Math.pow(2.0, zoom);

  let x = longitudeInRadians;
  let y = Math.log(Math.tan(latitudeInRadians) + (1.0 / Math.cos(latitudeInRadians)));

  x = (1 + (x / Math.PI)) / 2.0;
  y = (1 - (y / Math.PI)) / 2.0;

  x *= howManyTilesAtThisZoomLevel;
  y *= howManyTilesAtThisZoomLevel;
  return new Tile(zoom, parseInt(x), parseInt(y));
}
