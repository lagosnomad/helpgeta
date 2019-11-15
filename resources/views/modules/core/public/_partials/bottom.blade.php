@routes
<script>
    window.rootToastMsg = "{{session('toast_msg')}}";
</script>
<script src="{{ asset('assets/public/js/app.js') }}"></script>

<!--Start of Tawk.to Script-->
@if(app()->environment() == 'production')
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5af3f3375f7cdf4f05340572/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
@endif
<!--End of Tawk.to Script-->

@yield('js')
