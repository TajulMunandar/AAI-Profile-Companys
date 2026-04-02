<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="horizontal">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    @include('partials.head')

    {{-- Menambah additional Script diadiawal --}}
    @stack('css')
</head>

<body class="link-sidebar">
    @include('partials.preload')
    @include('partials.toast')
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            @include('partials.sidebar')
        </aside>
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                @include('partials.header')
            </header>
            @if (!request()->is('surat/*'))
                <aside class="left-sidebar with-horizontal">
                    @include('partials.sidebar-horizontal')
                </aside>
            @endif
            <!--  Header End -->

            <div class="body-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <script>
                function handleColorTheme(e) {
                    document.documentElement.setAttribute("data-color-theme", e);
                }
            </script>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    @include('partials.scripts')

    {{-- Menambah additional Script diakhir --}}
    @stack('js')
    <script>
        let deferredPrompt;
        const installButton = document.getElementById('install-button');
        const installListItem = document.getElementById('install-app-item');

        // Fungsi untuk sembunyikan jika sudah terinstall
        function hideInstallIfStandalone() {
            const isStandalone = window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone ===
                true;
            if (isStandalone) {
                installListItem.style.display = 'none';
            }
        }

        // Jalankan saat halaman dimuat
        window.addEventListener('load', hideInstallIfStandalone);

        // Tangkap event sebeluminstallprompt
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            installListItem.style.display = 'block';

            installButton.addEventListener('click', () => {
                installButton.disabled = true;
                deferredPrompt.prompt();

                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the A2HS prompt');
                        installListItem.style.display = 'none'; // Sembunyikan seluruh <li>
                    } else {
                        console.log('User dismissed the A2HS prompt');
                        installButton.disabled = false;
                    }
                    deferredPrompt = null;
                });
            });
        });
    </script>


    @RegisterServiceWorkerScript
</body>

</html>
