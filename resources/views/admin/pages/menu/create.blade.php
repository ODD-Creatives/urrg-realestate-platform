@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            {{-- Success Message --}}
            @if(session('success'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            {{-- Menu Form Card --}}
            <div class="card">
                <div class="card-body">
                    <div class="card-header border-0 pb-0 d-flex justify-content-between align-items-center mb-3">
                        <h3 class="card-title mb-0">Create New Menu</h3>
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-primary">View Menus</a>
                    </div>

                    <form method="POST" action="{{ route('admin.menu.store') }}">
                        @csrf

                        {{-- Menu Name --}}
                        <div class="mb-3 row align-items-center">
                            <label for="name" class="col-sm-3 col-form-label">Menu Item Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="Main Menu Item Name (e.g., Services)"
                                       value="{{ old('name') }}" required>
                            </div>
                        </div>

                        {{-- Dropdown Items --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Dropdown Items</label>
                            <div class="col-sm-9">
                                <div id="dropdown-items-container"></div>
                                <button type="button" class="btn btn-success mt-2" onclick="addDropdownItem()">
                                    Add Dropdown Item
                                </button>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">Create Menu</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            {{-- End Card --}}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let mainItemIndex = 0;

function addDropdownItem() {
    const container = document.getElementById('dropdown-items-container');

    const mainItemWrapper = document.createElement('div');
    mainItemWrapper.className = 'main-item-wrapper border p-3 mb-3 rounded';

    const mainInputGroup = document.createElement('div');
    mainInputGroup.className = 'input-group mb-2';

    const mainInput = document.createElement('input');
    mainInput.type = 'text';
    mainInput.name = `items[${mainItemIndex}][name]`;
    mainInput.className = 'form-control';
    mainInput.placeholder = 'Dropdown Item Name (e.g., Consulting)';
    mainInput.required = true;

    const removeMainBtn = document.createElement('button');
    removeMainBtn.type = 'button';
    removeMainBtn.className = 'btn btn-danger';
    removeMainBtn.textContent = 'Remove Item';
    removeMainBtn.onclick = () => container.removeChild(mainItemWrapper);

    mainInputGroup.appendChild(mainInput);
    mainInputGroup.appendChild(removeMainBtn);

    const subItemsContainer = document.createElement('div');
    subItemsContainer.className = 'sub-items-container ms-4 mt-2';

    const addSubItemBtn = document.createElement('button');
    addSubItemBtn.type = 'button';
    addSubItemBtn.className = 'btn btn-secondary btn-sm mb-2';
    addSubItemBtn.textContent = 'Add Sub-item';
    const currentMainIndex = mainItemIndex;
    addSubItemBtn.onclick = () => addSubItem(subItemsContainer, currentMainIndex);

    mainItemWrapper.appendChild(mainInputGroup);
    mainItemWrapper.appendChild(addSubItemBtn);
    mainItemWrapper.appendChild(subItemsContainer);

    container.appendChild(mainItemWrapper);
    mainItemIndex++;
}

function addSubItem(subContainer, parentIndex) {
    const subItemDiv = document.createElement('div');
    subItemDiv.className = 'input-group input-group-sm mb-2';

    const subInput = document.createElement('input');
    subInput.type = 'text';
    subInput.name = `items[${parentIndex}][sub_items][]`;
    subInput.className = 'form-control';
    subInput.placeholder = 'Sub-item Name';
    subInput.required = true;

    const removeSubBtn = document.createElement('button');
    removeSubBtn.type = 'button';
    removeSubBtn.className = 'btn btn-outline-danger';
    removeSubBtn.textContent = 'Remove';
    removeSubBtn.onclick = () => subContainer.removeChild(subItemDiv);

    subItemDiv.appendChild(subInput);
    subItemDiv.appendChild(removeSubBtn);
    subContainer.appendChild(subItemDiv);
}

// Auto-dismiss success alert
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.remove();
        }
    }, 5000);
});
</script>
@endpush

