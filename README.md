
# Conforama Restaurant

## Fabian Doizi Bonilla DAW2A

Creación de web restauración basada en el estilo de Conforama.

Memoria técnica en el mismo repositorio.

## Documentación

En un primer momento todo el proyecto ha sido realizado en php. Después se ha cambiado parte del proyecto a JS. 

## PHP

Se ha implementado el MVC partiendo de una base de **PHP**. Tanto los modelos como los controladores se han realizado en **PHP**. 

El proyecto se ha distribuido de la siguiente manera:

- **MODEL**: Contiene los clientes y las conexiónes a BDs.
- **CONTROLLER**: Contiene la lógica de los clientes.
- **VIEW**: Contiene los archivos con HTML para mostrar la interfaz.

Además, existen los archivos complementarios destribuidos de la siguiente manera:

- **ASSETS**: Contiene las fuentes, iconos, imagenes, archivos css y js.
- **CONFIG**: Contiene los archivos PHP para gestionar la conexión a la BDs y setear variables constantes del proyecto.
- **UTILS**: Contiene lógica complementaria para los diferentes clientes.

El funcionamiento se basa en las URL's. Desde el index.php se muestra por deceto el primer controlador que el el homeController, el cual
nos mostrará la página home. A medida que nos movemos iremos llamando a los respectivos controladores para mostrar la información relativa.

Los modelos cargan información de la BD's y los incorporan como objetos. Es con estos objetos con los que se manipula la información posteriormente.

En este punto (antes de añadir js) el proyecto no carga los datos dinamicamente, pues se mueve con las url's.


## JS

Posteriormente se ha agregado **JS** al proyecto. Este se implementa en las opiniones, mostrar productos, permitir propinas, mostrar resumen pedido por QR  y programa de fidelidad con putos para el usuario.

Para realizar el cambio de metodología se ha usado una **API** preparada en PHP desde la cuál gestionamos la información.

Para realizar peticiones a nuestra API hemos usado **fetch** mediante POST. De esta manera se pueden cargar los datos dinamicamente. 

Por ultimo, el QR ha presentado problemas a la hora se implementarse, en un principio no accedia correctamente e a la URL que se le pasaba, para solucionar esto se ha cambiado la ubicación del código PHP estando en el HTML. 

