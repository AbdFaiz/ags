@extends('layouts.app')

@section('content')
    @include('partials.alert')

    <div class="row align-items-center py-4">
        <div class="col-md-6 mb-3 mb-md-0">
            <a href="{{ route('email.compose') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus me-2"></i> Compose
            </a>
            {{-- Menampilkan indikator jika sedang di filter Label atau Starred --}}
            @if(request('flagged'))
                <span class="badge bg-warning text-dark ms-2 p-2"><i class="fas fa-star me-1"></i> Starred</span>
            @elseif(request('label'))
                <span class="badge bg-info text-dark ms-2 p-2"><i class="fas fa-tag me-1"></i> Label: {{ request('label') }}</span>
            @endif
        </div>

        <div class="col-md-6 d-flex justify-content-end align-items-center gap-2">
            <div class="btn-group" id="bulkActions">
                @if ($currentFolder === 'TRASH')
                <button class="btn btn-outline-success" data-action="restore" disabled title="Restore">
                    <i class="fas fa-undo"></i>
                </button>
                @endif
                <button class="btn btn-outline-primary" data-action="read" disabled title="Mark as Read">
                    <i class="fas fa-envelope-open"></i>
                </button>
                <button class="btn btn-outline-danger" data-action="trash" disabled title="{{ $currentFolder === 'TRASH' ? 'Hapus Permanen' : 'Pindahkan ke Trash' }}">
                    <i class="fas fa-trash"></i>
                </button>
            </div>

            <div class="dropdown">
                <button class="btn btn-link text-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-cog"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form method="POST" action="{{ route('emails.mark-all-read') }}">
                            @csrf
                            <input type="hidden" name="folder" value="{{ $currentFolder }}">
                            <button type="submit" class="dropdown-item"><i class="fas fa-check-double me-2"></i>Mark All Read</button>
                        </form>
                    </li>
                    @if ($currentFolder === 'TRASH')
                        <li>
                            <form method="POST" action="{{ route('emails.restore-all') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-success"><i class="fas fa-undo me-2"></i>Restore All</button>
                            </form>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('emails.empty-trash') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i class="fas fa-eraser me-2"></i>Empty Trash</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    {{-- Filter Search & Sorting --}}
    <div class="card card-body border-0 shadow-sm mb-4">
        <form method="GET" action="{{ route('email.index') }}" class="row g-3">
            <input type="hidden" name="folder" value="{{ $currentFolder }}">
            @if(request('label')) <input type="hidden" name="label" value="{{ request('label') }}"> @endif
            @if(request('flagged')) <input type="hidden" name="flagged" value="1"> @endif
            
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search in {{ $folderTitle }}..." value="{{ $search }}">
                </div>
            </div>
            <div class="col-md-2">
                <select name="per_page" class="form-select" onchange="this.form.submit()">
                    @foreach ([10, 25, 50] as $opt)
                        <option value="{{ $opt }}" {{ $perPage == $opt ? 'selected' : '' }}>{{ $opt }} Rows</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <div class="input-group">
                    <select name="sort_field" class="form-select" onchange="this.form.submit()">
                        <option value="created_at" {{ $sortField === 'created_at' ? 'selected' : '' }}>Date</option>
                        <option value="subject" {{ $sortField === 'subject' ? 'selected' : '' }}>Subject</option>
                    </select>
                    <select name="sort_direction" class="form-select" onchange="this.form.submit()">
                        <option value="desc" {{ $sortDirection === 'desc' ? 'selected' : '' }}>Newest</option>
                        <option value="asc" {{ $sortDirection === 'asc' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <form id="bulkActionForm" method="POST" action="{{ route('emails.bulk') }}">
                @csrf
                <input type="hidden" name="action" id="bulkAction">
                <input type="hidden" name="current_folder" value="{{ $currentFolder }}">
                
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="40"><input type="checkbox" id="selectAll" class="form-check-input"></th>
                            <th width="40"></th> {{-- Kolom Star --}}
                            <th>Sender</th>
                            <th>Subject & Label</th>
                            <th width="150">Date</th>
                            <th width="50" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="emailTableBody">
                        @forelse ($emails as $email)
                            <tr class="{{ $email->status === 'unread' ? 'fw-bold' : '' }}" data-email-id="{{ $email->id }}" style="{{ $email->status === 'unread' ? 'background-color: #f8faff;' : '' }}">
                                <td>
                                    <input type="checkbox" name="selected_emails[]" value="{{ $email->id }}" class="form-check-input email-checkbox">
                                </td>
                                <td>
                                    {{-- Fitur Star/Flagged --}}
                                    <a href="javascript:void(0)" 
                                       class="toggle-star" 
                                       data-id="{{ $email->id }}" 
                                       style="text-decoration: none;">
                                        <i class="star-icon-{{ $email->id }} {{ $email->is_flagged ? 'fas fa-star text-warning' : 'far fa-star text-muted' }}"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-xs bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center" style="width:30px; height:30px; font-size: 12px;">
                                            {{ strtoupper(substr($email->from_email, 0, 1)) }}
                                        </div>
                                        <a href="{{ route('email.detail', $email->ticket_number) }}" class="text-dark text-decoration-none">
                                            {{ Str::limit($email->from_email, 25) }}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('email.detail', $email->ticket_number) }}" class="text-dark text-decoration-none">
                                        <span class="d-block">{{ $email->subject }}</span>
                                    </a>
                                    <div class="d-flex align-items-center gap-2 mt-1">
                                        {{-- Tombol Edit Label (Dropdown) --}}
                                        <div class="dropdown">
                                            <button class="btn btn-xs btn-outline-secondary py-0 px-1 shadow-none" data-bs-toggle="dropdown" style="font-size: 10px;">
                                                <i class="fas fa-tag"></i> {{ $email->label ?? 'Add Label' }}
                                            </button>
                                            <ul class="dropdown-menu shadow-sm">
                                                <li><h6 class="dropdown-header">Select Label</h6></li>
                                                {{-- Daftar Label yang sudah pernah dibuat --}}
                                                @foreach($availableLabels as $label)
                                                    <li>
                                                        <form action="{{ route('email.updateLabel', $email->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="label" value="{{ $label }}">
                                                            <button type="submit" class="dropdown-item small {{ $email->label == $label ? 'active' : '' }}">
                                                                {{ ucfirst($label) }}
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endforeach
                                                
                                                <li><hr class="dropdown-divider"></li>
                                                
                                                {{-- Input Label Baru --}}
                                                <li>
                                                    <form action="{{ route('email.updateLabel', $email->id) }}" method="POST" class="px-3 py-1">
                                                        @csrf
                                                        <div class="input-group input-group-sm">
                                                            <input type="text" name="label" class="form-control" placeholder="New label...">
                                                            <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                                                        </div>
                                                    </form>
                                                </li>

                                                {{-- Hapus Label --}}
                                                @if($email->label)
                                                <li>
                                                    <form action="{{ route('email.updateLabel', $email->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="label" value="">
                                                        <button type="submit" class="dropdown-item small text-danger">Remove Label</button>
                                                    </form>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        
                                        <small class="text-muted">{{ Str::limit(strip_tags($email->body), 50) }}</small>
                                    </div>
                                </td>
                                <td class="text-muted small">{{ $email->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a href="#" class="text-muted p-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                            @if($currentFolder === 'TRASH')
                                                <li>
                                                    <form action="{{ route('emails.restore', $email->id) }}" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item text-success small"><i class="fas fa-undo me-2"></i> Restore</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('emails.trash', $email->id) }}" method="POST" onsubmit="return confirm('Hapus permanen email ini?')">
                                                        @csrf
                                                        <button class="dropdown-item text-danger small"><i class="fas fa-trash-alt me-2"></i> Delete Forever</button>
                                                    </form>
                                                </li>
                                            @else
                                                <li>
                                                    <form action="{{ route('emails.trash', $email->id) }}" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item small"><i class="fas fa-trash me-2"></i> Move to Trash</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item small" href="#"><i class="fas fa-envelope-open me-2"></i> Mark as Read</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr id="emptyMessageRow">
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-envelope-open fa-3x mb-3 opacity-20"></i>
                                    <p>No emails in {{ $folderTitle }}</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
        
        @if ($emails->hasPages())
            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                <small>Showing {{ $emails->firstItem() }}-{{ $emails->lastItem() }} of {{ $emails->total() }}</small>
                {{ $emails->appends(request()->query())->links() }}
            </div>
        @endif
    </div>

    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var pusher = new Pusher('6e13e94b7c48cde27be4', { cluster: 'ap1', forceTLS: true });
            var channel = pusher.subscribe('emails');

            channel.bind('new.email', function(data) {
                // Hanya tampilkan jika kita di folder INBOX
                if ('{{ $currentFolder }}' !== 'INBOX') return;
                
                if (document.querySelector(`tr[data-email-id="${data.id}"]`)) return;

                const tbody = document.getElementById('emailTableBody');
                const emptyRow = document.getElementById('emptyMessageRow');
                if (emptyRow) emptyRow.remove();

                const newRow = `
                    <tr class="fw-bold" data-email-id="${data.id}" style="background-color: #f8faff;">
                        <td><input type="checkbox" name="selected_emails[]" value="${data.id}" class="form-check-input email-checkbox"></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="text-primary me-2"><i class="fas fa-circle" style="font-size: 8px;"></i></span>
                                <div class="avatar-xs bg-primary text-white rounded-circle me-2 d-flex align-items-center justify-content-center" style="width:30px; height:30px; font-size: 12px;">
                                    ${data.from.charAt(0).toUpperCase()}
                                </div>
                                <a href="/emails/${data.ticket_number}" class="text-dark text-decoration-none">${data.from}</a>
                            </div>
                        </td>
                        <td>
                            <a href="/emails/${data.ticket_number}" class="text-dark text-decoration-none">
                                <span class="d-block">${data.subject}</span>
                                <small class="text-muted">${data.preview}</small>
                            </a>
                        </td>
                        <td class="text-muted small">Just now</td>
                    </tr>
                `;
                tbody.insertAdjacentHTML('afterbegin', newRow);
            });

            // Checkbox Logic
            document.getElementById('selectAll').addEventListener('change', function() {
                document.querySelectorAll('.email-checkbox').forEach(cb => cb.checked = this.checked);
                toggleButtons();
            });

            document.addEventListener('change', (e) => {
                if (e.target.classList.contains('email-checkbox')) toggleButtons();
            });

            function toggleButtons() {
                const count = document.querySelectorAll('.email-checkbox:checked').length;
                document.querySelectorAll('#bulkActions button').forEach(btn => btn.disabled = count === 0);
            }

            document.querySelectorAll('#bulkActions button').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.getElementById('bulkAction').value = this.dataset.action;
                    document.getElementById('bulkActionForm').submit();
                });
            });

            // Form untuk toggledStar 
            document.addEventListener('click', function(e) {
            // Cek apakah yang diklik itu icon bintang atau link bintang
            if (e.target.classList.contains('toggle-star') || e.target.closest('.toggle-star')) {
                const anchor = e.target.closest('.toggle-star');
                const emailId = anchor.getAttribute('data-id');
                const icon = document.querySelector('.star-icon-' + emailId);

                // Langsung ubah UI (Optimistic Update)
                if (icon.classList.contains('fas')) {
                    icon.classList.replace('fas', 'far');
                    icon.classList.replace('text-warning', 'text-muted');
                } else {
                    icon.classList.replace('far', 'fas');
                    icon.classList.replace('text-muted', 'text-warning');
                }

                // Kirim ke server di background
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const url = "{{ route('email.toggleStar', ':id') }}".replace(':id', emailId);

                fetch(url, { // Pakai backticks (`) biar rapi
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                }).then(async response => {
                    const data = await response.json();
                    if (!response.ok || !data.success) {
                        throw new Error(data.message || 'Server Error');
                    }
                    console.log('Status bintang:', data.is_flagged);
                }).catch(err => {
                    console.error('Error:', err);
                    alert('Gagal update bintang: ' + err.message);
                    // Balikin icon ke kondisi semula kalau gagal
                    if (icon.classList.contains('fas')) {
                        icon.classList.replace('fas', 'far');
                        icon.classList.replace('text-warning', 'text-muted');
                    } else {
                        icon.classList.replace('far', 'fas');
                        icon.classList.replace('text-muted', 'text-warning');
                    }
                });
            }
        });
    });
</script>
@endsection