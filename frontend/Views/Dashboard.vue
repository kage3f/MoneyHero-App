<template>
    <div class="container-dashboard">
        <Header />
        <div class="dashboard-mobile" style="margin-top: 36px; display: flex; flex-direction: column;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px;">
                <div class="title" style="display: flex; flex: 3; justify-content: space-between; flex-wrap: wrap;">
                    <div class="dash-h1">
                        <h1>Dashboard</h1>
                        <p>Informações resumidas na palma da sua mão</p>
                    </div>
                    <div class="container-btn-mobile">
                    <a class="btn-filter">Filtros</a>
                    <a class="btn-addcobranca-mobile"><img style="width: 16px; height: 16px;" src="/public/maiscobranca.svg"/>Criar nova Cobrança</a>
                    </div>
                    <div style="flex-grow: 1; width: 100%; margin-top: 24px;">
                        <Chart />
                    </div>
                </div>
                <div style="display: flex; flex-wrap: wrap; align-items: center; flex: 1; justify-content: flex-end;">
                    <a class="btn-addcobranca"><img src="/public/maiscobranca.svg"/>Criar nova Cobrança</a>
                    <div style="margin-top: 24px; width: 100%;"><TotalCobranca /></div>
                </div>
            </div>
        </div>
        <TabelaCobranca />
    </div>
</template>

<script>
import Header from '../src/components/Header.vue';
import Chart from '../src/components/Chart.vue';
import TotalCobranca from '../src/components/TotalCobranca.vue';
import TabelaCobranca from '../src/components/TabelaCobranca.vue';

export default {
  watch: {
  },
  name: 'Dashboard',
  components: {
    Header,
    Chart,
    TotalCobranca,
    TabelaCobranca
  },
  data() {
    return {
      data: {
        labels: ['Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez', 'Jan'],
        datasets: [
          {
            label: 'Valor',
            data: [500, 1000, 2000, 3000, 4000, 5000, 6000, 7000],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    }
  }
  // Outras opções e lógica do componente
}
</script>

<style scoped>
.title h1{
    color: #000;
    font-family: "Open Sans";
    font-size: 24px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}

.title p {
    color: #000;
    font-family: "Open Sans";
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    margin-top: 8px;
}

.btn-filter {
    width: 160px;
    height: 54px;
    flex-shrink: 0;
    border-radius: 8px;
    border: 0.5px solid #1774FF;
    color: #1774FF;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: "Open Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}

.btn-addcobranca {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    height: 54px;
    flex-shrink: 0;
    border-radius: 8px;
    background: #1774FF;
    color: #FFF;
    font-family: "Open Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}

.btn-addcobranca-mobile {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    height: 54px;
    flex-shrink: 0;
    border-radius: 8px;
    background: #1774FF;
    color: #FFF;
    font-family: "Open Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}

@media(max-width: 580px){
  .dashboard-mobile {
    margin-top: 0 !important;
  }

  .dash-h1 {
    display: none;
  }

  .btn-addcobranca{
     display: none;
  }

  .btn-addcobranca-mobile{
     display: block !important;
 }

 .container-btn-mobile {
    display: flex;
    gap: 4%;
    width: 100%;
 }

 .btn-filter {
  width: 40%;
 }

 .btn-addcobranca-mobile {
   width: 56%;
   display: flex !important;
   align-items: center;
   font-size: 14px;
 }
}

.btn-addcobranca-mobile {
  display: none;
}

</style>