<template>
  <div class="container">


    <!-- Botón para abrir el modal -->
    <button class="btn btn-primary" @click="mostrarModal">Listado de profesores</button>


    <!-- Lista de alumnos -->
   <!--  <ul>
      <li v-for="profesor in profesores" :key="profesor.id">
        {{ profesor.nombre }} {{ profesor.apellidos }}
        <button @click="eliminarprofesor(profesor.id)" class="btn btn-danger">Eliminar</button>
      </li>
    </ul>
  </div>
 -->

  <!-- Modal -->
    <div class="modal" :class="{ 'is-active': modalActivo }">
      <div class="modal-background" @click="cerrarModal"></div>
      <div class="modal-content">
        <div class="box">
          <ul>
      <li v-for="profesor in profesores" :key="profesor.id">
        {{ profesor.nombre }} {{ profesor.apellidos }}
        <button @click="eliminarprofesor(profesor.id)" class="btn btn-danger">Eliminar</button>
      </li>
    </ul>
      </div>
    </div>
  </div>
  </div>
</template>

<script>


import axios from 'axios'; // Asegúrate de tener axios instalado y configurado correctamente

export default {
  name: 'Profesores',
  components: {

  },
  data() {
    return {
      modalActivo: false,
      profesores: [],
    };
  },
  mounted() {
    this.obtenerprofesores();
  },
  methods: {
    async obtenerprofesores() {
      try {
        const response = await axios.get('/profesores');
        this.profesores = response.data;
      } catch (error) {
        console.error('Error al obtener profesores:', error);
      }
    },

    async eliminarprofesor(id) {
      try {
        await axios.delete(`/profesor/${id}`);
        this.profesores = this.profesores.filter(profesores => profesores.id !== id);
      } catch (error) {
        console.error('Error al eliminar profesores:', error);
      }
    },
    mostrarModal() {
      this.modalActivo = true;
    },
    cerrarModal() {
      this.modalActivo = false;
    },
  },
};
</script>

<style scoped>
/* Estilos específicos para el modal */
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 999;
}

.modal.is-active {
  display: flex;
  align-items: center;
  justify-content: center;
}

.modal-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: transparent; /* Cambiado a transparente para desactivar el modal */
  cursor: pointer; /* Cambiado a puntero para el modal */
}

.modal-content {
  background-color: rgb(37, 26, 26);
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  width: 400px;
}

/* Estilos de los campos del formulario */
.field {
  margin-bottom: 10px;
}

.label {
  font-weight: bold;
}

.input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.button {
  padding: 10px 20px;
  border: none;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
  border-radius: 4px;
}

.button:hover {
  background-color: #0056b3;
}
</style>
