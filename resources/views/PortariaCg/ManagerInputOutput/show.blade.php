@extends('layouts.app')

    @section('content_header')
        <h5> <i class="fas fa-id-card"></i> Registros </h5>
    @stop

@section('content')
    <div class="card">
        <div class="card-header"> 
             
        </div>

        <div class="card-body"> 
            <table class="table table-striped">
                <thead align="center">
                    <tr style="">
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">RG</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Responsavel</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Recep.</th>
                        <th scope="col">Cracha</th>
                        <th scope="col">Entrada</th>
                        <th scope="col">Saída</th>
                        <th scope="col">status</th>
                        <th scope="col">Exit</th>
                    </tr>
                </thead>    
                @foreach($data as $key)
                <tbody align="center">
                    <tr>
                        <td>
                            <div class="rounded-circle" style="width: 100px; height:100px; border:solid 3px #AAAEAE; background-position:center; background-image:url('../../img/windows/PortariaCG/images/{{$key->path_picture}}'); background-size:cover; background-repeat:no-repeat;"></div>
                        </td>
                        <td><small>{{$key->name}}        </small>  </td>
                        <td><small>{{$key->rg}}          </small>  </td>
                        <td><small>{{$key->localdestino}}</small>  </td>
                        <td><small>{{$key->responsavel}} </small>  </td>
                        <td><small>{{$key->tel}}         </small>  </td>
                        <td><small>{{$key->recepcao}}    </small>  </td>
                        <td><small>{{$key->cracha}}      </small>  </td>
                        <td><small>{{$key->period_into}} </small>  </td>
                        <td><small>{{$key->time_out}}    </small>  </td>
                        <td>
                            @if($key->status) 
                                <button type="button" class="btn btn-outline-success"><i class="fas fa-user"></i></button>
                                @else
                                <button type="button" class="btn btn-outline-secondary"><i class="fas fa-user-alt-slash"></i></button>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-dark"><a href="/porter/registry_update?id={{$key->id}}">S</a></button>
                        </td>
                    </tr>
                    <tr align="left">
                        <td colspan="12" style="text-align:justify;"> 
                            <h5><small><b> &nbsp;&nbsp; Obs: </b></small></h5>
                            <span style="margin-bottom:50px;">
                                &nbsp;&nbsp; {{$key->obs}} <br/> <br/>
                            </span>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <!-- card-body -->
        <div class="card-footer"> </div>
    </div>

<br/>
@endsection