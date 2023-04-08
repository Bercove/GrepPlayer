@if(Session::has('notification') && session()->get('type') == 'error')
    <script>

        $.toast({
            heading: '{!! session()->get('notificationTitle') !!}',
            text: '{!! session()->get('notificationMessage') !!}',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 10000,
            stack: 6
        });

    </script>
@endif