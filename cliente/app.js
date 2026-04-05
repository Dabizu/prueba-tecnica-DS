const express=require("express");
const app=express();
const swaggerUi = require('swagger-ui-express');
const swaggerFile = require('./swagger_output.json');

app.listen(3000,()=>{
    console.log("servidor corriendo");
});
//esto nos ayidara a usar los archivos dentro de la carpeta public
app.use(express.static("public"));
app.use(express.static(__dirname+"/public"));

//aunque no es necesario esto porque al ejecutar la vista de la carpeta public por defecto podemos ver el archivo index pero esto refuerza solo la idea para evitar fallas
app.get("/",(req,res)=>{
    res.sendFile(__dirname+"/public/index.html");
});

app.get("/inicio",(req,res)=>{
    res.sendFile(__dirname+"/public/inicio.html");
});

app.use('/api-docs', swaggerUi.serve, swaggerUi.setup(swaggerFile));