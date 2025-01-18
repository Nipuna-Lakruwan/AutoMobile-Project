function incrementQty(button) {
    let input = button.previousElementSibling;
    let currentValue = parseInt(input.value);
    input.value = currentValue + 1;
}

function decrementQty(button) {
    let input = button.nextElementSibling;
    let currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
    }
}