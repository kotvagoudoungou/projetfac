@extends('layouts.app_home', $categories)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">   </div>

                <div class="card-body">
                    @if (session('id'))
                        <div class="alert alert-success" role="alert">
                            {{ session('id') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
