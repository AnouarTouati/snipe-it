<div>
    <p>New Livewire Personal Access Token Component</p>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-right" style="display: flex; justify-content: space-between; align-items: center;">
                <a class="btn btn-info btn-sm action-link pull-right"
                   onclick="$('#modal-create-token').modal('show');"
                >
                    Create New Token
                </a>
            </div>
        </div>
        <div class="panel-body">
            <!-- No Tokens Notice -->
            @if($tokens->count() === 0)
                <p class="m-b-none"
                >
                    You have not created any personal access tokens.
                </p>
            @endif

            <!-- Personal Access Tokens -->
            <table class="table table-borderless m-b-none">
                @if($tokens->count() > 0)
                    <thead>
                    <tr>
                        <th class="col-md-3">Name</th>
                        <th class="col-md-2">Created</th>
                        <th class="col-md-2">Expires</th>
                        <th class="col-md-2"><span class="sr-only">Delete</span></th>
                    </tr>
                    </thead>
                @endif
                @foreach($tokens as $token)
                    <tbody>
                    <tr>
                        <!-- Client Name -->
                        <td style="vertical-align: middle;">
                            {{ $token->name }}
                        </td>

                        <td style="vertical-align: middle;">
                            {{ $token->created_at }}
                        </td>

                        <td style="vertical-align: middle;">
                            {{ $token->expires_at }}
                        </td>
                        <!-- Delete Button -->
                        <td style="vertical-align: middle;" class="text-right">
                            <a class="action-link btn btn-danger btn-sm" wire:click="deleteToken('{{ $token->id }}')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!-- Create Token Modal -->
    <div class="modal fade" id="modal-create-token" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">
                        Create Token
                    </h4>
                </div>

                <div class="modal-body">
                    <!-- Form Errors -->
                    @if($errors === true)
                        <div class="alert alert-danger"
                                {{--                     v-if="form.errors.length > 0"--}}
                        >
                            <p><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li
                                        {{--                                v-for="error in form.errors"--}}
                                >
                                    {{--                            {{ error }}--}}
                                </li>
                            </ul>
                        </div>
                    @endif

                    <!-- Create Token Form -->
                    <form class="form-horizontal" role="form"
                            {{--                      @submit.prevent="store"--}}
                    >
                        <!-- Name -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Name</label>

                            <div class="col-md-6">
                                <input id="create-token-name" type="text" aria-label="name" class="form-control" name="name"
                                       wire:model.defer="name"
                                >
                            </div>
                        </div>

                        <!-- Scopes -->
                        {{--                    <div class="form-group"--}}
                        {{--                         v-if="scopes.length > 0"--}}
                        {{--                    >--}}
                        {{--                        <label class="col-md-4 control-label">Scopes</label>--}}

                        {{--                        <div class="col-md-6">--}}
                        {{--                            <div--}}
                        {{--                                    v-for="scope in scopes"--}}
                        {{--                            >--}}
                        {{--                                <div class="checkbox">--}}
                        {{--                                    <label>--}}
                        {{--                                        <input type="checkbox"--}}
                        {{--                                               @click="toggleScope(scope.id)"--}}
                        {{--                                               :checked="scopeIsAssigned(scope.id)"--}}
                        {{--                                        >--}}

                        {{--                                        {{ scope.id }}--}}
                        {{--                                    </label>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                    </form>
                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn primary" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary"
                                                    wire:click="createToken(name)"
                    >
                        Create
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- View New Token Modal -->
    <x-personal-access-tokens.view-new-token />
</div>