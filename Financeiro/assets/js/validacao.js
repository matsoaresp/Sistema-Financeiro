function ValidarMeusDados() {

    let nome = document.getElementById('nome').value;
    let email = $("#email").val();
    let validado = true;
    let campos = "";
    
    if (nome.trim() == "") {
        campos ="Preencher o campo NOME!\n";
        $("#nome").focus();
        $("#divNome").addClass("has-error");
        validado = false;
    } else {
        $("#divNome").removeClass("has-error").addClass("has-success");
        $("#nome").focus();
    }

    if (email.trim() == "") {
        campos = campos + "Preencher o campo E-MAIL";
        $("#email").focus();
        $("#divEmail").addClass("has-error");
        validado = false;

    } else {
        $("#divEmail").removeClass("has-error").addClass("has-success");
        $("#email").focus();
    }

    if (!validado)
    alert(campos);

    return validado;
}

function ValidarCategoria() {        
    let nome = document.getElementById('nome').value;
    let validado = true;
    let campos = "";

    if (nome.trim() == "") {
        campos = "Preencher o campo NOME DA CATEGORIA!\n";
        $("#nome").focus();
        $("#divNome").addClass("has-error");
        validado = false;

    } else {

        $("#divNome").removeClass("has-error").addClass("has-success");
        $("#nome").focus();

    }

    if (!validado)
    alert(campos);

    return validado;
}

function ValidarEmpresa() {


    let empresa = document.getElementById('empresa').value;
    let validado = true;
    let campos = "";

    if (empresa.trim() == "") {
        campos ="Preencher o campo NOME DA EMPRESA!\n";
        $("#empresa").focus();
        $("#divEmpresa").addClass("has-error");
        validado = false;

    } else {

        $("#divEmpresa").removeClass("has-error").addClass("has-success");
        $("#empresa").focus();
    }

    if (!validado)
    alert(campos);

    return validado;
}

