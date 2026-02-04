<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Sistem Peminjaman Barang')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    @stack('styles')
</head>

<body>

    @include('layouts.sidebar')

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <header class="topbar">
        <div class="topbar__left">
            <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
                <span class="mdi mdi-menu" style="font-size:22px;"></span>
            </button>
            <h2 class="topbar__title">@yield('page_title', 'Dashboard')</h2>
        </div>
        <div class="topbar__right">
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" class="topbar__logout">
                    <span class="mdi mdi-logout" style="font-size:16px;"></span>
                    Logout
                </button>
            </form>
        </div>
    </header>

    <div class="main-wrapper">
        <div class="main-content">

            @if (session()->has('success'))
                <div class="alert alert--success">
                    <span class="alert__icon mdi mdi-check-circle"></span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert--error">
                    <span class="alert__icon mdi mdi-close-circle"></span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            @if (session()->has('warning'))
                <div class="alert alert--warning">
                    <span class="alert__icon mdi mdi-alert"></span>
                    <span>{{ session('warning') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert--error">
                    <span class="alert__icon mdi mdi-close-circle"></span>
                    <div>
                        <strong>Terjadi kesalahan validasi:</strong>
                        <ul style="margin-top:6px; padding-left:16px;">
                            @foreach ($errors->all() as $error)
                                <li style="margin-bottom:2px; font-size:13px;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @yield('content')

        </div>
    </div>

    <div class="modal-overlay" id="deleteModal">
        <div class="modal">
            <button class="modal__close" id="modalClose">&times;</button>
            <div class="modal__icon"><span class="mdi mdi-delete-outline" style="font-size:26px;"></span></div>
            <h3>Konfirmasi Hapus</h3>
            <p>Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak bisa dibatalkan.</p>
            <div class="modal__actions">
                <button class="btn btn-secondary btn-sm" id="modalCancel">Batalkan</button>
                <button class="btn btn-danger btn-sm" id="modalConfirm">Hapus</button>
            </div>
        </div>
    </div>

    <script>
        (function() {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('sidebarToggle');
            const overlay = document.getElementById('sidebarOverlay');

            function openSidebar() {
                sidebar.classList.add('open');
                overlay.classList.add('show');
            }

            function closeSidebar() {
                sidebar.classList.remove('open');
                overlay.classList.remove('show');
            }

            toggle?.addEventListener('click', openSidebar);
            overlay?.addEventListener('click', closeSidebar);
        })();

        (function() {
            const modal = document.getElementById('deleteModal');
            const close = document.getElementById('modalClose');
            const cancel = document.getElementById('modalCancel');
            const confirm = document.getElementById('modalConfirm');
            let targetForm = null;

            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    targetForm = this.closest('form');
                    modal.classList.add('show');
                });
            });

            function closeModal() {
                modal.classList.remove('show');
                targetForm = null;
            }

            close?.addEventListener('click', closeModal);
            cancel?.addEventListener('click', closeModal);
            modal?.addEventListener('click', function(e) {
                if (e.target === modal) closeModal();
            });

            confirm?.addEventListener('click', function() {
                if (targetForm) targetForm.submit();
            });
        })();

        (function() {
            document.querySelectorAll('.alert').forEach(function(el) {
                setTimeout(function() {
                    el.style.transition = 'opacity .4s, transform .4s';
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(-8px)';
                    setTimeout(function() {
                        el.remove();
                    }, 420);
                }, 4000);
            });
        })();
    </script>

    @stack('scripts')
</body>

</html>
