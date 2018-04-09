@component('mail::message')
# {{ Auth::user()->name }}'s' Order Details

@component('mail::table')
| Item       | Price x Quantity         | Total  |
| ------------- |:-------------:| --------:|
<?php forEach($cart as $item) { ?>
| {{ $item['name'] }}      | {{ $item['price'] }} * ${{ $item['quantity'] }}     | ${{ $item['price'] * $item['quantity'] }}      |
<?php } ?>
| Total      |       | ${{ $total }}      |

@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
