let lightState = document.querySelector(".lights>.state");
let lightButton = document.querySelector(".lights>form>button");
let colorState = document.querySelector(".colors>.state");
let colorButton = document.querySelector(".colors>form>button");
let tempState = document.querySelector(".temp>.state");
let tempMinus = document.querySelector(".minus");
let tempPlus = document.querySelector(".plus");
let soundState = document.querySelector(".sound>.state");
let soundButton = document.querySelector(".sound>form>button");
let lockState = document.querySelector(".lock>.state");
let lockButton = document.querySelector(".lock>form>button");
let roombaState = document.querySelector(".roomba>.state");
let roombaButton = document.querySelector(".roomba>form>button");
let heaterState = document.querySelector(".heater>.state");
let heaterButton = document.querySelector(".heater>form>button");



tempMinus.addEventListener("click", (e) => {
  let temp = +tempState.getAttribute("data-value");
  temp -= 1;
  tempState.setAttribute("data-value", temp);
  tempState.textContent = `${temp} C°`;
});

tempPlus.addEventListener("click", (e) => {
  let temp = +tempState.getAttribute("data-value");
  temp += 1;
  tempState.setAttribute("data-value", temp);
  tempState.textContent = `${temp} C°`;
});
