$(function(){

})

function addProduct(proizvod_id){
    $.post("ajax/ajax_cart.php?action=addProduct", {proizvod_id: proizvod_id}, function(response){
        let odg=JSON.parse(response);
        if(odg.error!="")alert(odg.error);
        else alert(odg.success);
        productsCount();
    })
}