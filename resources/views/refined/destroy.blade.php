{!! Form::open(['route' => ['refined.destroy', $row->Producto],'method'=>'DELETE']) !!}

<button  onclick="return confirm('Esta seguro de Eliminar el refined')"><i class="fa fa-trash" aria-hidden="true"></i> </button>

{!! Form::close() !!}