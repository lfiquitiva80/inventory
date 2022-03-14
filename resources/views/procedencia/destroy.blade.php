{!! Form::open(['route' => ['procedencia.destroy', $row->id],'method'=>'DELETE']) !!}


<button  onclick="return confirm('Esta seguro de Eliminar el procedencia')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
{!! Form::close() !!}