<template>
    <div class="header" style="width: 100%; display: flex; align-items: center; justify-content: space-between;">
        <img src="/public/menuclose.svg" />
        <div style="display: flex; align-items: center; gap: 16px;">
            <img src="/public/notification.svg" />
            <img src="/public/perfil.svg" />
            <p class="profile-name">Ana P. Giacomell</p>
            <img src="/public/openprofile.svg" />
        </div>
    </div>
</template>

<script>
export default {
  name: 'Header'
}
</script>

<style scoped>
.profile-name {
    color: #000;
    font-family: "Open Sans";
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    max-width: 70px;
}

@media(max-width: 580px){
    .header {
        display: none !important;
    }
}
</style>