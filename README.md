## Sobre o projeto

O projeto é um sistema com um CRUD de usuários feito com laravel usando bootstrap, no CRUD é possível:

- Adicionar usuários.
- Editar usuários.
- Remover usuários.

## Licença
[MIT license](https://opensource.org/licenses/MIT).


### Primeiros passos:
- Criar um banco de dados com o nome "test_bma"
- Rodar o comando "composer install"
- Renomear o arquivo ".env.example" para ".env"
- Alterar a linha "DB_DATABASE=laravel" para "DB_DATABASE=test_bma" do arquivo ".env"
- Rodar as migrations com o comando "php artisan migrate"
- Rodar o comando "php artisan key:generate"