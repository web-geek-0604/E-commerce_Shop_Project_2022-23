let galerija=document.querySelector("#galerija");
galerija.style.cssText="width:500px; height:500px; padding: 10px; text-align: center";
let glavna=document.createElement("img");
glavna.height="400";
glavna.width="400";
glavna.src=slike[0];
glavna.setAttribute("data-rbr", 0);
galerija.appendChild(glavna);
galerija.appendChild(document.createElement("br"));

for(i=0;i<slike.length;i++){
    let slicica=document.createElement("img");
    slicica.height="80";
    slicica.width="80";
    slicica.src=slike[i];
    slicica.setAttribute("data-rbr", i);
    slicica.style.cssText="cursor: pointer; margin:5px";
    slicica.onclick=function(){
        glavna.src=this.src;
        glavna.setAttribute("data-rbr", this.getAttribute("data-rbr"));
    }
    slicica.onmouseenter=function(){
        this.style.border="1px solid black";
    }
    slicica.onmouseleave=function(){
        this.style.border="0px solid black";
    }
    let slikeNiz=document.querySelector("#slikeNiz");
    slikeNiz.style.cssText="width:600px; height:200px; margin-top: 50px; text-align: start; padding: 10px;";
    slikeNiz.appendChild(slicica);
}
