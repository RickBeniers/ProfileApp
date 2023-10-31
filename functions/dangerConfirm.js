function return_confirm(confirm1, confirm2) {
    if (confirm(confirm1) === true) {
        return confirm(confirm2);
    } else {
        return false;
    }
}