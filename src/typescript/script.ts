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
    let selects = modal.querySelectorAll('select');

    inputs.forEach(item => {
        item.value = "";
    });

    selects.forEach(item => {
        item.value = "";
    });

    inputs[2].removeAttribute('readonly');      // In cars form: Immatriculation form is set to readonly on edit
});

if (alertMsg != null) {
    setTimeout(() => {
        (alertMsg as HTMLElement).remove();
    }, 4000);
}

if (localStorage.getItem('menu') == 'closed') {
    menu.classList.add('menu-closed');
}

menuBtn.addEventListener('click', function () {
    if (menu.classList.contains('menu-closed')) {
        menu.classList.remove('menu-closed');
        localStorage.setItem('menu', 'open');
    } else {
        menu.classList.add('menu-closed');
        localStorage.setItem('menu', 'closed');
    }
});

function inputHasErrors(input: HTMLInputElement | HTMLSelectElement, pattern: RegExp, msg: string) : boolean {
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

modal.querySelector('.form-add-btn')?.addEventListener('click', function (this: HTMLButtonElement, e) {
    
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
    } else if (this.value == 'clients') {
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
    } else if (this.value == 'voitures') {
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

    // if (inputs[2].value == "") {
    //     inputs[2].style.borderColor = "red";
    //     errors = true;
    // } else {
    //     inputs[2].style.borderColor = "";
    // }

    // if (inputs[2].value == "") {
    //     inputs[2].style.borderColor = "red";
    //     errors = true;
    // } else {
    //     inputs[2].style.borderColor = "";
    // }
    
    if (errors == true) {
        e.preventDefault();
    }
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
            inputs[2].value = card?.querySelector('.client-tel')?.textContent as string;
            inputs[3].value = card?.querySelector('.client-address')?.textContent as string;
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