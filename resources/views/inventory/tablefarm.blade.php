         <div class="modal fade" id="modal-id">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          
                          <h4 class="modal-title">Tabla por fincas</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">

                          

                          <table class="table table-condensed table-hover">
                            <thead>
                              <tr>
                                <th>Finca</th>
                                <th>Vivas</th>
                                <th>Muertas</th>
                                <th>Plantas Iniciales</th>

                              </tr>
                            </thead>

                            @foreach ($query as $item)
                            <tbody>
                              <tr>
                                <td>{{$item->fincadesc}}</td>
                                <td>{{$item->Viva}}</td>
                                <td>{{$item->Muerta}}</td>
                                <td>0</td>
                              </tr>

                            </tbody>
                            @endforeach
                         
                          
                          </table>


                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                        </div>
                      </div>
                    </div>
                  </div>