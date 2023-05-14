<x-master>
    <h1 class="text-center">All Products </h1>
    <table class="table">
        <tr>
            <th>Image</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantite</th>
            <th>Actions</th>
        </tr>
        @foreach ($allPrd as $allPrd )
        <tr>
            <td >
                <img class="card-img-top " style="width: 5rem" src="{{asset('images/'.$allPrd->image)}}" alt="photo"/>
            </td>
            <td>
                <h4 class="card-title">{{$allPrd->nom}}</h4>
            </td>
            <td>
                <p class="card-text">{{$allPrd->prix}}DH</p>
            </td>
            <td>
                <span>{{$allPrd->quantite}}</span>
            </td>
            <td>
                <form action="{{route('destroy',$allPrd->id)}}" method="POST">
                    @method('PUT')
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-warning" href="{{route('update',$allPrd->id)}}">Modifier</a>
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-master>