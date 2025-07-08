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
                        <h3 class="card-title mb-0">Update New Menu</h3>
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-primary">View Menus</a>
                    </div>

                    <form method="POST" action="{{ route('admin.menu.update', encrypt($menuItem->id)) }}">
                        @csrf
                        @method('PUT') 

                        {{-- Menu Name --}}
                        <div class="mb-3 row align-items-center">
                            <label for="name" class="col-sm-3 col-form-label">Menu Item Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="Main Menu Item Name (e.g., Services)"
                                       value="{{ old('name', $menuItem->name) }}" required>
                            </div>
                        </div>

                        {{-- Dropdown Items --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Dropdown Items</label>
                            <div class="col-sm-9">
                                <div id="dropdown-items-container">
                                    @php $itemIndex = 0; @endphp
                                    @foreach (old('items', $menuItem->dropdownItems->toArray()) as $index => $itemData)
                                       @if(is_array($itemData) && isset($itemData['name']))
                                            <div class="main-item-wrapper border p-3 mb-3 rounded">
                                                {{-- Main Item Input Group --}}
                                                <div class="input-group mb-2">
                                                    <input type="text" name="items[{{ $itemIndex }}][name]" class="form-control @error('items.'.$itemIndex.'.name') is-invalid @enderror" placeholder="Dropdown Item Name" value="{{ $itemData['name'] ?? '' }}" required>
                                                    <button type="button" class="btn btn-danger" onclick="removeItem(this)">Remove Item</button>
                                                    @error('items.'.$itemIndex.'.name')
                                                        <div class="invalid-feedback w-100">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                {{-- Button to add sub-item --}}
                                                <button type="button" class="btn btn-secondary btn-sm mb-2" onclick="addSubItem(this.nextElementSibling, {{ $itemIndex }})">Add Sub-item</button>

                                                {{-- Sub-items Container --}}
                                                <div class="sub-items-container ms-4 mt-2">
                                                    @php
                                                        $subItems = $itemData['children'] ?? ($itemData['sub_items'] ?? []);
                                                    @endphp
                                                    @if (!empty($subItems))
                                                        @foreach ($subItems as $subIndex => $subItem)
                                                            @php
                                                                // Handle both object (from DB) and string (from old input)
                                                                $subItemName = is_array($subItem) ? ($subItem['name'] ?? '') : $subItem;
                                                            @endphp
                                                            @if(!empty($subItemName))
                                                                <div class="input-group input-group-sm mb-2">
                                                                    <input type="text" name="items[{{ $itemIndex }}][sub_items][]" class="form-control @error('items.'.$itemIndex.'.sub_items.'.$subIndex) is-invalid @enderror" placeholder="Sub-item Name" value="{{ $subItemName }}" required>
                                                                    <button type="button" class="btn btn-outline-danger" onclick="removeItem(this)">Remove</button>
                                                                        @error('items.'.$itemIndex.'.sub_items.'.$subIndex)
                                                                        <div class="invalid-feedback w-100">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            @php $itemIndex++; @endphp
                                        @endif
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-success mt-2" onclick="addDropdownItem()">
                                    Add Dropdown Item
                                </button>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">Update Menu</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            {{-- End Card --}}
        </div>
    </div>
</div>
@push('scripts')
<script>
    // Initialize counter based on existing items to prevent index collision
    // Use the count of rendered items (which might differ from DB count if old() data is present)
    let mainItemIndex = {{ $itemIndex ?? 0 }}; // Start index after the last rendered item

    // Function to add a main dropdown item (Same as in create.blade.php)
    function addDropdownItem() {
        const container = document.getElementById('dropdown-items-container');
        const currentMainIndex = mainItemIndex; // Capture index for the closure

        const mainItemWrapper = document.createElement('div');
        mainItemWrapper.className = 'main-item-wrapper border p-3 mb-3 rounded';

        const mainInputGroup = document.createElement('div');
        mainInputGroup.className = 'input-group mb-2';

        const mainInput = document.createElement('input');
        mainInput.type = 'text';
        mainInput.name = `items[${currentMainIndex}][name]`;
        mainInput.className = 'form-control';
        mainInput.placeholder = 'Dropdown Item Name (e.g., Consulting)';
        mainInput.required = true;

        const removeMainBtn = document.createElement('button');
        removeMainBtn.type = 'button';
        removeMainBtn.className = 'btn btn-danger';
        removeMainBtn.innerHTML = 'Remove Item';
        removeMainBtn.onclick = function() { removeItem(this); }; // Use unified remove function

        mainInputGroup.appendChild(mainInput);
        mainInputGroup.appendChild(removeMainBtn);

        const subItemsContainer = document.createElement('div');
        subItemsContainer.className = 'sub-items-container ms-4 mt-2';

        const addSubItemBtn = document.createElement('button');
        addSubItemBtn.type = 'button';
        addSubItemBtn.className = 'btn btn-secondary btn-sm mb-2';
        addSubItemBtn.innerHTML = 'Add Sub-item';
        addSubItemBtn.onclick = function() { addSubItem(subItemsContainer, currentMainIndex); };

        mainItemWrapper.appendChild(mainInputGroup);
        mainItemWrapper.appendChild(addSubItemBtn);
        mainItemWrapper.appendChild(subItemsContainer);
        container.appendChild(mainItemWrapper);

        mainItemIndex++; // Increment index for the *next* item
    }

    // Function to add a sub-item (Same as in create.blade.php)
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
        removeSubBtn.innerHTML = 'Remove';
        removeSubBtn.onclick = function() { removeItem(this); }; // Use unified remove function

        subItemDiv.appendChild(subInput);
        subItemDiv.appendChild(removeSubBtn);
        subContainer.appendChild(subItemDiv);
    }

    // Unified function to remove either a main item wrapper or a sub-item input group
    function removeItem(button) {
        // Find the closest parent wrapper to remove
        // For main items, it's '.main-item-wrapper'
        // For sub-items, it's '.input-group'
        const wrapperToRemove = button.closest('.main-item-wrapper, .input-group');
        if (wrapperToRemove) {
            wrapperToRemove.remove();
            // Note: Re-indexing on removal is complex and often unnecessary if the backend
            // handles potentially non-sequential keys (like PHP arrays do).
            // If strict sequential indexing is required by the backend after removal,
            // a more complex re-indexing logic would be needed here.
        }
    }

    // Auto-hide success alert (Same as in create.blade.php)
    window.setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            if (typeof bootstrap !== 'undefined' && bootstrap.Alert) {
                 const bsAlert = bootstrap.Alert.getInstance(alert);
                 if (bsAlert) {
                     bsAlert.close();
                 } else {
                     alert.remove();
                 }
            } else {
                alert.remove();
            }
        }
    }, 5000);

</script>
@endpush
@endsection
