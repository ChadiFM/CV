import 'bootstrap/dist/css/bootstrap.min.css';


import { createApp } from 'vue';

// Importar componentes
import Home from './components/Home.vue';
import Alumnos from './components/Alumnos/Alumnos.vue';
import CrearAlumnos from './components/Alumnos/CrearAlumnos.vue';
import Profesores from './components/Profesores/Profesores.vue';
// Crear aplicación Vue
const app = createApp({});

// Registrar componentes
app.component('Home', Home);
app.component('Alumnos', Alumnos);
app.component('CrearAlumnos', CrearAlumnos);
app.component('Profesores', Profesores);


// Montar la aplicación en el elemento con ID 'app'
app.mount('#app');

