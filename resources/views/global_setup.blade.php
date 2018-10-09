@extends('layouts.app')

@section('css')
    <style>
       
    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Global Settings
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                   {!! Form::model($global_setting, ['route' => ['update.global_setting'], 'method' => 'post','enctype'=>'multipart/form-data']) !!}
                    
                       <!-- Fullname Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('organisation_name', 'Organisation Name:') !!}
                            {!! Form::text('organisation_name', old('organisation_name'), ['class' => 'form-control','placeholder'=>'Enter Organisation Name','required']) !!}
                        </div>

                        <!-- Email Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::email('email', old('email'), ['class' => 'form-control','placeholder'=>'Enter Email','required']) !!}
                        </div>

                         
                         
                    <!-- Address2 Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('address', 'Address:') !!}
                            {!! Form::text('address', old('address'), ['class' => 'form-control','placeholder'=>'Enter Address2','required']) !!}
                        </div>
                          

                        

                        <div class="clearfix"></div>
            
                        <!-- Fav icon Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('fav_icon', 'Fav Icon:') !!}
                            {!! Form::file('fav_icon', old('fav_icon'), ['class' => 'form-control','required']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            <img src="{{asset('image/'.$global_setting->fav_icon)}}" class="img-responsive img-thumbnail">
                        </div>   
                        <div class="clearfix"></div>

                         <!-- logo Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('logo', 'Logo:') !!}
                            {!! Form::file('logo', old('logo'), ['class' => 'form-control','required']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            <img src="{{asset('image/'.$global_setting->logo)}}" class="img-responsive img-thumbnail">
                        </div>  

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('visitors.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                   </form>

           



                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')        
<script type="text/javascript">
    var data = {
    "bagmati": [
        "bhaktapur",
        "dhading",
        "kathmandu",
        "kavrepalanchok",
        "lalitpur",
        "nuwakot",
        "rasuwa",
        "sindhupalchok"
    ],
    "bheri": [
        "banke",
        "bardiya",
        "dailekh",
        "jajarkot",
        "surkhet"
    ],
    "dhawalagiri": [
        "baglung",
        "mustang",
        "myagdi",
        "parbat"
    ],
    "gandaki": [
        "gorkha",
        "kaski",
        "lamjung",
        "manang",
        "syangja",
        "tanahu"
    ],
    "janakpur": [
        "dhanusa",
        "dholkha",
        "mahottari",
        "ramechhap",
        "sarlahi",
        "sindhuli"
    ],
    "karnali": [
        "dolpa",
        "humla",
        "jumla",
        "kalikot",
        "mugu"
    ],
    "koshi": [
        "bhojpur",
        "dhankuta",
        "morang",
        "sankhuwasabha",
        "sunsari",
        "terhathum"
    ],
    "lumbini": [
        "arghakhanchi",
        "gulmi",
        "kapilvastu",
        "nawalparasi",
        "palpa",
        "rupandehi"
    ],
    "mahakali": [
        "baitadi",
        "dadeldhura",
        "darchula",
        "kanchanpur"
    ],
    "mechi": [
        "ilam",
        "jhapa",
        "panchthar",
        "taplejung"
    ],
    "narayani": [
        "bara",
        "chitwan",
        "makwanpur",
        "parsa",
        "rautahat"
    ],
    "rapti": [
        "dang deukhuri",
        "pyuthan",
        "rolpa",
        "rukum",
        "salyan"
    ],
    "sagarmatha": [
        "khotang",
        "okhaldhunga",
        "saptari",
        "siraha",
        "solukhumbu",
        "udayapur"
    ],
    "seti": [
        "achham",
        "bajhang",
        "bajura",
        "doti",
        "kailali"
    ]
};

var state_option = '<option>Select State</option>';
$.each(data, function(i, v) {
    state_option = state_option + '<option value="'+i+'">' + i.toUpperCase()+ '</option>';
});

$('#state').html(state_option);
$('#state').on('change', function(e) {
    e.preventDefault();
    var city_option = '<option>Select City</option>';
    var selected_state = $(this).val();
    var cities = data[selected_state];
    $.each(cities, function(i, v) {
        city_option = city_option + '<option value="'+v+'">' + v.toUpperCase()+ '</option>';
    });

    $('#city').html(city_option);

});


// $(function(){
//     var countryOptions;
//     $.getJSON('geojson.json',function(result){
//         $.each(result, function(i,country){
//             countryOptions+="<option value='"+country.code+"'>"+country.name+"</option>";
//         });
//         $('#country').html(countryOptions);
//     });
// });
</script>
@stop
