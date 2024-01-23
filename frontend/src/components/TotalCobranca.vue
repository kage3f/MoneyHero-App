<template>
    <div class="container">
        <p class="p-totalcobranca">Total de Cobranças</p>
        <div class="container-comprasgeradas container-comprasgeradas1" style="padding-bottom: 10px;" >
            <h3>Cobranças <br> Geradas</h3>
            <div class="container-infocobranca">
                <p class="cobranca-p">{{cobrancasTotalValor}}</p>
                <p class="cobrancatotal-p">{{verificarQuantidade(cobrancasTotal)}}</p>
            </div>
        </div>
        <div class="container-comprasgeradas" style="margin-top: 16px;" >
            <div style="display: flex; align-items: center; gap: 16px;">
                <div style="width: 8px; height: 48px; flex-shrink: 0; border-radius: 4px; background: #3FE24F;"></div>
                <h3 style="color: #757575;">Cobranças <br> Confirmadas</h3>
            </div>
            <div class="container-infocobranca">
                <p class="cobranca-p">{{ cobrancasConfirmadas.valor }}</p>
                <p class="cobrancatotal-p">{{ verificarQuantidade(cobrancasConfirmadas.total) }}</p>
            </div>
        </div>
        <div class="container-comprasgeradas" style="margin-top: 24px;" >
            <div style="display: flex; align-items: center; gap: 16px;">
                <div style="width: 8px; height: 48px; flex-shrink: 0; border-radius: 4px; background: #1774FF;"></div>
                <h3 style="color: #757575;">Cobranças <br> em aberto</h3>
            </div>
            <div class="container-infocobranca">
                <p class="cobranca-p">{{ cobrancasEmAberto.valor }}</p>
                <p class="cobrancatotal-p">{{verificarQuantidade(cobrancasEmAberto.total)}}</p>
            </div>
        </div>
        <div class="container-comprasgeradas" style="margin-top: 24px;" >
            <div style="display: flex; align-items: center; gap: 16px;">
                <div style="width: 8px; height: 48px; flex-shrink: 0; border-radius: 4px; background: #FFB017;"></div>
                <h3 style="color: #757575;">Cobranças <br> atrasadas</h3>
            </div>
            <div class="container-infocobranca">
                <p class="cobranca-p">{{ cobrancasAtrasadas.valor }}</p>
                <p class="cobrancatotal-p">{{verificarQuantidade(cobrancasAtrasadas.total)}}</p>
            </div>
        </div>
    </div>
</template>


<script>
import apiService from './../../services/apiService'; // Ajuste o caminho se necessário

export default {
  data() {
    return {
      cobrancasConfirmadas: { total: 0, valor: 0 },
      cobrancasEmAberto: { total: 0, valor: 0 },
      cobrancasAtrasadas: { total: 0, valor: 0 },
      // ... outras propriedades de dados ...
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      apiService.getCobrancas()
        .then(response => {
          // Atualize as propriedades com os dados recebidos
          this.cobrancasTotalValor = response.data.total_cobrancas_valor;
          this.cobrancasTotal = response.data.quantidade_total_cobrancas;
          this.cobrancasConfirmadas.total = response.data.quantidade_cobrancas_confirmadas;
          this.cobrancasConfirmadas.valor = response.data.total_cobrancas_confirmadas;
          this.cobrancasEmAberto.total = response.data.quantidade_cobrancas_em_aberto;
          this.cobrancasEmAberto.valor = response.data.total_cobrancas_em_aberto;
          this.cobrancasAtrasadas.total = response.data.quantidade_cobrancas_atrasadas;
          this.cobrancasAtrasadas.valor = response.data.total_cobrancas_atrasadas;
        })
        .catch(error => {
          console.error('Erro ao buscar os dados: ', error);
        });
    },
    verificarQuantidade(quantidade) {
      if (quantidade === 0) {
        return 'Ainda não existem cobranças desse tipo';
      } else if (quantidade === 1) {
        return '1 Cobrança';
      } else {
        return quantidade + ' Cobranças';
      }
    }
    
  }
};
</script>


<style scoped>
 .container {
    padding: 16px;
    padding-bottom: 30px;
    flex-shrink: 0;
    border-radius: 16px;
    border: 0.5px solid #D4D4D4;
    background: #FFF;
 }

 .p-totalcobranca {
    color: #777;
    font-family: "Open Sans";
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
 }

 .container-comprasgeradas {
    margin-top: 16px; 
    display: flex; 
    align-items: center; 
    justify-content: space-between;
    position: relative;
 }

 .container-comprasgeradas1::before {
    content: "";
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 1px;
    background-color: #CACACA;
 }

 .container-comprasgeradas h3 {
    color: #000;
    font-family: "Open Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
 }

 .cobranca-p{
    color: #000;
    text-align: right;
    font-family: "Open Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
 }

 .cobrancatotal-p {
    color: #8C8C8C;
    text-align: right;
    font-family: "Open Sans";
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
 }

 .container-infocobranca {
    display: flex;
    flex-direction: column;
    height: 45px;
    justify-content: space-between;
 }
</style>