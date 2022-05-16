require('./bootstrap');

let confirmBtns = document.querySelectorAll(".confirm-button");

if(confirmBtns){
    function toggleModal(){
        modal.classList.toggle('show');
    }

    let modal = document.querySelector(".my-overlay");
    Array.from(confirmBtns).forEach(button => {
        button.addEventListener("click", toggleModal)
    });

    let closeBtn = document.getElementById("close-modal");
    closeBtn.addEventListener("click", toggleModal)
}