@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    @include('partials.alert')
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0"><i class="fas fa-paper-plane me-2"></i>Compose New Email</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('email.send') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="to_email" class="form-label">To:</label>
                    <input type="email" name="to_email" id="to_email" class="form-control @error('to_email') is-invalid @enderror" value="{{ old('to_email') }}" placeholder="recipient@example.com" required>
                    @error('to_email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject:</label>
                    <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" placeholder="Enter subject" required>
                    @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <textarea name="message" id="message" rows="10" class="form-control @error('message') is-invalid @enderror" placeholder="Write your message here...">{{ old('message') }}</textarea>
                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="attachments" class="form-label">Attachments (Optional):</label>
                    <input type="file" name="attachments[]" id="attachments" class="form-control" multiple>
                    <small class="text-muted">Max size: 10MB per file.</small>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('email.index') }}" class="btn btn-light border">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-paper-plane me-2"></i>Send Email
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Tambahkan CKEditor atau Summernote jika ingin Rich Text --}}
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('message');
</script>
@endsection