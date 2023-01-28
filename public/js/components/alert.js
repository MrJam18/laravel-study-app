const closeAlert = (ev) => {
    ev.currentTarget.parentNode.parentNode.style.display = 'none'
}
document.querySelectorAll('.alert__close-button').forEach((el)=> el.addEventListener('click', closeAlert));
