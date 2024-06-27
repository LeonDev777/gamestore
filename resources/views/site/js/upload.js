const defautlBtn = document.querySelector("#default-btn")
const custonIcon = document.querySelector("#custon-icon")
const img = document.querySelector("img")
const fileName = document.querySelector(".file-name")
const wrapper = document.querySelector(".wrapper")
const cancelImage = document.querySelector("#cancel-btn")

defautlBtn.addEventListener('change',changeImage);
custonIcon.addEventListener('click', addImage)
cancelImage.addEventListener('click',removerImage)

function addImage() {
   defautlBtn.click();
}

function  changeImage(event) {
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function() {
            const result = reader.result;
            img.src = result;
        }
        reader.readAsDataURL(file);

        wrapper.classList.add('active')

        //adicionar nome do arquivo
         fileName.innerHTML = this.files[0].name
    }
}

function removerImage() {
    img.src = "";
    wrapper.classList.remove('active')
}

//mascara de moeda


const element = document.getElementById('value');

element.addEventListener('input',formatCurrency)


function formatCurrency() {
    let value = element.value;

    value = value + '';
    value = parseInt(value.replace(/[\D]+/g, ''));
    value = value + '';
    value = value.replace(/([0-9]{2})$/g, ",$1");
    if (value.length > 6) {
        value = value.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }


    element.value = value;
    if(value == 'NaN') element.value = '';
}
