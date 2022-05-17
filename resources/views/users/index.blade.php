@extends('layouts.layout_padrao')

@section('title') Listagem @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="col-md-12" style="text-align: right;">
                <a href="/users/create" class="btn btn-success">Adicionar</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                @if (session('msg'))      
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ date('d/m/Y', strtotime($user->birth_date)) }}</td>
                                <td>
                                    <a href="/users/edit/{{ $user->id }}" style="width:63px;margin-bottom:10px" class="btn btn-sm btn-warning">Editar</a>
                                    <form method="POST" action="/users/destroy/{{ $user->id }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" onclick="if (confirm('Você tem certeza que deseja excluir esse usuário?”')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-sm btn-danger">
                                            Deletar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection