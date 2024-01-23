<template>
  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
      <div>
        <p class="recebidos-p">Recebido do dia</p>
        <p class="recebidos-valor">{{ recebidoDoDiaFormatado }}</p>
      </div>
        <img src="/public/hamburguer-grafico.svg" />
    </div>

    <apexchart type="area" :options="chartOptions" :series="chartSeries" :width="chartWidth" :height="chartHeight" />
  </div>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts';
import apiService from './../../services/apiService'; // Importa o serviço de API
export default {
  name: 'Chart',
  components: {
    apexchart: VueApexCharts,
  },
  data() {
    return {
      recebidoDoDia: 0, // Inicializa a variável
      chartOptions: {
        chart: {
          id: 'area-chart',
          toolbar: {
            show: false, // Defina como false para remover a barra de ferramentas
          },
          zoom: {
            enabled: false, // Desativar o zoom e a seleção
          }
        },
        xaxis: {
          categories: ['10 Jul', '10 Ago', '10 Set', '10 Out', '10 Nov', '10 Dez', '10 Jan', '10 Fev'],
          labels: {
            rotate: -45, // Rotaciona os rótulos
            trim: true,
            maxWidth: 30,
            offsetX: -7, // Ajusta todos os rótulos um pouco para a esquerda
            offsetY: 5, // Ajusta o espaçamento vertical dos rótulos do eixo X
            style: {
              color: '#777',
            },
            show: true, // Você pode alternar isso para false para ocultar rótulos
          },
          tickAmount: 7, // Ajusta a quantidade de rótulos exibidos
        },
        yaxis: {
          min: 0,
          max: 100000,
          tickAmount: 4,
          labels: {
            formatter: function (value) {
              return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            },
          },
        },
        fill: {
          opacity: 0.4,
          colors: ['#007BFF'],
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          show: true,
          curve: 'straight',
          width: 2,
          colors: ['#007BFF'],
          strokeLinecap: 'butt', // Define as pontas como pontiagudas
        },
         // Defina o cursor como "default" para evitar o cursor personalizado
         noData: {
          text: 'Sem dados disponíveis',
          align: 'center',
          verticalAlign: 'middle',
          offsetX: 0,
          offsetY: 0,
          style: {
            color: undefined,
            fontSize: '14px',
            fontFamily: undefined,
            fontWeight: undefined,
            cssClass: undefined,
            cursor: 'default', // Defina o cursor como "default"
          },
          selection: {
          enabled: false, // Desativar a seleção de zoom
        },
        },
        
      },
      
      chartSeries: [
        {
          name: 'Valor',
          data: [500, 1000, 3000, 2000, 7000, 5000, 6000, 10000],
        },
      ],
      chartWidth: '100%',
      chartHeight: '230px',
    };
  },
  mounted() {
    this.fetchData(); // Chama a função para buscar os dados quando o componente for montado
  },
  methods: {
    fetchData() {
    apiService.getCobrancas()
      .then(response => {
        // Animação para o valor recebido do dia
        const valorFinal = parseFloat(response.data.recebido_do_dia);
        this.animateValue(0, valorFinal, 2500);

        // Atualiza o gráfico com os novos dados
        this.updateChartData(response.data.totais_por_mes);
      })
      .catch(error => {
        console.error('Erro ao buscar os dados: ', error);
      });
  },
    animateValue(start, end, duration) {
      let startTimestamp = null;
      const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        this.recebidoDoDia = (progress * (end - start) + start).toFixed(2);
        if (progress < 1) {
          window.requestAnimationFrame(step);
        }
      };
      window.requestAnimationFrame(step);
    },
    updateChartData(totaisPorMes) {
    this.chartOptions.xaxis.categories = totaisPorMes.map(mes => mes.mes);
    this.chartSeries[0].data = totaisPorMes.map(mes => parseFloat(mes.total));
  }
  },
  computed: {
    recebidoDoDiaFormatado() {
      return parseFloat(this.recebidoDoDia).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    }
  },
};
</script>

<style scoped>
.container {
  flex-shrink: 0;
  border-radius: 16px;
  border: 0.5px solid #D4D4D4;
  background: #FFF;
  padding: 16px;
  padding-left: 10px;

}

@media(max-width: 580px){
  .container {
    padding-bottom: 0 !important;
  }
}
/* Defina o cursor como "pointer" */
.apexcharts-canvas {
  cursor: pointer;
}

/* Remova todas as animações de zoom */
.apexcharts-zoomable.hovering-zoom {
  cursor: pointer;
}

/* Remova as animações de zoom com o mouse */
.apexcharts-zoomable .zoom-icon.icon-zoom-in,
.apexcharts-zoomable .zoom-icon.icon-zoom-out {
  display: none !important;
}

.recebidos-p {
  color: #777;
  font-family: "Open Sans";
  font-size: 12px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  margin-left: 10px;
}

.recebidos-valor {
  color: #000;
  font-family: "Open Sans";
  font-size: 34px;
  font-style: normal;
  font-weight: 800;
  line-height: normal;
  margin-left: 10px;
}

@media(max-width: 580px){
  .recebidos-valor {
    font-size: 24px;
  }
}
</style>
