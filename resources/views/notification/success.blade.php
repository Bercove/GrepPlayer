@if(Session::has('notification') && session()->get('type') == 'success')
    <script>

        $.toast({
            heading: '{!! session()->get('notificationTitle') !!}',
            text: '{!! session()->get('notificationMessage') !!}',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 10000,
            stack: 6
        });

    </script>
@endif