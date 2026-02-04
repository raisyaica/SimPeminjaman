<nav class="sidebar" id="sidebar">

    <div class="sidebar__logo">
        <div class="sidebar__logo-icon"><span class="mdi mdi-package-variant-closed"></span></div>
        <div class="sidebar__logo-text">
            SimPeminjaman
            <span>Sistem Manajemen</span>
        </div>
    </div>

    <div class="sidebar__nav">

        <div class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="nav-link__icon mdi mdi-view-dashboard"></span>
                Dashboard
            </a>
        </div>

        <div class="nav-section-label">Manajemen Data</div>

        <div class="nav-item">
            <a href="{{ route('barang.index') }}" class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}">
                <span class="nav-link__icon mdi mdi-package-variant"></span>
                Barang
            </a>
        </div>

        <div class="nav-item">
            <a href="{{ route('peminjam.index') }}" class="nav-link {{ request()->routeIs('peminjam.*') ? 'active' : '' }}">
                <span class="nav-link__icon mdi mdi-account-group"></span>
                Peminjam
            </a>
        </div>

        <div class="nav-section-label">Transaksi</div>

        <div class="nav-item">
            <a href="{{ route('transaksi.index') }}" class="nav-link {{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
                <span class="nav-link__icon mdi mdi-swap-horizontal-bold"></span>
                Peminjaman
            </a>
        </div>

    </div>

    <div class="sidebar__footer">
        <div class="sidebar__user">
            <div class="sidebar__avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="sidebar__user-info">
                <div class="sidebar__user-name">{{ auth()->user()->name }}</div>
                <div class="sidebar__user-email">{{ auth()->user()->email }}</div>
            </div>
        </div>
    </div>

</nav>
