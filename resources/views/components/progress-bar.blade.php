<div class="mb-3">
    <label class="font-bold">{{$titulo}}</label>
    <div class="progress">
      <div class="progress-bar" role="progressbar" style="width: {{$r1}}%" aria-valuenow="{{$r1}}" aria-valuemin="0" aria-valuemax="100">{{$r1}}%</div>
      <div class="progress-bar bg-success" role="progressbar" style="width: {{$r2}}%" aria-valuenow="{{$r2}}" aria-valuemin="0" aria-valuemax="100">{{$r2}}%</div>
      <div class="progress-bar bg-info" role="progressbar" style="width: {{$r3}}%" aria-valuenow="{{$r3}}" aria-valuemin="0" aria-valuemax="100">{{$r3}}%</div>
      <div class="progress-bar bg-warning" role="progressbar" style="width: {{$r5}}%" aria-valuenow="{{$r5}}" aria-valuemin="0" aria-valuemax="100">{{$r5}}%</div>
      <div class="progress-bar bg-danger" role="progressbar" style="width: {{$r4}}%" aria-valuenow="{{$r4}}" aria-valuemin="0" aria-valuemax="100">{{$r4}}%</div>
    </div>
    <div class="row">
      <label class="mx-4 col">
        <button  class="btn btn-sm text-normal btn-primary"></button>
        <small>Totalmente de acuerdo</small>
      </label>
      <label class="mx-4 col">
        <button  class="btn btn-sm text-normal btn-success"></button>
        <small>De acuerdo</small>
      </label>
      <label class="mx-4 col">
        <button  class="btn btn-sm text-normal btn-info"></button>
        <small>Neutral</small>
      </label>
      <label class="mx-4 col">
        <button  class="btn btn-sm text-normal btn-warning"></button>
        <small>En desacuerdo</small>
      </label>
      <label class="mx-4 col">
        <button  class="btn btn-sm text-normal btn-danger"></button>
        <small>Totalmente en desacuerdo</small>
      </label>
    </div>
</div>