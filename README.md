# Car CRUD

## Baixe o projeto e execute o seguinte comando:

- Baixe as dependências
````
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
````

- Copie o arquivo env (e faça as alterações necessárias)
````
cp .env.example .env
````

- Faça o build
````
.vendor/bin/sail build 
````

- Suba o docker
````
.vendor/bin/sail up -d 
````

- Crie a chave de aplicação
````
.vendor/bin/sail artisan key:generate
````

- Execute a migration
````
.vendor/bin/sail artisan migrate
````

- Instale os assests
````
.vendor/bin/sail npm install
````

- Execute o VITE
````
.vendor/bin/sail npm run dev
````

- Execute a fila
````
.vendor/bin/sail artisan queue:work
````
