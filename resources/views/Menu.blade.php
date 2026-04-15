<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    </head>
    <body>

        <div class="menu-container">
            <header>
                <h1>Meu Sitezinho</h1>

                <div class="logout">

                    @auth
                        <!-- 👤 Nome do usuário autenticado -->
                        <span style="color: white; margin-right: 10px;">
                            <a href="{{ route('user.profile', auth()->id()) }}">
                                <strong>{{ auth()->user()->name }}</strong>
                            </a>
                        </span>

                        <!-- 🚪 Botão logout -->
                        <form method="POST" action="{{ route('logout') }}" class="form-logout">
                            @csrf
                            <button type="submit" class="btn-logout">Sair</button>
                        </form>
                    @endauth

                    @guest
                        <!-- 🔑 Botão login -->
                        <a href="{{ route('meulogin') }}" class="btn-login">Login</a>
                    @endguest

                </div>
            </header>

            <main>

                <!-- Criar post -->
                <div class="card">
                    <form method="POST" action="{{ route('post.store') }}">
                        @csrf
                        <textarea name="content" placeholder="O que está acontecendo?" required></textarea>
                        <button type="submit">Postar</button>
                    </form>
                </div>

                <!-- Mostrar posts -->
                @foreach($posts as $post)
                    <div class="card">
                        <strong>{{ $post->user->name }}</strong>
                        <p>{{ $post->content }}</p>

                        <!-- Botão de like (colocado dentro do loop) -->
                        <form method="POST" action="{{ route('like.toggle', $post->id) }}">
                            @csrf
                            <button type="submit" class="btn-like" aria-label="Curtir">
                                ❤️ {{ $post->likes->count() }}
                            </button>
                        </form>

                    </div>
                @endforeach

            </main>
        </div>

    </body>
</html>
