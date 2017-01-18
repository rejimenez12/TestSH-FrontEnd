@extends('welcome')

@section('title', 'Inicio')

@section('content')


<div class="container theme-showcase" role="main">

  <div class="page-header">
    <h1>Modulo de Clientes</h1>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-4">
     
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Clientes</h3>
        </div>
        <div class="panel-body">
        
          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Compañia</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Status</th>
                    <th>Amigos</th>

                  </tr>
                </thead>
                <tbody>
                @if(isset($data))
                  @foreach ($data as $data)
                    <tr>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->gender }}</td>
                      <td>{{ $data->company }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->phone }}</td>
                      <td>{{ $data->address }}</td>
                      @if ($data->isActive == false)
                        <td>No activo</td>
                      @else
                        <td>Activo</td>
                      @endif
                      <td><a href="{{ URL::action('TestController@show_friends', [$data->id] ) }}">Mostrar</td>

                    </tr>
                  @endforeach
                @endif
                </tbody>
              </table>
         <!--URL::action('AdminController@edit_user', [$user->id] )-->
          </div>
            </div>
          </div>
        </div><!-- /.col-sm-4 -->



    </div>
  </div>
</div> <!-- /container -->

@stop