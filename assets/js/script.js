"use strict";
let modal = document.querySelector('.modal');
let modalCloseBtn = modal.querySelector('.modal-close-btn');
let addNewRow = document.querySelector('.add-new-row');
modalCloseBtn.addEventListener('click', function () {
    modal.classList.add('hidden');
});
addNewRow.addEventListener('click', function () {
    modal.classList.remove('hidden');
});
let alertMsg = document.querySelector('.alert-msg');
if (alertMsg != null) {
    setTimeout(() => {
        alertMsg.remove();
    }, 4000);
}
