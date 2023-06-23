<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/homepage/homepage.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/homepage">Home</a></li>
                <li><a href="/membros/create">Cadastro de Membros</a></li>
                <li><a href="/tarefas">Lista de Tarefas</a></li>
                <li><a href="/tarefas/create">Cadastro de Tarefas</a></li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                  </form>
                </li>

            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2023 LuizGuylherme</p>
    </footer>
</body>

