
  @extends('adminlte::page')



    @section('content')

        
    	<div class="panel-body">



<div class="container">
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['route' => 'inventory.index', 'method'=>'GET', 'Class'=>'navbar-form navbar-right']) !!}
<!--<form class="navbar-form navbar-right" role="search">-->
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="nombre" id="nombre">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
{!! Form::close() !!}
<div class="panel panel-default">

<h4><b><center>REGISTROS DE INVENTARIOS</h4></b></center>


<a class="btn btn-info" data-toggle="modal" href='#inventory'><i class="fas fa-plus-circle"></i> Crear inventarios</a>
<a href="#" class="btn btn-success"><i class="fas fa-file-excel"></i> Download Excel</a>



  @include('inventory.create')

  @include('inventory.edit')


<p>
<div class="table table-sm table-responsive">
<table class="table table-hover" >
  <thead>
    <tr>
      <td>  id  </td>
      <td>  Finca </td>
      <td>  Lote</td>
      <td>  Columna</td>
      <td>  Fila</td>
      <td>  Estado</td>
      <td>  Usuario</td>
      <td>  Fecha_Creación</td>
      <td>  Fecha_Actualización</td>
      <td colspan="2">  Acciones</td>




    </tr>
  </thead>
  <tbody>

  @foreach($inventories as $row)
    <tr>

          <td>{{$row->id}}</td>
          <td>{{$row->farm->fincadesc}}</td>
          <td>{{$row->lot->LOTENOMB}}</td>
          <td>{{$row->columna}}</td>
          <td>{{$row->fila}}</td>
          <td>{{$row->statu->estado}}</td>
          <td>{{$row->user->name}}</td>
          <td>{{$row->created_at}}</td>
          <td>{{$row->updated_at}}</td>



          



          <td><a   data-toggle="modal" data-target="#editar_inventory" data-id="{{$row->id}}"
            data-farm_id="{{$row->farm_id}}"
            data-lot_id="{{$row->lot_id}}"
            data-columna="{{$row->columna}}"
            data-fila="{{$row->fila}}"
            data-statu_id="{{$row->statu_id}}"
            data-user_id="{{$row->user_id}}"

           ><i class="fas fa-eye" aria-hidden="true"></i></a></td>
</td>
     

          <td>@include('inventory.destroy')</td>

       
        </td>

    </tr>
  </tbody>

  @endforeach


</table>
</div>

<center>{{ $inventories->links() }}</center>

</div>

</div>
</div>


@section('js')
    <script> 

      $(document).ready(function() {

$('#editar_inventory').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var farm_id = button.data('farm_id')
  var lot_id = button.data('lot_id')
  var columna = button.data('columna')
  var fila = button.data('fila')
  var statu_id = button.data('statu_id')
  var user_id = button.data('user_id')

// Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-body #id').val(id);
modal.find('.modal-body #farm_id').val(farm_id);
modal.find('.modal-body #lot_id').val(lot_id);
modal.find('.modal-body #columna').val(columna);
modal.find('.modal-body #fila').val(fila);
modal.find('.modal-body #statu_id').val(statu_id);
modal.find('.modal-body #user_id').val(user_id);
})
});
        
     

    </script>
@stop



    @endsection

