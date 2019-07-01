@extends('layouts.admin')


@section('title')
{!! trans('manage_schools.create.label') !!}
@endsection

@section('h1')
{!! trans('manage_schools.create.label') !!}
@endsection

@section('content')


<form method="post" action="{{route('admin::schools.store')}}">
    {{csrf_field()}}
<div class="row">

    <div class="input-field col s5  offset-s1">
        <label class="active">{{trans('manage_schools.create.form.name.label')}}</label>
        <input type="text" name="name" class="validate" placeholder="{{trans('manage_schools.create.form.name.placeholder')}}" required  />

    </div>
    <div class=" input-field col s5 ">
        <label class="active">{{trans('manage_schools.create.form.phone.label')}}</label>
        <input type="text" name="phone" class="validate" placeholder="{{trans('manage_schools.create.form.phone.placeholder')}}" required  />

    </div>

    <div class=" input-field col s5 offset-s1">
        <label class="active">{{trans('manage_schools.create.form.street_name.label')}}</label>
        <input type="text" name="street_name" class="validate" placeholder="{{trans('manage_schools.create.form.street_name.placeholder')}}" required  />

    </div>


    <div class=" input-field col s5 ">
        <label class="active">{{trans('manage_schools.create.form.street_no.label')}}</label>
        <input type="text" name="street_no" class="validate" placeholder="{{trans('manage_schools.create.form.street_no.placeholder')}}" required  />

    </div>

    <div class=" input-field col s5 offset-s1">
        <label class="active">{{trans('manage_schools.create.form.neighbourhood.label')}}</label>
        <input type="text" name="neighbourhood" class="validate" placeholder="{{trans('manage_schools.create.form.neighbourhood.placeholder')}}" required  />

    </div>
    <div class=" input-field col s5 ">
        <label class="active">{{trans('manage_schools.create.form.zip_code.label')}}</label>
        <input type="text" name="zip_code" class="validate" placeholder="{{trans('manage_schools.create.form.zip_code.placeholder')}}" required  />


    </div>
    <div class=" input-field col s5 offset-s1">

        <label class="active">{{trans('manage_schools.create.form.state.label')}}</label>
        <select name="state" class="validate" v-model="state" required>
            <option value="">{!! trans('checkout.shipment.form.state.placeholder') !!}</option>
    		<option :value="state" v-for="state in states" v-text="state"></option>
        </select>

    </div>
    <div class=" input-field col s5 ">

        <label class="active">{{trans('manage_schools.create.form.municipalities.label')}}</label>
        <select name="municipality" v-model="municipality"  >
    		<option value="">{!! trans('checkout.shipment.form.municipality.placeholder') !!}</option>
    		<option :value="municipality" v-for="municipality in municipalities" v-text="municipality"></option>
    	</select>

    </div>

    <div class=" input-field col s5 offset-s1">
        <label class="active">{{trans('manage_schools.create.form.city.label')}}</label>
        <input type="text" name="city" class="validate" placeholder="{{trans('manage_schools.create.form.city.placeholder')}}" required  />

    </div>



    <div class="col s10  offset-s1 ">
        <div class="pull-right">
            <button class="btn waves-effect waves-light" type="submit">{{trans('manage_schools.create.form.save')}}</button>

        </div>
    </div>
</div>
</form>
@endsection

@section('vue_store')
    <script>
		mainVueStore.states= {!!json_encode($states)!!};
    </script>

@endsection
@section('section_script')
    <script  src="{{ asset('js/admin/school.js')}}"></script>
@endsection
