const swaggerAutogen = require('swagger-autogen')();

const doc = {
    info: {
        title: 'API de administracion usuarios',
        description: 'Documentación de la API para la gestión de mascotas',
    },
    host: 'localhost:3000',
    schemes: ['http'],
};

const outputFile = './swagger_output.json';
const endpointsFiles = ['./app.js']; // Cambia este archivo según el punto de entrada de tu API

swaggerAutogen(outputFile, endpointsFiles).then(() => {
    require('./app'); // Inicia el servidor automáticamente
});