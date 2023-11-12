# TPE-WEB2 
Integrantes: Miriam Alicia Gonzalez - Cristian Andres Gonzalez
Emails: miriamgonzalez121@gmail.com  - cris.andres.gz@gmail.com

ENDPOINTS:
Verbo GET api/tareas -> Utilizamos api adelante para saber con que estamos  trabajando. El nombre del recurso nos devuelve todas las tareas: la function get($params = []) le indica al model y éste con el metodo traerPlatosDeDB() trae todos los platos de la base de datos y luego se los da a la vista para que los muestre (en este caso utilizamos el postman). 
Verbo GET api/tareas/:ID -> nos devuelve una tarea especifica a traves del model mediante la funcion traerPlato($params[":ID"]). 
Verbo POST api/tareas -> crea una funcion que la llamamos crearTarea() sin id porque se crea una nueva tarea. 
Verbo PUT api/tareas/:ID -> edita una tarea mediante la funcion editarPlatoDB($id) el modelo utiliza el id para editarla.  
Verbo DELETE api/tareas/:ID -> elimina una tarea especifica mediante la funcion delete($id).
Tenemos un router, un controller, un modelo y una unica vista, ahora mas sencilla que antes, con una api que le pasa al cliente la informacion en formato json.   