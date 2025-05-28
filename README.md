# 🚪 Elevador Lima

Sistema de simulação de chamadas de elevador, desenvolvido com **Laravel 12**, **Livewire 3**, **Redis** e **filas FIFO**, seguindo os padrões `Service`, `Job` e `DTO`.

---

## 📌 Funcionalidade

- Cada botão "Chamar elevador" adiciona uma nova solicitação para a fila.
- O elevador atende aos andares **em ordem de chegada** (FIFO).
- O movimento do elevador é simulado com logs e `sleep()` no serviço.

---

## 🛠️ Tecnologias

- Laravel 12
- Livewire 3
- Redis (como driver de fila)
- Jobs e Service Layer
- Componentes dinâmicos

---

## 🚀 Instalação

1. **Clone o repositório:**

```bash
git clone https://github.com/seunome/elevador-lima.git
cd elevador-lima
```

2. Instale as dependências:

```
composer install
npm install && npm run build
```

3. Configure o .env:

```
cp .env.example .env
php artisan key:generate
```

4. Configure o banco (se necessário):

```bash
php artisan migrate
```

▶️ Executando
Em um terminal:
```
php artisan serve
```