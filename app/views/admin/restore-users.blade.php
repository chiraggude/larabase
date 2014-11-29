@if(count($deleted_users))

    <h3>Restore User Accounts</h3>

    <div class="col-md-6">

        {{ Form::open(['route' => 'admin.restore-user', 'class' => 'form-horizontal']) }}

        {{ Form::selectField('user_id', $deleted_users, null, 'Select User for Account Restoration') }}

        {{ Form::submitField('Restore User Account') }}

        {{ Form::close() }}

    </div>

@else

    <h3 class="text-muted">0 users have deleted their account</h3>

@endif