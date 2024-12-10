@extends('layouts.app')

@section('title', 'Admin Dashboard : Manage Tags')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Manage Tags</h1>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol untuk menambah tag -->
    <button class="btn btn-add-category mb-3" data-bs-toggle="modal" data-bs-target="#addTagModal">
        + Add New Tag
    </button>

    <!-- Tabel daftar tag -->
    <table>
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tags as $tag)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $tag->name }}</td>
                    <td class="text-center">{{ $tag->created_at ? $tag->created_at->format('d M Y, H:i') : '-' }}</td>
                    <td class="text-center">{{ $tag->updated_at ? $tag->updated_at->format('d M Y, H:i') : '-' }}</td>
                    <td class="text-center">
                        <!-- Edit Button (Open Modal) -->
                        <button class="btn btn-warning btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#editTagModal" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}">
                            Edit
                        </button>
                        <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Are you sure you want to delete this tag?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted fw-bold">No tags found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal untuk Edit Tag -->
<div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="editTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTagModalLabel">Edit Tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form edit tag -->
                <form action="{{ route('admin.tags.update', 'TAG_ID') }}" method="POST" id="editTagForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Tag Name</label>
                        <input type="text" name="name" id="editName" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Add New Tag -->
<div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTagModalLabel">Add New Tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.tags.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tag Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Back to Home Link -->
<div class="article-back">
    <a href="{{ route('admin.dashboard') }}" class="back-link">← Back to Dashboard Admin</a>
</div>
@endsection

@push('styles')
<style>
    /* Tabel */
    body {
        font-family: 'Montserrat', sans-serif;
    }

    h1 {
        font-size: 36px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        text-align: center;
        color: #ffffff;
    }

    .article-back {
        text-align: center;
        margin-top: 30px;
    }

    .article-back .back-link {
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        font-weight: bold;
        color: #ffffff;
        background: #ff4081;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .article-back .back-link:hover {
        background: #45a049;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .article-back .back-link:active {
        transform: translateY(0);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
    }

    table {
        width: 100%;
        margin: 0 auto;
        border-collapse: separate;
        border-spacing: 10px 15px;
        font-family: 'Montserrat', sans-serif;
        color: #333;
    }

    thead th {
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 17px;
        color: #ffffff;
        background: #5a8eeb;
        text-align: center;
        padding: 20px 15px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    tbody tr {
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius: 10px;
    }

    tbody tr td {
        border-radius: 10px;
        text-align: center;
        padding: 12px;
        font-size: 14px;
        color: #555;
        border: none;
    }

    tbody tr td:first-child {
        border-bottom-left-radius: 10px;
        border-top-left-radius: 10px;
    }

    tbody tr td:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    tbody tr:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    /* Tombol Add New Tag */
    .btn-add-category {
        font-size: 14px;
        font-weight: bold;
        padding: 10px 20px;
        color: white;
        background: #ff4081;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: all 0.3s ease;
        margin-left: 15px;
        font-family: 'Montserrat', sans-serif;
    }

    .btn-add-category:hover {
        background: linear-gradient(45deg, #5a0fb5, #1b65e8);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .btn-add-category:active {
        transform: translateY(0);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
    }
</style>
@endpush

@push('scripts')
<script>
    // JavaScript for handling Edit Modal
    const editTagModal = document.getElementById('editTagModal');
    editTagModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const tagId = button.getAttribute('data-id');
        const tagName = button.getAttribute('data-name');

        // Update the form action URL with the correct tag ID
        const formAction = `/admin/tags/${tagId}`;
        const form = document.getElementById('editTagForm');
        form.action = formAction;

        // Fill the input field with the current tag name
        document.getElementById('editName').value = tagName;
    });
</script>
@endpush
