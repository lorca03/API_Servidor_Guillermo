<div style="margin: auto;width: 50%;padding: 10px;margin-top: 30px;text-align: center">
{{--    GET ALL--}}
    <form method="GET" action="{{ route('demandantes') }}">
        @csrf
        <button type="submit">Demandantes</button>
    </form>

    @foreach($demandantes as $demandante)
        <h4>{{$demandante['email']}}</h4>
        <h5>{{$demandante['name']}}</h5>
        <hr>
    @endforeach
    <hr>
{{--    POST--}}
    <form method="POST" action="{{ route('añadir.demandante') }}">
        @csrf
        <div>
            <div class="form-group">
                <input type="text" class="form-control-input" name="name" required>
                <label class="label-control" for="lpassword">Name</label>
            </div>
            <br>
            <div class="form-group">
                <input type="email" class="form-control-input" name="email" required>
                <label class="label-control" for="lemail">Email</label>
            </div>
            <br>
            <div class="form-group">
                <input type="number" class="form-control-input" name="edad" required>
                <label class="label-control" for="lpassword">Edad</label>
            </div>
        </div>
        <br>
        <button type="submit">Añadir Demandante</button>
    </form>
    @if(gettype($subirDeman)!==null)
        @if(count($subirDeman)>0)
            <h5>{{$subirDeman[1]}}</h5>
            <h5>{{$subirDeman[0]['name']}}</h5>
            <h5>{{$subirDeman[0]['email']}}</h5>
            <h5>{{$subirDeman[0]['edad']}}</h5>
            <hr>
        @endif
    @endif
    <hr>
{{--    GET INDIVIDUAL--}}
    <form method="POST" action="{{ route('buscar.demandante') }}">
        @csrf
        <div>
            <select name="demandante">
                @foreach($options as $option)
                    <option value="{{$option['id']}}">{{$option['email']}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit">Busacar Demandante</button>
    </form>
    @foreach($show as $sho)
        @if(gettype($sho)!='array')
            <h4>{{$sho}}</h4>
            <hr>
        @else
            <h4>Nombre:{{$sho['name']}}</h4>
            <h4>Edad:{{$sho['edad']}}</h4>
            <h4>Prestaciones:</h4>
            @foreach($sho['prestaciones'] as $prestacion)
                <h4>Name:{{$prestacion['name']}} / Cuentia:{{$prestacion['cuantia']}}</h4>
            @endforeach
        @endif
    @endforeach
    <hr>
{{--    DELETE--}}
    <form method="POST" action="{{ route('delete.demandante') }}">
        @csrf
        <div>
            <select name="demandante">
                @foreach($options as $option)
                    <option value="{{$option['id']}}">{{$option['email']}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit">Eliminar Demandante</button>
    </form>
    @if(gettype($delete)!==null)
        @if(count($delete)>0)
            <h4>{{$delete[1]}}</h4>
            <hr>
        @endif
    @endif
    <hr>
{{--   PUT --}}
    <form method="POST" action="{{ route('put.demandante') }}">
        @csrf
        <div>
            <select name="demandante">
                @foreach($options as $option)
                    <option value="{{$option['id']}}">{{$option['email']}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <div class="form-group">
                <input type="text" class="form-control-input" name="name">
                <label class="label-control" for="lname">Name</label>
            </div>
            <br>
            <div class="form-group">
                <input type="email" class="form-control-input" name="email">
                <label class="label-control" for="lemail">Email</label>
            </div>
            <br>
            <div class="form-group">
                <input type="number" class="form-control-input" name="edad" >
                <label class="label-control" for="lpassword">Edad</label>
            </div>
        </div>
        <br>
        <button type="submit">Actualizar Demandante</button>
    </form>
    @foreach($put as $p)
        @if(gettype($p)!='array')
            <h4>{{$p}}</h4>
            <hr>
        @else
            <h4>Nombre:{{$p['name']}}</h4>
            <h4>Email:{{$p['email']}}</h4>
            <h4>Edad:{{$p['edad']}}</h4>
        @endif
    @endforeach
    <hr>

</div>
