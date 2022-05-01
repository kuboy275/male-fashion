
    @foreach($category as $cateItem)
    <td>Category: {{ $cateItem->name }} </td>

        <table class="table">
            <thead>
            </thead>
            <tbody>
                @foreach($product as $productItem)
                    @if($productItem->category_id == $cateItem->id)
                        <tr>
                            <th scope="row">ID: {{ $productItem->id  }}</th>
                            <td> Name: {{ $productItem->name }} </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

 

    @endforeach

    @foreach(config('permissions.permission_parent_name') as $key1123 => $a)
        <h2>{{ Str::of($a)->explode(' ')[1] }}</h2>
        <h6>{{ $key1123 }}</h6> 
    @endforeach
