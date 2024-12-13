"use strict";
var _a, _b;
let modal = document.querySelector('.modal');
let modalTitle = modal.querySelector('h2');
let modalCloseBtn = modal.querySelector('.modal-close-btn');
let addNewRow = document.querySelector('.add-new-row');
let menu = document.querySelector('.menu');
let menuBtn = menu.querySelector('.menu-btn');
let alertMsg = document.querySelector('.alert-msg');
let searchInput = document.querySelector('input[name="search"]');
let searchBtn = (_a = searchInput === null || searchInput === void 0 ? void 0 : searchInput.parentElement) === null || _a === void 0 ? void 0 : _a.nextElementSibling;
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
    let selects = modal.querySelectorAll('select');
    inputs.forEach(item => {
        item.value = "";
    });
    selects.forEach(item => {
        item.value = "";
    });
    inputs[2].removeAttribute('readonly');
});
searchBtn === null || searchBtn === void 0 ? void 0 : searchBtn.addEventListener('click', function (e) {
    e.preventDefault();
});
searchInput === null || searchInput === void 0 ? void 0 : searchInput.addEventListener('keyup', function () {
    var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l, _m, _o, _p, _q, _r, _s, _t, _u, _v, _w, _x, _y, _z, _0, _1, _2, _3, _4, _5, _6, _7, _8;
    let searchTarget = searchInput.value.toLowerCase();
    let view = searchBtn === null || searchBtn === void 0 ? void 0 : searchBtn.getAttribute('data-target');
    let cards = (_a = document.querySelector('.cards-result')) === null || _a === void 0 ? void 0 : _a.children;
    if (view == "cards") {
        if (cards[0].parentElement.getAttribute('data-target') == "contracts") {
            for (let item of cards) {
                if (((_c = (_b = item.querySelector('.contract-name')) === null || _b === void 0 ? void 0 : _b.textContent) === null || _c === void 0 ? void 0 : _c.toLowerCase().search(searchTarget)) >= 0 ||
                    ((_e = (_d = item.querySelector('.contract-model')) === null || _d === void 0 ? void 0 : _d.textContent) === null || _e === void 0 ? void 0 : _e.toLowerCase().search(searchTarget)) >= 0 ||
                    ((_g = (_f = item.querySelector('.contract-marque')) === null || _f === void 0 ? void 0 : _f.textContent) === null || _g === void 0 ? void 0 : _g.toLowerCase().search(searchTarget)) >= 0 ||
                    ((_j = (_h = item.querySelector('.contract-immat')) === null || _h === void 0 ? void 0 : _h.textContent) === null || _j === void 0 ? void 0 : _j.toLowerCase().search(searchTarget)) >= 0) {
                    item.classList.remove('hidden');
                }
                else {
                    item.classList.add('hidden');
                }
            }
        }
        else if (cards[0].parentElement.getAttribute('data-target') == "clients") {
            for (let item of cards) {
                if (((_l = (_k = item.querySelector('.client-name')) === null || _k === void 0 ? void 0 : _k.textContent) === null || _l === void 0 ? void 0 : _l.toLowerCase().search(searchTarget)) >= 0) {
                    item.classList.remove('hidden');
                }
                else {
                    item.classList.add('hidden');
                }
            }
        }
        else {
            for (let item of cards) {
                if (((_o = (_m = item.querySelector('.car-model')) === null || _m === void 0 ? void 0 : _m.textContent) === null || _o === void 0 ? void 0 : _o.toLowerCase().search(searchTarget)) >= 0 ||
                    ((_q = (_p = item.querySelector('.car-marque')) === null || _p === void 0 ? void 0 : _p.textContent) === null || _q === void 0 ? void 0 : _q.toLowerCase().search(searchTarget)) >= 0 ||
                    ((_s = (_r = item.querySelector('.car-immat')) === null || _r === void 0 ? void 0 : _r.textContent) === null || _s === void 0 ? void 0 : _s.toLowerCase().search(searchTarget)) >= 0) {
                    item.classList.remove('hidden');
                }
                else {
                    item.classList.add('hidden');
                }
            }
        }
    }
    else {
        if (cards[0].parentElement.getAttribute('data-target') == "contracts") {
            for (let item of cards) {
                if (((_u = (_t = item.querySelector('.contract-name')) === null || _t === void 0 ? void 0 : _t.textContent) === null || _u === void 0 ? void 0 : _u.toLowerCase().search(searchTarget)) >= 0 ||
                    ((_w = (_v = item.querySelector('.contract-model')) === null || _v === void 0 ? void 0 : _v.textContent) === null || _w === void 0 ? void 0 : _w.toLowerCase().search(searchTarget)) >= 0 ||
                    ((_y = (_x = item.querySelector('.contract-marque')) === null || _x === void 0 ? void 0 : _x.textContent) === null || _y === void 0 ? void 0 : _y.toLowerCase().search(searchTarget)) >= 0 ||
                    ((_0 = (_z = item.querySelector('.contract-immat')) === null || _z === void 0 ? void 0 : _z.textContent) === null || _0 === void 0 ? void 0 : _0.toLowerCase().search(searchTarget)) >= 0) {
                    item.classList.remove('hidden');
                }
                else {
                    item.classList.add('hidden');
                }
            }
        }
        else if (cards[0].parentElement.getAttribute('data-target') == "clients") {
            for (let item of cards) {
                if (((_2 = (_1 = item.querySelector('.client-name')) === null || _1 === void 0 ? void 0 : _1.textContent) === null || _2 === void 0 ? void 0 : _2.toLowerCase().search(searchTarget)) >= 0) {
                    item.classList.remove('hidden');
                }
                else {
                    item.classList.add('hidden');
                }
            }
        }
        else {
            for (let item of cards) {
                if (((_4 = (_3 = item.querySelector('.car-model')) === null || _3 === void 0 ? void 0 : _3.textContent) === null || _4 === void 0 ? void 0 : _4.toLowerCase().search(searchTarget)) >= 0 ||
                    ((_6 = (_5 = item.querySelector('.car-marque')) === null || _5 === void 0 ? void 0 : _5.textContent) === null || _6 === void 0 ? void 0 : _6.toLowerCase().search(searchTarget)) >= 0 ||
                    ((_8 = (_7 = item.querySelector('.car-immat')) === null || _7 === void 0 ? void 0 : _7.textContent) === null || _8 === void 0 ? void 0 : _8.toLowerCase().search(searchTarget)) >= 0) {
                    item.classList.remove('hidden');
                }
                else {
                    item.classList.add('hidden');
                }
            }
        }
    }
});
if (alertMsg != null) {
    setTimeout(() => {
        alertMsg.remove();
    }, 4000);
}
if (localStorage.getItem('menu') == 'closed') {
    menu.classList.add('menu-closed');
}
menuBtn.addEventListener('click', function () {
    if (menu.classList.contains('menu-closed')) {
        menu.classList.remove('menu-closed');
        localStorage.setItem('menu', 'open');
    }
    else {
        menu.classList.add('menu-closed');
        localStorage.setItem('menu', 'closed');
    }
});
function inputHasErrors(input, pattern, msg) {
    if (input.nextElementSibling) {
        input.nextElementSibling.remove();
    }
    if (input.value.search(pattern) < 0) {
        let errorMsg = document.createElement('p');
        errorMsg.textContent = msg;
        errorMsg.className = "text-red-500";
        input.after(errorMsg);
        return true;
    }
    return false;
}
(_b = modal.querySelector('.form-add-btn')) === null || _b === void 0 ? void 0 : _b.addEventListener('click', function (e) {
    let inputs = modal.querySelectorAll('input');
    let selects = modal.querySelectorAll('select');
    let errors = false;
    if (this.value == 'contrats') {
        if (inputHasErrors(inputs[1], /^20[0-9]{2}-[01][0-9]-[01][0-9]$/, 'Enter a valid start date')) {
            errors = true;
        }
        if (inputHasErrors(inputs[2], /^20[0-9]{2}-[01][0-9]-[01][0-9]$/, 'Enter a valid end date')) {
            errors = true;
        }
        if (inputHasErrors(inputs[3], /^[1-9][0-9]*$/, 'Enter a valid duration')) {
            errors = true;
        }
        if (inputHasErrors(selects[0], /^[a-z A-Z]{3,50}$/, 'Enter a valid name')) {
            errors = true;
        }
        if (inputHasErrors(selects[1], /^[a-zA-Z0-9]{3,10}$/, 'Enter a valid matriculation number')) {
            errors = true;
        }
    }
    else if (this.value == 'clients') {
        if (inputHasErrors(inputs[1], /^[a-z A-Z]{3,50}$/, 'Enter a valid name')) {
            errors = true;
        }
        if (inputHasErrors(inputs[2], /^0[567][0-9]{8}$/, 'Enter a valid tel number')) {
            errors = true;
        }
        if (inputHasErrors(inputs[3], /^[a-z A-Z.-_,]{3,100}$/, 'Enter a valid address')) {
            errors = true;
        }
        if (inputHasErrors(inputs[4], /^[a-zA-Z0-9.-_]{3,63}@[a-zA-Z0-9]{3,25}\.[a-zA-Z]{2,10}$/, 'Enter a valid email')) {
            errors = true;
        }
    }
    else if (this.value == 'voitures') {
        if (inputHasErrors(inputs[0], /^[a-z A-Z0-9]{3,50}$/, 'Enter a valid model')) {
            errors = true;
        }
        if (inputHasErrors(inputs[1], /^[a-z A-Z0-9]{3,50}$/, 'Enter a valid marque')) {
            errors = true;
        }
        if (inputHasErrors(inputs[2], /^[a-zA-Z0-9]{3,50}$/, 'Enter a valid matriculation number')) {
            errors = true;
        }
        if (inputHasErrors(inputs[3], /^(19|20)[0-9]{2}$/, 'Enter a valid year')) {
            errors = true;
        }
        if (inputHasErrors(inputs[4], /^[1-9][0-9]*$/, 'Enter a valid price')) {
            errors = true;
        }
    }
    if (errors == true) {
        e.preventDefault();
    }
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
            inputs[2].value = (_k = card === null || card === void 0 ? void 0 : card.querySelector('.client-tel')) === null || _k === void 0 ? void 0 : _k.textContent;
            inputs[3].value = (_l = card === null || card === void 0 ? void 0 : card.querySelector('.client-address')) === null || _l === void 0 ? void 0 : _l.textContent;
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
