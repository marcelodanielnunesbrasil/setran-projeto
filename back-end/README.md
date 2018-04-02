# INSTRUÇÕES PARA INSTALAÇÃO

### 1- Instalar o `wampserver64` para Windows ou instale manualmente `php, mysql-server` em ambiente Linux, para usar a versão mais recente do `php`.
    Use php7.0 ou superior

### 2- Após instalar o wampserver (Windows) ou (Linux), Crie uma `vhosts` no meu caso estou usando Windows.
    http://localhost/add_vhost.php?lang=portuguese
    Nome da vhost: ex: setran.localhost
    Caminho da pasta fonte: ex:  c:/wamp64/www/setran-projeto/back-end/public
    Note que foi passada a pasta raiz mais a pasta [/public]. 

### 3- Instale o `composer`:
3.1 - Windows: `https://getcomposer.org/Composer-Setup.exe`

3.2 - Linux:

 `php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`             
 `php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"`              
 `php composer-setup.php`         
 `php -r "unlink('composer-setup.php');"`
 
### 4- Execute o camando dentro da pasta raiz do back-end:
```composer install```

### 5- Instale o nodejs e execute o comando no proprio terminal: 
```npm install``` 

### 6- Após fazer as configurações do vhosts crie um arquivo `.env` nas pasta raiz e copie o conteudo de `.env.example` para o `.env` e preencha o `DOMAIN` adicionando entra as aspas o nome que voce deu para o vhosts. Você tambem verá outros campos como configuração do banco de dados.

### 7- Com o servidor apache funcionado acesso o link do vhosts. É necessário reiniciar o DNS no wamp para funcionar o vhost `icon do wamp na barra de tarefas > botao direito > Ferramentas > Reiniciar DNS`

    URL back-end tests
    https://setran.marcelodanielbrasil.com.br/noticias/auth/Y2hLa0VCT0N5MkRNZXpkYzBrSy92aWs9/all
