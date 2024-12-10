let modal = document.querySelector('.modal') as HTMLElement;
let modalCloseBtn = modal.querySelector('.modal-close-btn') as HTMLElement;
let addNewRow = document.querySelector('.add-new-row') as HTMLElement;

modalCloseBtn.addEventListener('click', function () {
    modal.classList.add('hidden');
});

addNewRow.addEventListener('click', function () {
    modal.classList.remove('hidden');
});

let alertMsg = document.querySelector('.alert-msg');

if (alertMsg != null) {
    setTimeout(() => {
        (alertMsg as HTMLElement).remove();
    }, 4000);
}