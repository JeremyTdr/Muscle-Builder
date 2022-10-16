//-------- BURGER BTN -------
const burger = document.getElementById("burger-btn");
const nav = document.getElementById("nav");
const navLinks = document.querySelectorAll(".nav-item");

//Open menu
burger.addEventListener("click", () => {
  nav.classList.toggle("active");
});

//Close when click on link
navLinks.forEach((link) => {
  link.addEventListener("click", () => {
    nav.classList.remove("active");
  });
});

//Close when click outside of menu
document.addEventListener("click", function handleClickOutsideBox(e) {
  if (!nav.contains(e.target) && !burger.contains(e.target)) {
    nav.classList.remove("active");
  }
});

//-------- NAVBAR -------
const onglets = document.querySelectorAll(".nav-item");

onglets.forEach((onglet) => {
  onglet.addEventListener("click", () => {
    if (onglet.classList.contains("active")) {
      return;
    } else {
      onglet.classList.add("active");
    }

    index = onglet.getAttribute("data-anim");

    for (i = 0; i < onglets.length; i++) {
      if (onglets[i].getAttribute("data-anim") != index) {
        onglets[i].classList.remove("active");
      }
    }
  });
});

//-------- MODALS -------
const modals = document.querySelectorAll(".modal");
const modalsClose = document.querySelectorAll(".close-modal");
const modalsOpen = document.querySelectorAll(".open-modal");

for (let i = 0; i < modalsOpen.length; i++) {
  modalsOpen[i].addEventListener("click", () => {
    modals[i].classList.add("active");
  });
}

for (let i = 0; i < modalsClose.length; i++) {
  modalsClose[i].addEventListener("click", () => {
    modals[i].classList.remove("active");
  });
}

//Close when click outside of menu (NO-OK)
for (let i = 0; i < modals.length; i++) {
  if (modals[i].classList.contains("active")) {
    document.addEventListener("click", function handleClickOutsideBox(e) {
      if (!modals[i].contains(e.target)) {
        modals[i].classList.remove("active");
      }
    });
  }
}
