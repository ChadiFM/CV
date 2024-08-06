<template>
  <div>
    <!-- Botón para abrir el modal -->
    <button class="btn btn-primary" @click="mostrarModal">Crear Alumno</button>

    <!-- Modal -->
    <div class="modal" :class="{ 'is-active': modalActivo }">
      <div class="modal-background" @click="cerrarModal"></div>
      <div class="modal-content">
        <div class="box">
          <h1 class="title">Crear Nuevo Alumno</h1>
          <form @submit.prevent="crearAlumno">
            <div class="field">
              <label class="label">Nombre:</label>
              <div class="control">
                <input type="text" v-model="nuevoAlumno.nombre" class="input" required>
              </div>
            </div>
            <div class="field">
              <label class="label">Apellidos:</label>
              <div class="control">
                <input type="text" v-model="nuevoAlumno.apellidos" class="input" required>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <button type="submit" class="button is-primary">Crear Alumno</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'; // Asegúrate de tener axios instalado y configurado correctamente

export default {
  data() {
    return {
      modalActivo: false,
      nuevoAlumno: {
        nombre: '',
        apellidos: '',
      },
    };
  },
  methods: {
    async crearAlumno() {
      try {
        const response = await axios.post('/alumnos', this.nuevoAlumno);
        console.log('Alumno creado:', response.data);

        // Emitir evento para notificar al componente padre de la creación del alumno
        this.$emit('alumnoCreado', response.data);

        // Limpiar formulario y cerrar modal
        this.nuevoAlumno.nombre = '';
        this.nuevoAlumno.apellidos = '';
        this.cerrarModal();
      } catch (error) {
        console.error('Error al crear alumno:', error);
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
