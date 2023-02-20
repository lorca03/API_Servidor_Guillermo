<div style="margin: auto;width: 50%;padding: 10px;margin-top: 30px;text-align: center">
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
        @endif
        @endif
    <hr>
    {{--@foreach($demandantes as $demandante)--}}
    {{--    <h4>{{$demandante['email']}}</h4>--}}
    {{--    <h5>{{$demandante['name']}}</h5>--}}
    {{--    <hr>--}}
    {{--@endforeach--}}

</div>
