# Sobre o Projeto

- Projeto realizado para exercitar conhecimentos principalmente para as tecnologias PHP e Laravel.
- Projeto Todo é uma lista de afazeres do dia, podendo ser utilizado como uma agenda para lembrar as das
tarefas do dia.

## Tecnologias Utilizadas

- PHP 8.2.4
- Laravel 9.52.10
- Eloquent ORM
- MySQL

## Pré-requisitos antes de utilizar o sistema

- Abra o terminal do computador, vá até a pasta do projeto e execute o comando: php artisan migrate.
- Execute o comando php aartisan db:seed para ser executado a factory de User, Category e Task para ser gerado dados fictícios para utilizar como base de dados.

## Como utilizar o sistema

- Execute o comando php artisan serve para que assim seja exeuctado o servidor interno do Laravel.
- Faça o registro de um usuário apertando no botão "Registre-se".
- Faça login para entrar na tela de Tarefas.
- Crie uma tarefa apertando no botão "Criar Tarefa".
- Edite uma tarefa apertando no ícone de um Lápis.
- Delete uma tarefa apertando no ícone de uma lixeira.