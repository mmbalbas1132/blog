<?php

// El controlador CursoController es parte de la aplicación Laravel y maneja las operaciones relacionadas con los cursos en tu aplicación. Aquí está una explicación resumida de cada uno de los métodos en el código:

// index: Este método se utiliza para mostrar una lista de cursos en la página de índice. Realiza una consulta a la base de datos para obtener una lista de cursos ordenados por ID en orden descendente y los muestra paginados en la vista 'cursos.index'.

// create: Este método muestra el formulario para crear un nuevo curso. Cuando un usuario accede a esta ruta, se le muestra el formulario para ingresar los detalles de un nuevo curso.

// store: Se utiliza para almacenar un nuevo curso en la base de datos. Toma un objeto $request de tipo StoreCurso, que contiene los datos del formulario. Crea una nueva instancia de la clase Curso utilizando los datos proporcionados en el formulario y la almacena en la base de datos. Luego, redirige al usuario a la página de detalles del curso recién creado.

// show: Muestra los detalles de un curso específico. Toma un parámetro $curso, que es una instancia de la clase Curso, y lo pasa a la vista 'cursos.show' para que se muestren los detalles.

// edit: Muestra el formulario de edición de un curso existente. Toma un parámetro $curso, que es una instancia de la clase Curso, y lo pasa a la vista 'cursos.edit'. Esto permite que el usuario edite los detalles del curso.

// update: Actualiza un curso existente en la base de datos. Toma un objeto $request de tipo UpdateCurso que contiene los datos del formulario de edición y un parámetro $curso, que es una instancia de la clase Curso. Realiza la validación de los datos, actualiza el curso en la base de datos y redirige al usuario a la página de detalles del curso actualizado.

// destroy: Elimina un curso específico de la base de datos. Toma un parámetro $curso, que es una instancia de la clase Curso, y lo elimina de la base de datos. Luego, redirige al usuario a la página de índice de cursos.

// En resumen, este controlador maneja las operaciones CRUD (Crear, Leer, Actualizar, Eliminar) relacionadas con los cursos en tu aplicación Laravel, permitiendo a los usuarios ver, crear, editar y eliminar cursos, así como listarlos en la página de índice.

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurso;
use App\Http\Requests\UpdateCurso;
use App\Models\Curso;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;



class CursoController extends Controller
{

    // METODO STORE EXPLICACION AL FINAL DEL CODIGO
    public function index()
    {

        $cursos = Curso::orderBy('id', 'desc')->paginate();


        return view('cursos.index', compact('cursos'));
    }

    /*----------------------------------------------------------------------------------------------------------------------------------------------------  */

    //METODO CREATE 

    public function create()
    {
        return view('cursos.create');
    }

    /*----------------------------------------------------------------------------------------------------------------------------------------------------  */

    //ESTA SERIA UN AFORMA LARGA DE ESCRIBIR EL CODIGO DEL METODO STORE 

    // método store dentro de un controlador (CursoController) en una aplicación Laravel. Este método se utiliza para almacenar un nuevo curso en la base de datos.


    //     public function store(StoreCurso $request)
    //    El objeto $request es una instacia de la clase StoreCurso (el formrequest que creamos)
    //     {

    //        $curso = new Curso;

    //         $curso->nombre = $request->nombre;
    //         $curso->descripcion = $request->descripcion;
    //         $curso->categoria = $request->categoria;

    //         $curso->save();
    //         En las siguientes líneas creo la instancia $curso de la clase Curso con el método create() que me ofrece laravel y con $request->all() lo genero con las propiedades nombre, descripcion y categoria que introduzco en el formulario. Me guarda cada instancia en un array de objetos y así ahorro instanciar uno por uno.

    //         Como en el archivo MOdels>>Curso creé la función  public function getRouteKeyName() podría eliminar el parámetro $curso de la línea anterior y reconocería igual el curso.
    //     }



    //ESTA SERIA LA FORMA CORTA Y RECOMENDADA Y SU EXPLICAION AL FINAL DEL CODIGO
    public function store(StoreCurso $request)
    {
        $curso = Curso::create($request->all());

        return redirect()->route('cursos.show', $curso);
    }

    /*----------------------------------------------------------------------------------------------------------------------------------------------------  */

    //METODO SHOW 
    //  Este método se utiliza para mostrar los detalles de un curso específico en la aplicación. Aquí está la explicación del código:

