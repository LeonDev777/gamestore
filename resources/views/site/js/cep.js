const cep = document.querySelector("#cep");

var valorCep;

function cepActive(){
    const cursor = cep.selectionStart;
    let search = cep.value.replace(/[^a-z0-9]/gi,"")
    if (cursor == 8 && search.length == 8 && valorCep != search){
        cepService(search);
        valorCep = search;

    }
}

cep.addEventListener('keyup',cepActive);


async function cepService(search){
    const url = `https://viacep.com.br/ws/${search}/json/`;
    const options = {
        method: 'Get',
        mode: 'cors',
        cache:'default'
    }

    try {
        const response =  await fetch(url,options);
        const data = await response.json();
        GeraEndereco(data);

    } catch (error) {
       errorCep();
    }
}

function GeraEndereco(result){
    if (result.erro == true) {
        errorCep();
    }else{
        for(const campo in result){
            if(document.querySelector("#"+ campo)){
                document.querySelector("#" + campo).value = result[campo]
              }
        }
    }


}

function errorCep(){
    const inputResetCep = document.querySelectorAll('#address form .form input:not(input#cep)');
    for (let inputReset of inputResetCep) {
       inputReset.value = '';
    }
    document.getElementById("logradouro").value = "O cep é Inválido";
}

