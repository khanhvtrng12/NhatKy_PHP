// JavaScript Document
const clearInput = () => {
  const input = document.getElementsByTagName("input")[0];
  input.value = "";
}

const clearBtn = document.getElementById("clear-btn");
clearBtn.addEventListener("click", clearInput);

const dropdown = document.querySelector('.dropdown-toggle')
const DropList = document.querySelector('.dropdown-menu')
dropdown.addEventListener('click',()=>{
	DropList.classList.toggle('appear');
});