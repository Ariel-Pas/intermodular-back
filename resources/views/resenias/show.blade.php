@extends('template')

@section('tituloNavegador', 'Reseñas de ' . $empresa->nombre)

@section('contenido')

<div class="container">
    <h2 class="text-center font-bold text-2xl mb-4">Reseñas de {{ $empresa->nombre }}</h2>

    <button class="btn btn-primary"> <a href="{{ route('resenias.index') }}" class="bg-gray-500 px-4 py-2 text-white rounded inline-block mb-5" style="text-decoration: none">Volver</a> </button>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Preguntas</th>
                <th class="border border-gray-300 px-4 py-2">Respuestas</th>
                <th class="border border-gray-300 px-4 py-2">Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resenias as $resenia)
                <tr class="text-center bg-white hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $resenia->pregunta_id }} - {{ $resenia->pregunta->titulo }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $resenia->respuesta }}</td>
                    {{-- <td class="border border-gray-300 px-4 py-2">{{ $resenia->centro_id->nombre }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $resenias->links() }}
</div>

@endsection
