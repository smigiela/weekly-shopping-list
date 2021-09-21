<!DOCTYPE html>
<html>
<head>
    <title>{{__('custom.shopping_lists.weekly_list.pdf.title')}} {{$weeklyShoppingList->shopping_date}}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

</head>
<body>

<div>
    <div>{{__('custom.shopping_lists.weekly_list.pdf.title')}} {{$weeklyShoppingList->shopping_date}}</div>
    <div style="margin-top: 20px;">
        <ul class="list-unstyled">
            @foreach($weeklyPositions->sortBy('is_done') as $position)
                <li >
                    {{$position->name}} |
                    {{$position->sum}}
                    @if($position->type == 'weight'){{__('custom.shopping_lists.global.g')}}
                    @elseif($position->type == 'quantity'){{__('custom.shopping_lists.global.qty')}}
                    @elseif($position->type == 'volume'){{__('custom.shopping_lists.global.ml')}}
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>


</body>
</html>
