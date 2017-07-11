# MyTest

## Requisitos do servidor

- PHP >= 5.5.9
- MySQL
- NPM
- Bower
- Composer


## Após clonar o repositório

#### Crie o banco de dados e a tabela usuários

        CREATE TABLE `users` (
          `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
          `name` varchar(100) NOT NULL,
          `email` varchar(100) NOT NULL,
          `user` varchar(100) NOT NULL,
          `token` varchar(100) NOT NULL,
          `password` varchar(100) NOT NULL,
          `status` int(1) NOT NULL,
          `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        );


#### Execute no terminal
- npm install
- bower install
- composer install
- gulp
- Configure o arquivo config.php