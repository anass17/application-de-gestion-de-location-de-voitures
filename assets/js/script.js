"use strict";
let modal = document.querySelector('.modal');
let modalTitle = modal.querySelector('h2');
let modalCloseBtn = modal.querySelector('.modal-close-btn');
let addNewRow = document.querySelector('.add-new-row');
let menu = document.querySelector('.menu');
let menuBtn = menu.querySelector('.menu-btn');
let alertMsg = document.querySelector('.alert-msg');
modalCloseBtn.addEventListener('click', function () {
    modal.classList.add('hidden');
});
addNewRow.addEventListener('click', function () {
    var _a;
    modal.classList.remove('hidden');
    let lastWord = (_a = modalTitle === null || modalTitle === void 0 ? void 0 : modalTitle.textContent) === null || _a === void 0 ? void 0 : _a.split(' ');
    modalTitle.textContent = "Add a New " + lastWord[lastWord.length - 1];
    let modalBtns = modal.querySelectorAll('button[type="submit"]');
    modalBtns[0].classList.remove('hidden');
    modalBtns[0].removeAttribute('disabled');
    modalBtns[1].classList.add('hidden');
    modalBtns[1].setAttribute('disabled', '');
    let inputs = modal.querySelectorAll('input');
    inputs.forEach(item => {
        item.value = "";
    });
    inputs[2].removeAttribute('readonly');
});
if (alertMsg != null) {
    setTimeout(() => {
        alertMsg.remove();
    }, 4000);
}
menuBtn.addEventListener('click', function () {
    menu.classList.toggle('menu-closed');
});
document.querySelectorAll('.modify-btn').forEach(item => {
    item.addEventListener('click', function () {
        var _a, _b, _c, _d, _e, _f, _g;
        modal.classList.remove('hidden');
        let lastWord = (_a = modalTitle === null || modalTitle === void 0 ? void 0 : modalTitle.textContent) === null || _a === void 0 ? void 0 : _a.split(' ');
        modalTitle.textContent = "Edit an existing " + lastWord[lastWord.length - 1];
        let modalBtns = modal.querySelectorAll('button[type="submit"]');
        modalBtns[0].classList.add('hidden');
        modalBtns[0].setAttribute('disabled', '');
        modalBtns[1].classList.remove('hidden');
        modalBtns[1].removeAttribute('disabled');
        let card = (_b = this.parentElement) === null || _b === void 0 ? void 0 : _b.parentElement;
        let inputs = modal.querySelectorAll('input');
        if (this.dataset.page == "cars") {
            inputs[0].value = (_c = card === null || card === void 0 ? void 0 : card.querySelector('.car-model')) === null || _c === void 0 ? void 0 : _c.textContent;
            inputs[1].value = (_d = card === null || card === void 0 ? void 0 : card.querySelector('.car-marque')) === null || _d === void 0 ? void 0 : _d.textContent;
            inputs[2].value = (_e = card === null || card === void 0 ? void 0 : card.querySelector('.car-immat')) === null || _e === void 0 ? void 0 : _e.textContent;
            inputs[2].setAttribute('readonly', 'readonly');
            inputs[3].value = (_f = card === null || card === void 0 ? void 0 : card.querySelector('.car-year')) === null || _f === void 0 ? void 0 : _f.textContent;
            inputs[4].value = (_g = card === null || card === void 0 ? void 0 : card.querySelector('.car-price')) === null || _g === void 0 ? void 0 : _g.textContent;
        }
    });
});
