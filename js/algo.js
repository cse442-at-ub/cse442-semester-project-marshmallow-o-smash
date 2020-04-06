  let tunnel=false;
  let shortest=true;
  let outdoor=false;

  function setTunnel(){
    tunnel=true;
    shortest=false;
    outdoor=false;
  }
  function setShortest(){
    tunnel=false;
    shortest=true;
    outdoor=false;
  }
  function setOutdoor(){
    tunnel=false;
    shortest=false;
    outdoor=true;
  }

  function BFS(dict,start,end){
    let visited=[];
    let pair={};
    let parent={};
    let queue=[];
    let ret=[];
    let index=0;
    for(var key in dict){
      parent[key]="";
      pair[key]=index;
      visited.push(false);
      index+=1;
    }

    let head=pair[start];
    let tail=pair[end];

    if(head==undefined || tail==undefined) return ret;

    visited[head]=true;
    queue.push(start);

    while(queue.length!=0){
      let temp=queue.shift();
      let list=dict[temp];
      for(let i of list){
        if(visited[pair[i]]==false){
          queue.push(i);
          visited[pair[i]]=true;
          parent[i]=temp;
        }
      }
    }

    let temp=end;
    ret.push(temp);
    while(parent[temp]!=""){
      temp=parent[temp];
      ret.push(temp);
    }

    return ret.reverse();
  }
