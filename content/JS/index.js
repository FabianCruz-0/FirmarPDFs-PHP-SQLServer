const boton = document.querySelector("#tema");
const bordes = document.querySelectorAll(".pad-col");
const paso_dos = document.querySelector(".paso-dos");

let turno = true;
boton.addEventListener("click", () => {
  if (turno == true) {
    document.body.classList.replace("light-theme", "dark-theme");
    paso_dos.style.backgroundColor = "gray";

    for (var i = 0; i < bordes.length; i++) {
      bordes[i].style.border = "solid 1px white";
    }
    turno=false;
  } else {
    document.body.classList.replace("dark-theme", "light-theme");
    for (var i = 0; i < bordes.length; i++) {
      bordes[i].style.border = "solid 1px black ";
    }
    turno=true;
  }
});
