{!! Form::open(['route' => ['weighing.destroy', $row->id],'method'=>'DELETE']) !!}

<button  onclick="return confirm('Esta seguro de Eliminar el registro')"><i class="fa fa-trash" aria-hidden="true"></i> </button>

{!! Form::close() !!}