<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
            {!! Form::password('password', ['class' => 'form-control', $formMode === 'create' ? 'required' : '']) !!}
            @if ($formMode === 'edit')
                <small class="form-text text-muted">Leave blank to keep current password</small>
            @endif
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3{{ $errors->has('role_id') ? ' has-error' : '' }}">
            {!! Form::label('role_id', 'Role', ['class' => 'form-label']) !!}
            {!! Form::select('role_id', \App\Models\Role::pluck('display_name', 'id')->toArray(), null, [
                'class' => 'form-control',
                'required' => 'required',
                'placeholder' => 'Select Role',
            ]) !!}
            {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3{{ $errors->has('is_active') ? ' has-error' : '' }}">
            {!! Form::label('is_active', 'Status', ['class' => 'form-label']) !!}
            <div class="form-check form-switch">
                {!! Form::checkbox('is_active', 1, $formMode === 'create' ? true : null, [
                    'class' => 'form-check-input',
                    'id' => 'is_active',
                ]) !!}
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            {!! $errors->first('is_active', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3{{ $errors->has('avatar') ? ' has-error' : '' }}">
            {!! Form::label('avatar', 'Profile Picture', ['class' => 'form-label']) !!}
            {!! Form::file('avatar', ['class' => 'form-control', 'accept' => 'image/*']) !!}
            @if ($formMode === 'edit' && isset($user) && $user->avatar)
                <div class="mt-2">
                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="img-thumbnail"
                        style="max-height: 100px;">
                </div>
            @endif
            {!! $errors->first('avatar', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>

<br>
<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel and Back</a>
</div>
