<template>
    <div class="sidebar">
        <div class="header-container">
          <img src="/public/logo.svg" class="logo" />
          <img class="profile-mobile" src="/public/perfil.svg" />
        </div>
        <div class="container-saldo-p">
            <p class="saldo-p">Saldo em Conta</p>
            <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-top: 16px;">
            <div class="container-ocultar">
            <p class="saldo-total-p">{{ isSaldoVisible ? 'R$ 48.823,98' : '****' }}</p>
            <a @click="toggleSaldoVisibility" style="cursor: pointer;"><img src="/public/olho.svg" /></a>
            </div>
            </div>
            <div class="menu-links" style="margin-top: 40px;">
                <div class="item-navigate" :class="{ active: currentRoute === '/dashboard' }" @click="navigateTo('/dashboard')">
                    <img class="a" :src="currentRoute === '/dashboard' ? '/public/globo.svg' : '/public/globooff.svg' " />
                    <!-- Imagem para mobile -->
                    <img class="b" :src="currentRoute === '/dashboard' ? '/public/globomobile.svg' : '/public/globomobileoff.svg' " />
                    <p>Dashboard</p>
                </div>
                <div class="item-navigate" :class="{ active: currentRoute === '/cobrancas' }" @click="navigateTo('/cobrancas')">
                    <img class="a" :src="currentRoute === '/cobrancas' ? '/public/money.svg' : '/public/moneyoff.svg'" />
                    <img class="b" :src="currentRoute === '/cobrancas' ? '/public/moneymobileoff.svg' : '/public/moneymobile.svg' " />
                    <p>Cobranças</p>
                </div>
                <div class="item-navigate" :class="{ active: currentRoute === '/relatorio' }" @click="navigateTo('/relatorio')">
                    <img class="a" :src="currentRoute === '/relatorio' ? '/public/relatorio.svg' : '/public/relatoriooff.svg'" />
                    <img class="b" :src="currentRoute === '/relatorio' ? '/public/relatoriomobile.svg' : '/public/relatoriomobileoff.svg' " />
                    <p>Relatórios</p>
                </div>
                <div style="margin-top: 88px" class="item-navigate" :class="{ active: currentRoute === '/saque' }" @click="navigateTo('/saque')">
                    <img class="a" :src="currentRoute === '/saque' ? '/public/saque.svg' : '/public/saqueoff.svg'" />
                    <img class="b" :src="currentRoute === '/saque' ? '/public/saquemobileoff.svg' : '/public/saquemobile.svg' " />
                    <p>Saque</p>
                </div>
            </div>
        </div>
        
    </div>
  </template>
  
  <script>
  export default {
    name: 'Sidebar',
    data() {
    return {
      currentRoute: this.$route.path,
      isSaldoVisible: true,
    };
  },
  watch: {
    // Atualizar a rota atual quando ela mudar
    '$route'(to) {
      this.currentRoute = to.path;
    }
  },
  mounted() {
  window.addEventListener('resize', this.handleResize);
  this.handleResize(); // Chamar no mounted para definir o valor inicial
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize);
  },
    methods: {
    navigateTo(route) {
      this.$router.push(route);
    },
    handleResize() {
    this.isMobile = window.innerWidth <= 580;
    },
    toggleSaldoVisibility() {
            this.isSaldoVisible = !this.isSaldoVisible;
    }
  },
  computed: {
    isMobile() {
      // Verifique a largura da janela para determinar se está no modo mobile
      return window.innerWidth <= 580;
    }
  },
  }
  </script>
  
  <style scoped>

  .sidebar {
    width: 16%;
    padding-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    flex-shrink: 0;
  }

  .header-container {
    width: 80%;
  }

  .logo {
    width: 191px;
  }

  .container-saldo-p {
    text-align: left;
    width: 80%;
    margin-top: 32px;
  }

  .saldo-p {
    color: #FFF;
    font-family: "Open Sans", sans-serif;
    font-size: 12px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
  }

  .saldo-total-p {
    color: #FFF;
    font-family: "Open Sans";
    font-size: 24px;
    font-style: normal;
    font-weight: 800;
    line-height: normal;
  }

  .item-navigate {
    display: flex; 
    max-width: 100%; 
    gap: 8px;
    align-items: center; 
    border-radius: 8px;
    height: 56px;
    padding-left: 20px;
    cursor: pointer;
  }

  .b {
    display: none !important;
  }

  .a {
    display: block !important;
  }


  .item-navigate.active {
    background-color: #fff;
    z-index: 999;
  }

  .item-navigate.active p {
    color: #000;
  }

  .item-navigate p {
    color: #fff;
    background-color: none;
    font-family: "Open Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
  }

    .container-ocultar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }

  @media(max-width: 580px){
    .sidebar {
      width: 90%;
      margin: 0 auto;
      align-items: inherit;
      padding-bottom: 24px;
    }

      .b {
    display: block !important;
  }

  .a {
    display: none !important;
  }

    .menu-links {
    position: fixed;
    display: flex;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 99;
  }

    .menu-links p {
      display: none;
    }

    .item-navigate {
      background-color: #fff;
      margin-top: 0 !important;
      width: 63px;
      height: 63px;
      border-radius: 50%;
      z-index: 5;
      padding-left: 0;
      display: flex;
      justify-content: center;
      border: 4px solid #fff;
      margin-right: -10px;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px
    }

    .item-navigate img {
      width: 36px;
      height: 36px;
    }

    .item-navigate.active {
      background-color: #2CC63C;
    }

    .saldo-p {
      font-size: 14px;
    }

    .container-ocultar {
      justify-content: flex-start;
      gap: 12px;
    }

    .profile-mobile {
      display: block !important;
    }

    .header-container {
      display: flex;
      justify-content: space-between;
      height: 60px;
      width: 100%;
    }

    .profile-mobile {
      width: 48px;
      height: 48px;
      align-self: end
    }

    .logo {
      width: 150px;
    }

    .container-saldo-p {
      margin-top: 0;
    }
  }

  .profile-mobile {
    display: none;
  }
  </style>
  