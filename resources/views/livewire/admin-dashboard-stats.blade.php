<div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px; margin-bottom: 40px;">
    <!-- Customers Box -->
    <div style="flex: 1; min-width: 250px; background: linear-gradient(to bottom, #111111, #0a0a0a); border-radius: 8px; padding: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.5); border:1px solid #222;">
        <div style="display: flex; align-items: center; margin-bottom: 20px;">
            <div style="width:50px; height:50px; border-radius:50%; background-color: rgba(212,175,55,0.1); display:flex; align-items:center; justify-content:center; margin-right:15px; color:#D4AF37; font-size:22px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <div style="font-size: 18px; font-weight: bold;">Customers</div>
        </div>
        <div style="font-size: 32px; font-weight: bold;">{{ $totalCustomers }}</div>
    </div>

    <!-- Orders Box -->
    <div style="flex: 1; min-width: 250px; background: linear-gradient(to bottom, #111111, #0a0a0a); border-radius: 8px; padding:25px; box-shadow: 0 5px 15px rgba(0,0,0,0.5); border:1px solid #222;">
        <div style="display:flex; align-items:center; margin-bottom:20px;">
            <div style="width:50px; height:50px; border-radius:50%; background-color: rgba(212,175,55,0.1); display:flex; align-items:center; justify-content:center; margin-right:15px; color:#D4AF37; font-size:22px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
            </div>
            <div style="font-size:18px; font-weight:bold;">Orders</div>
        </div>
        <div style="font-size:32px; font-weight:bold;">{{ $totalOrders }}</div>
        <div style="color:#aaa; font-size:14px;">{{ $pendingOrders }} pending delivery</div>
    </div>

    <!-- Bouquets Box -->
    <div style="flex:1; min-width:250px; background: linear-gradient(to bottom, #111111, #0a0a0a); border-radius:8px; padding:25px; box-shadow:0 5px 15px rgba(0,0,0,0.5); border:1px solid #222;">
        <div style="display:flex; align-items:center; margin-bottom:20px;">
            <div style="width:50px; height:50px; border-radius:50%; background-color: rgba(212,175,55,0.1); display:flex; align-items:center; justify-content:center; margin-right:15px; color:#D4AF37; font-size:22px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                </svg>
            </div>
            <div style="font-size:18px; font-weight:bold;">Bouquets</div>
        </div>
        <div style="font-size:32px; font-weight:bold;">{{ $totalBouquets }}</div>
    </div>
</div>
