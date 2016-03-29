@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>

            <div class="col-md-6">

            	<form method="POST" action="{{ route('follow', $user->id) }}">
            		{{ csrf_field() }}
            		<input type="hidden" name="user_id" value="{{ $user->id }}" />
            		<div class="form-group">
            			<button type="submit" name="submit" class="btn btn-primary">Follow</button>
            		</div>
            	</form>

                <form method="POST" action="{{ route('unfollow', $user->id) }}">
                    {{ csrf_field() }}
                    {!! method_field('DELETE') !!}
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-danger">Unfollow</button>
                    </div>
                </form>

				<ul>
					@foreach( $user->tweets as $tweet )
						<li>
							{{ $tweet->body }}
						</li>
					@endforeach
				</ul>	
            </div>

            <div class="col-md-3">

            </div>

        </div>
	</div>

@endsection