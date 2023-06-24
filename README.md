## To Do List

Esta é uma aplicação de cadastro de tarefas, onde pode-se editar a tarefa, se foi finalizada ou não e a data do término.

## Instalação
Certifique-se de que seu ambiente atenda aos requisitos necessários para executar o Laravel. Isso inclui ter o PHP instalado, um servidor web como o Apache ou Nginx, o banco de dados MySQL e o Composer instalado. Verifique a documentação oficial do Laravel para obter os requisitos detalhados. [Documentação Laravel]
(https://laravel.com/docs/10.x/readme)

Clone o repositório 
```bash
git clone https://github.com/Dollynt/ToDoList-laravel.git
```

Vá até o diretório raiz do projeto
```bash
cd ToDoList-laravel
```

Instale o Composer
```bash
composer install
```

Copie e cole o .env.example e renomeie para .env
```bash
cp .env.example .env
```

No .env faça a conexão com seu banco de dados, o nome, usuario e senha

Gere a chave única de aplicativo no diretório raiz
```bash
php artisan key:generate
```

No diretório raiz execute as migrações do banco de dados
```bash
php artisan migrate
```

Iniciar servidor de desenvolvimento
```bash
php artisan serve
```
O servidor estará disponível em 'http://localhost:8000'.

Para ir para a página principal, vá na rota [http://localhost:8000/homepage] 
(http://localhost:8000/homepage)

## Rotas

/login => [GET] [POST] rota para mostrar pagina de login e logar

/logout => [POST] rota para deslogar

/membros/create => [GET] rota para pagina cadastro de membro

/membros => [POST] rota para cadastrar membro

/membros/{membroId} => [GET] [PUT] [DELETE] rota para pagina de editar e visualizar membro; atualizar membro; deletar membro

/tarefas/create => [GET] rota para pagina de criar tarefa

/tarefas => [POST] rota para criar tarefa

/tarefas/{tarefaId} => [GET] [PUT] [DELETE] rota para pagina de editarmembro; atualizar membro; deletar membro

/tarefas/{tarefaId}/finalizada => [PUT] rota para atualizar apenas se tarefa foi finalizada
