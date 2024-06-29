<table class="table-striped table-hover table">
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th>NIP</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Created At</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <span>
                                                        {{ $user->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    {{ $user->nip }}
                                                </td>
                                                <td>
                                                    @if ($user->role === 'admin' || $user->role === 'staff admin')
                                                        <span class="badge badge-warning">Admin</span>
                                                    @elseif($user->role === 'user')
                                                        <span class="badge badge-success">User</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $user->created_at }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('users.edit', $user->id) }}'
                                                            class="btn btn-sm btn-info btn-icon" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                            method="POST" class="ml-2 confirm-delete">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-sm btn-danger btn-icon" title="Delete">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
</table>
