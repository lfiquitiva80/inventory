{!! Form::open(['route' => ['disease.destroy', $row->id],'method'=>'DELETE']) !!}


<button  onclick="return confirm('Esta seguro de Eliminar el disease')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
{!! Form::close() !!}