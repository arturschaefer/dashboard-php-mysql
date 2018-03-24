/* Atribui ao evento keypress do input cpf a função para formatar o CPF */
var inputCPF = document.getElementById("cpf");
if (inputCPF.addEventListener) {
    inputCPF.addEventListener("keypress", function () {
        mascaraTexto(this, '###.###.###-##')
    });
} else if (inputCPF.attachEvent) {
    inputCPF.attachEvent("onkeypress", function () {
        mascaraTexto(this, '###.###.###-##')
    });
}