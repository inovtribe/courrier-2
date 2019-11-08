<h1>Customer</h1>

<ul>
    @foreach($customers as $customer)
        <li>{{ $customer }}</li>
    @endforeach
</ul>