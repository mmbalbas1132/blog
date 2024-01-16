<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
             // required es una regla de validación y podemos añadir las que queramos 
             'nombre' => 'required|min:3',
             //    'nombre' => ['required','min:3'], Otra forma de escribir varias reglas es con un array
             'slug' => 'required|unique:cursos', /*Creo la regla de validación para slug que sea obkigatorio, y único en la tabla cursos*/ 
             'descripcion' => 'required',
             'categoria' => 'required'
        ];
    }
    

    // Aquí personalizo el mensaje de error
    public function messages():array
    {
        return [
            'descripcion.required' => 'La descripción es obligatoria',
        ];
    }

    // con esta función personalizo los atributos

    public function attributes()
    {
        return array(
            'nombre' => 'nombre del curso',
        );
    }
}

//EXPLICACION:

// El archivo `StoreCurso` es una clase de solicitud (form request) en una aplicación Laravel. Esta clase se utiliza para definir las reglas de validación que se aplicarán a los datos enviados en una solicitud HTTP cuando se crea un nuevo curso. Aquí está la explicación del código:

//     1. `namespace App\Http\Requests;`:    
//        - Esta línea declara el espacio de nombres en el que se encuentra la clase `StoreCurso`. Las clases de solicitud se suelen colocar en el espacio de nombres `App\Http\Requests` para organizarlas.
    
//     2. `use Illuminate\Foundation\Http\FormRequest;`:    
//        - En esta línea, se importa la clase base `FormRequest` que es proporcionada por Laravel y se utiliza como base para las clases de solicitud personalizadas. La clase `FormRequest` contiene métodos y propiedades útiles para definir y aplicar reglas de validación en las solicitudes HTTP entrantes.
    
//     3. `public function authorize(): bool`:    
//        - Este método determina si el usuario tiene autorización para realizar la solicitud. En este caso, el método `authorize` siempre devuelve `true`, lo que significa que cualquier usuario está autorizado para hacer la solicitud. Si se requiere una lógica de autorización más compleja, esta función se puede personalizar según las necesidades de la aplicación.
    
//     4. `public function rules(): array`:    
//        - Este método define las reglas de validación que se aplicarán a los datos enviados en la solicitud. Las reglas de validación se especifican en forma de un array asociativo, donde las claves representan los nombres de los campos y los valores son las reglas de validación que se deben aplicar a esos campos.
    
//        - Por ejemplo, `'nombre' => 'required|min:3'` especifica que el campo 'nombre' es obligatorio (`required`) y debe tener al menos 3 caracteres (`min:3`). De manera similar, 'slug' debe ser único en la tabla 'cursos' y 'descripcion' y 'categoria' son campos obligatorios.
    
//     5. `public function messages(): array`:    
//        - En este método, se personalizan los mensajes de error que se mostrarán si la validación falla. En este caso, se ha personalizado el mensaje de error para el campo 'descripcion' cuando no se proporciona. En lugar del mensaje predeterminado, se mostrará "La descripción es obligatoria".
    
//     6. `public function attributes()`:    
//        - Este método se utiliza para personalizar los nombres de atributos en los mensajes de error. Por ejemplo, en lugar de mostrar "nombre" en el mensaje de error, se mostrará "nombre del curso".
    
//     En resumen, el archivo `StoreCurso` define las reglas de validación, mensajes de error personalizados y nombres de atributos personalizados que se aplicarán cuando se envíen datos para crear un nuevo curso en la aplicación Laravel. Las reglas de validación aseguran que los datos ingresados cumplan con ciertos criterios antes de ser almacenados en la base de datos. Esto es fundamental para garantizar la integridad de los datos y la seguridad de la aplicación.