    public function show(Curso $curso)
    {
        //compact('curso'); ['curso' => $curso]

        return view('cursos.show', compact('curso'));
        //return view('cursos.show', ['curso' => $curso]);
        //return view('cursos.show', array('curso' => $curso);
        //accedo al archivo show de cursos y a la variable del archivo ($curso)

    }

    /*----------------------------------------------------------------------------------------------------------------------------------------------------  */

    //METODO EDIT
    // Este método se utiliza para mostrar el formulario de edición de un curso existente en una aplicación Laravel. 


    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    /*----------------------------------------------------------------------------------------------------------------------------------------------------  */

    //METODO UPDATE
    //  Este método se utiliza para actualizar un curso existente en una aplicación Laravel. Aquí está la explicación del código:

    public function update(UpdateCurso $request, Curso $curso)
    {



        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:cursos,slug,' . $curso->id, /*Con esta línea no comparará el registro consigo mismo y evitará el mensaje de error si ponemos lo mimsmo*/
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);

        // $curso->nombre = $request->nombre;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        // Aquí el $curso ya lo tengo creado y llamo al método update y con all() genero el array con las propiedades de la instancia.
        $curso->update($request->all());

        return redirect()->route('cursos.show', $curso);

        //return $curso; Muestra el resulatado en pantalla como un objeto (a modo de prueba para ver si funciona)

    }

    /*----------------------------------------------------------------------------------------------------------------------------------------------------  */


    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index');
    }
}

/*----------------------------------------------------------------------------------------------------------------------------------------------------  */

//EXPLICACION DE LAS CABECERAS

// Estas líneas en un archivo de controlador de Laravel están relacionadas con la importación de clases y definiciones de nombres de espacio necesarios para que el controlador funcione correctamente. Aquí está la explicación de cada línea:

// namespace App\Http\Controllers;:
// Esta línea define el espacio de nombres (namespace) en el que se encuentra el controlador actual. En este caso, el controlador se encuentra en el espacio de nombres App\Http\Controllers. Los espacios de nombres son utilizados en Laravel para organizar y agrupar clases de manera efectiva.

// use App\Http\Requests\StoreCurso;:
// Aquí se importa la clase StoreCurso que está definida en el espacio de nombres App\Http\Requests. La importación de esta clase generalmente se utiliza en métodos de controladores para validar y procesar datos del formulario cuando se crea un nuevo curso.

// use App\Http\Requests\UpdateCurso;:
// Similar al caso anterior, esta línea importa la clase UpdateCurso que también está definida en el espacio de nombres App\Http\Requests. La importación de esta clase se usa para validar y procesar datos del formulario cuando se actualiza un curso existente.

// use App\Models\Curso;:
// Aquí se importa la clase Curso que pertenece al espacio de nombres App\Models. La clase Curso representa el modelo de datos para los cursos en la aplicación. Los modelos se utilizan en Laravel para interactuar con la base de datos y representar los registros de una tabla.

// use Illuminate\Http\Request;:
// En esta línea se importa la clase Request del espacio de nombres Illuminate\Http. La clase Request se utiliza para manejar las solicitudes HTTP entrantes y acceder a los datos enviados en la solicitud, como parámetros, encabezados y contenido.

// use Symfony\Contracts\Service\Attribute\Required;:
// Esta línea parece ser un intento de importar la anotación Required del componente Symfony Contracts. Sin embargo, en el código proporcionado, no se utiliza esta anotación, y su importación parece innecesaria. Las anotaciones Required generalmente se utilizan en el contexto de la inyección de dependencias, pero no parece estar relacionada con el controlador en cuestión.

// En resumen, estas líneas de código se utilizan para importar las clases y definiciones de nombres de espacio necesarias para que el controlador CursoController funcione correctamente en Laravel. Esto incluye importar clases para validar formularios, interactuar con modelos de datos y manejar solicitudes HTTP.
// namespace App\Http\Controllers;
/*----------------------------------------------------------------------------------------------------------------------------------------------------  */


//EXPLICACIONES METODO INDEX
// public function index(): Este método se encarga de mostrar una lista de cursos en la página de índice. Los pasos que realiza son los siguientes:

// Curso::orderBy('id', 'desc'): Aquí se realiza una consulta a la base de datos utilizando Eloquent, el ORM de Laravel. Se seleccionan todos los registros de la tabla cursos, se ordenan por la columna id en orden descendente (es decir, los cursos más recientes primero).

