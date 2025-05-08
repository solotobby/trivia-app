<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">All Games</h3>
    </div>
    <div class="block-content">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Players</th>
                        <th>Questions</th>
                        <th>Premium</th>
                        <th>Amount</th>
                        <th>Created By</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($games as $index => $game)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $game->name }}</td>
                            <td>{{ $game->number_of_players }}</td>
                            <td>{{ $game->number_of_questions }}</td>
                            <td>
                                <span class="badge {{ $game->is_premium ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $game->is_premium ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td>{{ $game->is_premium ? '₦' . number_format($game->amount, 2) : '-' }}</td>
                            <td>{{ $game->user->name ?? 'N/A' }}</td>
                            <td>{{ $game->created_at->format('d M, Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No games found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
