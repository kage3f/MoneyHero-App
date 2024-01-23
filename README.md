Documentação do Projeto
Projeto MoneyHero

Bem-vindo à documentação do projeto MoneyHero! Este projeto é composto por uma aplicação front-end e um back-end construído com Laravel.

Front-end
Para começar a usar a aplicação front-end, siga os passos abaixo:

Navegue até a pasta frontend do projeto.

Execute os seguintes comandos para instalar as dependências e iniciar o servidor local:

bash
Copy code
npm install
npm run dev
A aplicação front-end usa Vite como seu empacotador e servidor de desenvolvimento. Certifique-se de que o Vite esteja corretamente configurado e funcionando.

Back-end
O back-end do projeto é construído com Laravel. Aqui estão os passos para configurá-lo:

Vá para a pasta backend do projeto.
Certifique-se de configurar o arquivo .env com as credenciais do seu banco de dados.
O projeto está configurado para usar um mock de dados localizado em storage/app chamado mock_data.json. Este arquivo simula exatamente os dados que podem ser armazenados e recuperados da API.
Rota da API
A rota principal para obter os dados das cobranças é:

bash
Copy code
GET http://localhost:8000/api/cobrancas
Esta rota retorna dados no formato JSON, simulando a resposta que seria obtida de um banco de dados real.

Para mais informações sobre outras rotas e funcionalidades, consulte a documentação interna do código ou entre em contato com os desenvolvedores.
