<div id="footer">
    <div class="container">
        <ul id="footer-nav" class="list-inline pull-right hidden-xs">
          <li><a href="{{ URL::to('about') }}">About</a></li>
          <li><a href="{{ URL::to('privacy') }}">Privacy Policy</a></li>
          <li><a href="{{ URL::to('terms') }}">Terms of Service</a></li>
          <li><a href="{{ URL::to('faqs') }}">FAQ's</a></li>
        </ul>
        <p class="text-muted credit">©{{ Carbon\Carbon::now()->year }} LARABASE</p>
    </div>
</div>