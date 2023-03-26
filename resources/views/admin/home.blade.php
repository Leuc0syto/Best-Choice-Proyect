<x-layout>
    <x-slot name='title'> BestChoice - Admin Home</x-slot>
    <div class="container-fluid my-3">
        <div class="card mx-auto col-l-9 col-md-7">
            <div class="card-header" style="background-color: #F5DEC6">
                <h3 class="titulo_barra text-center my-2">{{ __('Revisores de BestChoice')}}</h3>
            </div>
            <div class="d-flex justify-content-center">

                <table class="table w-100 text-center">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Id')}}</th>
                            <th scope="col">{{ __('Nombre')}}</th>
                            <th scope="col">{{ __('Anuncios revisados')}} </th>
                            <th scope="col">{{ __('Desactivar revisor')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($revisors as $revisor)
                        <tr>
                            <td>{{ $revisor->id}}</td>
                            <td>{{ $revisor->name}}</td>
                            <td>
                                {{ $ads_by_revisors[$revisor->id]}} <a
                                    href="{{ route('adsByRevisor', $revisor) }}"><button
                                        class="ms-3 btn btn-warning">{{ __('Ver')}}</button></a>
                            </td>
                            <td>
                                <form action="{{ route('deleteRevisor', $revisor)}}" method="POST" class="text-center">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fas fa-user-times"></i></button>
                                </form>
                            </td>
                            @empty
                            <div class="col-12">
                                <h2>{{ __('No hay ningún usuario acreditado como revisor.')}}</h2>
                            </div>
                            @endforelse
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-layout>
