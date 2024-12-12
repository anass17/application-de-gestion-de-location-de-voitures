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
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l, _m, _o, _p, _q, _r, _s, _t;
        modal.classList.remove('hidden');
        let lastWord = (_a = modalTitle === null || modalTitle === void 0 ? void 0 : modalTitle.textContent) === null || _a === void 0 ? void 0 : _a.split(' ');
        modalTitle.textContent = "Edit an Existing " + lastWord[lastWord.length - 1];
        let modalBtns = modal.querySelectorAll('button[type="submit"]');
        modalBtns[0].classList.add('hidden');
        modalBtns[0].setAttribute('disabled', '');
        modalBtns[1].classList.remove('hidden');
        modalBtns[1].removeAttribute('disabled');
        let card = (_b = this.parentElement) === null || _b === void 0 ? void 0 : _b.parentElement;
        let inputs = modal.querySelectorAll('input');
        let selects = modal.querySelectorAll('select');
        if (this.dataset.page == "cars") {
            inputs[0].value = (_c = card === null || card === void 0 ? void 0 : card.querySelector('.car-model')) === null || _c === void 0 ? void 0 : _c.textContent;
            inputs[1].value = (_d = card === null || card === void 0 ? void 0 : card.querySelector('.car-marque')) === null || _d === void 0 ? void 0 : _d.textContent;
            inputs[2].value = (_e = card === null || card === void 0 ? void 0 : card.querySelector('.car-immat')) === null || _e === void 0 ? void 0 : _e.textContent;
            inputs[2].setAttribute('readonly', 'readonly');
            inputs[3].value = (_f = card === null || card === void 0 ? void 0 : card.querySelector('.car-year')) === null || _f === void 0 ? void 0 : _f.textContent;
            inputs[4].value = (_g = card === null || card === void 0 ? void 0 : card.querySelector('.car-price')) === null || _g === void 0 ? void 0 : _g.textContent;
        }
        else if (this.dataset.page == "clients") {
            inputs[0].value = (_h = card === null || card === void 0 ? void 0 : card.querySelector('.client-num')) === null || _h === void 0 ? void 0 : _h.textContent;
            inputs[1].value = (_j = card === null || card === void 0 ? void 0 : card.querySelector('.client-name')) === null || _j === void 0 ? void 0 : _j.textContent;
            inputs[2].value = (_k = card === null || card === void 0 ? void 0 : card.querySelector('.client-address')) === null || _k === void 0 ? void 0 : _k.textContent;
            inputs[3].value = (_l = card === null || card === void 0 ? void 0 : card.querySelector('.client-tel')) === null || _l === void 0 ? void 0 : _l.textContent;
            inputs[4].value = (_m = card === null || card === void 0 ? void 0 : card.querySelector('.client-email')) === null || _m === void 0 ? void 0 : _m.textContent;
        }
        else if (this.dataset.page == "contracts") {
            inputs[0].value = (_o = card === null || card === void 0 ? void 0 : card.querySelector('.contract-num')) === null || _o === void 0 ? void 0 : _o.textContent;
            inputs[1].value = (_p = card === null || card === void 0 ? void 0 : card.querySelector('.contract-start')) === null || _p === void 0 ? void 0 : _p.textContent;
            inputs[2].value = (_q = card === null || card === void 0 ? void 0 : card.querySelector('.contract-end')) === null || _q === void 0 ? void 0 : _q.textContent;
            inputs[3].value = (_r = card === null || card === void 0 ? void 0 : card.querySelector('.contract-duration')) === null || _r === void 0 ? void 0 : _r.textContent;
            selects[0].value = (_s = card === null || card === void 0 ? void 0 : card.querySelector('.contract-name')) === null || _s === void 0 ? void 0 : _s.textContent;
            selects[1].value = (_t = card === null || card === void 0 ? void 0 : card.querySelector('.contract-immat')) === null || _t === void 0 ? void 0 : _t.textContent;
        }
    });
});
