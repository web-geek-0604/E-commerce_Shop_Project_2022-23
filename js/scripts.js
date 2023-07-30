function showPassword() {
  let x = document.getElementById("inputPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function showAgain() {
  let x = document.getElementById("againPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function uradi(){
let el=document.querySelectorAll(".specs-table tr, .products-table tr");
for(i=0; i<el.length;i++){
    if(i%2==0)boja="#ededed";
    else boja="#C9D1D5";
    el[i].style.backgroundColor=boja;
}
}








