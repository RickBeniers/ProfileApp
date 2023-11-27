
//This function only exists so i can easily use two confirm functions in a row
//These are used for changing your e-mail and password.
function return_confirm(confirm1, confirm2) {
    if (confirm(confirm1) === true) {
        return confirm(confirm2);
    } else {
        return false;
    }
}

//Until i figure out how to properly use this it will most likely stay unused.
//It needs to be able to be displayed in the middle of the page once while still being able to be used in every form
//visible on page.
function display_confirm_modal(dangerousAction, inputType, inputName) {
    let confirmModal = document.getElementById("confirmModal");
    if (dangerousAction === true) {
        confirmModal.innerHTML +="<p class='modalText'>Are you sure you wish to change your" + inputType + "?</p>" +
            "<input onclick='display_danger_confirm_modal(" + inputType + ")' type='button' class='confirmButton' value='YES'>" +
            "<input onclick='hide_confirm_modal()' type='button' class='cancelButton' value='NO'>"
        confirmModal.style.display = 'block'
    } else {
        confirmModal.innerHTML +="<p class='modalText'>Are you sure you wish to change your " + inputType + "?</p>" +
            "<input type='submit' class='confirmButton' name='" + inputName + "' id='" + inputName + "' value='YES'>" +
            "<input onclick='hide_confirm_modal()' type='button' class='cancelButton' value='NO'>"
        confirmModal.style.display = 'block'
    }
}

function display_danger_confirm_modal(inputType) {
    let confirmModal = document.getElementById("confirmModal");
    confirmModal.innerHTML +="<p class='dangerModalText'>ARE YOU REALLY SURE YOU WISH TO CHANGE YOUR " +$inputType + "?</p>" +
        "<input type='submit' class='confirmButton' name='" + $inputName + "' id='" + $inputName + "' value='YES I AM'>" +
        "<input onclick='hide_confirm_modal()' type='button' class='cancelButton' value='NO'>"
    confirmModal.style.display = 'block'
}

function hide_confirm_modal() {
    let confirmModal = document.getElementById("confirmModal");
    confirmModal.style.display = 'none';
    confirmModal.innerHTML = "";
}