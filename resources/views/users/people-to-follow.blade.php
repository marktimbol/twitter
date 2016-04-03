@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('users._current-user-info')
            </div>

            <div class="col-md-6">
                <h2>Who to follow</h2>
                <div class="row">
                    @foreach( $peopleToFollow as $user )
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="UserCard">
                                <div class="UserCard__bg"></div>
                                <div class="Box">
                                    <div class="flexRow">
                                        <div class="UserCard__avatar">
                                            <img src="{{ asset('images/avatar.jpeg') }}" alt="{{ $user->name }}" title="{{ $user->name }}" class="img-thumbnail" />
                                        </div>

                                        <div class="UserCard__names">
                                            <h2 class="UserCard__name">{{ $user->name }}</h2>
                                            <small class="UserCard__username">{{ '@'.$user->username }}</small>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-3">

            </div>

        </div>
	</div>

@endsection