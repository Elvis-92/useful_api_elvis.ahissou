
import axios from 'axios';


const api = axios.create({
  baseURL: 'https://127.0.0.1:8000/api',
  headers: {
    'Content-Type': 'application/json',
  },
});

api.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem('token');
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    console.log('Requête interceptée', config);
    return config;
  },
  (error) => {

    console.error('Erreur d\'interception de requête:', error);
    return Promise.reject(error);
  }
);

export default api;
