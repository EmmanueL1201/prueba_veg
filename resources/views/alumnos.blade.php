@include('header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('navbar')
  @include('menu')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alumnos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><button class="btn btn-success" data-toggle="modal" data-target="#myModal"> <i class="fas fa-layer-plus nav-icon"></i>Agregar Alumno</button></li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Nombre Completo</th>
                    <th>Carrera</th>
                    <th>Grupo</th>
                    <th>Status</th>
                    <th>Acciones</th> 
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($alumnos as $al)    
                        <tr>
                        <td>{{ $al->id_alumno }}</td>
                        <td>{{ $al->nombre }} {{ $al->a_paterno }} {{ $al->a_materno }}</td>
                        <td>{{ $al->nombre_carrera }}</td>
                        <td>{{ $al->nombre_grupo }}</td>
                        <td>
                            @if($al->activo == 1)
                               Activo
                            @else
                              Inactivo
                            @endif
                        </td>
                        
                        <td>
                            <center>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $al->id_alumno}}"><i class="far fa-eyes"></i>Editar</button>
        
<!-- Modal que contiene el formulario de edicion -->
<div id="myModal{{ $al->id_alumno }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header"  style="background: hsl(202, 94%, 32%);">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <form action="{{route('editaalumno',['id_alumno'=>$al->id_alumno])}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
              {{ $error}} <br>
            @endforeach
        @endif
      <div class="modal-body">
        <center><h1>Edita datos del alumno</h1></center>
      <input type="hidden" name="id_alumno" value="{{$al->id_alumno}}">
          <div class="form-group">
            <label style="float: left;">Nombre:</label>
          <input type="text" class="form-control" name="nombre" value="{{$al->nombre}}">
          </div>
          <div class="form-group">
            <label style="float: left;">Apellido Paterno:</label>
          <input type="text" class="form-control" name="a_paterno" value="{{$al->a_paterno}}">
          </div>
          <div class="form-group">
            <label style="float: left;">Apellido Materno:</label>
          <input type="text" class="form-control" name="a_materno" value="{{$al->a_materno}}">
          </div>
          <div class="form-group">
            <label style="float: left;">Carrera:</label>
            <select class="form-control" name="id_carrera">
              @foreach($carreras as $car)
               @if($car->id_carrera == $al->id_carrera)
                 <option value="{{ $car->id_carrera }}">{{ $car->nombre }}</option>
               @endif
               @endforeach

             
               @foreach($carreras as $car)
               @if($car->id_carrera != $al->id_carrera)
                 <option value="{{ $car->id_carrera }}">{{ $car->nombre }}</option>
               @endif
               @endforeach
            </select>
          </div>
          <div class="form-group">
            <label style="float: left;">Grupo:</label>
            <select class="form-control" name="id_grupo">
              @foreach($grupos as $gru)
               @if($gru->id_grupo == $al->id_grupo)
                <option value="{{ $gru->id_grupo }}">{{ $gru->nombre }}</option>
               @endif
              @endforeach

              @foreach($grupos as $gru)
               @if($gru->id_grupo != $al->id_grupo)
                <option value="{{ $gru->id_grupo }}">{{ $gru->nombre }}</option>
               @endif
              @endforeach
            </select>
          </div>
          <input type="hidden" name="activo" value="1">
          
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Editar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      
      </div>
    </form>
    </div>

  </div>
</div>
{{-- Termina el modal de edicion --}}

                            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal2{{ $al->id_alumno}}"><i class="far fa-eyes"></i>Eliminar</button>
<!-- Modal que contiene el formulario de eliminacion -->
<div id="myModal2{{ $al->id_alumno}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background: #A52A2A;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <form action="{{route('eliminaalumno',['id_alumno'=>$al->id_alumno])}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
      <div class="modal-body">
        <center><h1>¿Seguro que deseas eliminar este Alumno?</h1></center>
        <center>
          <button type="submit" class="btn btn-success">Si</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </center>       
      <div class="modal-footer">
        
      </div>
    </form>
    </div>

  </div>
</div>
{{-- Termina el modal de eliminacion --}} 
                          </center>
                        </td>    
                        </tr>

                  @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- Modal que contiene el formulario de alta -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background: #008B8B;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <form action="{{asset('guardaalumno')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="modal-body">
        <center><h1>Alta de Alumno</h1></center>
        
          <div class="form-group">
            <label for="email">Nombre:</label>
            <input type="text" class="form-control" name="nombre">
          </div>
          <div class="form-group">
            <label for="email">Apellido Paterno:</label>
          <input type="text" class="form-control" name="a_paterno">
          </div>
          <div class="form-group">
            <label for="email">Apellido Materno:</label>
          <input type="text" class="form-control" name="a_materno">
          </div>
          <div class="form-group">
            <label for="sel1">Carrera:</label>
            <select class="form-control" name="id_carrera">
              @foreach($carreras as $car)
               <option value="{{ $car->id_carrera }}">{{ $car->nombre }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="sel1">Grupo:</label>
            <select class="form-control" name="id_grupo">
              @foreach($grupos as $gru)
               <option value="{{ $gru->id_grupo }}">{{ $gru->nombre }}</option>
              @endforeach
            </select>
          </div>
          <input type="hidden" name="activo" value="1">
          
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      
      </div>
    </form>
    </div>

  </div>
</div>
{{-- Termina el modal alta --}}
 <!-- alerts -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <script>
 @if(Session::has('message'))
   var type = "{{ Session::get('alert-type', 'info') }}";
   switch(type){
     case 'info':
       toastr.info("{{ Session::get('message') }}");
       break;
     
     case 'warning':
       toastr.warning("{{ Session::get('message') }}");
       break;
     case 'success':
       toastr.success("{{ Session::get('message') }}");
       break;
     case 'error':
       toastr.error("{{ Session::get('message') }}");
       break;
   }
 @endif
 </script>
  @include('footer')