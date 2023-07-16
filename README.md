# Supermarket
 Supermarket System

# Notas do Projeto
#########################################################################################################################################################################################################
O sistema foi desenvolvido conforme as seguintes recomendações.

- Código deve ser desenvolvido em inglês; OK;
  Textos inseridos de forma manual em inglês;
  
- Faça um login (é um plus); OK;
  Feito login manual, sem frameworks, nao foi possivel desenvolver mais requisitos de segurança como criptografia, validação de campos e demais complexidades manualmente, devido ao pouco tempo de disponibilidade que tive;
  
- Separe Front/Back usando API; OK;
  Backend de forma 100% manual, sem a utilização de frameworks em formado de API Rest com baixo esquema de segurança, implementei uma autenticação simples com basic auth e criptografia da senha com base64_encoder, sem chave e sem outros método de complexidade.
  Foi disponibilizado um arquivo no diretório mssql-server/Supermarket.postman_collection.json, onde é possível testar todas as operações di BackEnd de forma independente do FrontEnd;

- Faça algum teste interno, para verificar o bom funcionamento do código; OK;
  Testes realizados, ficando pendente as operações de carrinho de compras;

- Usar teste unitário é essencial; OK;
- Use algum framework JS; OK;
- Não utilize outro mecanismo de banco de dados além dos sugeridos (MSSQL ou PgSQL); OK;
- Use o servidor local que o PHP fornece (não o Apache, por exemplo); OK;
- Referente ao item 6, refere-se a uma estrutura de Front. Não tão backend.OK;

#########################################################################################################################################################################################################
Instalação do projeto

1 - BANCO DE DADOS: O database utilizado no desenvolvimento foi o mssql server 2019 latest. Para replicar o ambiente eu disponibilizei na masta "/mssql-server/" as configurações utilizadas no arquivo docker-compose.yaml.
    Ao iniciar o docker com o comando docker-compose up -d, ele carrega o script de inicialização juntamente com as instruções sql contendo o script de criação do banco e na sequencia faz os inserts nas bases.
    Para que não ocorram problemas, também foi disponibilizado um arquivo "sql/sqlAlldata.sql" e em último caso tem o backup de cada base na pasta "/sql/segmented/"

2 - POSTMAN: Conforme citado acima o arquivo com as collections para analise do backend encontram-se no diretório "/mssql-server/Supermarket.postman_collection.json"

3 - BACK-END: Para executar o back-end basta abrir o prompt de comando como administrador, navegar até a raiz do projeto back-end que é a pasta "/app/" e rodar o comando "php -S localhost:8000", é importante que o backend rode na porta 8000 (oito mil)

4 - FRONT-END: Para executar o front-end deve ser aberto um segundo prompt de comando como administrador (os módulos são independentes), navegue até a raiz do projeto web, que é a pasta "/web/" e rode o comando "php -S localhost:8080". Caso deseje, pode rodar o Front-end na   
    porta que desejar.


Desde já agradeço, espero que corra tudo bem quanto as instruções do projeto.
#########################################################################################################################################################################################################






