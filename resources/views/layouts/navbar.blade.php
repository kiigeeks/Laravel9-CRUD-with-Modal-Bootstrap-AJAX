
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('plants') }}">Laravel9-AJAX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('plants') }}">Plants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('category') ? 'active' : '' }}" href="{{ route('category') }}">Category</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
