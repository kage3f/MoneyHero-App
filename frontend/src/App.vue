<template>
  <div class="dashboard">
    <Sidebar />
    <Content />
  </div>
</template>

<script>
import Sidebar from './components/Sidebar.vue'
import Content from './components/Content.vue'

export default {
  name: 'Dashboard',
  components: {
    Sidebar,
    Content
  },
  // Outras opções e lógica do componente
}
</script>

<style scoped>
.dashboard {
  display: flex;
  background-color: #29BB38;
  width: 100%;
  height: 100%;
  position: fixed;
}

@media(max-width: 580px){
  .dashboard {
    flex-direction: column;
    position: inherit;
  }
}
</style>
