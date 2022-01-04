
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">User </th>
        <th scope="col">Bank </th>
        <th scope="col">Transection Id</th>
        <th scope="col">Screnshot</th>
        <th scope="col">Status</th>
        <th scope="col">Action </th>
      </tr>
    </thead>
    <tbody>

    @forelse ($pendingOrders as $order)
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $order->user->name }}</td>
        <td>{{ $order->bank_name }}</td>
        
        <td>{{ $order->transection_id }}</td>

        
        <td>
            @if(!is_null($order->screnshot_url))
            {{ $order->screnshot_url }}
            @else
                No Image
            @endif
        </td>
       
            
        
        <td> @if($order->status == 0)
            pending
        @endif</td>

        <td> <button> Approve </button> </td>
      </tr>
    @empty
        <div class="text-center">
            <h5> No Data Available</h5>
        </div>
    @endforelse

     
    </tbody>
  </table>