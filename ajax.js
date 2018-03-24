// pegando o HTTP Object
function getHTTPObject() {

    if (window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP"); // IE
    } else if (window.XMLHttpRequest) {
        return new XMLHttpRequest(); // Outros Navegadores
    } else {
        alert("Seu Navegador não suporta AJAX."); // Navegadores antigos
        return null;
    }

}

function enviaCPF() {

    httpObject = getHTTPObject();

    if (httpObject != null) {
        httpObject.open("GET", "upperCase.php?cpf_entrada=" + document.getElementById('cpf_entrada').value, true);
        httpObject.send(null);
        httpObject.onreadystatechange = setOutput;
    }
}

function enviaSGS() {

    httpObject = getHTTPObject();

    if (httpObject != null) {
        httpObject.open("GET", "upperCase.php?sgs=" + document.getElementById('sgs').value, true);
        httpObject.send(null);
        httpObject.onreadystatechange = setOutput;
    }
}


//0 = uninitialized
//1 = loading
//2 = loaded
//3 = interactive
//4 = complete
// Mudando o valor do campo 'saida'
function setOutput() {

    if (httpObject.readyState == 4) {
        document.getElementById('resultado').innerHTML = httpObject.responseText;
    }

}

var httpObject = null;