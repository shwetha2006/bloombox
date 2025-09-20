<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloombox Admin Dashboard</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Arial', sans-serif; background-color: black; color: white;">
    <div style="display: flex; min-height: 100vh; flex-direction: column;">
        <!-- Header -->
        <div style="background: linear-gradient(to right, #000000, #111111, #000000); padding: 20px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #222;">
            <div style="color: #D4AF37; font-size: 24px; font-weight: bold;">BLOOMBOX ADMIN</div>
            <div style="display: flex; align-items: center;">
                <div style="margin-right: 15px;">Welcome, {{ Auth::user()->name ?? 'Admin' }}</div>
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background-color: transparent; border: 1px solid #444; color: white; padding: 8px 15px; border-radius: 4px; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </div> 
        </div>
        
        <!-- Main Content -->
        <div style="display: flex; flex: 1;">
            <!-- Sidebar -->
            @include('layouts.admin_nav')

            <!-- Dashboard Content -->
            <div style="flex: 1; padding: 30px; background-color: black;">
                <h1 style="color: #D4AF37; margin-bottom: 30px; font-size: 28px;">Dashboard Overview</h1>
                
                <!-- Stats Boxes -->
                <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px; margin-bottom: 40px;">
                    <!-- Customers Box -->
                    <div style="flex: 1; min-width: 250px; background: linear-gradient(to bottom, #111111, #0a0a0a); border-radius: 8px; padding: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5); border: 1px solid #222;">
                        <div style="display: flex; align-items: center; margin-bottom: 20px;">
                            <div style="width: 50px; height: 50px; border-radius: 50%; background-color: rgba(212, 175, 55, 0.1); display: flex; align-items: center; justify-content: center; margin-right: 15px; color: #D4AF37; font-size: 22px;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <a href="#" style="text-decoration: none; color: white;">
                                <div style="font-size: 18px; font-weight: bold;">Customers</div>
                            </a>
                        </div>
                        <div style="font-size: 32px; font-weight: bold; margin-bottom: 10px;">{{ $total_customers ?? 0 }}</div>
                    </div>
                    
                    <!-- Orders Box -->
                    <div style="flex: 1; min-width: 250px; background: linear-gradient(to bottom, #111111, #0a0a0a); border-radius: 8px; padding: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5); border: 1px solid #222;">
                        <div style="display: flex; align-items: center; margin-bottom: 20px;">
                            <div style="width: 50px; height: 50px; border-radius: 50%; background-color: rgba(212, 175, 55, 0.1); display: flex; align-items: center; justify-content: center; margin-right: 15px; color: #D4AF37; font-size: 22px;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                            </div>
                            <a href="#" style="text-decoration: none; color: white;">
                                <div style="font-size: 18px; font-weight: bold;">Orders</div>
                            </a>
                        </div>
                        <div style="font-size: 32px; font-weight: bold; margin-bottom: 10px;">{{ $total_orders ?? 102 }}</div>
                        <div style="color: #aaa; font-size: 14px;">{{ $pending_orders ?? '24 pending delivery' }}</div>
                    </div>
                    
                    <!-- Bouquets Box -->
                    <div style="flex: 1; min-width: 250px; background: linear-gradient(to bottom, #111111, #0a0a0a); border-radius: 8px; padding: 25px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5); border: 1px solid #222;">
                        <div style="display: flex; align-items: center; margin-bottom: 20px;">
                            <div style="width: 50px; height: 50px; border-radius: 50%; background-color: rgba(212, 175, 55, 0.1); display: flex; align-items: center; justify-content: center; margin-right: 15px; color: #D4AF37; font-size: 22px;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                                </svg>
                            </div>
                            <a href="#" style="text-decoration: none; color: white;">
                                <div style="font-size: 18px; font-weight: bold;">Bouquets</div>
                            </a>
                        </div>
                        <div style="font-size: 32px; font-weight: bold; margin-bottom: 10px;">{{ $total_bouquets ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>