<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Perfil - {{ $user->name }}</title>
        <link rel="stylesheet" href="{{ asset('CSS/profile.css') }}">
    </head>
    <body>

        <div class="profile-page">

            <header class="profile-header">
                <div class="container">
                    
                    <a href="{{ route('dashboard') }}" class="btn-back" aria-label="Voltar ao menu">← Voltar</a>

                    <div class="profile-card">
                        <div class="avatar">
                            <!-- Se tiver avatar no usuário, use-o; caso contrário, placeholder -->
                            <img src="{{ $user->avatar ?? asset('images/avatar-placeholder.png') }}" alt="Avatar de {{ $user->name }}">
                        </div>

                        <div class="profile-info">
                            <h1 class="user-name">{{ $user->name }}</h1>
                            <p class="user-bio">{{ $user->bio ?? 'Sem biografia ainda.' }}</p>

                            <div class="profile-stats">
                                <div class="stat">
                                    <span class="stat-number">{{ $posts->count() }}</span>
                                    <span class="stat-label">Posts</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">{{ $user->followers_count ?? 0 }}</span>
                                    <span class="stat-label">Seguidores</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">{{ $user->following_count ?? 0 }}</span>
                                    <span class="stat-label">Seguindo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </header>

            <main class="container main-content">
                <section class="create-post">
                    @auth
                        <form method="POST" action="{{ route('post.store') }}" class="create-post-form">
                            @csrf
                            <textarea name="content" placeholder="Compartilhe algo..." required></textarea>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Postar</button>
                            </div>
                        </form>
                    @endauth
                </section>

                <section class="posts-list">
                    <h2 class="section-title">Posts</h2>

                    @forelse($posts as $post)
                        <article class="post-card">
                            <header class="post-header">
                                <div class="post-author">
                                    <img class="post-author-avatar" src="{{ $post->user->avatar ?? asset('images/avatar-placeholder.png') }}" alt="Avatar {{ $post->user->name }}">
                                    <div>
                                        <strong class="post-author-name">{{ $post->user->name }}</strong>
                                        <time class="post-time" datetime="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</time>
                                    </div>
                                </div>

                                <form method="POST" action="{{ route('like.toggle', $post->id) }}" class="like-form" aria-label="Curtir post">
                                    @csrf
                                    <button type="submit" class="btn-like" aria-label="Curtir">
                                        ❤️ <span class="like-count">{{ $post->likes->count() }}</span>
                                    </button>
                                </form>
                            </header>

                            <div class="post-body">
                                <p>{{ $post->content }}</p>
                            </div>
                        </article>
                    @empty
                        <p class="no-posts">Nenhum post encontrado.</p>
                    @endforelse
                </section>
            </main>

        </div>

    </body>
</html>
