    <br>
    <script type="text/javascript">
        var message='';
    </script>
@if($errors->any())
    @foreach($errors->all() as $error)
                <script type="text/javascript">
                    var message=message+'<br> - {{ $error }}';
                </script>
    @endforeach
    <script type="text/javascript">                
               $.confirm({
                        title: 'Encountered an error!',
                        content: message,
                        type: 'orange',
                        typeAnimated: true,
                        buttons: {
                            tryAgain: {
                                text: 'Try again',
                                btnClass: 'btn-orange',
                                action: function(){
                                }
                            },
                            close: function () {
                            }
                        }
                    });
    </script>
@endif    

@if(session()->has('success'))
    <script type="text/javascript">
                $.confirm({
                        icon: 'fa fa-smile-o',
                        theme: 'modern',
                        closeIcon: true,
                        animation: 'scale',
                        type: 'blue',
                        title: 'bien!',
                        content: '{{ session()->get('success') }}',
                    });
    </script>
@endif

@if(session()->has('warning'))
    <script type="text/javascript">
               $.confirm({
                        title: 'Warning, Encountered an error!',
                        content: '{{ session()->get('warning') }}',
                        type: 'orange',
                        typeAnimated: true,
                        buttons: {
                            tryAgain: {
                                text: 'Try again',
                                btnClass: 'btn-orange',
                                action: function(){
                                }
                            },
                            close: function () {
                            }
                        }
                    });
    </script>
@endif