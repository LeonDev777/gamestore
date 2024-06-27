const shoppingNumbers = document.querySelector('#shopping-numbers');

 window.addEventListener('addBook', event => {
    shoppingNumbers.innerHTML = event.detail.add;
})


/* const shoppingNumbers = document.querySelector('#shopping-numbers');

const btnAdds = document.querySelectorAll('.btn__add');

function addProduct() {

    let value = shoppingNumbers.dataset.value;

    value =  value == '' ? 1 : parseInt(value) + 1;
    shoppingNumbers.innerHTML = value;
    shoppingNumbers.dataset.value = value;

}
 */
