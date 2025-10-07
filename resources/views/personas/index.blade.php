@extends('layouts.app')
@section('content')
<div class="container" style="max-width: 900px">
  <h1>Personas</h1>

  <table class="table" border="1" cellpadding="8" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Teléfono</th>
        <th>Creado</th>
      </tr>
    </thead>
    <tbody>
      @forelse($personas as $p)
        <tr>
          <td>{{ $p->id }}</td>
          <td>{{ $p->nombre }}</td>
          <td>{{ $p->apellido }}</td>
          <td>{{ $p->telefono ?? '—' }}</td>
          <td>{{ $p->created_at?->format('Y-m-d H:i') }}</td>
        </tr>
      @empty
        <tr><td colspan="5">No hay personas cargadas.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $personas->links() }}
</div>
@endsection

