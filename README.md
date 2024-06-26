# Transações
### Nome: Thomas Marcel Guarnieri

## Execução:
1. Após baixar o repositório, tendo docker instalado vai ser possível executar o comando 
   ```
   docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs 
   ```
2. Crie na base do projeto um arquivo chamado `.env` e adicione os seguinte trecho:
   ```
    APP_NAME=TesteObjective
    APP_ENV=local
    APP_KEY=base64:RuIC7YrW5O28Ltd4tfcdeQLOpXRK+99rlqX8UFkMu7Q=
    APP_DEBUG=true
    APP_TIMEZONE=UTC
    APP_URL=http://localhost
    
    APP_LOCALE=en
    APP_FALLBACK_LOCALE=en
    APP_FAKER_LOCALE=en_US
    
    APP_MAINTENANCE_DRIVER=file
    APP_MAINTENANCE_STORE=database
    
    BCRYPT_ROUNDS=12
    
    LOG_CHANNEL=stack
    LOG_STACK=single
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug
    
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=sail
    DB_PASSWORD=password
    
    SESSION_DRIVER=database
    SESSION_LIFETIME=120
    SESSION_ENCRYPT=false
    SESSION_PATH=/
    SESSION_DOMAIN=null
    
    BROADCAST_CONNECTION=log
    FILESYSTEM_DISK=local
    QUEUE_CONNECTION=database
    
    CACHE_STORE=database
    CACHE_PREFIX=
    
    MEMCACHED_HOST=127.0.0.1
    
    REDIS_CLIENT=phpredis
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    
    MAIL_MAILER=log
    MAIL_HOST=127.0.0.1
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
    
    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false
    
    VITE_APP_NAME="${APP_NAME}"
    ```
3. Agora é possível acessar o container da aplicação Laravel com o comando `./vendor/bin/sail up -d`
4. Para acessar o container basta executar o comando `./vendor/bin/sail bash`
5. As migrations devem ser executadas com `php artisan migrate`
6. Os testes vão executar com `php artisan test`

## Sobre o desenvolvimento
Utilizei os recursos do Laravel para garantir os dados necessários, como FormRequest e Responses, estes responsáveis por filtrar os dados que vem do request e responder de acordo com o que foi solicitado na estrutura correta.

Utilizei uma pasta de services para concentrar as regras de negócio, manter os controllers limpos das lógicas de transferências.

Para as taxas, tentei aplicar o padrão de Strategy, criando uma interface base, um método para cada tipo de transação e uma Factory responsável por centralizar a criação das classes.

Para finalizar fiz todos os testes na aplicação a fim de garantir o funcionamento, inclusive utilizei um pouco de TDD para desenvolver.


