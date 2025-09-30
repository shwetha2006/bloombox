@include('admin.header')
<div style="display: flex; flex: 1;">
    @include('layouts.admin_nav')
    
    <div style="flex: 1; padding: 2rem; background-color: #000000;">
        <h1 style="font-size: 2rem; margin-bottom: 2rem; color: #D4AF37; font-weight: 600; text-align: left;">Category List</h1>

        <!-- Add Category Button -->
        <div style="margin-bottom: 2rem;">
            <form id="category-form" style="display:flex; gap:1rem;">
                @csrf
                <input type="text" name="name" placeholder="New Category" style="padding:0.5rem; border-radius:4px;">
                <button type="submit" style="background: linear-gradient(135deg, #D4AF37, #B8941F); color: #000; padding:0.5rem 1rem; border-radius:4px;">Create Category</button>
            </form>
        </div>

        <!-- Categories Table -->
        <div style="overflow-x:auto; background-color: #1a1a1a; border-radius: 8px; padding: 1rem;">
            <table style="width:100%; border-collapse: collapse; min-width: 800px;">
                <thead>
                    <tr style="border-bottom:2px solid #D4AF37; color:#D4AF37;">
                        <th style="padding:0.75rem; text-align:left;">Category Name</th>
                        <th style="padding:0.75rem; text-align:left;">Bouquets</th>
                        <th style="padding:0.75rem; text-align:center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr style="color:white; border-bottom:1px solid #404040;">
                            <td style="padding:0.75rem;">{{ $category->name }}</td>
                            <td style="padding:0.75rem;">
                                @foreach($category->bouquets as $b)
                                    <div style="margin-bottom:0.25rem;">• {{ $b->name }}</div>
                                @endforeach
                            </td>
                            <td style="padding:0.75rem; text-align:center;">
                                <button class="delete-category-btn" data-id="{{ $category->id }}"
                                    style="background-color:#7a2d2d;color:white;padding:0.3rem 0.6rem;border-radius:4px;border:none;cursor:pointer;">
                                    🗑️ Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@vite('resources/js/category.js')
