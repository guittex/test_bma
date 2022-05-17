@extends('layouts.layout_padrao')

@section('title') Adicionar @endsection

@section('content')
    <div class="card">
        <form action="/users/store" method="post" class="form" id="form">
            <div class="card-body">
                <div class="col-md-12" style="text-align: right;">
                    <a href="/" class="btn btn-primary">Voltar</a>
                </div>
                <hr>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        @csrf
                        <div class="col-md-6">
                            <b><label for="nome">Nome</label></b>
                            <input id="name" type="text" name="name" placeholder="Digite..." class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b><label for="email">E-mail</label></b>
                                <input id="email" type="email" name="email" placeholder="Digite..." class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top:15px">
                            <b><label for="data_nascimento">Data de Nascimento</label></b>
                            <input id="birth_date" type="date" name="birth_date" placeholder="Digite..." class="form-control">
                        </div>
                        <div class="col-md-6" style="margin-top:15px">
                            <b><label for="senha">Senha</label></b>
                            <input id="password" type="password" name="password" placeholder="Digite..." class="form-control">
                        </div>
                    </div>
            </div>
            <div class="card-body" style="text-align: right">
                <a href="/" class="btn btn-danger">Cancelar</a>
                <button class="btn btn-success" id="btnSave" type="submit">Salvar</button>
            </div>
        </form>
    </div>
    <script>
        $("#form").validate({
            rules : {
                name  : {
                    required:true
                },
                email  : {
                    required:true
                },
                password : {
                    required:true,
                    minlength: 8
                }
            }, 
            messages : {
                name:{
                    required:"Por favor, informe seu nome",
                },
                email:{
                        required:"É necessário informar um email"
                },
                password:{
                    required: 'Senha deve ser maior que 8 caracteres'
                }
            }
        })
    </script>
@endsection