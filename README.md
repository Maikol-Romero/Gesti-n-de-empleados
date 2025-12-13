###### \# Sistema de Gestión de Empleados (SGE)

###### 

###### \*\*Módulo:\*\* Implantación de Aplicaciones Web (IAW)

###### 

###### \*\*Autor:\*\* Maikol Romero Amaro

###### 

###### \*\*Versión:\*\* 1.0.0 (Fase PHP Nativo)

###### 

###### \## Descripción del Proyecto

###### 

###### Aplicación web corporativa diseñada para gestionar el alta de empleados en una empresa de logística con múltiples sedes. El sistema permite registrar datos personales y asignar ubicaciones corporativas mediante una interfaz moderna y validaciones robustas en el servidor.

###### 

###### Esta entrega (OPT\\\_PHP) corresponde a la \*\*Fase 1\*\*, donde se implementa la lógica de negocio utilizando PHP nativo, estructuras de datos en memoria (Arrays) y una arquitectura modular.

###### 

###### \## Características Técnicas

###### 

###### \* \*\*Arquitectura Modular:\*\* Separación estricta entre lógica (src/) y presentación (public/).

###### 

###### \* \*\*Seguridad:\*\* Sanitización de entradas contra XSS e inyección de código.

###### 

###### \* \*\*Validaciones:\*\*

###### 

######   \* DNI (Formato 8 dígitos + Letra).

###### 

######   \* Email (Filtros nativos de PHP).

###### 

######   \* Campos obligatorios y lógica de negocio.

###### 

###### \* \*\*UX/UI:\*\* Diseño minimalista y \*responsive\* utilizando CSS moderno y tipografía Inter, superando los estándares básicos de Bootstrap.

###### 

###### \* \*\*Datos Maestros:\*\* Inclusión de todas las provincias de España y sedes estratégicas reales.

###### 

###### \## Estructura del Proyecto

###### 

###### 

###### proyecto-empleados/

###### 

###### ├── public/

######   ├── css/

###### 

###### │   ├── estilos.css       # Archivo CSS estilo minimalista

###### 

###### │ ├── index.php       # Controlador frontal y Vista principal

###### 

###### ├── src/

###### 

###### │   ├── datos.php       # "Base de Datos" simulada (Arrays multidimensionales)

###### 

###### │   ├── funciones.php   # Biblioteca de validaciones y renderizado

###### 

###### ├── .gitignore          # Exclusión de archivos innecesarios

###### 

###### └── README.md           # Documentación del proyecto

