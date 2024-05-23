
const openModalButton = document.getElementById('openModal');
const modal = document.getElementById('myModal');
const closeModalButton = document.querySelector('.close');
function openModal() {
    modal.style.display = 'block';
}
function closeModal() {
    modal.style.display = 'none';
}
openModalButton.addEventListener('click', openModal);
closeModalButton.addEventListener('click', closeModal);
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        closeModal();
    }
});
