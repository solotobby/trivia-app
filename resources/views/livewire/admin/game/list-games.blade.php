<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">All Games</h3>
    </div>
    <div class="block-content">

        {{-- Filters --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <label>Filter by Category:</label>
                <select wire:model="category" class="form-control">
                    <option value="">All</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label>Premium:</label>
                <select wire:model="isPremium" class="form-control">
                    <option value="">All</option>
                    <option value="1">Premium</option>
                    <option value="0">Free</option>
                </select>
            </div>
        </div>
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
                            <td>{{ $game->creator->name ?? 'N/A' }}</td>
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
        {{-- Pagination --}}
        <div class="mt-3">
            {{ $games->links() }}
        </div>
    </div>
</div>
