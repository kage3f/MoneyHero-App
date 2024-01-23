<template>
    <div class="content">
      <router-view></router-view>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Content',
    // Outras opções e lógica do componente
  }
  </script>
  
  <style scoped>
  .content {
    width: 84%;
    height: 100%;
    background-color: #fff;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    padding: 28px 104px 40px 24px;
    overflow-y: auto;
  }

  @media(max-width: 580px){
    .content {
      width: 100%;
      border-bottom-left-radius: 0;
      border-top-right-radius: 20px;
      padding: 16px;
    }
  }
  </style>
  