// ->paginate(): Luego, se aplica la paginación a los resultados para dividir la lista en páginas. Por defecto, Laravel usa un número de elementos por página definido en la configuración de la aplicación.

// return view('cursos.index', compact('cursos')): Finalmente, se devuelve una vista llamada 'cursos.index', pasando los resultados paginados de cursos como una variable llamada $cursos. Esto permite mostrar la lista de cursos en la vista.

// En resumen, este método es parte de un controlador en Laravel que maneja la lógica relacionada con la visualización de una lista de cursos y la presentación del formulario para crear un nuevo curso. index() muestra la lista de cursos existentes

/*----------------------------------------------------------------------------------------------------------------------------------------------------  */

//EXPLICACIONES METODO CREATE
// public function create(): Este método se utiliza para mostrar el formulario de creación de un nuevo curso. Cuando un usuario visita la URL asociada a este método, Laravel devuelve la vista llamada 'cursos.create', que generalmente contiene un formulario HTML para ingresar los detalles del nuevo curso.

// create() muestra el formulario de creación. Estos son pasos comunes en la implementación de una funcionalidad CRUD (Crear, Leer, Actualizar, Eliminar) en una aplicación web.


/*----------------------------------------------------------------------------------------------------------------------------------------------------  */

//METODO SHOW
//Este método se utiliza para mostrar los detalles de un curso específico en la aplicación. Aquí está la explicación del código:

// public function show(Curso $curso): Este es el método show del controlador CursoController. Toma un parámetro $curso, que es una instancia de la clase Curso. Laravel utiliza la inyección de dependencias implícita para buscar automáticamente un curso con el ID correspondiente en la base de datos y pasarlo como argumento al método. Esto se hace gracias a la coincidencia entre el nombre del parámetro $curso y la clave de ruta {curso} definida en la ruta correspondiente.

// return view('cursos.show', compact('curso')): En esta línea, se devuelve una vista llamada 'cursos.show', pasando el objeto $curso como una variable llamada 'curso' a la vista. Esto permite que la vista acceda a los detalles del curso y los muestre en la página de detalles del curso.

// En resumen, este método show se utiliza para mostrar los detalles de un curso específico en la aplicación. Cuando un usuario accede a la URL correspondiente, Laravel carga el curso desde la base de datos y lo pasa a la vista, que se encarga de mostrar la información detallada del curso. Esto es típico en una aplicación web donde se necesita mostrar información específica de un registro o elemento.
/*----------------------------------------------------------------------------------------------------------------------------------------------------  */


//EXPLICACIONES METODO UPDATE	

// public function update(UpdateCurso $request, Curso $curso): Este es el método update del controlador CursoController. Toma dos parámetros: $request, que es una instancia de la clase UpdateCurso (una clase de solicitud personalizada con reglas de validación específicas para la actualización), y $curso, que es una instancia de la clase Curso. Laravel utiliza la inyección de dependencias implícita para buscar automáticamente un curso con el ID correspondiente en la base de datos y pasarlo como argumento al método. Esto se hace gracias a la coincidencia entre el nombre del parámetro $curso y la clave de ruta {curso} definida en la ruta correspondiente.

// $request->validate([...]): En esta parte, se valida el formulario de actualización utilizando las reglas definidas en el método validate(). Esto asegura que los datos enviados en el formulario cumplan con las reglas de validación antes de continuar. Las reglas de validación incluyen que los campos 'nombre', 'slug', 'descripcion' y 'categoria' sean requeridos y que el campo 'slug' sea único en la tabla 'cursos', pero permitiendo que el registro actual (con el ID de $curso) tenga el mismo valor de 'slug' lo que evita que se genere el mensaje de error al compararse con sigo mismo y detectar que ese slug ya existe.

// $curso->update($request->all()): Aquí se actualiza el curso con los datos proporcionados en el formulario. $request->all() obtiene todos los datos enviados en el formulario y los asigna a las propiedades del modelo Curso. Esto actualiza el registro del curso en la base de datos con los nuevos valores proporcionados.

// return redirect()->route('cursos.show', $curso): Después de actualizar exitosamente el curso, se redirige al usuario a la página de detalles del curso recién actualizado. Esto permite que el usuario vea los cambios realizados en el curso después de la actualización.

