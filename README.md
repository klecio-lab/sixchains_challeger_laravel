Aqui está uma versão aprimorada do seu `README.md`, com formatação e explicações mais detalhadas para facilitar o entendimento e a execução das etapas:

```markdown
# Setup do Projeto Laravel com Docker e Sail

## 1. Instalar as Dependências

Primeiro, instale as dependências do projeto com o Composer:

```bash
composer install
```

## 2. Subir a Aplicação com Docker

Em seguida, suba a aplicação utilizando o Docker e Laravel Sail:

```bash
./vendor/bin/sail up
```

Isso irá iniciar os containers Docker necessários para o ambiente de desenvolvimento. 

### **Caso Encontre o Erro abaixo:**

```
Error response from daemon: driver failed programming external connectivity on endpoint sixchains_challeger_laravel-laravel.test-1 (5bebaacfbe487c4040d32f101f742463d53d457b1044f253875fe3fd9cd4890f): Error starting userland proxy: listen tcp4 0.0.0.0:80: bind: address already in use
```

Esse erro ocorre porque a porta `80` já está sendo utilizada por outro serviço, como o Apache. Para resolver, siga os próximos passos.

## 3. Parar o Apache (se necessário)

Caso o erro acima ocorra, é provável que o Apache esteja ocupando a porta `80`. Para liberar a porta, execute o seguinte comando:

```bash
sudo service apache2 stop
```

Isso irá parar o serviço do Apache e liberar a porta `80` para o Docker.

## 4. Rodar Migrations e Seeds

Após subir a aplicação e garantir que o ambiente está funcionando corretamente, você pode rodar as migrations e seeds para configurar o banco de dados com os dados iniciais.

Execute o seguinte comando:

```bash
./vendor/bin/sail artisan migrate --seed
```

Esse comando irá aplicar as migrations e rodar as seeds para popular o banco de dados com dados padrão.

## 5. Acessando a Aplicação

Após a execução do comando acima, você pode fazer as requisições a api:

```
http://localhost:8000/api
```

---


## 6. Caso dê esse erro:

```
    "message": "SQLSTATE[08006] [7] Connection refused\n\tIs the server running on that host and accepting TCP/IP connections? (Connection: pgsql, SQL: select * from \"users\" where \"email\" = kleciohenrique18@gmail.com limit 1
```

execute o seguinte comando:

```
    sudo systemctl stop postgresql
```

---
