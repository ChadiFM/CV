<template>
  <div class="modal" :class="{ 'is-active': modalActivo }">
    <div class="modal-background" @click="cerrarModal"></div>
    <div class="modal-content">
      <div class="box">
        <h1 class="title">Asignaturas Inscritas</h1>
        <ul>
          <li v-for="asignatura in asignaturas" :key="asignatura.id">
            {{ asignatura.nombre }}

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
      alumnoId: null, // Agregar alumnoId aquí
    };
  },
  methods: {
    async obtenerAsignaturasInscritas(alumnoId) {
      try {
        const response = await axios.get(`/alumnos/${alumnoId}/asignaturas`);
        this.asignaturas = response.data;
      } catch (error) {
        console.error('Error al obtener asignaturas:', error);
      }
    },
    cerrarModal() {
      this.modalActivo = false;
    },
    mostrarModal(alumnoId) {
      this.alumnoId = alumnoId; // Asignar alumnoId aquí
      this.modalActivo = true;
      this.obtenerAsignaturasInscritas(alumnoId);
    },
    async inscribirEnAsignatura(alumnoId, asignaturaId) {
      try {
        await axios.post(`/alumnos/${alumnoId}/asignaturas/${asignaturaId}`);
        alert('Alumno inscrito en la asignatura correctamente.');
        this.obtenerAsignaturasInscritas(alumnoId); // Actualizar la lista de asignaturas inscritas
      } catch (error) {
        console.error('Error al inscribir en la asignatura:', error);
      }
    },
  },
};
</script>

<style scoped>
.modal-content {
  border-radius: 10px;
  background-color: #3498db; /* Fondo azul */
  color: #666; /* Texto gris */
}

.modal-header {
  background-color: #f0f0f0;
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

.title {
  background: black; /* Fondo negro para el título */
  color: white; /* Texto blanco para el título */
  padding: 10px;
}

.asignatura-nombre {
  color: #666; /* Color gris para los nombres de las asignaturas */
}
</style>
