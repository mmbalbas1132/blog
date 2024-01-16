<header>
    <h1>Coders Free</h1>
    <nav>
        <ul>
            <li><a href="{{ Route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <!--Verifica que estoy en la ruta para añadir la clase active-->
            </li>
            <li><a href="{{ Route('cursos.index') }}"
                    class="{{ request()->routeIs('cursos.*') ? 'active' : '' }}">Cursos</a>

                {{-- cursos.* nos indica que cualquier rura que pase por cursos aplica la clase como el caso que está en curos.idex o en cursos.{$cuso} --}}

            </li>
            <li><a href="{{ Route('nosotros') }}"
                    class="{{ request()->routeIs('nosotros') ? 'active' : '' }}">Nosotros</a>
            </li>

        </ul>
        {{-- EXPLICACION DE LA EXPRESION QUE VERIFICA LA RUTA Y APLICA LA CLASE
    La expresión `request()->routeIs('cursos.index')` se utiliza comúnmente en el contexto de desarrollo web, especialmente cuando se trabaja con frameworks de PHP como Laravel. Esta expresión se utiliza para verificar si la ruta actual de una solicitud HTTP coincide con una ruta específica llamada 'cursos.index'.

Para entenderla en detalle, descompongamos la expresión:

1. `request()`: Esto se refiere al objeto de solicitud HTTP. En el contexto de Laravel u otros frameworks web, `request()` es una función que te proporciona acceso a la información de la solicitud HTTP actual, como parámetros, encabezados y la ruta de la solicitud.

2. `routeIs('cursos.index')`: Aquí, `routeIs` es un método proporcionado por Laravel que se utiliza para verificar si la ruta actual coincide con una ruta específica identificada por su nombre. En este caso, se está comprobando si la ruta actual coincide con la ruta nombrada 'cursos.index'.

En resumen, la expresión completa se utiliza para realizar una comprobación condicional en el código de Laravel. Si la ruta actual de la solicitud HTTP coincide con 'cursos.index', la expresión devolverá `true`, lo que significa que la solicitud se está realizando a la ruta 'cursos.index'. De lo contrario, devolverá `false`, lo que indica que la solicitud no se está realizando en esa ruta específica.

Esto es útil en situaciones en las que deseas realizar acciones específicas en función de la ruta actual de la solicitud, como mostrar u ocultar ciertos elementos en una interfaz de usuario o ejecutar código adicional. --}}
    </nav>
</header>