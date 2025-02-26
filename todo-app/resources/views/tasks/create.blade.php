@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h4 class="mb-0">Crear Tarea</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <input type="text" name="description" id="description" class="form-control form-control-lg @error('description') is-invalid @enderror" value="{{ old('description') }}" required placeholder="Escribe aquí la descripción de la tarea">
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Notas (opcional)</label>
                            <textarea name="notes" id="notes" class="form-control form-control-lg" placeholder="Escribe aquí notas adicionales o una descripción detallada de la tarea">{{ old('notes') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label">Prioridad</label>
                            <select name="priority" id="priority" class="form-select form-control-lg">
                                @foreach($priorities as $priority)
                                    <option value="{{$priority}}" @selected(old('priority') == $priority)>
                                        {{ ucfirst($priority) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-lg">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection