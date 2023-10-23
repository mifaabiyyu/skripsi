<form  id="form-show" name="form-show">
    <div class="modal-body">
        <div class="input-group mb-3">
            <button type="button" class="btn btn-info"><i class="ni ni-single-02 text-white"></i></button>
            <input type="text" class="form-control" placeholder="Enter Roles Name Here" value="{{ $role->name }}" aria-label="name" id="name" name="name" disabled>
        </div>
        <div class="form-group">
            <label for="name">Permissions</label>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkPermissionAll" value="1" {{ App\Models\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }} disabled>
                <label class="custom-control-label" for="checkPermissionAll">All</label>
            </div>
            <hr>
            @php $i = 1; @endphp
            @foreach ($permission_groups as $group)
                <div class="row">
                    @php
                        $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                        $j = 1;
                    @endphp
                    
                    <div class="col-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                        </div>
                    </div>

                    <div class="col-9 role-{{ $i }}-management-checkbox">
                       
                        @foreach ($permissions as $permission)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" disabled>
                                <label class="custom-control-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                            @php  $j++; @endphp
                        @endforeach
                        <br>
                    </div>

                </div>
                @php  $i++; @endphp
            @endforeach
        </div>
        <hr>
    </div>
</form>