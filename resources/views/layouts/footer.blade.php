<footer class="footer footer-black footer-white">
    <div class="container-fluid">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                   
                </ul>
            </nav>
            <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>{{ __(', made with ') }}<i class="fa fa-heart heart"></i>
                    {{ __(' by ') }}
                    <a class="@if(Auth::guest()) text-black @endif" href="https://techsimba.in/" target="_blank">{{ __('Tech Simba') }}</a>
                    {{ __(' and ') }}
                    <a class="@if(Auth::guest()) text-black @endif" target="_blank" href="#">{{ __('UPDIVISION') }}</a>
                </span>
            </div>
        </div>
    </div>
</footer>