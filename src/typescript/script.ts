let modal = document.querySelector('.modal') as HTMLElement;
let modalTitle = modal.querySelector('h2') as HTMLElement;
let modalCloseBtn = modal.querySelector('.modal-close-btn') as HTMLElement;
let addNewRow = document.querySelector('.add-new-row') as HTMLElement;
let menu = document.querySelector('.menu') as HTMLElement;
let menuBtn = menu.querySelector('.menu-btn') as HTMLElement;
let alertMsg = document.querySelector('.alert-msg');

modalCloseBtn.addEventListener('click', function () {
    modal.classList.add('hidden');
});

addNewRow.addEventListener('click', function () {
    modal.classList.remove('hidden');
    let lastWord = modalTitle?.textContent?.split(' ') as string[];
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

    inputs[2].removeAttribute('readonly');      // In cars form: Immatriculation form is set to readonly on edit
});

if (alertMsg != null) {
    setTimeout(() => {
        (alertMsg as HTMLElement).remove();
    }, 4000);
}

menuBtn.addEventListener('click', function () {
    menu.classList.toggle('menu-closed')
});

document.querySelectorAll('.modify-btn').forEach(item => {
    (item as HTMLElement).addEventListener('click', function () {
        modal.classList.remove('hidden');
        let lastWord = modalTitle?.textContent?.split(' ') as string[];
        modalTitle.textContent = "Edit an Existing " + lastWord[lastWord.length - 1];

        let modalBtns = modal.querySelectorAll('button[type="submit"]');

        modalBtns[0].classList.add('hidden');
        modalBtns[0].setAttribute('disabled', '');
        modalBtns[1].classList.remove('hidden');
        modalBtns[1].removeAttribute('disabled');

        let card =  this.parentElement?.parentElement;
        let inputs = modal.querySelectorAll('input');
        let selects = modal.querySelectorAll('select');

        if (this.dataset.page == "cars") {
            inputs[0].value = card?.querySelector('.car-model')?.textContent as string;
            inputs[1].value = card?.querySelector('.car-marque')?.textContent as string;
            inputs[2].value = card?.querySelector('.car-immat')?.textContent as string;
            inputs[2].setAttribute('readonly', 'readonly');
            inputs[3].value = card?.querySelector('.car-year')?.textContent as string;
            inputs[4].value = card?.querySelector('.car-price')?.textContent as string;
        } else if (this.dataset.page == "clients") {
            inputs[0].value = card?.querySelector('.client-num')?.textContent as string;
            inputs[1].value = card?.querySelector('.client-name')?.textContent as string;
            inputs[2].value = card?.querySelector('.client-address')?.textContent as string;
            inputs[3].value = card?.querySelector('.client-tel')?.textContent as string;
            inputs[4].value = card?.querySelector('.client-email')?.textContent as string;
        } else if (this.dataset.page == "contracts") {
            inputs[0].value = card?.querySelector('.contract-num')?.textContent as string;
            inputs[1].value = card?.querySelector('.contract-start')?.textContent as string;
            inputs[2].value = card?.querySelector('.contract-end')?.textContent as string;
            inputs[3].value = card?.querySelector('.contract-duration')?.textContent as string;
            selects[0].value = card?.querySelector('.contract-name')?.textContent as string;
            selects[1].value = card?.querySelector('.contract-immat')?.textContent as string;
        }
    });
})