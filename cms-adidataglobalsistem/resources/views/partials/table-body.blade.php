@forelse ($emails as $email)
<tr class="{{ $email->status === 'unread' ? 'fw-bold' : '' }}"
    data-email-id="{{ $email->id }}"
    style="{{ $email->status === 'unread' ? 'background-color: #f8faff;' : '' }}">
    
    <td>
        <input type="checkbox" name="selected_emails[]" 
               value="{{ $email->id }}" 
               class="form-check-input email-checkbox">
    </td>

    <td>
        <a href="javascript:void(0)" class="toggle-star"
           data-id="{{ $email->id }}">
            <i class="star-icon-{{ $email->id }} 
            {{ $email->is_flagged ? 'fas fa-star text-warning' : 'far fa-star text-muted' }}">
            </i>
        </a>
    </td>

    <td>{{ $email->from_email }}</td>
    <td>{{ $email->subject }}</td>
    <td class="text-muted small">
        {{ $email->created_at->format('d M Y H:i') }}
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center py-5 text-muted">
        No emails found
    </td>
</tr>
@endforelse