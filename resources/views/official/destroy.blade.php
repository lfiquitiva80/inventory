{!! Form::open(['route' => ['official.destroy', $row->id],'method'=>'DELETE']) !!}


<button  onclick="return confirm('Esta seguro de Eliminar el official')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
{!! Form::close() !!}