# Supermarket

# Requisitos Utilizados para o Desenvolvimento do Presente Projeto

1. O código deve ser desenvolvido em formato universal, com textos inseridos manualmente.
  
2. Deverá conter um sistema de login simples. Feito de forma manual, sem uso de frameworks. Não sendo necessário desenvolver requisitos de segurança complexos como criptografia avançada.
  
3. O FrontEnd deve estar separado do BackEnd e devem se falar em formado de API Rest.

4. O Backend deve estar 100% manual, sem a utilização de frameworks. Deve conter ao menos uma autenticação simples com basic auth e criptografia da senha com base64_encoder.

5. Deverá ser disponibilizado um arquivo no diretório "/mssql-server/" com a collection que possa ser importada em programas como Postman ou similares para fazer os testes da API do BackEnd de forma independente do FrontEnd.

6. Para o FrontEnd poderá ser utilizado algum Framework JS.

7. Deverá ser utilizado como SGBD o MSSQL ou PgSQL em formato de Docker.

8. Deverá ser usado o servidor local que o PHP fornece (não um servidor de mercado como Apache por exemplo.


##############################################################################################################

Instalação do projeto

1 - BANCO DE DADOS: O database utilizado no desenvolvimento foi o mssql server 2019 latest. Para replicar o ambiente eu disponibilizei na masta "/mssql-server/" as configurações utilizadas no arquivo docker-compose.yaml.
    Ao iniciar o docker com o comando docker-compose up -d, ele carrega o script de inicialização juntamente com as instruções sql contendo o script de criação do banco e na sequencia faz os inserts nas bases.
    Para que não ocorram problemas, também foi disponibilizado um arquivo "sql/sqlAlldata.sql" e em último caso tem o backup de cada base na pasta "/sql/segmented/"

2 - POSTMAN: Conforme citado acima o arquivo com as collections para analise do backend encontram-se no diretório "/mssql-server/Supermarket.postman_collection.json"

3 - BACK-END: Para executar o back-end basta abrir o prompt de comando como administrador, navegar até a raiz do projeto back-end que é a pasta "/app/" e rodar o comando "php -S localhost:8000", é importante que o backend rode na porta 8000 (oito mil)

4 - FRONT-END: Para executar o front-end deve ser aberto um segundo prompt de comando como administrador (os módulos são independentes), navegue até a raiz do projeto web, que é a pasta "/web/" e rode o comando "php -S localhost:8080". Caso deseje, pode rodar o Front-end na   
    porta que desejar.


Desde já agradeço, espero que corra tudo bem quanto as instruções do projeto.


![image](https://github.com/user-attachments/assets/2739b571-a79d-4de3-a597-afd16fee0323)







