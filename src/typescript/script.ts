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

    inputs[2].removeAttribute('readonly');
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
        modalTitle.textContent = "Edit an existing " + lastWord[lastWord.length - 1];

        let modalBtns = modal.querySelectorAll('button[type="submit"]');

        modalBtns[0].classList.add('hidden');
        modalBtns[0].setAttribute('disabled', '');
        modalBtns[1].classList.remove('hidden');
        modalBtns[1].removeAttribute('disabled');

        let card =  this.parentElement?.parentElement;
        let inputs = modal.querySelectorAll('input');

        if (this.dataset.page == "cars") {
            inputs[0].value = card?.querySelector('.car-model')?.textContent as string;
            inputs[1].value = card?.querySelector('.car-marque')?.textContent as string;
            inputs[2].value = card?.querySelector('.car-immat')?.textContent as string;
            inputs[2].setAttribute('readonly', 'readonly');
            inputs[3].value = card?.querySelector('.car-year')?.textContent as string;
            inputs[4].value = card?.querySelector('.car-price')?.textContent as string;
        }
    });
})