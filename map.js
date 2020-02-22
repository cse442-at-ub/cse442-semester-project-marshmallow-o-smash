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

function tile_list(center_tile){
  let tiles=[];
  let zoom=center_tile.getZoom();
  let x=center_tile.getX();
  let y=center_tile.getY();
  if(zoom==0) {
  for(var i =0; i<9; i++) { tiles[i]=new Tile(zoom, x, y);}}
  if(zoom==1){
    tiles=[
      new Tile(zoom, 0,1),
      new Tile(zoom, 1,1),
      new Tile(zoom, 0,1),
      new Tile(zoom, 0,0),
      center_tile,
      new Tile(zoom, 0,0),
      new Tile(zoom, 0,1),
      new Tile(zoom, 1,1),
      new Tile(zoom, 0,1),
    ];
  }else{
    tiles=[
      new Tile(zoom, x-1,y-1),
      new Tile(zoom, x,y-1),
      new Tile(zoom, x+1,y-1),
      new Tile(zoom, x-1,y),
      center_tile,
      new Tile(zoom, x+1,y),
      new Tile(zoom, x-1,y+1),
      new Tile(zoom, x,y+1),
      new Tile(zoom, x+1,y+1),
    ];
  }
  return tiles;
}

function display(tiles){
  for (var i=0;i<tiles.length;i++){
    let img = document.createElement("IMG");
    img.setAttribute("src", tiles[i].getURL());
    document.body.appendChild(img);
  }
}

let center = getTile(3, 42.8863889, -78.8786111);
let list = tile_list(center);
display(list);
