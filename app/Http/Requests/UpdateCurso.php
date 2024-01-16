<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurso extends FormRequest
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
           
        ];
    }

    // Aquí personalizo el mensaje de error
    public function messages():array
    {
        return [
            'descripcion.required' => 'La descripción del curso es obligatoria',
        ];
    }

    // con esta función personalizo los atributos

    public function attributes()
    {
        return array(
            'nombre' => 'nombre completo del curso',
        );
    }
}


//EXPLICACIONES

// El archivo `UpdateCurso` que has proporcionado es otra clase de solicitud (form request) en una aplicación Laravel. A diferencia de `StoreCurso`, esta clase se utiliza para definir las reglas de validación y mensajes de error personalizados que se aplicarán cuando se actualiza un curso existente en la aplicación. A continuación, se explica el código:

//     1. `namespace App\Http\Requests;`:    
//        - Esta línea declara el espacio de nombres en el que se encuentra la clase `UpdateCurso`. Al igual que `StoreCurso`, esta clase se coloca en el espacio de nombres `App\Http\Requests` para organizar las clases de solicitud.
    
//     2. `use Illuminate\Foundation\Http\FormRequest;`:    
//        - Se importa la clase base `FormRequest`, que es la misma clase base que se usa en `StoreCurso`. Al heredar de esta clase base, `UpdateCurso` tiene acceso a los métodos y propiedades necesarios para definir y aplicar reglas de validación en las solicitudes HTTP.
    
//     3. `public function authorize(): bool`:    
//        - Al igual que en `StoreCurso`, este método determina si el usuario tiene autorización para realizar la solicitud. En este caso, el método `authorize` siempre devuelve `true`, lo que significa que cualquier usuario está autorizado para realizar la solicitud de actualización. Al igual que antes, si se requiere una lógica de autorización más compleja, esta función se puede personalizar.
    
//     4. `public function rules(): array`:    
//        - A diferencia de `StoreCurso`, en este método no se definen reglas de validación explícitas. Esto significa que, por defecto, no se aplicarán reglas de validación específicas a menos que se definan en una instancia específica de este formulario de actualización en algún lugar de la aplicación. Esto puede ser útil cuando se desea tener flexibilidad en las reglas de validación según el contexto.
    
//     5. `public function messages(): array`:    
//        - Al igual que en `StoreCurso`, este método se utiliza para personalizar los mensajes de error que se mostrarán si la validación falla. En este caso, se ha personalizado el mensaje de error para el campo 'descripcion' cuando no se proporciona. En lugar del mensaje predeterminado, se mostrará "La descripción del curso es obligatoria".
    
//     6. `public function attributes()`:    
//        - Este método se utiliza para personalizar los nombres de atributos en los mensajes de error, al igual que en `StoreCurso`. En este caso, el atributo 'nombre' se muestra como 'nombre completo del curso' en los mensajes de error.
    
//     En resumen, el archivo `UpdateCurso` está diseñado para manejar las reglas de validación, mensajes de error personalizados y nombres de atributos personalizados cuando se actualiza un curso en la aplicación Laravel. Al no definir reglas de validación en este formulario en particular, permite la flexibilidad de definir reglas de validación específicas en los controladores que utilizan esta clase de solicitud según las necesidades de la actualización de cursos en diferentes contextos de la aplicación.
