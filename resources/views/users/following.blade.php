@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('users._current-user-info')
            </div>

            <div class="col-md-9">
                <h2>Following</h2>
                <div class="row Following">
                    @foreach( $following as $user )
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="UserCard">
                                <div class="UserCard__bg"></div>
                                <div class="Box">
                                    <div class="flexRow">
                                        <div class="UserCard__avatar">
                                            <img src="{{ asset('images/avatar.jpeg') }}"
                                                alt="{{ $user->name }}" 
                                                title="{{ $user->name }}" 
                                                width="70" height="70" 
                                                class="img-thumbnail" />
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

        </div>
	</div>

@endsection