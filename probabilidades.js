var text = '{"arbol":[{"mercado":1,"industria":[{"nindustria":1,"proba":0.07},{"nindustria":2,"proba":0.04},{"nindustria":3,"proba":0.05},{"nindustria":4,"proba":0.015},{"nindustria":5,"proba":0.055},{"nindustria":6,"proba":0.045}]},{"mercado":2,"industria":[{"nindustria":1,"proba":0.01},{"nindustria":2,"proba":0.045},{"nindustria":3,"proba":0.05},{"nindustria":4,"proba":0.035},{"nindustria":5,"proba":0.04},{"nindustria":6,"proba":0.04}]},{"mercado":3,"industria":[{"nindustria":1,"proba":0.06},{"nindustria":2,"proba":0.035},{"nindustria":3,"proba":0.045},{"nindustria":4,"proba":0.045},{"nindustria":5,"proba":0.06},{"nindustria":6,"proba":0.04}]},{"mercado":4,"industria":[{"nindustria":1,"proba":0.03},{"nindustria":2,"proba":0.05},{"nindustria":3,"proba":0.025},{"nindustria":4,"proba":0.035},{"nindustria":5,"proba":0.05},{"nindustria":6,"proba":0.03}]}],"rama1":"function(){proba1=0; for (propiedades in obj.arbol[0].industria){proba1+=obj.arbol[0].industria[propiedades].proba; } return proba1;}","rama2":"function(){proba2=0; for (propiedades in obj.arbol[1].industria){proba2+=obj.arbol[1].industria[propiedades].proba; } return proba2;}","rama3":"function(){proba3=0; for (propiedades in obj.arbol[2].industria){proba3+=obj.arbol[2].industria[propiedades].proba; } return proba3;}","rama4":"function(){proba4=0; for (propiedades in obj.arbol[3].industria){proba4+=obj.arbol[3].industria[propiedades].proba; } return proba4;}"}';
var obj = JSON.parse(text);
obj.rama1 = eval("(" + obj.rama1 + ")");
obj.rama2 = eval("(" + obj.rama2 + ")");
obj.rama3 = eval("(" + obj.rama3 + ")");
obj.rama4 = eval("(" + obj.rama4 + ")");
document.getElementById("demo").innerHTML =  `P(mercado=1) : ${obj.rama1()} <br> P(mercado=2) : ${obj.rama2().toFixed(2)} <br> P(mercado=3) : ${obj.rama3()} <br> P(mercado=4) : ${obj.rama4()} <br> P(industria=3|mercado2)= ${((obj.arbol[1].industria[4].proba/obj.rama2()).toFixed(4))} <br> P(industria=3)= ${(obj.arbol[0].industria[2].proba+obj.arbol[1].industria[2].proba+obj.arbol[2].industria[2].proba+obj.arbol[3].industria[2].proba)} <br> P(mercado=2|industria=3)= ${((obj.arbol[1].industria[2].proba/obj.rama2())*obj.rama2()/(obj.arbol[0].industria[2].proba+obj.arbol[1].industria[2].proba+obj.arbol[2].industria[2].proba+obj.arbol[3].industria[2].proba)).toFixed(3)}`;
function condicional2(mc,ic){

   

    var res=((obj.arbol[mc].industria[ic].proba/ramas2[mc])*ramas2[mc]/(obj.arbol[0].industria[ic].proba+obj.arbol[1].industria[ic].proba+obj.arbol[2].industria[ic].proba+obj.arbol[3].industria[ic].proba)).toFixed(3);
    return  res;
}

function calcular(){
    var mc1=document.getElementById("mc1").value;
    var mc2=document.getElementById("mc2").value;

    var ic2=document.getElementById("ic2").value;
    var ic1=document.getElementById("ic1").value;
    var mb1=document.getElementById("mb1").value;
    var ib1=document.getElementById("ib1").value;

    var rc1=document.getElementById("rc1");
    var rc2=document.getElementById("rc2");
    var rb1=document.getElementById("rb1");
    var rc2=document.getElementById("rc2");
    rc1.innerHTML=`${condicional2(mc1,ic1)}`
    rc2.innerHTML=`${condicional1(mc2,ic2)}`;
    rb1.innerHTML=`${(ramas2[mb1]*condicional1(mb1,ib1)/ramas[ib1]).toFixed(3)}`;

}
function condicional1(mc,ic){
 
   
    var res=((obj.arbol[mc].industria[ic].proba/ramas2[mc]).toFixed(4));
    return  res;
}

var ramas=[];
var ramas2=[];
for(var i=0;i<obj.arbol.length;i++)
for(var j=0;j<obj.arbol[i].industria.length;j++)
ramas[j]=0;

for(var i=0;i<obj.arbol.length;i++)
for(var k=0;k<obj.arbol[i].industria.length;k++)
for(var j=0;j<obj.arbol[i].industria.length;j++)
if(obj.arbol[i].industria[j].nindustria==k+1)
ramas[k]+=obj.arbol[i].industria[j].proba;


for(var i=0;i<obj.arbol.length;i++)
ramas2[i]=i==1?obj.rama1():i==2?obj.rama2():i==3?obj.rama3():obj.rama4();

function rextes(){
var te=document.getElementById("rextester").value;
text = `${te}`;
obj = JSON.parse(text);
obj.rama1 = eval("(" + obj.rama1 + ")");
obj.rama2 = eval("(" + obj.rama2 + ")");
obj.rama3 = eval("(" + obj.rama3 + ")");
obj.rama4 = eval("(" + obj.rama4 + ")");
document.getElementById("demo").innerHTML =  `P(mercado=1) : ${obj.rama1()} <br> P(mercado=2) : ${obj.rama2().toFixed(2)} <br> P(mercado=3) : ${obj.rama3()} <br> P(mercado=4) : ${obj.rama4()} <br> P(industria=3|mercado2)= ${((obj.arbol[1].industria[4].proba/obj.rama2()).toFixed(4))} <br> P(industria=3)= ${(obj.arbol[0].industria[2].proba+obj.arbol[1].industria[2].proba+obj.arbol[2].industria[2].proba+obj.arbol[3].industria[2].proba)} <br> P(mercado=2|industria=3)= ${((obj.arbol[1].industria[2].proba/obj.rama2())*obj.rama2()/(obj.arbol[0].industria[2].proba+obj.arbol[1].industria[2].proba+obj.arbol[2].industria[2].proba+obj.arbol[3].industria[2].proba)).toFixed(3)}`;

}
