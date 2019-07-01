

        <div class="flex-center position-ref full-height">

                <div class="top-right links">

                        <a href="{{ route('client::login') }}">Login</a>

                        @if (Route::has('client::register:post'))
                            <a href="{{ route('client::register:post') }}">Register</a>
                        @endif

                </div>
