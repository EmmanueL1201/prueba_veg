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
            <h1>Grupos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><button class="btn btn-success" data-toggle="modal" data-target="#myModal"> <i class="far fa-plus nav-icon"></i>Agregar grupo</button></li>
              
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
                    <th>Nombre</th>
                    <th>Acciones</th> 
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($grupos as $gu)    
                        <tr>
                        <td>{{ $gu->id_grupo }}</td>
                        <td>{{ $gu->nombre }}</td>
                        <td>
                            <center>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $gu->id_grupo}}"><i class="far fa-eyes"></i>Editar</button>
        
<!-- Modal que contiene el formulario de edicion -->
<div id="myModal{{ $gu->id_grupo}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background: hsl(202, 94%, 32%);">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      
      <form action="{{route('editagrupo',['id_grupo'=>$gu->id_grupo])}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
              {{ $error}} <br>
            @endforeach
        @endif
      <div class="modal-body">
        <center><h1>Edita Grupo</h1></center>
      <input type="hidden" name="id_grupo" value="{{$gu->id_grupo}}">
          <div class="form-group">
            <label style="float: left;">Nombre:</label>
          <input type="text" class="form-control" name="nombre" value="{{$gu->nombre}}">
          </div>
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

                            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal2{{ $gu->id_grupo}}"><i class="far fa-eyes"></i>Eliminar</button>
<!-- Modal que contiene el formulario de eliminacion -->
<div id="myModal2{{ $gu->id_grupo}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background: #A52A2A;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <form action="{{route('eliminagrupo',['id_grupo'=>$gu->id_grupo])}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
      <div class="modal-body">
        <center><h1>¿Seguro que deseas eliminar este grupo?</h1></center>
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
      <form action="{{asset('guardagrupo')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="modal-body">
        <center><h1>Alta de Grupo</h1></center>
        
          <div class="form-group">
            <label for="email">Nombre:</label>
            <input type="text" class="form-control" name="nombre">
          </div>
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