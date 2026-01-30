# CRUD-Laravel
Sistema de Gestión de Alumnos - CRUD Laravel
Este proyecto consiste en una aplicación web desarrollada con el framework Laravel que permite gestionar de forma completa un listado de alumnos (Crear, Leer, Editar y Borrar). El enfoque principal ha sido crear una herramienta funcional, segura y fácil de usar.

Funciones Principales
Gestión de Alumnos (CRUD): Un panel donde se pueden registrar nuevos alumnos, ver sus datos, actualizar la información o eliminarlos de la base de datos.

Sistema de Idiomas: La web está disponible en Español, Inglés y Francés. He programado un sistema que recuerda qué idioma ha elegido el usuario mientras navega por las diferentes páginas.

Acceso Seguro: Solo los usuarios registrados pueden acceder al panel de gestión, protegiendo así la información de los alumnos.

Manejo de Imágenes: El sistema permite subir fotos de los alumnos. Además, he configurado el código para que, si borras a un alumno, su foto se elimine automáticamente del servidor para no ocupar espacio innecesario.

Tecnologías Utilizadas
Framework: Laravel 12 (PHP)

Base de Datos: MySQL (gestionada con Docker y phpMyAdmin)

Diseño: Tailwind CSS (para una interfaz limpia y moderna)

Alertas: SweetAlert2 (para los mensajes de confirmación al borrar)
