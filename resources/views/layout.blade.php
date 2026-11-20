<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="app-container">
        <!-- Header -->
        <header class="main-header">
            <div class="header-content">

                <div class="brand">
                    <img
                        src="{{ asset('images/inventory system.jpg') }}"
                        alt="Inventory Icon"
                        class="brand-image"
                        width="45"
                        height="45"
                    >
                    <div>
                        <h2>Inventory System</h2>
                        <p>Management Dashboard</p>
                    </div>
                </div>

            </div>
        </header>

        <!-- Navigation -->
        <nav class="main-nav">

            <a href="{{ route('products.index') }}"
               class="{{ request()->is('products*') ? 'active' : '' }}">
                Products
            </a>

            <a href="{{ route('stocks.index') }}"
               class="{{ request()->is('stocks*') ? 'active' : '' }}">
                Stocks
            </a>

            <a href="{{ route('transactions.index') }}"
               class="{{ request()->is('transactions*') ? 'active' : '' }}">
                Transactions
            </a>

        </nav>

        <!-- Main Content -->
        <main class="main-content">

            @yield('content')

        </main>

        <!-- Footer -->
        <footer class="main-footer">
            <p>Developed by JESIKA IRMAWATI</p>
            <p>&copy; {{ date('Y') }} Inventory System. All Rights Reserved.</p>
        </footer>

    </div>

    <!-- Success Feedback Modal -->
    @if (session('success'))
        <div class="feedback-overlay" id="feedback-overlay">

            <div class="feedback-modal">

                <div class="feedback-icon">
                    ✓
                </div>

                <h2>Success!</h2>

                <p>{{ session('success') }}</p>

                <button type="button" id="feedback-ok">
                    OK
                </button>

            </div>

        </div>
    @endif

    <!-- JavaScript Feedback -->
    <script>
        const feedbackOverlay = document.getElementById('feedback-overlay');
        const feedbackButton = document.getElementById('feedback-ok');

        if (feedbackButton) {
            feedbackButton.addEventListener('click', function () {
                feedbackOverlay.remove();
            });
        }
    </script>

</body>
</html>