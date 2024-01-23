// apiService.js
import axios from 'axios';

const apiClient = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    'Content-Type': 'application/json',
  },
  // Você pode adicionar mais configurações se necessário
});

export default {
  getCobrancas() {
    return apiClient.get('/cobrancas');
  },
};
