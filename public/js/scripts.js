///////////////////////////////////////////////////////////

function delDiv($element){
    $element.parentNode.removeChild($element);
}

/*Dashboard
/
/
*/
var target = document.getElementsByClassName("div-link")

for (let index = 0; index < target.length; index++) {

    target[index].addEventListener("click", function(){
        let id = this.getAttribute("target")
        let card = document.getElementById(id)

        let hasCard = document.getElementsByClassName("link-active")[0].classList.remove("link-active")
        this.classList.add("link-active")

        window.scroll(0, card.offsetTop - 77);
    })

}