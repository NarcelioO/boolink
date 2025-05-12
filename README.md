# 📚 Linkbook

Sistema de gerenciamento de links com recursos de cache e visualização de títulos automáticos.

## 🚀 Características

- Autenticação de usuários
- Gerenciamento de links pessoais
- Cache automático de títulos das páginas
- Paginação de resultados
- Interface moderna com Tailwind CSS
- Sistema em tempo real com Livewire

## 📋 Pré-requisitos

- PHP 8.1 ou superior
- Composer
- Node.js e NPM
- MySQL/PostgreSQL
- Laravel 10.x

## 🛠️ Instalação

1. Clone o repositório
```bash
git clone https://github.com/NarcelioO/linkbook.git
cd linkbook
```

2. Instale as dependências
```bash
composer install
npm install
```

3. Configure o ambiente
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no arquivo `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=linkbook
DB_USERNAME=root
DB_PASSWORD=
```

5. Execute as migrações e seeders
```bash
php artisan migrate --seed
```

## 🔧 Desenvolvimento

Para iniciar o ambiente de desenvolvimento:

```bash
npm run dev
php artisan serve
```

## 🧪 Testes

```bash
php artisan test
```

## 📦 Estrutura do Projeto

```
linkbook/
├── app/
│   ├── Livewire/
│   │   └── Link/
│   │       ├── Create.php
│   │       ├── Delete.php
│   │       └── Index.php
│   └── Models/
│       └── Link.php
├── resources/
│   └── views/
│       └── livewire/
│           └── link/
└── tests/
    └── Feature/
        └── Livewire/
            └── Link/
```

### Gerenciamento de Links
- Criação de links
- Exclusão de links
- Listagem paginada
- Títulos automáticos


## ✨ Tecnologias Utilizadas

- Laravel 12
- Livewire 3
- Tailwind CSS
- Alpine.js
- PostgreSQL

