
<div class="col-md-3">
  <div class="form-group">
    <label><b>{{__("País")}}</b></label>
    <select class="form-control" wire:change="changeCountry($event.target.value)">
      <option selected="selected" hidden>{{$country->name}}</option>
      @foreach (App\Models\Country::all() as $current_country)
        <option value="{{$current_country->id}}">{{$current_country->name}}</option>
      @endforeach
    </select>
  </div>
</div>
          
<div class="col-md-3">          
  <div class="form-group">          
    <label><b>{{__("Departamento")}}</b></label>
    <select class="form-control" wire:change="changeDepartment($event.target.value)">
      <option selected="selected" hidden>{{$department->name}}</option>
      @foreach ($country->departments()->getResults() as $current_department)
        <option value="{{$current_department->id}}">{{$current_department->name}}</option>
      @endforeach
    </select>
  </div>
</div>
          
<div class="col-md-3">
  <div class="form-group">
    <label><b>{{__("Ciudad")}}</b></label>
    <select class="form-control" wire:change="changeCity($event.target.value)">
      <option selected="selected" hidden>{{$city->name}}</option>
      @foreach ($department->cities()->getResults() as $current_city)
        <option value="{{$current_city->id}}">{{$current_city->name}}</option>
      @endforeach
    </select>
  </div>
</div>