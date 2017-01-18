@extends('welcome')

@section('title', 'Inicio')

@section('content')


<div class="container theme-showcase" role="main">

  <div class="page-header">
    <h1>Amigos</h1>
  </div>
  <div class="row">
    <div class="col-md-4 col-sm-4 center">
     
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Amigos de {{ $data->name }}</h3>
        </div>
        <div class="panel-body">
        
          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nombre</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($data->friends as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                  </tr>
                @endforeach
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
<div class="down" ></div>
@stop