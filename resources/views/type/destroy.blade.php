{!! Form::open(['route' => ['type.destroy', $row->id],'method'=>'DELETE']) !!}


<button  onclick="return confirm('Esta seguro de Eliminar el type')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
{!! Form::close() !!}