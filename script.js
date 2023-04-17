let login = document.querySelectorAll(".login");
let modal = document.querySelector(".modal");
let wrapper = document.querySelector(".wrapper");
let span = document.getElementsByClassName("close")[0];
let isOn = false;
login.forEach((a) =>
  a.addEventListener("click", (e) => {
    e.stopPropagation();
    e.preventDefault();
    wrapper.style.opacity = 0.4;
    modal.style.display = "flex";
    isOn = true;
  })
);

wrapper.addEventListener("click", (e) => {
  if (isOn) {
    modal.style.display = "none";
    wrapper.style.opacity = 1;
    isOn = false;
  }
});

span.onclick = function () {
  if (isOn) {
    modal.style.display = "none";
    wrapper.style.opacity = 1;
    isOn = false;
  }
};
