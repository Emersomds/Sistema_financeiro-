document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();

    let nome = document.getElementById('nome').value.trim();
    let email = document.getElementById('inputEmail').value.trim();
    let senha = document.getElementById('senha').value.trim();
    let confirmaSenha = document.getElementById('confirmaSenha').value.trim();
    let mensagens = document.getElementById('mensagens');
    mensagens.innerHTML = '';

    let erros = [];

    // Validação do campo nome
    if (nome === '') {
        erros.push('O campo nome é obrigatório.');
    }

    // Validação do campo email
    if (email === '') {
        erros.push('O campo email é obrigatório.');
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        erros.push('O formato do email é inválido.');
    }

    // Validação do campo senha
    if (senha === '') {
        erros.push('O campo senha é obrigatório.');
    } else if (senha.length < 6) {
        erros.push('A senha deve ter pelo menos 6 caracteres.');
    }

    // Validação do campo confirmaSenha
    if (confirmaSenha === '') {
        erros.push('O campo de confirmação de senha é obrigatório.');
    } else if (senha !== confirmaSenha) {
        erros.push('As senhas não correspondem.');
    }

    // Exibir mensagens de erro
    if (erros.length > 0) {
        mensagens.innerHTML = '<div class="alert alert-danger" role="alert"><ul><li>' + erros.join('</li><li>') + '</li></ul></div>';
    } else {
        // Se não houver erros, envie o formulário
        mensagens.innerHTML = '<div class="alert alert-success" role="alert">Formulário enviado com sucesso!</div>';
        document.getElementById('form').submit();
    }
});
