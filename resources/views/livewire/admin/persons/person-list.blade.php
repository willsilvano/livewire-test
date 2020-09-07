<div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col col-2">
                Limit
                <select id="limit" class="form-control" wire:model="currentLimit">
                    @foreach ($limitOptions as $option)
                        <option value="{{ $option }}">{{ $option }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                Search
                <input type="text" class="form-control" id="search-persons" placeholder="Filter by name or email..."
                    wire:model="search" wire:input="updatingSearch">
            </div>
        </div>

        <br>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="cursor: pointer;"
                        wire:click="updatingOrder('id', '{{ $sortFieldsOrder['id'] }}')">
                        ID
                        @if ($sortField == 'id')
                            <i class="fas fa-sort-{{ $sortFieldsOrder['id'] == 'asc' ? 'down' : 'up' }}"></i>
                        @endif
                    </th>
                    <th scope="col" style="cursor: pointer;"
                        wire:click="updatingOrder('name', '{{ $sortFieldsOrder['name'] }}')">
                        Name
                        @if ($sortField == 'name')
                            <i class="fas fa-sort-{{ $sortFieldsOrder['name'] == 'asc' ? 'down' : 'up' }}"></i>
                        @endif
                    </th>
                    <th scope="col" style="cursor: pointer;"
                        wire:click="updatingOrder('email', '{{ $sortFieldsOrder['email'] }}')">
                        E-mail
                        @if ($sortField == 'email')
                            <i class="fas fa-sort-{{ $sortFieldsOrder['email'] == 'asc' ? 'down' : 'up' }}"></i>
                        @endif
                    </th>
                    <th class="center">
                        Actions
                    </th>
                </tr>
            </thead>
            @if ($persons->isEmpty())
                <tr>
                    <td colspan="5">No entries found.</td>
                </tr>
            @else
                <tbody>
                    @foreach ($persons as $person)
                        <tr>
                            <th>{{ $person->id }}</th>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->email }}</td>
                            <td class="center">
                                <button type="button" class="btn btn-sm btn-danger"
                                    wire:click="remove({{ $person->id }})">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
        </table>

        {{ $persons->links() }}

        <div>
            Showing
            {{ 1 + $persons->currentPage() * $persons->perPage() - $persons->perPage() }}
            to
            {{ $persons->currentPage() * $persons->perPage() }}
            of
            {{ $persons->total() }}
            entries.
        </div>
    </div>
</div>
