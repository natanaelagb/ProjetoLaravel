///////////////////////////////////////////////////////////

/*Dashboard
/
/
*/

var linkOwner = document.getElementById("link-owner")
var linkParticipant = document.getElementById("link-participant")
var cardOwner = document.getElementById("card-owner")
var cardParticipant = document.getElementById("card-participant")
var target = document.getElementsByClassName("div-link")
var btnDelete = document.getElementsByClassName("btn-delete")

var gearNode = document.createElement("i")

gearNode.classList.add("bi")
gearNode.classList.add("bi-gear")


for (let index = 0; index < target.length; index++) {
    target[index].addEventListener("click", function(){

        let id = this.getAttribute("target")
        let card = document.getElementById(id)
    
        if(!this.classList.contains("link-active")){
            activeLink(this)
        }  

        window.scroll(0, card.offsetTop - 77);
    })

}

function activeLink(element){
    let haveClass = document.querySelector(".link-active")
    haveClass.classList.remove("link-active")
    haveClass.removeChild(haveClass.firstElementChild)

    element.classList.add("link-active")
    element.prepend(gearNode)
}

for (let index = 0; index < btnDelete.length; index++) {
    btnDelete[index].addEventListener("click", function(event){
        event.preventDefault();
        if(confirm("Você tem certeza?")){
            this.form.submit();
        }
    })
}