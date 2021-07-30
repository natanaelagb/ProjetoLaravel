var browserHeight = window.innerHeight;
var htmlElement = document.getElementsByTagName("html")[0];

if(htmlElement.offsetHeight < browserHeight){
    var footer = document.getElementsByTagName("footer")[0];
    footer.style.cssText = " position: absolute; bottom: 0;";
}


window.addEventListener("resize", function(){

    var browserHeight = window.innerHeight;
    var htmlHeight = htmlElement.offsetHeight;
    var footer = document.getElementsByTagName("footer")[0];

    if(htmlHeight < browserHeight){
        footer.style.cssText = " position: absolute; bottom: 0;";
    }else{
        footer.style.cssText = " position: ''; bottom: '';";
    }


})

htmlElement.addEventListener("resize", function(){
    console.log("Funcionou");
})


///////////////////////////////////////////////////////////

function delDiv($element){
    $element.parentNode.removeChild($element);
}