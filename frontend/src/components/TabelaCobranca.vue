<template>
    <div class="container mt-4">
      <div style="display: flex; align-items: center; justify-content: space-between;">
        <p class="p-cobrancarecente">Cobranças Recentes</p>
        <a class="btn-showcobranca">Ver todas as cobranças <img src="/public/arrow.svg" /></a>
      </div>
        <table style="margin: 0;" class="table table-bordered">
        <thead class="table-light">
          <tr>
            <th scope="col">Código</th>
            <th scope="col">Cliente</th>
            <th scope="col">Data</th>
            <th scope="col">Tipo</th>
            <th scope="col">Valor</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="cobranca in cobrancas" :key="cobranca.id">
            <td>{{ cobranca.id }}</td>
            <td>{{ cobranca.nome_cliente }}</td>
            <td>{{ cobranca.data_registro }}</td>
            <td>{{ formatarTipo(cobranca.tipo) }}</td>
            <td>{{ cobranca.valor }}</td>
            <td><div :style="estiloDeFundo(cobranca.status)" style="border-radius: 5px; height: 32px; display: flex; align-items: center; justify-content: center;">
                <p class="status-p">{{ formatarStatus(cobranca.status) }}</p>
            </div></td>
            <td style="text-align: center;">{{ cobranca.telefone }}</td>
            <td style="position: relative;"><img style="position: absolute; top: 16px; left: -2px;" src="/public/hamburguer-grafico.svg" /></td>
          </tr>
        </tbody>
      </table>
      <CardMobile class="card-mob" :cobrancas="cobrancas" :formatarTipo="formatarTipo" :formatarStatus="formatarStatus" :estiloDeFundo="estiloDeFundo" />
    </div>
  </template>
  

<script>
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';
import CardMobile from './CardMobile.vue'; // Ajuste o caminho conforme necessário

export default {
   components: {
    CardMobile
  },
  data() {
    return {
      cobrancas: []
    };
  },
  methods: {
    formatarTipo(tipo) {
      return tipo.charAt(0).toUpperCase() + tipo.slice(1);
    },
    formatarStatus(status) {
      return status.split('_').map(palavra => 
        palavra.charAt(0).toUpperCase() + palavra.slice(1)
      ).join(' ');
    },
    estiloDeFundo(status) {
      switch (status) {
        case 'atrasada':
          return 'background-color: #FFB017;';
        case 'confirmada':
          return 'background-color: #3FE24F;';
        case 'em_aberto':
          return 'background-color: #5077F9;';
        default:
          return ''; // Cor padrão ou deixe vazio
      }
    },
  },
  mounted() {
    axios.get('http://localhost:8000/api/cobrancas')
      .then(response => {
        this.cobrancas = response.data.cobrancas.slice(-6);
      })
      .catch(error => {
        console.error('Erro ao buscar os dados: ', error);
      });
  }
};
</script>

<style scoped>
.card-mob {
  display: none !important;
}

.container {
    width: 100%;
    margin-top: 16px;
    flex-shrink: 0;
    border-radius: 16px;
    border: 0.5px solid #D4D4D4;
    background: #FFF;
    padding: 18px;
    padding-bottom: 18px;
}

tr {
    color: #000;
    font-family: "Open Sans";
    font-size: 12px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}

tr th {
    padding-top: 30px;
    padding-bottom: 30px;
}

tr th, tr td {
    padding: 20px 20px 20px 0;
}

tr td:first-child, tr td:nth-child(3), tr td:nth-child(7) {
    color: #A4A4A4;
    font-family: "Open Sans";
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    padding-left: 5px;
}

tr td:nth-child(2) {
    color: #323232;
    font-family: "Open Sans";
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

tr td:nth-child(4) {
    color: #5149E2;
    font-family: "Open Sans";
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

tr td:nth-child(5) {
    color: #323232;
    font-family: "Open Sans";
    font-size: 14px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
}

.status-p {
    color: #FFF;
    text-align: center;
    font-family: Inter;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;            
}

.p-cobrancarecente {
  color: #777;
  font-family: "Open Sans";
  font-size: 12px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
}

.btn-showcobranca {
  display: flex;
  align-items: center;
  justify-content: center;
  color: #000;
  text-align: center;
  font-family: "Open Sans";
  font-size: 14px;
  font-style: normal;
  font-weight: 600;
  line-height: normal;
  gap: 12px;
}

@media(max-width: 580px){
  table {
    display: none;
  }

  .p-cobrancarecente {
    display: none;
  }

  .btn-showcobranca {
    width: 100%;
    justify-content: space-between;
  }

  .card-mob {
    display: block !important;
  }
}

</style>