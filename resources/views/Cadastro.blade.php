<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
</head>
<body>

    <div class="container">
        <div class="login-box">
            <h2>Cadastro</h2>
            <p>Crie sua conta</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group">
                    <label>Nome</label>
                    <input type="text" name="name" placeholder="Digite seu nome" required>
                </div>

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Digite seu email" required>
                </div>

                <div class="input-group">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="Digite sua senha" required>
                </div>

                <div class="input-group">
                    <label>Confirmar Senha</label>
                    <input type="password" name="password_confirmation" placeholder="Confirme sua senha" required>
                </div>

                <button type="submit">Cadastrar</button>

                <div class="extra">
                    <a href="{{ route('meulogin') }}">
                        Já tem conta? Faça login.
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>