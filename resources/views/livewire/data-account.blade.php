<div>
    <div class="px-3">
        <input type="text" class="form-control mb-3" placeholder="search" wire:model="search">
    </div>

    <div class="d-flex justify-content-start  flex-wrap ">
        @forelse($data as $item)
            <div class="col-12 col-lg-3 px-3">

                <div class="card rounded">
                    <div class="card-body ">
                        @if ($item->username != $username)
                            <table class="table mt-3">

                                <tbody>
                                    <tr>
                                        <td class="py-1 px-0 m-1">Username</td>
                                        <td class="py-1 px-0 m-1">{{ $item->username }}</td>

                                    </tr>
                                    <tr>
                                        <td class="py-1 px-0 m-1">Name</td>
                                        <td class="py-1 px-0 m-1">{{ $item->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-1 px-0 m-1">Role</td>
                                        <td class="py-1 px-0 m-1">{{ $item->role }}</td>
                                    </tr>

                                </tbody>
                            </table>
                            <button type="button" wire:click="editData('{{ $item->username }}')"
                                class="btn btn-warning text-center w-100">Edit Data</button>
                        @endif
                        <span>Username</span>
                        <input wire:model="" required type="text" class="form-control mb-4">
                        <span>Username</span>
                        <input wire:model="" required type="text" class="form-control mb-4">
                        <span>Username</span>
                        <input wire:model="" required type="text" class="form-control mb-4">



                    </div>
                </div>
            </div>

        @empty
            <p class="text-danger text-center">Data tidak ada</p>
        @endforelse
    </div>
</div>
