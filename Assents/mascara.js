document.addEventListener('DOMContentLoaded', function () {

	var txtClassificacao = document.getElementById("txt-classificacao");
	txtClassificacao.addEventListener("input", function (event) {
        // Remove todos os caracteres que não sejam 'L', 'l' ou números
        this.value = this.value.replace(/[^Ll0-9]/g, "");

        // Garante que não haja mais de 2 caracteres
        this.value = this.value.substring(0, 2);
	});
})