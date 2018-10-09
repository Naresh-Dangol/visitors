
 <li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{!! route('home') !!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
</li> 
@if(Auth::user()->user_role =='super_admin')
<li class="{{ Request::is('visitors*') ? 'active' : '' }}">
    <a href="{!! route('visitors.index') !!}"><i class="fa fa-edit"></i><span>Visitors</span></a>
</li>
@else
<li class="{{ Request::is('visitors*') ? 'active' : '' }}">
    <a href="{!! route('visitors.index') !!}"><i class="fa fa-edit"></i><span>Visitors</span></a>
</li>
@endif

<li class="{{ Request::is('visitors*') ? 'active' : '' }}">
    <a href="{!! url('/global-setting') !!}"><i class="fa fa-cog"></i><span>Global Setup</span></a>
</li>

<!-- <li class="{{ Request::is('visitorDetails*') ? 'active' : '' }}">
    <a href="{!! route('visitorDetails.index') !!}"><i class="fa fa-edit"></i><span>Visitor Details</span></a>
</li>

<li class="{{ Request::is('visitorRecords*') ? 'active' : '' }}">
    <a href="{!! route('visitorRecords.index') !!}"><i class="fa fa-edit"></i><span>Visitor Records</span></a>
</li> -->

