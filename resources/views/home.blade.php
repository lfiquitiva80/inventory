@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Palmeras del llano</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                    	

                    	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    		 <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('img/tree.svg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><strong> PORVENIR</strong></h5>
                          <p class="card-text">Plantas Vivas <span class="badge badge-success">1255</span><br> Plantas Muertas <span class="badge badge-danger">50</span><br></p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                    	</div>

                    		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    		 <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('img/tree.svg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><strong> PORVENIR</strong></h5>
                          <p class="card-text">Plantas Vivas <span class="badge badge-success">1255</span><br> Plantas Muertas <span class="badge badge-danger">50</span><br></p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                    	</div>


                    		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    		 <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('img/tree.svg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><strong> PORVENIR</strong></h5>
                          <p class="card-text">Plantas Vivas <span class="badge badge-success">1255</span><br> Plantas Muertas <span class="badge badge-danger">50</span><br></p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                    	</div>

                        

                    </div>

                                        <div class="row">
                    	

                    	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    		 <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('img/tree.svg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><strong> PORVENIR</strong></h5>
                          <p class="card-text">Plantas Vivas <span class="badge badge-success">1255</span><br> Plantas Muertas <span class="badge badge-danger">50</span><br></p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                    	</div>

                    		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    		 <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('img/tree.svg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><strong> PORVENIR</strong></h5>
                          <p class="card-text">Plantas Vivas <span class="badge badge-success">1255</span><br> Plantas Muertas <span class="badge badge-danger">50</span><br></p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                    	</div>


                    		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    		 <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('img/tree.svg')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><strong> PORVENIR</strong></h5>
                          <p class="card-text">Plantas Vivas <span class="badge badge-success">1255</span><br> Plantas Muertas <span class="badge badge-danger">50</span><br></p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                    	</div>


                    </div>
                    
                    

                   

             

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
