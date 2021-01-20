{!! Form::open(['route' => ['lot.destroy', $row->id],'method'=>'DELETE']) !!}


<button  onclick="return confirm('Esta seguro de Eliminar el lot')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
{!! Form::close() !!}