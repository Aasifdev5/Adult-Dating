
<li class="nav-item {{ Request::is('conversations*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('conversations*') ? 'active' : '' }}" href="{{ url('conversations')  }}">
        <i class="fa fa-commenting nav-icon me-4"></i>
        <span>{{ __('messages.conversations') }}</span>
    </a>
</li>

