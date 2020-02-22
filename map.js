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

function getTile(zoom, lati, long){
  let longitudeInRadians = Math.PI * long / 180.0;
  let latitudeInRadians = Math.PI * lati / 180.0;

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
  let index=0;
  for (var i=0;i<3;i++){
    for(var j=0;j<3;j++){
      let img = document.createElement("IMG");
      img.setAttribute("src", tiles[index].getURL());
      img.setAttribute("style", "max-width:33%;");
      index++;
      document.getElementById("row"+i).appendChild(img);
    }
//    document.body.appendChild(img);

  }
}
let center = getTile(16, 43.0007353, -78.7888962);
//let center = getTile(3, 42.8863889, -78.8786111);
let list = tile_list(center);
display(list);
