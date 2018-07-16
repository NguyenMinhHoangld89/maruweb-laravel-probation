<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{str_limit($category->description,40,'...')}}</td>
            <td>
                <a href="{{url('categories/'.$category->id.'/edit')}}">
                    <button class="btn btn-sm btn-primary">Edit</button>
                </a>
                <a href="{{route('categories.destroy', $category->id)}}">
                    <button class="btn btn-sm btn-danger delete" data-id="{{$category->id}}">Delete</button>
                </a>
                <form id="delete-{{$category->id}}"
                      action="{{ route('categories.destroy', $category->id) }}" method="POST"
                      style="display: none;">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$categories->links()}}
