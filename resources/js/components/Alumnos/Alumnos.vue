<template>
  <div class="container">
    <h1>Listado de Alumnos</h1>

    <!-- Botón para abrir el modal -->



    <!-- Modal CrearAlumnos -->
    <CrearAlumnosModal @alumnoCreado="alumnoCreado" ref="crearAlumnoModal"></CrearAlumnosModal>

    <!-- Lista de alumnos -->
    <ul>
      <li v-for="alumno in alumnos" :key="alumno.id">
        {{ alumno.nombre }} {{ alumno.apellidos }}
        <button @click="mostrarModalAgregarAsignatura(alumno.id)" class="btn btn-primary">Asignaturas</button>
        <button @click="mostrarModalCursos(alumno.id)" class="btn btn-secondary">Mis Asignaturas</button>
        <button @click="eliminarAlumno(alumno.id)" class="btn btn-danger">Eliminar</button>
      </li>
    </ul>

    <!-- Modal Agregar Asignatura -->
    <AgregarAsignaturaModal ref="agregarAsignaturaModal"></AgregarAsignaturaModal>

    <!-- Modal CursosModal -->
    <CursosModal ref="cursosModal"></CursosModal>


  </div>
    <Profesores/>

</template>

<script>
import CrearAlumnosModal from './CrearAlumnos.vue'; // Asegúrate de que el nombre del archivo coincida
import Profesores from '../Profesores/Profesores.vue';
import CursosModal from '../Cursos/CursosModal.vue';
import AgregarAsignaturaModal  from '../Cursos/AgregarAsignaturaModal.vue';
import axios from 'axios'; // Asegúrate de tener axios instalado y configurado correctamente

export default {
  name: 'Alumnos',
  components: {
    CrearAlumnosModal,
    Profesores,
    CursosModal,
    AgregarAsignaturaModal
  },
  data() {
    return {
      alumnos: [],
      cursos: []
    };
  },
  mounted() {
    this.obtenerAlumnos();
  },
  methods: {
    async obtenerAlumnos() {
      try {
        const response = await axios.get('/alumnos');
        this.alumnos = response.data;
      } catch (error) {
        console.error('Error al obtener alumnos:', error);
      }
    },
    async alumnoCreado(alumno) {
      // Método llamado cuando se crea un nuevo alumno
      // Actualizar la lista de alumnos
      this.alumnos.push(alumno);
    },
    async eliminarAlumno(id) {
      try {
        await axios.delete(`/alumnos/${id}`);
        this.alumnos = this.alumnos.filter(alumno => alumno.id !== id);
      } catch (error) {
        console.error('Error al eliminar alumno:', error);
      }
    },
    mostrarModalCrearAlumno() {
      // Acceder al método mostrarModal del componente hijo usando $refs después de que esté montado
      this.$nextTick(() => {
        this.$refs.crearAlumnoModal.mostrarModal();
      });
    },
      mostrarModalCursos(alumnoId) {
      // Accede al método mostrarModal del componente de cursosModal usando $refs
      this.$nextTick(() => {
        this.$refs.cursosModal.mostrarModal(alumnoId);
      });
    },
    mostrarModalAgregarAsignatura(alumnoId) {
      this.$nextTick(() => {
        this.$refs.agregarAsignaturaModal.mostrarModal(alumnoId);
      });
    },
  },
};
</script>

<style scoped>
/* Estilos específicos para este componente */
</style>
