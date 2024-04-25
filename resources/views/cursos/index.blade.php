@extends('cabecera')

@section('estilos')
    <style>
        input[type="submit"] {
            background: transparent;
            border: 0;
            color: white;
            font-weight: 700;
        }

        tbody td {
            align-content: center;
        }
    </style>
@endsection

@section('contenido')
<div class="contenido-sombra">
    <div class="container">
        <h1 class="text-uppercase fs-1 text-center">Lista de Cursos</h1>
        <div class="d-sm-flex justify-content-sm-between">
            <a href="{{ route('cursos.create') }}" class="mb-2 btn btn-info">Agregar Curso</a>
            <form action="{{ route('cursos.index') }}" method="GET" class="input-group" style="max-width: 300px">
                <input value="{{ request()->input('parametro') ?? '' }}" id="parametro" name="parametro" type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                <button type="submit" class="btn btn-info opacity-75">Buscar</button>
                <button type="button" class="btn btn-info opacity-75 dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <input type="hidden" value="{{ request()->input('metodoBusqueda') ?? '' }}" id="metodoBusqueda" name="metodoBusqueda">
                <ul id="menuBusqueda" class="dropdown-menu dropdown-menu-end">
                    <li><span data-tipoBusqueda="codigo" class="dropdown-item {{ request()->input('metodoBusqueda') == 'codigo' ? 'active':'' }}">Codigo</span></li>
                    <li><span data-tipoBusqueda="nombre" class="dropdown-item {{ request()->input('metodoBusqueda') == 'nombre' ? 'active':'' }}">Nombre</span></li>
                    <li><span data-tipoBusqueda="carrera" class="dropdown-item {{ request()->input('metodoBusqueda') == 'carrera' ? 'active':'' }}">Carrera</span></li>
                </ul>
            </form>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered border-danger caption-top">
                <caption>
                    Tabla de Cursos
                </caption>
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Modalidad</th>
                        <th>Carrera</th>
                        <th>Ciclo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                @forelse($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->codigo }}</td>
                        <td>{{ $curso->nombre }}</td>
                        <td>{{ $curso->modalidad }}</td>
                        <td>{{ $curso->carrera }}</td>
                        <td>{{ $curso->ciclo }}</td>
                        <td style="">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('cursos.matriculas', $curso->id) }}" class="btn btn-primary">Matriculas</a>
                                <a class="btn btn-warning" href="{{ route('cursos.edit', [$curso->id]) }}" style="text-decoration: none; font-weight: 700; color: black;">Editar</a>
                                <button type="button" class="btn btn-danger" style="padding: 0;">
                                    <form action="{{ route('cursos.destroy', [$curso->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar">
                                    </form>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No se encontraron cursos</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script>
        // Declaracion de Variables
        const inputMetodoBusqueda = document.querySelector('#metodoBusqueda');
        const menuSeleccion = document.querySelector('#menuBusqueda');
        // Establecer por defecto
        establecerMetodoBusquedaPorDefecto();
        // Agregar evento de click para cambiar metodo de busqueda
        menuSeleccion.addEventListener('click', function(e) {
            if(e.target.nodeName === 'SPAN') {
                const previousElementoSeleccionado = menuSeleccion.querySelector('.active')
                previousElementoSeleccionado.classList.remove('active')
                const elementoSeleccionado = e.target;
                elementoSeleccionado.classList.add('active')
                const metodoBusquedaSeleccionado = elementoSeleccionado.dataset.tipobusqueda;
                inputMetodoBusqueda.value = metodoBusquedaSeleccionado;
            }
        })

        function establecerMetodoBusquedaPorDefecto() {
            if(inputMetodoBusqueda.value === '') {
                inputMetodoBusqueda.value = 'nombre';
                const itemMetodoBusqueda = menuSeleccion.querySelector('[data-tipoBusqueda="nombre"]');
                itemMetodoBusqueda.classList.add('active');
                return;
            }
        }
    </script>
@endsection