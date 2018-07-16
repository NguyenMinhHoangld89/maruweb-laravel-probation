<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{!! showImage($user->image) !!}</td>
            <td>
                <a href="{{url('users/'.$user->id.'/edit')}}">
                    <button class="btn btn-sm btn-primary">Edit</button>
                </a>
                <a href="{{route('users.destroy', $user->id)}}">
                    <button class="btn btn-sm btn-danger delete" data-id="{{$user->id}}">Delete</button>
                </a>
                <form id="delete-{{$user->id}}"
                      action="{{ route('users.destroy', $user->id) }}" method="POST"
                      style="display: none;">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$users->links()}}
