// axios.js

import axios from 'axios';

const instance = axios.create({
  baseURL: 'http://127.0.01:8000/',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  }, // URL de tu API Laravel
});

export default instance;
