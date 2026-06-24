<header style="
    background: #1a3a5c;
    color: #fff;
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 60px;
">
    <div style="display:flex; align-items:center; gap:10px;">
        <div style="width:36px;height:36px;background:#fff;border-radius:8px;display:flex;align-items:center;justify-content:center;">
            <i class="ti ti-school" style="color:#1a3a5c;font-size:20px;"></i>
        </div>
        <div>
            <div style="font-size:15px;font-weight:600;">Quản lý Sinh viên</div>
            <div style="font-size:11px;color:#a8c0d6;">Trường Đại học ABC</div>
        </div>
    </div>
    <nav style="display:flex;gap:4px;align-items:center;">
        <a href="/home/index" style="color:#a8c0d6;text-decoration:none;font-size:13px;padding:6px 12px;border-radius:6px;display:flex;align-items:center;gap:6px;">
            <i class="ti ti-home"></i>Trang chủ
        </a>
        <a href="/sinhvien/index" style="color:#a8c0d6;text-decoration:none;font-size:13px;padding:6px 12px;border-radius:6px;display:flex;align-items:center;gap:6px;">
            <i class="ti ti-users"></i>Quản lý sinh viên
        </a>
        <a href="/auth/logout" style="
            margin-left:8px;
            color:#f4a0a0;
            text-decoration:none;
            font-size:13px;
            padding:6px 12px;
            border-radius:6px;
            border:1px solid rgba(220,80,80,0.35);
            display:flex;align-items:center;gap:6px;
            transition:background 0.15s;
        " onmouseover="this.style.background='rgba(220,80,80,0.15)'" onmouseout="this.style.background='transparent'">
            <i class="ti ti-logout"></i>Đăng xuất
        </a>
    </nav>
</header>