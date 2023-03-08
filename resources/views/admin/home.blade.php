<x-layout>
    <x-slot name='title'>BestChoice - Admin Home</x-slot>
    @if ($revisor)

    <div class='container my-5 py-5'>
        <div class='row'>
            <div class='col-12 col-md-8 offset-md-2'>
                <div class="card">
                    <div class="card-header">
                        Solicitud para el puesto de "Revisor"
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <b>Usuario</b>
                            </div>
                            <div class="col-md-9">
                                {{-- #{{ $revisor->id }} - {{ $revisor->name }} - {{ $revisor->email }} --}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>Email</b>
                            </div>
                            <div class="col-md-9">
                                {{-- {{ $ad->title }} --}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <b>Fecha de creación del usuario: </b>
                            </div>
                            <div class="col-md-9">
                                {{-- {{ $revisor->created_at }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <form action="" method="POST">
                            {{-- {{ route('admin.revisor.reject',$revisor) }} --}}
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </form>
                    </div>
                    <div class="col-6 text-end">
                        <form action="" method="POST">
                            {{-- {{ route('admin.revisor.accept', $revisor) }} --}}
                            {{-- {{ route('revisor.make',$user) }} --}}
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Aceptar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <h3 class="text-center mt-5">No hay ninguna solicitud para revisor</h3>

    @endif
</x-layout>