### Tecnologias utilizadas

 - laravel 9
 - php 8.1
 - redis para armazenamento do cache
 - docker
 - docker-compose

### Configuração do ambiente

- Necessário possuir o docker e docker-compose instalado

- Rodar os comandos abaixo dentro da raiz do projeto:

    1 - docker-compose exec app composer install<br>
    2 - para fins de facilitar o processo, removi o .env do .gitignore<br>
    3 - para rodar os testes basta: docker-compose exec app php artisan test<br>


  ### uso do endpoint

- A porta exposta no projeto para acessar o endpoint é a <b>8001</b>, sendo assim, para utilizar o endpoint criado basta enviar uma requisição do tipo GET contendo as query strings <b>uf</b> e <b>page</b>, onde <b>uf</b> = Sigla do estado que se deseja consultar e <b>page</b> o número da página para fins de paginação do resultado.
ex:

<b>localhost:8001/api/city/list?uf=RJ&page=1</b>

 ### lista de requisitos em relação ao implementado:
 
- [x] Criar uma rota para pesquisar e listar os municípios de uma UF
- [x] Resposta da requisição deve conter, uma lista de municípios com os seguintescampos: name: Nome do município.ibge_code: Código IBGE desse município
- [x] Deve ser utilizado como providers as seguintes APIs: ibge e brasilapi
- [x] O provider usado deve ser definido via variável de ambiente.
- [x] Deve conter testes unitários e de integração.

Bonus:
- [x] Uso de Cache
- [x] Tratamento de exceções
- [x] Paginação dos resultados
- [x] Conteinerização.

 ### Sobre o projeto
 
 - o provider a ser utilizado deve ser informado no .env, na variável CITIES_PROVIDER. Por padrão está setada a API do ibge. Para alternar basta descomentar uma e comentar a outra. 
 dentro do código foi feito uma pequena estrutura utilizando cadeia de responsabilidade, tendo como cabeça o provider do ibge. assim se novos providers surgire, basta criar uma nova classe extendendo da interface que tudo continuará funcionando normalmente.

 