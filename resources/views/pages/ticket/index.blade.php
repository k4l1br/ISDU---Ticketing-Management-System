{{-- Show success message --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div style="margin-bottom: 16px;">
    <a href="{{ route('ticket.create') }}" class="btn btn-primary">
        Create Ticket
    </a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Reference Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($ticket as $item)
            <tr>
                <td>{{ $item->firstName }}</td>
                <td>{{ $item->lastName }}</td>
                <td>{{ $item->refNumber }}</td>
                <td>
                    <a href="{{ route('ticket.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('ticket.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('ticket.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No tickets found.</td>
            </tr>
        @endforelse
    </tbody>
</table>