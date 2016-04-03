@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('users._current-user-info')
            </div>

            <div class="col-md-6">
            	<form method="POST" action="{{ route('tweets.store') }}">
            		{{ csrf_field() }}
            		<div class="form-group">
            			<textarea name="body" class="form-control" rows="3"></textarea>
            		</div>
            		<div class="form-group">
            			<button type="submit" name="submit" class="btn btn-primary">Tweet</button>
            		</div>
            	</form>

				<ul class="Tweets Box list-unstyled">
					@foreach( $tweets as $tweet )
						<li>
                            <div class="Tweet Media flexRow">
                                <div class="Media__figure">
                                    <img src="{{ asset('images/avatar.jpeg') }}" 
                                        alt="{{ $user->name }}" 
                                        title="{{ $user->name }}" 
                                        width="48" height="48" />
                                </div>

                                <div class="Media__content">
                                    <div class="Media__header">
                                        <a href="#">
                                            <strong class="Media__header--name">{{ $tweet->user->name }}</strong> 
                                            <small class="Media__header--username">{{ '@'.$tweet->user->username }}</small>
                                        </a>
                                        <span class="Media__header--time">{{ $tweet->created_at->diffForHumans() }}</span>
                                    </div>

                                    <div class="Media__body">
                                        <p>
                                            {!! $tweet->body !!}
                                        </p>
                                    </div>  

                                    <div class="Media__footer">
                                        <ul class="list-unstyled flexRow">
                                            <li class="Media__footer--action">
                                                <a href="#">
                                                    <i class="fa fa-reply"></i>
                                                </a>
                                            </li>
                                            <li class="Media__footer--action">
                                                <a href="#">
                                                    <i class="fa fa-retweet"></i>
                                                </a>
                                            </li>
                                            <li class="Media__footer--action">
                                                <a href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="Media__footer--action">
                                                <a href="#">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
						</li>
					@endforeach
				</ul>	

                {!! $tweets->render() !!}
            </div>

            <div class="col-md-3">
                <div class="WhoToFollow Box">
                    <h4 class="WhoToFollow__title">Who to follow 
                        <small><a href="{{ route('peopleToFollow') }}">View all</a></small>
                    </h4>
                    <ul class="UsersToFollow list-unstyled">
                        @foreach( $peopleToFollow as $user )
                        <li>
                            <div class="Media">
                                <div class="Media__figure">
                                    <img src="{{ asset('images/avatar.jpeg') }}" 
                                        alt="{{ $user->name }}" 
                                        title="{{ $user->name }}" 
                                        width="48" height="48"
                                        class="img-responsive" />
                                </div>
                                <div class="Media__content">
                                    <div class="Media__header">
                                        <a href="#">
                                            <strong class="Media__header--name">{{ $user->name }}</strong> 
                                            <small class="Media__header--username">{{ '@'.$user->username }}</small>
                                        </a>
                                    </div>
                                    <form method="POST" action="{{ route('follow') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="user_id" value="{{ $user->id }}" />
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-sm btn-primary">Follow</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
	</div>

@endsection