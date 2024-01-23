<template>
  <div class="container mt-4" style="margin-top: 15px !important;">
    <div v-for="cobranca in cobrancas" :key="cobranca.id" class="card mb-3">
      <div class="card-body">
         <div class="card-info">
          <div :style="estiloDeFundo(cobranca.status)" 
          style="height: 32px; width: 104px; display: flex; align-items: center; justify-content: center;" 
          class="status-indicator">
            <p class="status-p">{{ formatarStatus(cobranca.status) }}</p>
          </div>
          <img src="/public/hamburguer-grafico.svg" />
        </div>
        <div class="card-info">
          <span class="card-label">Código:</span>
          <span class="p-cinza">{{ cobranca.id }}</span>
        </div>
        <div class="card-info">
          <span class="card-label">Cliente:</span>
          <span class="p-cliente">{{ cobranca.nome_cliente }}</span>
        </div>
        <div class="card-info">
          <span class="card-label">Data:</span>
          <span class="p-cinza">{{ cobranca.data_registro }}</span>
        </div>
        <div class="card-info">
          <span class="card-label">Tipo:</span>
          <span class="p-cinza" style="color: #5149E2;">{{ formatarTipo(cobranca.tipo) }}</span>
        </div>
        <div class="card-info">
          <span class="card-label">Valor:</span>
          <span>{{ cobranca.valor }}</span>
        </div>
        <div class="card-info">
          <span class="card-label">Contato:</span>
          <span class="p-cinza">{{ cobranca.telefone }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    cobrancas: Array,
    formatarTipo: Function,
    formatarStatus: Function,
    estiloDeFundo: Function
  }
}
</script>


<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
}

.card {
  border: 1px solid #D4D4D4;
  border-radius: 16px;
  width: 100%;
  margin-bottom: 8px;
}

.card-body {
  padding: 15px;
}

.card-info {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 8px;
}

.card-label {
    color: #000;
    font-family: "Open Sans";
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
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

.status-indicator {
  border-radius: 5px;
  padding: 5px 10px;
  color: white;
  text-align: center;
}

.p-cinza {
    color: #A4A4A4;
    text-align: right;
    font-family: "Open Sans";
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.p-cliente {
    color: #323232;
    text-align: right;
    font-family: "Open Sans";
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}
</style>
