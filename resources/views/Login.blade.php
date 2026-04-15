<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    </head>
    <body>

        <div class="container">
            <div class="login-box">
                <h2>Bem-vindo</h2>
                <p>Faça login para continuar</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Digite seu email" required>
                    </div>

                    <div class="input-group">
                        <label>Senha</label>
                        <input type="password" name="password" placeholder="Digite sua senha" required>
                    </div>

                    <button type="submit">Entrar</button>
                </form>

                <div class="extra">
                    <a href="{{ route('meucadastro') }}">
                        Não tem conta? Faça cadastro.
                    </a>
                </div>
            </div>
        </div>

    </body>
</html>