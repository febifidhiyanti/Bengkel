<div class="sidebar-inner slimscrollleft">
    <!--- Divider -->
    <div id="sidebar-menu">
        <ul>

            <li class="text-muted menu-title">Menu</li>

            <li class="has_sub">
                <a href="/admin" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> </a>
            </li>
            
            @if(auth()->user()->role == 'admin')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="glyphicon glyphicon-tasks"></i> <span> Master data </span> <span class="menu-arrow"></span> </a>
                <ul class="list-unstyled">
                    <li><a href="/admin/informasi">Informasi</a></li>
                    <li><a href="/admin/pegawai">Pegawai</a></li>
                    <li><a href="/admin/perbaikan">Perbaikan</a></li>
                </ul>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-light-bulb"></i><span> Layanan</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="/admin/pengajuan/">Pengajuan</a></li>
                    <li><a href="/admin/data_perbaikan/">Data Perbaikan</a></li>
                    <li><a href="/admin/data_antar/">Data Antar</a></li>
                    <li><a href="/chat">Chatting</a></li>
                    <li><a href="/video_chat">Video</a></li>
                </ul>
            </li>
            @endif

            @if(auth()->user()->role == 'admin kas')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-shopping-cart"></i><span> Pembayaran</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="/admin/pembayaran">Pembayaran</a></li>
                </ul>
            </li>
            @endif

            @if(auth()->user()->role == 'admin')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-book"></i><span> Laporan</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="/admin/informasi/laporan">Informasi</a></li>
                    <li><a href="/admin/pegawai/laporan">Pegawai</a></li>
                    <li><a href="/admin/perbaikan/perbaikan/laporan">Perbaikan</a></li>
                    <li><a href="/admin/data-pengajuan/laporan">Pengajuan-Data Perbaikan</a></li>
                </ul>
            </li>
            @endif
            
            @if(auth()->user()->role == 'super admin')
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-book"></i><span> Laporan</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="/admin/informasi/laporan">Informasi</a></li>
                    <li><a href="/admin/pegawai/laporan">Pegawai</a></li>
                    <li><a href="/admin/pelanggan/laporan">Pelanggan</a></li>
                    <li><a href="/admin/perbaikan/perbaikan/laporan">Perbaikan</a></li>
                    <li><a href="/admin/data-pengajuan/laporan">Pengajuan-Data Perbaikan</a></li>
                </ul>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i><span> User </span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="/admin/admin">Admin</a></li>
                    <li><a href="/admin/pelanggan">Pelanggan</a></li>
                </ul>
            </li>
            @endif

        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>