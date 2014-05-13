<div id="footer">
    <div class="container">
        <p class="pull-right text-muted">Current Time: {{ Carbon\Carbon::now()->toTimeString() }} | Today: {{ Carbon\Carbon::now()->toFormattedDateString() }}</p>
        <p class="text-muted credit">© PROJECT X, {{ Carbon\Carbon::now()->year }}</p>
    </div>
</div>