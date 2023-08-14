# Projeto Laravel com Vue.js

Este é um projeto simples que combina o framework Laravel no backend e o Vue.js no frontend para criar um CRUD (Create, Read, Update, Delete) de endereços.

## Requisitos

Certifique-se de ter as seguintes ferramentas instaladas em sua máquina:

- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [npm](https://www.npmjs.com/)
- [MySQL](https://www.mysql.com/)

## Configuração

1. Clone este repositório para a sua máquina:

```bash
$git clone https://github.com/ThiagoSartorel/LaravelAddressCRUD.git
```

2. Instale as dependências do PHP com o Composer:

```bash
composer install
```

3. Instale as dependências do Node.js:

```bash
npm install
```
4. (Com o .env configurado) - Execute as migrações do banco de dados:

```bash
php artisan migrate
```

5. Execute os seeders para preencher o banco de dados com dados de exemplo:

```bash
php artisan db:seed
```

## Rodando o projeto

1. Inicie o servidor PHP:

```bash
php artisan serve
```

2. Abra uma nova janela do terminal e inicie o servidor de desenvolvimento do Vue.js:

```bash
npm run dev
```

3. Acesse [http://localhost:8000](http://localhost:8000).

Created by Thiago Sartorel on 13/08/2023.