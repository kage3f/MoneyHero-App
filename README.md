# Documentação do Projeto MoneyHero

![Projeto MoneyHero](https://i.imgur.com/3Y5zHjy.png)

Bem-vindo à documentação do projeto MoneyHero! Este projeto é composto por uma aplicação front-end e um back-end construído com Laravel.

## Front-end

Para começar a usar a aplicação front-end, siga os passos abaixo:

1. Navegue até a pasta `frontend` do projeto.
2. Execute os seguintes comandos para instalar as dependências e iniciar o servidor local:

   ```bash
   npm install
   npm run dev

## Back-end

O back-end do projeto é construído com Laravel. Aqui estão os passos para configurá-lo:

1. Vá para a pasta `backend` do projeto.
2. Certifique-se de configurar o arquivo `.env` com as credenciais do seu banco de dados.
3. O projeto está configurado para usar um mock de dados localizado em `storage/app` chamado `mock_data.json`. Este arquivo simula exatamente os dados que podem ser armazenados e recuperados da API.

### Rota da API

A rota principal para obter os dados das cobranças é:

```bash
GET http://localhost:8000/api/cobrancas
POST http://localhost:8000/api/cobrancas ( A rota POST já adiciona uma nova cobrança no banco de dados, porem como a rota GET está usando um json estático, essa rota deixa de fazer sentido, porem já está construída. Segue abaixo um exemplo de inserção:

**Exemplo de Inserção:**

```json
{
    "nome_cliente": "João Silva",
    "valor": 10000.00,
    "data_registro": "22/01/2024",
    "tipo": "pix",
    "status": "confirmada",
    "telefone": "11999887766"
}
