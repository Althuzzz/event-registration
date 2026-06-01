<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Nominations</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Georgia', serif;
            background: #f5f0e8;
            min-height: 100vh;
            padding: 30px 20px;
        }

        .page-wrapper { max-width: 1100px; margin: 0 auto; }

        /* Header */
        .header {
            background: #1a1a2e;
            color: white;
            padding: 22px 32px;
            border-radius: 10px 10px 0 0;
            border-bottom: 4px solid #c9a84c;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left h1 { font-size: 20px; color: white; font-weight: 700; letter-spacing: 1px; }
        .header-left p { font-size: 12px; color: #c9a84c; margin-top: 4px; letter-spacing: 1px; }

        .header-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn {
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s;
        }

        .btn-gold { background: #c9a84c; color: #1a1a2e; }
        .btn-gold:hover { background: #b8943e; }
        .btn-outline { background: transparent; border: 1px solid #c9a84c; color: #c9a84c; }
        .btn-outline:hover { background: #c9a84c; color: #1a1a2e; }
        .btn-red { background: #dc2626; color: white; font-size: 12px; padding: 6px 12px; }
        .btn-red:hover { background: #b91c1c; }

        /* Stats bar */
        .stats-bar {
            background: #c9a84c;
            padding: 14px 32px;
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .stat { text-align: center; }
        .stat .num { font-size: 24px; font-weight: 700; color: #1a1a2e; }
        .stat .label { font-size: 11px; color: #1a1a2e; font-weight: 600; letter-spacing: 0.5px; }

        /* Main card */
        .main-card {
            background: white;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        /* Toolbar */
        .toolbar {
            padding: 16px 24px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .search-box {
            padding: 8px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 13px;
            width: 260px;
            font-family: inherit;
        }

        .search-box:focus { outline: none; border-color: #c9a84c; }

        .filter-select {
            padding: 8px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 13px;
            font-family: inherit;
            background: white;
            cursor: pointer;
        }

        /* Success/error messages */
        .alert {
            margin: 16px 24px;
            padding: 12px 16px;
            border-radius: 6px;
            font-size: 13px;
        }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #6ee7b7; }

        /* Table */
        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        thead {
            background: #1a1a2e;
            color: white;
        }

        thead th {
            padding: 13px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.15s;
        }

        tbody tr:hover { background: #fffdf5; }

        tbody td {
            padding: 13px 16px;
            color: #333;
            vertical-align: middle;
        }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            background: #fef9ec;
            color: #92400e;
            border: 1px solid #fcd34d;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #aaa;
        }
        .empty-state .icon { font-size: 48px; margin-bottom: 14px; }
        .empty-state p { font-size: 15px; }

        /* Footer */
        .table-footer {
            padding: 14px 24px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #999;
            align-items: center;
        }

        /* Modal */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 100;
            align-items: center;
            justify-content: center;
        }
        .modal-overlay.open { display: flex; }
        .modal {
            background: white;
            border-radius: 10px;
            padding: 28px;
            max-width: 420px;
            width: 90%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        }
        .modal h3 { font-size: 17px; color: #1a1a2e; margin-bottom: 10px; }
        .modal p { font-size: 13px; color: #666; margin-bottom: 22px; line-height: 1.6; }
        .modal-btns { display: flex; gap: 10px; justify-content: flex-end; }

        @media (max-width: 600px) {
            .header { flex-direction: column; gap: 12px; align-items: flex-start; }
            .stats-bar { gap: 20px; }
            .toolbar { flex-direction: column; align-items: flex-start; }
            .search-box { width: 100%; }
        }
    </style>
</head>
<body>

<div class="page-wrapper">

    <!-- Header -->
    <div class="header">
        <div class="header-left">
            <h1>NOMINATIONS ADMIN PANEL</h1>
            <p>BUSINESS & FINANCE GROUP — GCC TOP 100</p>
        </div>
        <div class="header-right">
            <a href="/nominate" class="btn btn-outline" target="_blank">View Form</a>
            <a href="/admin/nominations/export" class="btn btn-gold">Export CSV</a>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="stats-bar">
        <div class="stat">
            <div class="num">{{ $nominations->count() }}</div>
            <div class="label">Total Nominations</div>
        </div>
        <div class="stat">
            <div class="num">{{ $nominations->whereNotNull('company_name')->unique('country')->count() }}</div>
            <div class="label">Countries</div>
        </div>
        <div class="stat">
            <div class="num">{{ $nominations->filter(fn($n) => $n->created_at->isToday())->count() }}</div>
            <div class="label">Today</div>
        </div>
        <div class="stat">
            <div class="num">{{ $nominations->whereNotNull('website')->count() }}</div>
            <div class="label">With Website</div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="main-card">

        @if(session('success'))
        <div class="alert alert-success">✓ {{ session('success') }}</div>
        @endif

        <!-- Toolbar -->
        <div class="toolbar">
            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <input type="text" class="search-box" id="searchInput" placeholder="Search company, email, name...">
                <select class="filter-select" id="countryFilter" onchange="filterTable()">
                    <option value="">All Countries</option>
                    @foreach($nominations->pluck('country')->unique()->sort() as $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
                </select>
                <select class="filter-select" id="sectorFilter" onchange="filterTable()">
                    <option value="">All Sectors</option>
                    @foreach($nominations->pluck('industry_sector')->unique()->filter()->sort() as $sector)
                        <option value="{{ $sector }}">{{ $sector }}</option>
                    @endforeach
                </select>
            </div>
            <span id="rowCount" style="font-size:12px;color:#999;"></span>
        </div>

        <!-- Table -->
        <div class="table-wrap">
            <table id="nominationsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Contact Person</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Sector</th>
                        <th>Website</th>
                        <th>Submitted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($nominations as $index => $n)
                    <tr>
                        <td style="color:#aaa;font-size:12px;">{{ $index + 1 }}</td>
                        <td><strong>{{ $n->company_name }}</strong></td>
                        <td>{{ $n->contact_person }}</td>
                        <td style="color:#777;">{{ $n->designation ?? '—' }}</td>
                        <td><a href="mailto:{{ $n->email }}" style="color:#c9a84c;text-decoration:none;">{{ $n->email }}</a></td>
                        <td>{{ $n->phone ?? '—' }}</td>
                        <td><span class="badge">{{ $n->country }}</span></td>
                        <td style="color:#777;font-size:12px;">{{ $n->industry_sector ?? '—' }}</td>
                        <td>
                            @if($n->website)
                                <a href="{{ $n->website }}" target="_blank" style="color:#c9a84c;font-size:12px;">Visit</a>
                            @else
                                <span style="color:#ccc;">—</span>
                            @endif
                        </td>
                        <td style="color:#aaa;font-size:12px;">{{ $n->created_at->format('d M Y') }}</td>
                        <td>
                            <button class="btn btn-red" onclick="confirmDelete({{ $n->id }}, '{{ $n->company_name }}')">Delete</button>
                            <form id="delete-form-{{ $n->id }}" action="/admin/nominations/{{ $n->id }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11">
                            <div class="empty-state">
                                <div class="icon">📋</div>
                                <p>No nominations submitted yet.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-footer">
            <span>Business & Finance Group © {{ date('Y') }}</span>
            <span>www.bfg-globals.com</span>
        </div>

    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal">
        <h3>Confirm Delete</h3>
        <p id="deleteMessage">Are you sure you want to delete this nomination?</p>
        <div class="modal-btns">
            <button class="btn btn-outline" onclick="closeModal()" style="border-color:#ddd;color:#666;">Cancel</button>
            <button class="btn btn-red" onclick="submitDelete()">Yes, Delete</button>
        </div>
    </div>
</div>

<script>
    let deleteId = null;

    function confirmDelete(id, name) {
        deleteId = id;
        document.getElementById('deleteMessage').textContent =
            `Are you sure you want to delete the nomination from "${name}"? This cannot be undone.`;
        document.getElementById('deleteModal').classList.add('open');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.remove('open');
        deleteId = null;
    }

    function submitDelete() {
        if (deleteId) {
            document.getElementById('delete-form-' + deleteId).submit();
        }
    }

    // Search + Filter
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', filterTable);

    function filterTable() {
        const search = searchInput.value.toLowerCase();
        const country = document.getElementById('countryFilter').value.toLowerCase();
        const sector = document.getElementById('sectorFilter').value.toLowerCase();
        const rows = document.querySelectorAll('#nominationsTable tbody tr');
        let visible = 0;

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const countryCell = row.cells[6] ? row.cells[6].textContent.toLowerCase() : '';
            const sectorCell = row.cells[7] ? row.cells[7].textContent.toLowerCase() : '';

            const matchSearch = text.includes(search);
            const matchCountry = country === '' || countryCell.includes(country);
            const matchSector = sector === '' || sectorCell.includes(sector);

            if (matchSearch && matchCountry && matchSector) {
                row.style.display = '';
                visible++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('rowCount').textContent = visible + ' record(s) shown';
    }

    filterTable();
</script>

</body>
</html>