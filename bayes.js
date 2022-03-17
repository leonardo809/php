var text = '{"arbol":[{"mercado":1,"industria":[{"nindustria":1,"proba":0.07},{"nindustria":2,"proba":0.04},{"nindustria":3,"proba":0.05},{"nindustria":4,"proba":0.015},{"nindustria":5,"proba":0.055},{"nindustria":6,"proba":0.045}]},{"mercado":2,"industria":[{"nindustria":1,"proba":0.01},{"nindustria":2,"proba":0.045},{"nindustria":3,"proba":0.05},{"nindustria":4,"proba":0.035},{"nindustria":5,"proba":0.04},{"nindustria":6,"proba":0.04}]},{"mercado":3,"industria":[{"nindustria":1,"proba":0.06},{"nindustria":2,"proba":0.035},{"nindustria":3,"proba":0.045},{"nindustria":4,"proba":0.045},{"nindustria":5,"proba":0.06},{"nindustria":6,"proba":0.04}]},{"mercado":4,"industria":[{"nindustria":1,"proba":0.03},{"nindustria":2,"proba":0.05},{"nindustria":3,"proba":0.025},{"nindustria":4,"proba":0.035},{"nindustria":5,"proba":0.05},{"nindustria":6,"proba":0.03}]}]}';
const obj = JSON.parse(text);
var nodes=[];
var aux=obj.arbol.length+1;
nodes[0]={id: `M0`, label: `Inicio`};
//Nodos
for(var i=1;i<=obj.arbol.length;i++){
    //mercados
    nodes[i]={id: `M${(i).toString()}`, label: `Mercado ${obj.arbol[i-1].mercado}`}
    for(var j=0;j<obj.arbol[i-1].industria.length;j++,aux++){
        nodes[aux]={id: `M${(i).toString()}i${(j+1).toString()}`, label: `Industria ${obj.arbol[i-1].industria[j].nindustria} Probabilidad ${obj.arbol[i-1].industria[j].proba}`}
    }
}


  var edges=[];
  
for(var i=1;i<nodes.length;i++)
if(nodes[i].id == `M${i}`)
edges[i-1]={from:"M0", to: nodes[i].id};

aux=edges.length;
for(var i=1+obj.arbol.length;i<nodes.length;i++){
    //mercado
    for(var j=0;j<obj.arbol.length;j++){
        //industria
        for(var k=0;k<obj.arbol[j].industria.length;k++){
        if(nodes[i].id == `M${j+1}i${k+1}`){
        edges[aux]={from:`M${j+1}`, to: nodes[i].id};
        aux++;
        k=obj.arbol[j].industria.length;
        }
        }
    }
    
}

  var container = document.getElementById("mynetwork");
  var data = {
    nodes: nodes,
    edges: edges,
  };
  var options = {
    nodes: {
      shape: "dot",
      size: 10,
    },
  };
  var network = new vis.Network(container, data, options);
var despliegue="";
//mercado
for(var j=0;j<obj.arbol.length;j++){
  //industria
  for(var k=0;k<obj.arbol[j].industria.length;k++){
    despliegue+=`Mercado = ${obj.arbol[j].mercado} Industria = ${obj.arbol[j].industria[k].nindustria} Probabilidad = ${obj.arbol[j].industria[k].proba} <br>`;
  }
}
document.getElementById("depliegue").innerHTML=despliegue;

function rextes(){
const rext = document.getElementById("rextester").value;
const obj = JSON.parse(rext);
var nodes=[];
var aux=obj.arbol.length+1;
nodes[0]={id: `M0`, label: `Inicio`};
//Nodos
for(var i=1;i<=obj.arbol.length;i++){
    //mercados
    nodes[i]={id: `M${(i).toString()}`, label: `Mercado ${obj.arbol[i-1].mercado}`}
    for(var j=0;j<obj.arbol[i-1].industria.length;j++,aux++){
        nodes[aux]={id: `M${(i).toString()}i${(j+1).toString()}`, label: `Industria ${obj.arbol[i-1].industria[j].nindustria} Probabilidad ${obj.arbol[i-1].industria[j].proba}`}
    }
}


  var edges=[];
  
for(var i=1;i<nodes.length;i++)
if(nodes[i].id == `M${i}`)
edges[i-1]={from:"M0", to: nodes[i].id};

aux=edges.length;
for(var i=1+obj.arbol.length;i<nodes.length;i++){
    //mercado
    for(var j=0;j<obj.arbol.length;j++){
        //industria
        for(var k=0;k<obj.arbol[j].industria.length;k++){
        if(nodes[i].id == `M${j+1}i${k+1}`){
        edges[aux]={from:`M${j+1}`, to: nodes[i].id};
        aux++;
        k=obj.arbol[j].industria.length;
        }
        }
    }
    
}

  var container = document.getElementById("mynetwork");
  var data = {
    nodes: nodes,
    edges: edges,
  };
  var options = {
    nodes: {
      shape: "dot",
      size: 10,
    },
  };
  var network = new vis.Network(container, data, options);
var despliegue="";
//mercado
for(var j=0;j<obj.arbol.length;j++){
  //industria
  for(var k=0;k<obj.arbol[j].industria.length;k++){
    despliegue+=`Mercado = ${obj.arbol[j].mercado} Industria = ${obj.arbol[j].industria[k].nindustria} Probabilidad = ${obj.arbol[j].industria[k].proba} <br>`;
  }
}
document.getElementById("depliegue").innerHTML=despliegue;
}