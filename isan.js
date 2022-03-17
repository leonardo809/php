const text = '{"precio":35920,"isan":"function(){excedente=0; if (obj.precio<294797.45){excedente=obj.precio-0.01; isan=excedente*0.2; }else if(obj.precio<353756.88){excedente=obj.precio-294797.45; isan=excedente*0.05+5895.85; }else if(obj.precio<412716.53){excedente=obj.precio-353756.88; isan=excedente*0.1+8843.96; }else if(obj.precio<530635.17){excedente=obj.precio-412716.53; isan=excedente*0.15+14739.89; }else{excedente=obj.precio-530635.17; isan=excedente*0.17+32427.66; } return isan.toFixed(2);}"}';
const obj = JSON.parse(text);
obj.isan = eval("(" + obj.isan + ")");

document.getElementById("demo").innerHTML =`Precio ${obj.precio} <br> Isan a pagar ${obj.isan()}`;

function rextes(){
  var rex=document.getElementById("rextester").value;
  const text = `${rex}`;
const obj = JSON.parse(text);
obj.isan = eval("(" + obj.isan + ")");
document.getElementById("demo").innerHTML =`Precio ${obj.precio} <br> Isan a pagar ${obj.isan()}`;
rex.innerHTML="";
}