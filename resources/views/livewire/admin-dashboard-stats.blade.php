<div style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:40px;">
    <!-- Customers Box -->
    <div style="flex:1; min-width:250px; background:linear-gradient(to bottom,#111,#0a0a0a); border-radius:8px; padding:25px; box-shadow:0 5px 15px rgba(0,0,0,0.5); border:1px solid #222;">
        <div style="display:flex; align-items:center; margin-bottom:20px;">
            <div style="width:50px; height:50px; border-radius:50%; background-color: rgba(212,175,55,0.1); display:flex; align-items:center; justify-content:center; margin-right:15px; color:#D4AF37; font-size:22px;">
                <!-- icon -->
            </div>
            <div style="font-size:18px; font-weight:bold;">Customers</div>
        </div>
        <div style="font-size:32px; font-weight:bold;">{{ $totalCustomers }}</div>
    </div>

    <!-- Orders Box -->
    <div style="flex:1; min-width:250px; background:linear-gradient(to bottom,#111,#0a0a0a); border-radius:8px; padding:25px; box-shadow:0 5px 15px rgba(0,0,0,0.5); border:1px solid #222;">
        <div style="display:flex; align-items:center; margin-bottom:20px;">
            <div style="width:50px; height:50px; border-radius:50%; background-color: rgba(212,175,55,0.1); display:flex; align-items:center; justify-content:center; margin-right:15px; color:#D4AF37; font-size:22px;">
                <!-- icon -->
            </div>
            <div style="font-size:18px; font-weight:bold;">Orders</div>
        </div>
        <div style="font-size:32px; font-weight:bold;">{{ $totalOrders }}</div>
        <div style="color:#aaa; font-size:14px;">{{ $pendingOrders }} pending orders</div>
    </div>

    <!-- Bouquets Box -->
    <div style="flex:1; min-width:250px; background:linear-gradient(to bottom,#111,#0a0a0a); border-radius:8px; padding:25px; box-shadow:0 5px 15px rgba(0,0,0,0.5); border:1px solid #222;">
        <div style="display:flex; align-items:center; margin-bottom:20px;">
            <div style="width:50px; height:50px; border-radius:50%; background-color: rgba(212,175,55,0.1); display:flex; align-items:center; justify-content:center; margin-right:15px; color:#D4AF37; font-size:22px;">
                <!-- icon -->
            </div>
            <div style="font-size:18px; font-weight:bold;">Bouquets</div>
        </div>
        <div style="font-size:32px; font-weight:bold;">{{ $totalBouquets }}</div>

        @if($lowStockBouquets->count() > 0)
            <div style="margin-top:15px; color:#ff5252; font-size:14px; font-weight:bold;">
                Please restock:
                <ul style="margin:5px 0; padding-left:15px;">
                    @foreach($lowStockBouquets as $bouquet)
                        <li>{{ $bouquet->name }} ({{ $bouquet->stock_quantity }} left)</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