// En resumen, el método update se utiliza para procesar la actualización de un curso existente en la base de datos después de validar los datos proporcionados en el formulario de edición. Después de la actualización, el usuario se redirige a la página de detalles del curso actualizado para que pueda ver los cambios realizados.


/*----------------------------------------------------------------------------------------------------------------------------------------------------  */

//EXPLICACIONES METODO STORE

// public function store(StoreCurso $request): Este es el método store del controlador. Toma un objeto $request como argumento, que es una instancia de la clase StoreCurso. Esto se conoce como inyección de dependencias implícita en Laravel. $request contiene los datos enviados por el formulario y las validaciones definidas en el form request StoreCurso se aplican automáticamente antes de que el método se ejecute.

// $curso = Curso::create($request->all()): En esta línea, se crea una nueva instancia de la clase Curso utilizando el método estático create() proporcionado por Eloquent, el ORM de Laravel. $request->all() toma todos los datos enviados en el formulario y los asigna a las propiedades del modelo Curso. Luego, se guarda este nuevo curso en la base de datos.

// return redirect()->route('cursos.show', $curso);: Después de crear exitosamente el curso, se redirige al usuario a la página de detalles del curso recién creado. Se utiliza redirect() para redirigir al usuario y route('cursos.show', $curso) para generar la URL de la ruta llamada "cursos.show", pasando el objeto $curso como parámetro. Esto generalmente se hace para mostrar los detalles del curso recién creado después de almacenarlo en la base de datos.

// Si has definido la función getRouteKeyName() en el modelo Curso para que use una columna personalizada en lugar del ID estándar para buscar cursos, entonces puedes eliminar el parámetro $curso de la línea de redirección, y Laravel seguirá funcionando correctamente al buscar el curso por el valor de la columna personalizada especificada en getRouteKeyName().

/*----------------------------------------------------------------------------------------------------------------------------------------------------  */

//EXPLICACIONES METODO EDIT

// Este método se utiliza para mostrar el formulario de edición de un curso existente en una aplicación Laravel. Aquí está la explicación del código:

// public function edit(Curso $curso): Este es el método edit del controlador CursoController. Toma un parámetro $curso, que es una instancia de la clase Curso. Laravel utiliza la inyección de dependencias implícita para buscar automáticamente un curso con el ID correspondiente en la base de datos y pasarlo como argumento al método. Esto se hace gracias a la coincidencia entre el nombre del parámetro $curso y la clave de ruta {curso} definida en la ruta correspondiente.
    
//     return view('cursos.edit', compact('curso')): En esta línea, se devuelve una vista llamada 'cursos.edit', pasando el objeto $curso como una variable llamada 'curso' a la vista. Esto permite que el formulario de edición muestre los datos actuales del curso, como el nombre, la descripción y la categoría, para que el usuario pueda modificarlos.
    
//     En resumen, el método edit se utiliza para cargar la vista de edición de un curso existente y prellenar el formulario con los datos actuales del curso, permitiendo al usuario realizar cambios en esos datos antes de realizar la actualización en la base de datos.

/*----------------------------------------------------------------------------------------------------------------------------------------------------  */


/*----------------------------------------------------------------------------------------------------------------------------------------------------  */

// EXPICACIONES METODO DESTROY
//     public function destroy(Curso $curso): Este es el método destroy del controlador CursoController. Este método toma un parámetro $curso, que es del tipo Curso. Laravel utiliza la inyección de dependencias implícita para buscar automáticamente un curso con el ID correspondiente en la base de datos y pasarlo como argumento al método. Esto se hace gracias a la coincidencia entre el nombre del parámetro $curso y la clave de ruta {curso} definida en la ruta.

// $curso->delete(): Una vez que se ha obtenido el objeto de curso, se utiliza el método delete() para eliminarlo de la base de datos. Este método elimina el registro correspondiente en la tabla de cursos.

// return redirect()->route('cursos.index');: Después de eliminar el curso con éxito, se redirige al usuario a otra página. En este caso, se utiliza redirect() para realizar una redirección HTTP y route('cursos.index') para generar la URL de la ruta llamada "cursos.index". Esto redirige al usuario a la página de índice de cursos (probablemente una lista de cursos) después de eliminar el curso.

// En resumen, este método destroy elimina un curso específico de la base de datos utilizando la inyección de dependencias implícita de Laravel y luego redirige al usuario a la página de índice de cursos. Esto es una operación común para realizar eliminaciones en una aplicación web de Laravel.