function ValidarConta() {

    let banco = document.getElementById('banco').value;
    let agencia = $("#agencia").val();
    let numero = $("#numero").val();
    let saldo = $("#saldo").val();
    let validado = true;
    let campos = "";


    if (banco.trim() == "") {
        campos = "Preencher o campo BANCO!\n";
        $("#banco").focus();
        $("#divBanco").addClass("has-error");
        validado = false;

    } else {

        $("#divBanco").removeClass("has-error").addClass("has-success");
        $("#banco").focus();

    }

    if (agencia.trim() == "") {
        campos = campos + "Preencher o campo AGENCIA!\n";
        $("#agencia").focus();
        $("#divAgencia").addClass("has-error");
        validado = false;

    } else {

        $("#divAgencia").removeClass("has-error").addClass("has-success");
        $("#agencia").focus();

    }

    if (numero.trim() == "") {
        campos = campos +  "Preencher o campo NUMERO DA CONTA!\n";
        $("#numero").focus();
        $("#divNumero").addClass("has-error");
        validado = false;

    } else {

        $("#divNumero").removeClass("has-error").addClass("has-success");
        $("#numero").focus();

    }
    if (saldo.trim() == "") {
        campos = campos + "Preencher o campo SALDO!\n";
        $("#saldo").focus();
        $("#divSaldo").addClass("has-error");
        validado = false;

    } else {
        $("#divSaldo").removeClass("has-error").addClass("has-success");
        $("#saldo").focus();
    }

    if (!validado)
    alert(campos);

    return validado;

}
function ValidarMovimento() {

    let tipo = document.getElementById('tipo').value;
    let data = $("#data").val();
    let valor = $("#valor").val();
    let categoria = $("#categoria").val();
    let empresa = $("#empresa").val();
    let conta = $("#conta").val();
    let validado = true;
    let campos = "";

    if (tipo.trim() == "") {
        campos = "Preencher o campo TIPO!\n";
        $("#tipo").focus();
        $("#divTipo").addClass("has-error");
        validado = false;
    } else {

        $("#divTipo").removeClass("has-error").addClass("has-success");
        $("#tipo").focus();

    }
    if (data.trim() == "") {
        campos = campos + "Preencher o campo DATA!\n";
        $("#data").focus();
        $("#divData").addClass("has-error");
        validado = false;
    } else {

        $("#divData").removeClass("has-error").addClass("has-success");
        $("#data").focus();

    }
    if (valor.trim() == "") {
        campos = campos + "Preencher o campo VALOR!\n";
        $("#valor").focus();
        $("#divValor").addClass("has-error");
        validado = false;
    } else {

        $("#divValor").removeClass("has-error").addClass("has-success");
        $("#valor").focus();
    }

    if (categoria.trim() == "") {
        campos = campos + "Preencher o campo CATEGORIA!\n";
        $("#categoria").focus();
        $("#divCategoria").addClass("has-error");
        validado = false;
    } else {
        $("#divCategoria").removeClass("has-error").addClass("has-success");
        $("#categoria").focus();

    }
    if (empresa.trim() == "") {
        campos = campos + "Preencher o campo EMPRESA!\n";
        $("#empresa").focus();
        $("#divEmpresa").addClass("has-error");
        validado = false;

    } else {
        $("#divEmpresa").removeClass("has-error").addClass("has-success");
        $("#empresa").focus();
    }

    if (conta.trim() == "") {
        campos = campos + "Preencher o campo CONTA!";
        $("#conta").focus();
        $("#divConta").addClass("has-error");
        validado = false;
    } else {
        $("#divConta").removeClass("has-error").addClass("has-success");
        $("#conta").focus();
    }

    if (!validado)
    alert(campos);

    return validado;
}
function ValidarConsultaPeriodo() {


    let dat_inicio = document.getElementById('datainicial').value;
    let dat_final = $("#datafinal").val();
    let validado = true
    let campos = "";




    if (dat_inicio.trim() == "") {
        campos ="Preencher o campo DATA INICIAL!\n";
        $("#datainicial").focus();
        $("#divDatainicial").addClass("has-error");
        validado = false;
    } else {
        $("#divDatainicial").removeClass("has-error").addClass("has-success");
        $("#datainicial").focus();
    }
    if (dat_final.trim() == "") {
        campos = campos +"Preencher o campo DATA FINAL!\n";
        $("#datafinal").focus();
        $("#divDatafinal").addClass("has-error");
        validado = false;
    } else {
        $("#divDatafinal").removeClass("has-error").addClass("has-success");
        $("#datafinal").focus();
    }
    if (!validado)
    alert(campos);

    return validado;
}
function ValidarLogin() {

    let email = $("#email").val();
    let senha = $("#senha").val();
    let validado = true;
    let campos = "";

    if (email.trim() === "") {
        campos = "Preencher o campo SEU E-MAIL!\n";
        $("#email").focus();
        $("#divEmail").addClass("has-error");
        validado = false;
        


    } else {
        $("#divEmail").removeClass("has-error").addClass("has-success");
        $("#email").focus();

    }

    if (senha.trim() === "") {
        campos = campos + "Preencher o campo SUA SENHA!\n";
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        validado = false;


    } else {


        $("#divSenha").removeClass("has-error").addClass("has-success");
        $("#senha").focus();
    }
    if (!validado)
    alert(campos);

    return validado;

}


function ValidarCadastro() {

    let nome = document.getElementById('nome').value;
    let email = $("#email").val();
    let senha = $("#senha").val();
    let rsenha = $("#rsenha").val();
    let validado = true;
    let campos = "";

    if (nome.trim() == "") {
        campos = "Preencher o campo SEU NOME!\n";
        $("#nome").focus();
        $("#divNome").addClass("has-error");
        validado = false;
    } else {
        $("#divNome").removeClass("has-error").addClass("has-success");
        $("#nome").focus();
    }

    if (email.trim() == "") {
        campos = campos + "Preencher o campo SEU E-MAIL!\n";
        $("#email").focus();
        $("#divEmail").addClass("has-error");
        validado = false;
    } else {
        $("#divEmail").removeClass("has-error").addClass("has-success");
        $("#email").focus();
    }
    if (senha.trim() == "") {
        campos = campos + "Preencher o campo SENHA!\n";
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        validado = false;
    } else {
        $("#divSenha").removeClass("has-error").addClass("has-success");
        $("#senha").focus();
    }
    if (senha.trim().length < 6) {
        campos = campos + "A SENHA deverá conter no minímo 6 caracteres!\n";
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        validado = false;
    } else {
        $("#divSenha").removeClass("has-error").addClass("has-success");
        $("#senha").focus();
    }
    if (senha.trim() != rsenha.trim()) {
        campos = campos + "O campo SENHA e REPETIR SENHA deverão ser iguais!\n";
        $("#rsenha").focus();
        $("#divRsenha").addClass("has-error");
        validado = false;
    }
    else {
        if (rsenha.trim() == "") {
            $("#divRsenha").removeClass("has-success").addClass("has-error");
        } else {
            $("#divRsenha").removeClass("has-error").addClass("has-success");
        }
        $("#rsenha").focus();
    }
    if (!validado)
    alert(campos);

    return validado;




}
