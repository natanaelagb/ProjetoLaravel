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
        let haveClass = document.querySelector(".link-active")


        if(!this.classList.contains("link-active")){

            let gearNode = document.createElement("i")
            gearNode.classList.add("bi")
            gearNode.classList.add("bi-gear")

            haveClass.classList.remove("link-active")
            haveClass.removeChild(haveClass.firstElementChild)

            this.classList.add("link-active")
            this.prepend(gearNode)

        }  

        window.scroll(0, card.offsetTop - 77);
    })

}
