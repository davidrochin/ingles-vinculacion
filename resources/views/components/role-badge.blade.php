
<span class="badge 
@if($role->name == 'admin')
badge-dark
@elseif($role->name == 'coordinator')
badge-success
@else
badge-light
@endif
">
{{ $role->description }}
</span>