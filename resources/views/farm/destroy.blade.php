{!! Form::open(['route' => ['farm.destroy', $row->id],'method'=>'DELETE']) !!}


<button  onclick="return confirm('Esta seguro de Eliminar el farm')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
{!! Form::close() !!}