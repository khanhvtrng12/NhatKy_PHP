// JavaScript Document
const close =  document.querySelector('.close')
const notify = document.querySelector('.alert')

close.addEventListener('click',() =>{
	notify.classList.add('hide')
})