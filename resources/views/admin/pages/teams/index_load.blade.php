@if(isset($results) && count($results) > 0)
@foreach($results as $team)
<div id="row_team_{{$team->id}}" class="col-12 pb-2 mb-4 border-bottom rounded">
    <div class="d-flex flex-wrap gap-2 align-items-center">
        <div class="flex-grow-1 d-flex align-items-center">
            @if(isset($team->thumb) && $team->thumb != '')
            <div>
                <img src="{{ asset('/storage/'. $team->thumb) }}" alt="{{$team->name}}" class="avatar-md rounded-circle me-2">
            </div>
            @endif
            <div>
                <h4 class="h4 mb-1 fw-bold">{{$team->name}}</h4>
                @if(isset($team->role) && $team->role != '')
                <p class="mb-0">{{$team->role}}</p>
                @endif
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-sm btn-info button-teams-edit" data-team-id="{{$team->id}}">Editar</button>
            <button type="button" class="btn btn-sm btn-danger button-teams-delete" data-team-id="{{$team->id}}" data-team-name="{{$team->name}}">Apagar</button>
        </div>
    </div>
</div><!-- col-12 -->
@endforeach
@else
<div class="alert alert-warning mb-0">Nenhum resultado foi localizado...</div>
@endif