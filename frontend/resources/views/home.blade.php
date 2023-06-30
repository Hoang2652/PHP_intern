@extends('masterlayout')
@section('home')
    <div>
        <div class="title">
            <h2>
                A joke a day keeps the doctor away
            </h2>   
            <p>
                If you joke wrong away, you teach have to pay. (Serious)
            </p>
        </div>
        <div class="content">
            <p>
                @if(isset($joke->joke))
                    {{ $joke->joke }}
                @else
                    {{ $joke }}
                @endif
            </p>
        </div>
        <div class="actions">
            @php
                $username = Session::get('username');
            @endphp
            @if(isset($username))
                <button type="button" class="actions-funny actions-joke vote-funny">This is Funny!</button>
                <button type="button" class="actions-notfunny actions-joke vote-notfunny">This is not funny.</button>
            @else
                <button type="button" class="actions-funny actions-joke" id="liveToastBtn">This is Funny!</button>
                <button type="button" class="actions-notfunny actions-joke" id="liveToastBtn">This is not funny.</button>
            @endif
            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Login</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Please login to vote
                    </div>
                </div>
              </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.vote-funny').on('click', function(){     
                $.ajax({
                    url: '/actions-funny',
                    method: 'GET', 
                    success: function(data) {
                        // console.log(data);
                        if(data.joke)
                            $('.content').text(data.joke);
                        else
                        $('.content').text(data);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('.vote-notfunny').on('click', function(){     
                $.ajax({
                    url: '/actions-notfunny',
                    method: 'GET', 
                    success: function(data) {
                        // console.log(data);
                        if(data.joke)
                            $('.content').text(data.joke);
                        else
                        $('.content').text(data);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
        
        const toastTrigger = document.getElementById('liveToastBtn')
        const toastLiveExample = document.getElementById('liveToast')

        if (toastTrigger) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastTrigger.addEventListener('click', () => {
            toastBootstrap.show()
        })
        }
    </script>
@endsection