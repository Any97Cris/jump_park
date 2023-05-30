### Passos para rodar a API:

### 1 - Baixar os arquivos:
```
composer install e composer update
```

### 2 - Configurar Arquivo ENV:

Nome do Banco e Senha do Banco

### 3 - Rodar as Migrations:
```
php artisan migrate
```

### 4 - Acessar Rotas User:
<p style="font-size:12px">Listar</p>

```
http://127.0.0.1:8000/api/user
```

<p style="font-size:12px">Filtro por ID</p>

```
http://127.0.0.1:8000/api/user/1
```

<p style="font-size:12px">Cadastrar</p>

```
http://127.0.0.1:8000/api/user
```

<p style="font-size:12px">Atualizar</p>

```
http://127.0.0.1:8000/api/user/1
```

<p style="font-size:12px">Delete</p>

```
http://127.0.0.1:8000/api/user/1
```

### 5 - Acessar Rotas Service Order:
<p style="font-size:12px">Listar</p>

```
http://127.0.0.1:8000/api/service_order
```

<p style="font-size:12px">Listar dados da tabela service order e user</p>

```
http://127.0.0.1:8000/api/service_order/5/users
```

<p style="font-size:12px">Listar por ID</p>

```
http://127.0.0.1:8000/api/service_order/50
```

<p style="font-size:12px">Filtro Placa de Veículo</p>

```
http://127.0.0.1:8000/api/service_order?vehiclePlate=placa
```

<p style="font-size:12px">Cadastrar</p>

```
http://127.0.0.1:8000/api/service_order/
```

<p style="font-size:12px">Atualizar</p>

```
http://127.0.0.1:8000/api/service_order/2
```

<p style="font-size:12px">Delete</p>

```
http://127.0.0.1:8000/api/service_order/2
```



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


