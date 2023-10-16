<!-- Your table content for the category items -->
@section('content')

<table class="table">
    <tbody>
        @foreach ($groceryItems as $item)
            <tr>
                <td>{{ $item->GroceryID }}</td>
                <td>{{ $item->ProductName }}</td>
                <td>{{ $item->Stock }}</td>
                <td>${{ number_format($item->Price, 2) }}</td>
                <td>{{ $item->category->CategoryName }}</td>
                <td>{{ $item->department->DepartmentName }}</td>
                <td>
                    <a href="{{ route('items.show', $item->GroceryID) }}" class="btn btn-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('items.destroy', $item->GroceryID) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
