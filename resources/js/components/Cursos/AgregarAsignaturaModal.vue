<template>
  <div class="modal" :class="{ 'is-active': modalActivo }">
    <div class="modal-background" @click="cerrarModal"></div>
    <div class="modal-content">
      <div class="box">
        <h1 class="title">Agregar Asignatura</h1>
        <ul>
          <li v-for="asignatura in asignaturas" :key="asignatura.id">
            {{ asignatura.nombre }}
            <button @click="agregarAsignatura(alumnoId, asignatura.id)" class="btn btn-primary">Agregar</button>
          </li>
        </ul>
         <button class="btn btn-secondary" @click="cerrarModal">Cerrar</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      modalActivo: false,
      asignaturas: [],
      alumnoId: null,
    };
  },
  methods: {
    async obtenerAsignaturas() {
      try {
        const response = await axios.get('/asignaturas'); // Ajusta la ruta según tu backend
        this.asignaturas = response.data;
      } catch (error) {
        console.error('Error al obtener asignaturas:', error);
      }
    },
    cerrarModal() {
      this.modalActivo = false;
    },
    mostrarModal(alumnoId) {
      this.alumnoId = alumnoId;
      this.modalActivo = true;
      this.obtenerAsignaturas();
    },
   async agregarAsignatura(alumnoId, asignaturaId) {
  try {
    await axios.post(`/alumnos/${alumnoId}/asignaturas/${asignaturaId}`);
    alert('Asignatura agregada correctamente.');
    this.cerrarModal(); // Cerrar el modal después de agregar la asignatura
  } catch (error) {
    console.error('Error al agregar asignatura:', error);
    console.log(error.response); // Mostrar la respuesta de error para obtener más detalles
  }
},
  },
};
</script>

<style scoped>
.modal-content {
  border-radius: 10px;
}

.modal-header {
  background-color: #007bff; /* Fondo azul */
  color: #cccccc; /* Texto gris */
}

.modal-body {
  padding: 20px;
}

.is-active {
  display: block;
}

.modal {
  display: none;
}

.modal.is-active {
  display: block;
}

.box {
  background-color: #007bff; /* Fondo azul */
  color: #cccccc; /* Texto gris */
}

</style>
