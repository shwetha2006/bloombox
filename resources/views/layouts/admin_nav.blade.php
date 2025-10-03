<!-- resources/views/layouts/admin_nav.blade.php -->
<div style="width: 250px; background-color: #111111; border-right: 1px solid #222; padding: 20px 0;">
    <nav style="padding: 0 20px;">
        
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" style="display: flex; align-items: center; padding: 15px 20px; background-color: rgba(212, 175, 55, 0.1); border-left: 4px solid #D4AF37; color: white; text-decoration: none; border-radius: 0 5px 5px 0; margin-bottom: 10px;">
            <div style="margin-right: 15px; color: #D4AF37;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
            </div>
            <span style="font-weight: 500;">Dashboard</span>
        </a>

        <!-- Customers -->
        <a href="{{ route('admin.customers.index') }}" style="display: flex; align-items: center; padding: 15px 20px; color: #ccc; text-decoration: none; border-radius: 5px; margin-bottom: 10px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#222'; this.style.color='white';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ccc';">
            <div style="margin-right: 15px; color: #D4AF37;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <span style="font-weight: 500;">Customers</span>
        </a>

        <!-- Orders -->
        <a href="{{ route('admin.orders.index') }}" style="display: flex; align-items: center; padding: 15px 20px; color: #ccc; text-decoration: none; border-radius: 5px; margin-bottom: 10px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#222'; this.style.color='white';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ccc';">
            <div style="margin-right: 15px; color: #D4AF37;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
            </div>
            <span style="font-weight: 500;">Orders</span>
        </a>

        <!-- Bouquets -->
        <a href="{{ route('admin.bouquets.index') }}" style="display: flex; align-items: center; padding: 15px 20px; color: #ccc; text-decoration: none; border-radius: 5px; margin-bottom: 10px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#222'; this.style.color='white';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ccc';">
            <div style="margin-right: 15px; color: #D4AF37;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                </svg>
            </div>
            <span style="font-weight: 500;">Bouquets</span>
        </a>

        <a href="{{ route('admin.addons.index') }}" style="display: flex; align-items: center; padding: 15px 20px; color: #ccc; text-decoration: none; border-radius: 5px; margin-bottom: 10px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#222'; this.style.color='white';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ccc';">
            <div style="margin-right: 15px; color: #D4AF37;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                </svg>
            </div>
            <span style="font-weight: 500;">Add Ons</span>
        </a>

        <a href="{{ route('admin.categories.index') }}" style="display: flex; align-items: center; padding: 15px 20px; color: #ccc; text-decoration: none; border-radius: 5px; margin-bottom: 10px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#222'; this.style.color='white';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ccc';">
            <div style="margin-right: 15px; color: #D4AF37;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                </svg>
            </div>
            <span style="font-weight: 500;">Categories</span>
        </a>

        <a href="{{ route('admin.events.index') }}" style="display: flex; align-items: center; padding: 15px 20px; color: #ccc; text-decoration: none; border-radius: 5px; margin-bottom: 10px; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#222'; this.style.color='white';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ccc';">
            <div style="margin-right: 15px; color: #D4AF37;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                </svg>
            </div>
            <span style="font-weight: 500;">Events</span>
        </a>

    </nav>
</div>