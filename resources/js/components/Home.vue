<template>
  <div>

    <Alumnos/>

  </div>
</template>

<script>
import Alumnos from './Alumnos/Alumnos.vue';


export default
{
  name: 'Home',
  components: {
      Alumnos,

  }
};
</script>

<style >
/* Estilos para el fondo con gradiente */
body {
  margin: 0;
  background: linear-gradient(to bottom, #808080, #000000);
  min-height: 100vh; /* Asegura que el gradiente ocupe toda la altura de la pantalla */
  display: flex;
  justify-content: center; /* Centra el contenido verticalmente */
  align-items: center; /* Centra el contenido horizontalmente */
  color: white; /* Color de texto blanco para contraste */
  font-family: Arial, sans-serif; /* Tipo de fuente */
}

.container {
  background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente para el contenido */
  padding: 20px;
  border-radius: 10px;
}
</style>
